<?php 
	trait ModelProducts{

		
		public function removeUnicode ($str){
			$unicode = array(
				'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
				'd'=>'đ',
				'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
				'i'=>'í|ì|ỉ|ĩ|ị',
				'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
				'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
				'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		  'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
				'D'=>'Đ',
				'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
				'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
				'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
				'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
				'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
			);
			
		   foreach($unicode as $nonUnicode=>$uni){
				$str = preg_replace("/($uni)/i", $nonUnicode, $str);
		   }
		   $str = str_replace(",", "", $str);
		   $str = str_replace(".", "", $str);       
		   $str = str_replace(" ", "-", $str);
		   $str = str_replace("?", "", $str);
		   $str = strtolower($str);
		return $str;
		}
		//lay ve danh sach cac ban ghi
		public function modelReadProduct($recordPerPage){
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//lay bien page truyen tu url
			$page = isset($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;

			$order=isset($_GET["order"]) ? ($_GET["order"]) :"";
			$sqlOrder = " order by id desc ";
			switch ($order) {
				case 'priceAsc':
					$sqlOrder = " order by price asc ";
					break;
				case 'priceDesc':
					$sqlOrder = " order by price desc ";
					break;
				case 'nameAsc':
					$sqlOrder = " order by name asc ";
					break;
				case 'nameDesc':
					$sqlOrder = " order by name desc ";
					break;
				case 'dateDesc':
					$sqlOrder = " order by date desc ";
					break;
			}
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where category_id = $category_id $sqlOrder limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
			//--- 
		}
		//tinh tong so ban ghi
		public function modelTotalRecordProduct(){
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from products where category_id=$category_id");
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
		// detail lấy tên danh mục chứa tên sp
		public function modelGetRecordParent($parent_id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where id=$parent_id");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		// detail lấy tên category chứa tên dnah mục
		public function modelGetRecordParentCategory($category_id){ // id
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where id=$category_id and parent_id=0");
			//tra ve mot ban ghi
			return $query->fetch();
		}
		
		//list danh muc
		// lay ten
		public function modelGetCategory($parent_id=NULL){
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			if($parent_id== NULL)
				$parent_id = isset($_GET["ParentCategory"])&&$_GET["ParentCategory"] > 0 ? $_GET["ParentCategory"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where id=$id or id=$parent_id");
			// //tra ve mot ban ghi
			// $result = $query->fetch();
			// $categoryName = $result->name;
			// return $categoryName;
			return $query->fetch();

			
		}
		// lấy tên sp cha
		public function modelGetCategoryParent(){
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where id=$id");
			//tra ve mot ban ghi
			$result = $query->fetch();
			$categoryName = $result->name;
			return $categoryName;
		}

		// lay ten 2
		public function modelGetListCategoryNameSub($parent_id=NULL){
			if($parent_id== NULL)
				$parent_id = isset($_GET["ParentCategory"])&&$_GET["ParentCategory"] > 0 ? $_GET["ParentCategory"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from categories where parent_id=$parent_id");
			//tra ve mot ban ghi	
			return $query->fetchAll();
		}
		// lay tat ca cac san pham trong list danh muc
		public function modelGetListProductSub($id){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where category_id=$id limit 0,6");
			//tra ve mot ban ghi	
			return $query->fetchAll();
		} 
		//rating
		public function modelRating(){
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			$star = isset($_GET["star"])&&$_GET["star"] > 0 ? $_GET["star"] : 0;
			if($id > 0 && $star > 0){
				//lay bien ket noi csdl
				$conn = Connection::getInstance();
				//thuc hien truy van
				$query = $conn->query("insert into rating set product_id=$id,star=$star");
			}
		}
		//lay so sao
		public function modelGetStar($product_id,$star){
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from rating where product_id=$product_id and star=$star");
			return $query->rowCount();
		}
		
		// lay ban ghi 
		public function modelGetListCategoriesSub()
		{
			$id = isset($_GET["id"])&&$_GET["id"] > 0 ? $_GET["id"] : 0;
			$conn = Connection::getInstance();
			$query = $conn->query("select * from categories where parent_id = $id");	
			return $query->fetchAll();
		}
	}
 ?>