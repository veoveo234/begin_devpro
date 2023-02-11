<?php 
	//inlude file model vao day
	include "models/ModelNews.php";
	class ControllerNews extends Controller{
		//ke thua class model
		use ModelNews;
		public function index(){
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 8;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelRead($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("ViewNews.php",array("data"=>$data,"numPage"=>$numPage));
		}
		public function detail()
		{
			$record = $this->modelGetRecord();
			$this->loadView("ViewNewsDetail.php",array("record"=>$record));
		}
	}
 ?>