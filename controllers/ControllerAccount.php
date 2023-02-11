<?php
    include "models/ModelAccount.php";
    class ControllerAccount extends Controller 
    {
        use ModelAccount;
        public function register()
        {
            $this->loadView("ViewRegister.php");
            
        }
        public function registerPost()
        {
            $this->modelRegister();
        }
        public function checkRegisterPost()
        {
            $this->loadView("ViewConfirmAccount.php");
        }
        public function completedRegisterPost()
        {
            $this->modelCompletedAccount();
            $this->loadView("ViewCompletedRegister.php");
        }
        
        public function completedRegister()
        {
            $this->loadView("ViewCompletedRegister.php");
        }

        public function login()
        {
            $this->loadView("ViewLogin.php");
        }
        public function loginPost()
        {
            $this->modelLogin();
        }
        public function logout()
        {
            $this->modelLogout();
        }
        public function orders(){
			//quy dinh so ban ghi tren mot trang
            $id= $_SESSION["customer_id"];
			$recordPerPage = 10;
			//tinh so trang
			$numPage = ceil($this->modelTotalOneCustomer($id)/$recordPerPage);
			//goi ham de lay du lieu
			$listRecord = $this->modelReadOneCustomer($recordPerPage,$id);
			//load view
			$this->loadView("ViewOrders.php",["listRecord"=>$listRecord,"numPage"=>$numPage]);
		}	
        public function removeOrders()
        {
            $id = isset($_GET["id"]) ? $_GET["id"] :0;
            $this->modelRemoveOrders();
            header("location:danh-sach-don-hang.html");
        }
    }
