<?php 
	trait ModelUsers{
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
			$query=$conn->query("select * from users order by id desc limit $from,$recordPerPage");
			// tra ve nhieu ban ghi
			return $query->fetchAll();
			// ---
		}
		// tinh tong so ban ghi
		public function modelTotalRecord(){
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("select id from users");
			// tra ve ban ghi
			return $query->rowCount();
		}
		// lay 1 ban ghi tuong ung voi id truyen vao
		public function modelGetRecord(){
			$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"]:0;
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("select * from users where id=$id");
			// tra ve nhieu ban ghi
			return $query->fetch();
		}
		public function modelUpdate()
		{
			$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"]:0;
			$name = $_POST["name"];
			$password= $_POST["password"];
			// update name 
			// lay bien csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("update users set name=:var_name where id=$id");
			$query->execute(array("var_name"=>$name));
			// neu password ko rỗng thì update
			if($password!="")
			{
				$password=md5($password);
				$query = $conn->prepare("update users set password=:var_pasword where id=$id");
				$query->execute(array("var_password"=>$password));
			}			
		}
		public function modelCreate()
		{
			
			$name = $_POST["name"];
			$email= $_POST["email"];
			$password= $_POST["password"];
			// ma hoa ps
			$password=md5($password);
			// lay bien csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert into users set name=:var_name, email=:var_email, password=:var_password");
				$query->execute(array("var_name"=> $name,"var_email"=>$email,"var_password"=>$password));
						
		}
		public function modelDelete(){
			$id=isset($_GET["id"])&&$_GET["id"]>0 ? $_GET["id"]:0;
			// lay bien ket noi csdl
			$conn=connection::getInstance();
			// thuc hien truy van
			$query=$conn->query("delete from users where id=$id");
			
		}
	}
 ?>
