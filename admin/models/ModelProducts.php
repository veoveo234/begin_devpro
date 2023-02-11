<?php 
	trait ModelProducts{
		//lay ve danh sach cac ban ghi
		public function modelRead($recordPerPage){
			//lay bien page truyen tu url
			$page = isset($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products order by id desc limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
			//--- 
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from products");
			//tra ve so ban ghi
			return $query->rowCount();
		}
		//lay mot ban ghi tuong ung voi id truyen vao
		public function modelGetRecord(){
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where id=$id");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		public function modelUpdate(){
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$discount = $_POST["discount"];//giam gia
			$price = $_POST["price"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$new = isset($_POST["new"]) ? 1 : 0;
			//update name
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("update products set name=:var_name,category_id=:var_category_id, discount=:var_discount,price=:var_price,description=:var_description,content=:var_content,hot=:var_hot,new=:var_new where id=$id");
			$query->execute(array("var_name"=>$name,"var_category_id"=>$category_id,"var_discount"=>$discount,"var_price"=>$price,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot,"var_new"=>$new));	
			//---
			//neu user upload anh thi thuc hien upload
			
			$photo = "";
			$photo1 = "";
			$photo2 = "";
			$photo3 = "";
			$photo4 = "";
			if($_FILES["photo"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$oldPhoto = $conn->query("select photo from products where id=$id");
				if($oldPhoto->rowCount() > 0){
					$record = $oldPhoto->fetch();
					//xoa anh
					if($record->photo != "" && file_exists("../assets/upload/products/".$record->photo))
						unlink("../assets/upload/products/".$record->photo);
				}
				//---
				$photo = time()."_".$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/upload/products/$photo");
				$query = $conn->prepare("update products set photo=:var_photo where id=$id");
				$query->execute(array("var_photo"=>$photo));
			}
			// anh mo ta 1
			if($_FILES["photo1"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$oldPhoto1 = $conn->query("select photo1 from products where id=$id");
				if($oldPhoto1->rowCount() > 0){
					$record = $oldPhoto1->fetch();
					//xoa anh
					if($record->photo1 != "" && file_exists("../assets/upload/products/".$record->photo1))
						unlink("../assets/upload/products/".$record->photo1);
				}
				//---
				$photo1 = time()."_".$_FILES["photo1"]["name"];
				move_uploaded_file($_FILES["photo1"]["tmp_name"],"../assets/upload/products/$photo1");
				$query = $conn->prepare("update products set photo1=:var_photo1 where id=$id");
				$query->execute(array("var_photo1"=>$photo1));
			}
			// anh mo ta 2
			if($_FILES["photo2"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$oldPhoto2 = $conn->query("select photo2 from products where id=$id");
				if($oldPhoto2->rowCount() > 0){
					$record = $oldPhoto2->fetch();
					//xoa anh
					if($record->photo2 != "" && file_exists("../assets/upload/products/".$record->photo2))
						unlink("../assets/upload/products/".$record->photo2);
				}
				//---
				$photo2 = time()."_".$_FILES["photo2"]["name"];
				move_uploaded_file($_FILES["photo2"]["tmp_name"],"../assets/upload/products/$photo2");
				$query = $conn->prepare("update products set photo2=:var_photo2 where id=$id");
				$query->execute(array("var_photo2"=>$photo2));
			}
			// anh mo ta 3
			if($_FILES["photo3"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$oldPhoto3 = $conn->query("select photo3 from products where id=$id");
				if($oldPhoto3->rowCount() > 0){
					$record = $oldPhoto3->fetch();
					//xoa anh
					if($record->photo3 != "" && file_exists("../assets/upload/products/".$record->photo3))
						unlink("../assets/upload/products/".$record->photo3);
				}
				//---
				$photo3 = time()."_".$_FILES["photo3"]["name"];
				move_uploaded_file($_FILES["photo3"]["tmp_name"],"../assets/upload/products/$photo3");
				$query = $conn->prepare("update products set photo3=:var_photo3 where id=$id");
				$query->execute(array("var_photo3"=>$photo3));
			}
			// anh mo ta 4
			if($_FILES["photo4"]["name"] != ""){
				//---
				//lay anh cu de xoa
				$oldPhoto4 = $conn->query("select photo4 from products where id=$id");
				if($oldPhoto4->rowCount() > 0){
					$record = $oldPhoto4->fetch();
					//xoa anh
					if($record->photo4 != "" && file_exists("../assets/upload/products/".$record->photo4))
						unlink("../assets/upload/products/".$record->photo4);
				}
				//---
				$photo4 = time()."_".$_FILES["photo4"]["name"];
				move_uploaded_file($_FILES["photo4"]["tmp_name"],"../assets/upload/products/$photo4");
				$query = $conn->prepare("update products set photo4=:var_photo4 where id=$id");
				$query->execute(array("var_photo4"=>$photo4));
			}
			//---		
		}
		public function modelCreate(){
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			$name = $_POST["name"];
			$category_id = $_POST["category_id"];
			$discount = $_POST["discount"];//giam gia
			$price = $_POST["price"];
			$description = $_POST["description"];
			$content = $_POST["content"];
			$hot = isset($_POST["hot"]) ? 1 : 0;
			$new = isset($_POST["new"]) ? 1 : 0;
			$photo = "";
			if($_FILES["photo"]["name"] != ""){
				$photo = time()."_".$_FILES["photo"]["name"];
				move_uploaded_file($_FILES["photo"]["tmp_name"],"../assets/upload/products/$photo");
			}
			$photo1 = "";
			if($_FILES["photo1"]["name"] != ""){
				$photo1 = time()."_".$_FILES["photo1"]["name"];
				move_uploaded_file($_FILES["photo1"]["tmp_name"],"../assets/upload/products/$photo1");
			}
			$photo2 = "";
			if($_FILES["photo2"]["name"] != ""){
				$photo2 = time()."_".$_FILES["photo2"]["name"];
				move_uploaded_file($_FILES["photo2"]["tmp_name"],"../assets/upload/products/$photo2");
			}
			$photo3 = "";
			if($_FILES["photo3"]["name"] != ""){
				$photo3 = time()."_".$_FILES["photo3"]["name"];
				move_uploaded_file($_FILES["photo3"]["tmp_name"],"../assets/upload/products/$photo3");
			}
			$photo4 = "";
			if($_FILES["photo4"]["name"] != ""){
				$photo4 = time()."_".$_FILES["photo4"]["name"];
				move_uploaded_file($_FILES["photo4"]["tmp_name"],"../assets/upload/products/$photo4");
			}
			//update name
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			$query = $conn->prepare("insert products set name=:var_name,category_id=:var_category_id, discount=:var_discount,price=:var_price,description=:var_description,content=:var_content,hot=:var_hot,new=:var_new,photo=:var_photo,photo1=:var_photo1,photo2=:var_photo2,photo3=:var_photo3,photo4=:var_photo4");
			$query->execute(array("var_name"=>$name,"var_category_id"=>$category_id,"var_discount"=>$discount,"var_price"=>$price,"var_description"=>$description,"var_content"=>$content,"var_hot"=>$hot,"var_new"=>$new,"var_photo"=>$photo,"var_photo1"=>$photo1,"var_photo2"=>$photo2,"var_photo3"=>$photo3,"var_photo4"=>$photo4));
			//---
		}
		public function modelDelete(){
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//---
			//lay anh cu de xoa
			$oldPhoto = $conn->query("select photo from products where id=$id");
			if($oldPhoto->rowCount() > 0){
				$record = $oldPhoto->fetch();
				//xoa anh
				if($record->photo != "" && file_exists("../assets/upload/products/".$record->photo))
					unlink("../assets/upload/products/".$record->photo);
			}
			
			//lay anh cu 1 de xoa 
			$oldPhoto1 = $conn->query("select photo1 from products where id=$id");
			if($oldPhoto1->rowCount() > 0){
				$record = $oldPhoto1->fetch();
				//xoa anh
				if($record->photo1 != "" && file_exists("../assets/upload/products/".$record->photo1))
					unlink("../assets/upload/products/".$record->photo1);
			}
			//lay anh cu 2 de xoa 
			$oldPhoto2 = $conn->query("select photo2 from products where id=$id");
			if($oldPhoto2->rowCount() > 0){
				$record = $oldPhoto2->fetch();
				//xoa anh
				if($record->photo2 != "" && file_exists("../assets/upload/products/".$record->photo2))
					unlink("../assets/upload/products/".$record->photo2);
			}
			//lay anh cu 3 de xoa 
			$oldPhoto3 = $conn->query("select photo3 from products where id=$id");
			if($oldPhoto3->rowCount() > 0){
				$record = $oldPhoto3->fetch();
				//xoa anh
				if($record->photo3 != "" && file_exists("../assets/upload/products/".$record->photo3))
					unlink("../assets/upload/products/".$record->photo3);
			}
			//lay anh cu 4 de xoa 
			$oldPhoto4 = $conn->query("select photo4 from products where id=$id");
			if($oldPhoto4->rowCount() > 0){
				$record = $oldPhoto4->fetch();
				//xoa anh
				if($record->photo4 != "" && file_exists("../assets/upload/products/".$record->photo4))
					unlink("../assets/upload/products/".$record->photo4);
			}
			
			
			
			//---
			//thuc hien truy van
			$conn->query("delete from products where id=$id");
		}
		public function modelReadCategorySub($category_id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where parent_id=$category_id");
			return $query->fetchAll();
		}
		public function modelListCategories(){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where parent_id = 0 order by id desc");
			return $query->fetchAll();
		}
		public function modelGetCategory($category_id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where id=$category_id");
			//tra ve mot ban ghi
			return $query->fetch();
		}
	}
