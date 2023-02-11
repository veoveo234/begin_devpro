<?php 
	trait ModelCategories{
		// lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			
			// lay bien truyen tu url
			$page=isset($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 :0;
			// lay tu ban ghi nao
			$from=$page*$recordPerPage;
			// ----
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("select * from categories where parent_id=0 order by id desc limit $from,$recordPerPage");
			// tra ve nhieu ban ghi
			return $query->fetchAll();
			// ---
		}
		// tinh tong so ban ghi
		public function modelTotalRecord(){
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("select id from categories  where parent_id=0");
			// tra ve ban ghi
			return $query->rowCount();
		}
		// lay 1 ban ghi tuong ung voi id truyen vao
		public function modelGetRecord(){
			$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"]:0;
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("select * from categories where id=$id");
			// tra ve nhieu ban ghi
			return $query->fetch();
		}
		public function modelUpdate()
		{
			$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"]:0;
			$name = $_POST["name"];
			$parent_id= $_POST["parent_id"];
			// update name 
			// lay bien csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("update categories set name=:var_name,parent_id=:var_parent_id where id=$id");
			$query->execute(array("var_name"=>$name,"var_parent_id"=>$parent_id));
						
		}
		public function modelCreate()
		{
			
			$name = $_POST["name"];
			$parent_id= $_POST["parent_id"];
			// lay bien csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into categories set name=:var_name,parent_id=:var_parent_id ");
				$query->execute(array("var_name"=> $name,"var_parent_id"=>$parent_id));
						
		}
		public function modelDelete(){
			$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"]:0;
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("delete from categories where id=$id or parent_id=$id");
			
		}
		public function modelReadSub($categories_id)
		{
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("select * from categories  where parent_id=$categories_id");
			return $query->fetchAll();
		}
		public function modelListCategories()
		{
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("select * from categories where parent_id=0 order by id");
			return $query->fetchAll();
			
		}
	}
 ?>
