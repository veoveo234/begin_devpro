<?php
    trait ModelSearch
    {
        public function modelAjaxSearch(){
            $conn = Connection::getInstance();
            $key = isset($_GET["key"]) ? $_GET["key"] :"";
            $query = $conn->query("SELECT * from products WHERE name LIKE N'%".$key."%'"); 
			// SELECT * from products WHERE name LIKE N'%Nệm%'
            // $query = $conn->query("select id,name,photo from products where name like N'%$key%'"); 
            return $query->fetchAll();
        }	
        public function modelRead($recordPerPage){
			//lay bien page truyen tu url
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;

			$page = isset($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where (price-price*discount/100)  >=$fromPrice and (price-price*discount/100) <= $toPrice order by (price-price*discount/100) limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
			//--- 
		}
		// tiem kiem gia theo category
        public function modelSearchCategory($recordPerPage){
			//lay bien page truyen tu url
			$fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$page = isset($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			//lay tu ban ghi nao
			$from = $page * $recordPerPage;
			//---
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where  (price-price*discount/100)  >=$fromPrice and (price-price*discount/100) <= $toPrice and category_id=$category_id order by (price-price*discount/100) limit $from, $recordPerPage");
			//tra ve nhieu ban ghi
			return $query->fetchAll();
			//--- 
		}
		// tiem kiem gia theo tên
        public function modelSearchNameProduct($recordPerPage){
			
            $conn = Connection::getInstance();
            $key = isset($_GET["like"]) ? $_GET["like"] :"";
			
			$page = isset($_GET["page"])&&$_GET["page"]>0 ? $_GET["page"]-1 : 0;
			$from = $page * $recordPerPage;
            $query = $conn->query("SELECT * from products WHERE name LIKE N'%".$key."%'  limit $from, $recordPerPage"); 
			// SELECT * from products WHERE name LIKE N'%Nệm%'
            // $query = $conn->query("select id,name,photo from products where name like N'%$key%'"); 
            return $query->fetchAll();
		}
		//tinh tong so ban ghi
		public function modelTotalRecord(){

            $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from products where (price-price*discount/100)>=$fromPrice and (price-price*discount/100) <= $toPrice ");
			//tra ve so ban ghi
			return $query->rowCount();
		}
		// tinh tổng số bản ghi theo giá có sẵn
		public function modelTotalRecordCatogory(){

            $fromPrice = isset($_GET["fromPrice"]) ? $_GET["fromPrice"] : 0;
			$toPrice = isset($_GET["toPrice"]) ? $_GET["toPrice"] : 0;
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//lay bien ket noi csdl
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select id from products where (price-price*discount/100)>=$fromPrice and (price-price*discount/100) <= $toPrice  and category_id=$category_id ");
			//tra ve so ban ghi
			return $query->rowCount();
		}
		// tinh tổng số bản ghi có sẵn theo tên
		public function modelTotalRecordNameProduct(){

            $conn = Connection::getInstance();
            $key = isset($_GET["like"]) ? $_GET["like"] :"";
            $query = $conn->query("SELECT * from products WHERE name LIKE N'%".$key."%'"); 
			
			return $query->rowCount();
		}
    }
    
?>