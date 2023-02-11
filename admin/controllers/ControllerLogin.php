<?php
    class ControllerLogin extends Controller 
    {
        public function index()
        {
            $this->loadView("ViewLogin.php");
        }
        public function login()
        {
            $email = $_POST["email"];
            $password = $_POST["password"] ;
            // ma hoa password
            $password = md5($password);
            // lay bien ket noi csdl
            $conn = Connection::getInstance();
            // chuan bi cau truy van :
            $query =  $conn->prepare("select email from users where
             email= :var_email and password = :var_password");
            $result = $query->execute(array("var_email"=>$email,"var_password"=>$password));
            if($query->rowCount() >0 ){
                // dnag nhap thanh cong
                $_SESSION["email"] = $email;
                header("location:index.php");
                
            }
            else    
                header("location:index.php?controller=login");
        }
        // dang xuat
        public function logout()
        {
            unset($_SESSION["email"]);
            header("location:index.php");
        }
    }
    
?>