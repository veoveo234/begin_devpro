<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';


trait ModelOrders
{

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
        $query = $conn->query("select * from orders order by date desc  limit $from, $recordPerPage");
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
    //lay mot ban ghi table orders
		public function modelGetOrders($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from orders where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
        //lay mot ban ghi trong table customers		
		public function modelGetCustomers($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from customers where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		//lay mot ban ghi trong table products		
		public function modelGetProducts($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from products where id = $id");
			//tra ve mot ban ghi
			return $query->fetch();
			//---
		}
		//xac nhan da giao hang
    // lấy tên sp theo id
		public function getNameProduct($id){
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where id=$id");
			//tra ve mot ban ghi
			$result = $query->fetch();
			$categoryName = $result->name;
			return $categoryName;
		}
        public function modelListOrderDetails($id){
			//---
			$conn = Connection::getInstance();
			$query = $conn->query("select * from orderdetails where order_id = $id");
			//tra ve mot ban ghi
			return $query->fetchAll();
			//---
		}
    public function modelGetCustomerName($id)
    {
        $conn = Connection::getInstance();
        $query = $conn->query("select * from customers where id = $id");
        //tra ve mot ban ghi
        return $query->fetch();
    }
    public function modelShipping($status)
    {
        $customer_id = isset($_GET["customer_id"]) ? $_GET["customer_id"] : 0;
        $order_id = isset($_GET["codeorders"]) ? $_GET["codeorders"] : 0;
        $cusTomer_email= $this->modelGetCustomerName($customer_id);
        $email=$cusTomer_email->email;
        //update status
        //lay bien ket noi csdl
        $conn = Connection::getInstance();
        $query = $conn->prepare("update orders set status=:var_status where id=$order_id");
        $query->execute(array("var_status" => $status));
        //---
        if ($email!="") {
            // passing true in constructor enables exceptions in PHPMailer
            $mail = new PHPMailer(true);
            //thuc hien truy van lay sp
            $query = $conn->query("select * from orderdetails where order_id=$order_id");
            // $query->execute(array("order_id"=>$order_id));
            // //tra ve mot ban ghi
            $result = $query->fetchAll();
            $contentProduct = "Mã đơn hàng : <b> " . $order_id . " </b><br>Mã Khách hàng: " . $customer_id . "<br> Ngày đặt: " . date("l") . " : " . date("d/m/Y") . "<br> Sản phẩm: <br>";
            foreach ($result as $one) {
                $productName = $this->getNameProduct($one->product_id);
                $productPrice = $one->price;
                $productQuantity = $one->quantity;
                $contentProduct = $contentProduct . "<br>Tên: " . $productName . "<br>Giá " . $productPrice . "đ<br>Số lượng mua : " . $productQuantity . " <br>";
            }
            
            $query2 = $conn->query("select * from orders where id=$order_id");
            // $query->execute(array("order_id"=>$order_id));
            // //tra ve mot ban ghi
            $result = $query2->fetch();
            $totalPrice= $result->price;
            $contentProduct .= "<br> Tổng số tiền :" . $totalPrice . "đ<br> Cám ơn bạn đã mua sản phẩm của chúng tôi <3 ";
            // return $categoryName;
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
                $mail->Subject = "Đơn hàng đang được giao đến bạn";
                $mail->Body = 'Thông báo  ' . $email . ' đơn hàng đang được giao đến bạn, Dưới đây là chi tiết đơn hàng của bạn : <br> ' . $contentProduct;

                $mail->send();
                // echo "Email message sent.";
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
    public function modelReceived($status)
    {
        $customer_id = isset($_GET["customer_id"]) ? $_GET["customer_id"] : 0;
        $order_id = isset($_GET["codeorders"]) ? $_GET["codeorders"] : 0;
        $cusTomer_email= $this->modelGetCustomerName($customer_id);
        $email=$cusTomer_email->email;
        //update status
        //lay bien ket noi csdl
        $conn = Connection::getInstance();
        $query = $conn->prepare("update orders set status=:var_status where id=$order_id");
        $query->execute(array("var_status" => $status));
        //---
        if ($email!="") {
            // passing true in constructor enables exceptions in PHPMailer
            $mail = new PHPMailer(true);
            //thuc hien truy van lay sp
            $query = $conn->query("select * from orderdetails where order_id=$order_id");
            // $query->execute(array("order_id"=>$order_id));
            // //tra ve mot ban ghi
            $result = $query->fetchAll();
            $contentProduct = "Mã đơn hàng : <b> " . $order_id . " </b><br>Mã Khách hàng: " . $customer_id . "<br> Ngày đặt: " . date("l") . " : " . date("d/m/Y") . "<br> Sản phẩm: <br>";
            foreach ($result as $one) {
                $productName = $this->getNameProduct($one->product_id);
                $productPrice = $one->price;
                $productQuantity = $one->quantity;
                $contentProduct = $contentProduct . "<br>Tên: " . $productName . "<br>Giá " . $productPrice . "đ<br>Số lượng mua : " . $productQuantity . " <br>";
            }
            
            $query2 = $conn->query("select * from orders where id=$order_id");
            // $query->execute(array("order_id"=>$order_id));
            // //tra ve mot ban ghi
            $result = $query2->fetch();
            $totalPrice= $result->price;
            $contentProduct .= "<br> Tổng số tiền :" . $totalPrice . "đ<br> Cám ơn bạn đã mua sản phẩm của chúng tôi <3 ";
            // return $categoryName;
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
                $mail->Subject = "Đánh giá chất lượng sản phẩm";
                $mail->Body = 'Kính mong  ' . $email . ' hãy vào web chúng tôi để đánh giá chất lượng sản phẩm, Dưới đây là chi tiết đơn hàng của bạn : <br> ' . $contentProduct;
                $mail->send();
                // echo "Email message sent.";
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
        //---
    }
    public function modelDestroy($status)
    {
        $customer_id = isset($_GET["customer_id"]) ? $_GET["customer_id"] : 0;
        $order_id = isset($_GET["codeorders"]) ? $_GET["codeorders"] : 0;
        $cusTomer_email= $this->modelGetCustomerName($customer_id);
        $email=$cusTomer_email->email;
        //update status
        //lay bien ket noi csdl
        $conn = Connection::getInstance();
        $query = $conn->prepare("update orders set status=:var_status where id=$order_id");
        $query->execute(array("var_status" => $status));
        //---
        if ($email!="") {
            // passing true in constructor enables exceptions in PHPMailer
            $mail = new PHPMailer(true);
            //thuc hien truy van lay sp
            $query = $conn->query("select * from orderdetails where order_id=$order_id");
            // $query->execute(array("order_id"=>$order_id));
            // //tra ve mot ban ghi
            $result = $query->fetchAll();
            $contentProduct = "Mã đơn hàng : <b> " . $order_id . " </b><br>Mã Khách hàng: " . $customer_id . "<br> Ngày đặt: " . date("l") . " : " . date("d/m/Y") . "<br> Sản phẩm: <br>";
            foreach ($result as $one) {
                $productName = $this->getNameProduct($one->product_id);
                $productPrice = $one->price;
                $productQuantity = $one->quantity;
                $contentProduct = $contentProduct . "<br>Tên: " . $productName . "<br>Giá " . $productPrice . "đ<br>Số lượng mua : " . $productQuantity . " <br>";
            }
            
            $query2 = $conn->query("select * from orders where id=$order_id");
            // $query->execute(array("order_id"=>$order_id));
            // //tra ve mot ban ghi
            $result = $query2->fetch();
            $totalPrice= $result->price;
            $contentProduct .= "<br> Tổng số tiền :" . $totalPrice . "đ<br> Chúng tôi thành thật xin lỗi vì sự bất tiện này ";
            // return $categoryName;
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
                $mail->Subject = "Hủy đơn hàng";
                $mail->Body = 'Thông báo  ' . $email . ' đơn hàng của bạn đã bị HỦY, Dưới đây là chi tiết đơn hàng của bạn : <br> ' . $contentProduct;

                $mail->send();
                // echo "Email message sent.";
            } catch (Exception $e) {
                echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }
}
