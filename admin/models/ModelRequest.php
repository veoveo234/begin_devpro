<?php 
	trait ModelRequest{
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
			$query=$conn->query("select * from request order by id desc limit $from,$recordPerPage");
			// tra ve nhieu ban ghi
			return $query->fetchAll();
			// ---
		}
		// tinh tong so ban ghi
		public function modelTotalRecord(){
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("select id from request");
			// tra ve ban ghi
			return $query->rowCount();
		}
	}
 ?>
