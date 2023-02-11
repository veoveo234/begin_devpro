<?php 
	//inlude file model vao day
	include "models/ModelProducts.php";

	
	class ControllerProducts extends Controller{
		//ke thua class model
		use ModelProducts;
		public function removeUnicode2 ($str){
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
		public function category(){
			$category_id = isset($_GET["id"]) ? $_GET["id"] : 0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 40;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecordProduct()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelReadProduct($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("ViewCategory.php",array("data"=>$data,"numPage"=>$numPage,"category_id"=>$category_id));
		}
		public function parentCategory(){
			$ParentCategory_id = isset($_GET["ParentCategory"]) ? $_GET["ParentCategory"] : 0;
			//quy dinh so ban ghi tren mot trang
			$recordPerPage = 40;
			//tinh so trang
			$numPage = ceil($this->modelTotalRecordProduct()/$recordPerPage);
			//lay du lieu tu model
			$data = $this->modelReadProduct($recordPerPage);
			//goi view, truyen du lieu ra view
			$this->loadView("ViewParentCategory.php",array("data"=>$data,"numPage"=>$numPage,"category_id"=>$ParentCategory_id));
            
		}
		//chi tiet san pham
		public function detail(){
			$record = $this->modelGetRecord();
			$this->loadView("ViewDetail.php",array("record"=>$record));
		}
		//rating
		public function rating(){
			$id = isset($_GET["id"]) ? $_GET["id"] : 0;
			$this->modelRating();
			$product = $this->modelGetRecord();
			$name=$this->removeUnicode2($product->name);
			header("location:san-pham/chi-tiet/$id/$name.html");
		}
	}
 ?>