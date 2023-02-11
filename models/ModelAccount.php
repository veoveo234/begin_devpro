<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';


trait ModelAccount
{

    public function removeUnicode ($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
      'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        
       foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
       }
       $str = str_replace(",", "", $str);
       $str = str_replace(".", "", $str);       
       $str = str_replace(" ", "-", $str);
       $str = str_replace("?", "", $str);
       $str = strtolower($str);
    return $str;
    }
    public function modelRegister()
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
        // ma hoa pw
        $password = md5($password);
        $conn = Connection::getInstance();

        function getToken($len = 32)
        {
            return substr(md5(openssl_random_pseudo_bytes(20)), -$len);
        }
        $token = getToken(10);
        // ktra  email
        $queryCheck = $conn->prepare("select email from customers where email=:var_email");
        $queryCheck->execute(array("var_email" => $email));

        if ($queryCheck->rowCount() > 0)
            header("location:index.php?controller=account&action=register&notify=error");
        else {
            // insert giá trị
            $query = $conn->prepare("insert into customers set name=:var_name, email=:var_email,address=:var_address,phone=:var_phone,password=:var_password,token=:var_token");
            $query->execute(array("var_name" => $name, "var_email" => $email, "var_address" => $address, "var_phone" => $phone, "var_password" => $password, "var_token" => $token));
            header("location:xac-nhan-email.html");
        }

        // passing true in constructor enables exceptions in PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';
            $mail->Username = 'xuanhiep284@gmail.com'; // YOUR gmail email 
            $mail->Password = '313Xinchao'; // YOUR gmail password

            // Sender and recipient settings
            $mail->setFrom('xuanhiep284@gmail.com', 'Nội Thất Đồ Gỗ');
            $mail->addAddress($email, 'Receiver Name');
            $mail->addReplyTo('xuanhiep284@gmail.com', 'Give us feedback'); // to set the reply to

            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject = "Confirm email";
            $mail->Body = 'Please active your email :
                 <a href="http://localhost:8080/php54/end_2/index.php?controller=account&action=completedRegisterPost&email=' . $email . '&token=' . $token . ' ">Confirm email</a> ';

            $mail->send();
            // echo "Email message sent.";
        } catch (Exception $e) {
            echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    public function modelCompletedAccount()
    {
        $email = isset($_GET["email"]) ? $_GET["email"] : 0;
        $token = isset($_GET["token"]) ? $_GET["token"] : 0;

        $conn = Connection::getInstance();
        if (!empty($email) && !empty($token)) {
            $query = $conn->prepare("select id from customers where email=:var_email and token=:var_token");
            $query->execute(array("var_email" => $email, "var_token" => $token));
            if ($query->rowCount() > 0) {
                $update = $conn->prepare("update customers set confirmation=1,token='' where email=:var_email");
                 $update->execute(array("var_email" => $email));
                 header("location:dang-ki-thanh-cong.html");
            } else
                header("location:dang-ki.html");
        }
    }
    public function modelLogin()
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        // ma hoa pw
        $password = md5($password);
        $conn = Connection::getInstance();
        $confirmation = 1;
        // ktra  email va confirmation
        $query = $conn->prepare("select id,email,password,confirmation from customers where email=:var_email and confirmation=:var_confirmation");
        $query->execute(array("var_email" => $email, "var_confirmation" => $confirmation));
        if ($query->rowCount() > 0) {
            $result = $query->fetch();
            if ($password == $result->password) {
                $_SESSION["customer_id"] = $result->id;
                $_SESSION["customer_email"] = $result->email;
                header("location:trang-chu.html");
            }
        } else
            header("location:dang-nhap.html");
    }
    public function modelLogout()
    {
        unset($_SESSION["customer_id"]);
        unset($_SESSION["customer_email"]);
        header("location:dang-nhap.html");
    }
    public function modelRead($recordPerPage)
    {
        //lay tong to so ban ghi
        $total = $this->modelTotal();
        //tinh so trang
        $numPage = ceil($total / $recordPerPage);
        //lay so trang hien tai truyen tu url
        $page = isset($_GET["page"]) && $_GET["page"] > 0 ? $_GET["page"] - 1 : 0;
        //lay tu ban ghi nao
        $from = $page * $recordPerPage;
        //thuc hien truy van
        $conn = Connection::getInstance();
        $query = $conn->query("select * from orders order by id,status desc limit $from, $recordPerPage");
        //tra ve tat ca cac ban truy van duoc
        return $query->fetchAll();
    } 
    //
    public function modelReadOneCustomer($recordPerPage,$id)
    {
        //lay tong to so ban ghi
        $total = $this->modelTotal();
        //tinh so trang
        $numPage = ceil($total / $recordPerPage);
        //lay so trang hien tai truyen tu url
        $page = isset($_GET["page"]) && $_GET["page"] > 0 ? $_GET["page"] - 1 : 0;
        //lay tu ban ghi nao
        $from = $page * $recordPerPage;
        //thuc hien truy van
        $conn = Connection::getInstance();
        $query = $conn->query("select * from orders where customer_id=$id order by id,status desc limit $from, $recordPerPage");
        //tra ve tat ca cac ban truy van duoc
        return $query->fetchAll();
    }
    //ham tinh tong so ban ghi
    public function modelTotal()
    {
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select id from orders");
        //lay tong so ban ghi
        return $query->rowCount();
        //---
    }
    //ham tinh tong so ban ghi của 1 khách hàng
    public function modelTotalOneCustomer($id)
    {
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select id from orders where customer_id=$id");
        //lay tong so ban ghi
        return $query->rowCount();
        //---
    }
    public function modelGetCustomers($id)
    {
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select * from customers where id = $id");
        //tra ve mot ban ghi
        return $query->fetch();
        //---
    }
    //lay mot ban ghi trong table products		
    public function modelGetProducts($id)
    {
        //---
        $conn = Connection::getInstance();
        $query = $conn->query("select * from products where id = $id");
        //tra ve mot ban ghi
        return $query->fetch();
        //---
    }
    public function modelRemoveOrders()
    {
        $id = isset($_GET["id"]) ? $_GET["id"] : 0;
        $conn = Connection::getInstance();
        $query = $conn->query("update orders set status = 3 where id = $id");
    }
}
