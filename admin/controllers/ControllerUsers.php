<?php 
	// include file model vao day
	include "models/ModelUsers.php";
	class ControllerUsers extends Controller{
		// ke thua class model
		use ModelUsers;
		public function index(){
			// quy dinh so ban ghi tren 1 trang
			$recordPerPage=4;
			// tinh so trang
			$numPage = ceil($this->modelTotalRecord()/$recordPerPage);
			// lay du lieu tu model
			$data=$this->modelRead($recordPerPage);
			// goi view truyen du lieu ra view
			$this->loadView("ViewUsers.php",array("data"=>$data,"numPage"=>$numPage));
		}
		public function update(){
			$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"]:0;
			// lay mot ban ghi 
			$record=$this->modelGetrecord();
			// tao bien $action de biet duoc khi an nut submit se den dau
			$action="index.php?controller=users&action=updatePost&id=$id";
			// goi view, truyen du lieu ra view
			$this->loadView("ViewFormUsers.php",array("record"=>$record,"action"=>$action));
	
		}
		public function updatePost()
		{
			$id = isset($_GET["id"]) && $_GET["id"] >0 ? $_GET["id"] : 0;
			// goi ham model update ban ghi
			$this->modelUpdate();
			// quay tro lai user
			header("location:index.php?controller=users");
		}
		
		public function create(){
			
			// tao bien $action de biet duoc khi an nut submit se den dau
			$action="index.php?controller=users&action=createPost";
			// goi view, truyen du lieu ra view
			$this->loadView("ViewFormUsers.php",array("action"=>$action));
	
		}
		public function createPost()
		{
			// goi ham modelcreate de create ban ghi
			$this->modelCreate();
			header(("location:index.php?controller=users"));
		}
		public function delete()
		{
			// goi ham modelcreate de create ban ghi
			$this->modelDelete();
			header(("location:index.php?controller=users"));
		}

	}
 ?>