<?php include "models/ModelCart.php";
    class ControllerCart extends Controller
    {
        use ModelCart;
        public function __construct() {
            if( isset($_SESSION["cart"])==false)
                $_SESSION["cart"] = array();
        }
        public function create()
        {
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            // .. goi ham model
            $this->cartAdd($id);
            header("location:gio-hang.html");
        }
        public function index()
        {
            $this->loadView("ViewCart.php");
        }
        // xoa san pham khoi gia hang
        public function delete()
        {
            $id = isset($_GET["id"]) ? $_GET["id"] : 0;
            // .. goi ham model
            $this->cartDelete($id);
            header("location:gio-hang.html");
        }
        // xoa toan bo san pham khoi gia hang
        public function destroy()
        {
            // .. goi ham model
            $this->cartDestroy();
            header("location:gio-hang.html");
        }
        public function update()
        {
            // .. goi ham model
            foreach($_SESSION["cart"] as $product){
                $name = "product_".$product["id"];
                $number = $_POST[$name];
                $this->cartUpdate($product["id"],$number);
            }
            header("location:gio-hang.html");
        }
        public function checkout()
        {
            // nếu user chưa đăng nhập => yêu cầu đăng nhập :v
            if(isset($_SESSION["customer_email"]) == false)
                header("location:dang-nhap.html");
            else{
                $this->cartCheckOut();
                header("location:gio-hang.html");
            }
        }
        
    }
