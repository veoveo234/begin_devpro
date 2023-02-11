<?php 
	// include file model vao day
	include "models/ModelOrders.php";
	class ControllerOrders extends Controller{
		// ke thua class model
		use ModelOrders;
		public function index(){
			// quy dinh so ban ghi tren 1 trang
			$recordPerPage=10;
			// tinh so trang
			$numPage = ceil($this->modelTotal()/$recordPerPage);
			// lay du lieu tu model
			$data=$this->modelRead($recordPerPage);
			// goi view truyen du lieu ra view
			$this->loadView("ViewOrders.php",array("data"=>$data,"numPage"=>$numPage));
		}
        public function shipping()
        {
            $status=2;
			//goi ham modelUpdate de update ban ghi
			$this->modelShipping($status);
			//quay tro lai trang news
			header("location:index.php?controller=orders");   
        }
        public function received()
        {
            $status=1;
			//goi ham modelUpdate de update ban ghi
			$this->modelReceived($status);
			//quay tro lai trang news
			header("location:index.php?controller=orders");   
            
        }
        public function destroy()
        {
            $status=3;
			//goi ham modelUpdate de update ban ghi
			$this->modelDestroy($status);
			//quay tro lai trang news
			header("location:index.php?controller=orders");   
            
        }
		//xac nhan da giao hang
		public function delivery(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham tu model de thuc hien
			$this->modelDelivery($id);
			//di chuyen den trang danh sach cac ban ghi
			echo "<script>location.href='index.php?controller=orders';</script>";
		}	
		//chi tiet don hang
		public function detail(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//goi ham tu model de thuc hien
			$data = $this->modelListOrderDetails($id);
			//load view
			$this->loadView("ViewOrderDetail.php",["data"=>$data,"id"=>$id]);
		}
	}
 ?>