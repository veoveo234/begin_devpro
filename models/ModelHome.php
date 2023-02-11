<?php
trait ModelHome
{
	//lay cac san pham noi bat
	public function modelHotProduct()
	{
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products where hot=1 order by price desc limit 0,4");
		return $query->fetchAll();
	}
	
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
	//lay 2 san pham noi bat
	public function modelHot2Product()
	{
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products where hot=1 order by price desc limit 0,2");
		return $query->fetchAll();
	}
	
	//lay cac san pham moi
	public function modelNewProduct()
	{
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products where new=1 order by id desc limit 0,4");
		return $query->fetchAll();
	}
	public function modelSaleProduct()
	{
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products where discount>=30 order by id desc limit 0,4");
		return $query->fetchAll();
	}
	//lay cac danh muc co san pham thuoc danh muc (nhung danh muc chua co san pham thi chua hien thi len)
	public function modelCategories()
	{
		$conn = Connection::getInstance();
		$query = $conn->query("select * from categories where id in (select category_id from products) order by id desc");
		return $query->fetchAll();
	}
	//lay cac san pham thuoc danh muc
	public function modelProducts($category_id)
	{
		$conn = Connection::getInstance();
		$query = $conn->query("select * from products where category_id=$category_id order by id desc limit 0,6");
		return $query->fetchAll();
	}
	//lay cac tin tuc noi bat
	public function modelHotNews()
	{
		$conn = Connection::getInstance();
		$query = $conn->query("select * from news where hot=1 order by id desc limit 0,6");
		return $query->fetchAll();
	}
}
