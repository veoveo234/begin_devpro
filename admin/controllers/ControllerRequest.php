<?php 
	// include file model vao day
	include "models/ModelRequest.php";
	class ControllerRequest extends Controller{
		// ke thua class model
		use ModelRequest;
		public function index(){
			// quy dinh so ban ghi tren 1 trang
			$recordPerPage=5;
			// tinh so trang
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			// lay du lieu tu model
			$data=$this->modelRead($recordPerPage);
			// goi view truyen du lieu ra view
			$this->loadView("ViewRequest.php",array("data"=>$data,"numPage"=>$numPage));
		}

	}
 ?>