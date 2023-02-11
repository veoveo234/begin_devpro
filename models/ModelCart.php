
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/vendor/phpmailer/src/Exception.php';
require_once __DIR__ . '/vendor/phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/vendor/phpmailer/src/SMTP.php';


	trait ModelCart{		
		public function cartAdd($id){
		    if(isset($_SESSION['cart'][$id])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id]['number']++;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from products where id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['cart'][$id] = array(
		            'id' => $id,
		            'name' => $product->name,
		            'photo' => $product->photo,
		            'number' => 1,
		            'price' => $product->price,
		            'discount' => $product->discount
		        );
		    }
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
		public function cartAddWithNumber($id,$quantity){
		    if(isset($_SESSION['cart'][$id])){
		        //nếu đã có sp trong giỏ hàng thì số lượng lên 1
		        $_SESSION['cart'][$id]['number'] += $quantity;
		    } else {
		        //lấy thông tin sản phẩm từ CSDL và lưu vào giỏ hàng
		        //$product = db::get_one("select * from products where id=$id");
		        //---
		        //PDO
		        $conn = Connection::getInstance();
		        $query = $conn->prepare("select * from products where id=:id");
		        $query->execute(array("id"=>$id));
		        $query->setFetchMode(PDO::FETCH_OBJ);
		        $product = $query->fetch();
		        //---
		        
		        $_SESSION['cart'][$id] = array(
		            'id' => $id,
		            'name' => $product->name,
		            'photo' => $product->photo,
		            'number' => $quantity,
		            'price' => $product->price,
		            'discount' => $product->discount
		        );
		    }
		}
		/**
		 * Cập nhật số lượng sản phẩm
		 * @param int
		 * @param int
		 */
		public function cartUpdate($id, $number){
		    if($number==0){
		        //xóa sp ra khỏi giỏ hàng
		        unset($_SESSION['cart'][$id]);
		    } else {
		        $_SESSION['cart'][$id]['number'] = $number;
		    }
		}
		/**
		 * Xóa sản phẩm ra khỏi giỏ hàng
		 * @param int
		 */
		public function cartDelete($id){
		    unset($_SESSION['cart'][$id]);
		}
		/**
		 * Tổng giá trị giỏ hàng
		 */
		public function cartTotal(){
		    $total = 0;
		    foreach($_SESSION['cart'] as $product){
		        $total += ($product['price']-$product['price']*$product['discount']/100) * $product['number'];
		    }
		    return $total;
		}
		/**
		 * Số sản phẩm có trong giỏ hàng
		 */
		public function cartNumber(){
		    $number = 0;
		    foreach($_SESSION['cart'] as $product){
		        $number += $product['number'];
		    }
		    return $number;
		}
		/**
		 * Danh sách sản phẩm trong giỏ hàng
		 */
		public function cartList(){
		    return $_SESSION['cart'];
		}
		/**
		 * Xóa giỏ hàng
		 */
		public function cartDestroy(){
		    $_SESSION['cart'] = array();
		}
		//=============
		// lấy tên sp theo id
		public function getNameProduct($id){
			$conn = Connection::getInstance();
			//thuc hien truy van
			$query = $conn->query("select * from products where id=$id");
			//tra ve mot ban ghi
			$result = $query->fetch();
			$categoryName = $result->name;
			return $categoryName;
		}
		//checkout
		public function cartCheckOut(){
			
			$conn = Connection::getInstance();			
			//lay id vua moi insert
			$customer_id = $_SESSION["customer_id"];
			//---
			//---
			//insert ban ghi vao orders, lay order_id vua moi insert
			//lay tong gia cua gio hang
			$price = $this->cartTotal();
			$query = $conn->prepare("insert into orders set customer_id=:customer_id, date=now(),price=:price");
			$query->execute(array("customer_id"=>$customer_id,"price"=>$price));
			//lay id vua moi insert
			$order_id = $conn->lastInsertId();
			//---
			//duyet cac ban ghi trong session array de insert vao orderdetails
			foreach($_SESSION["cart"] as $product){
				$query = $conn->prepare("insert into orderdetails set order_id=:order_id, product_id=:product_id, price=:price, quantity=:quantity");
				$query->execute(array("order_id"=>$order_id,"product_id"=>$product["id"],"price"=>($product['price']-$product['price']*$product['discount']/100),"quantity"=>$product["number"]));
			}
			if(isset($_SESSION["customer_email"])){
				 // passing true in constructor enables exceptions in PHPMailer
				 $mail = new PHPMailer(true);
				 $email= $_SESSION["customer_email"]; 
				 	
				//thuc hien truy van lay sp
				$query = $conn->query("select * from orderdetails where order_id=$order_id");
				// $query->execute(array("order_id"=>$order_id));
				// //tra ve mot ban ghi
				$result = $query->fetchAll();
				$contentProduct="Mã đơn hàng : <b> ".$order_id ." </b><br>Mã Khách hàng: ".$customer_id."<br> Ngày đặt: " .date("l")." : ".date("d/m/Y")."<br> Sản phẩm: <br>";
				foreach($result as $one)
				{
					$productName =$this->getNameProduct($one->product_id);
					$productPrice = $one->price;
					$productQuantity=$one->quantity;
					$contentProduct =$contentProduct."<br>Tên: ".$productName. "<br>Giá " .$productPrice. "đ<br>Số lượng mua : ".$productQuantity. " <br>";		
				}
				$contentProduct.="<br> Tổng số tiền :".$price."đ<br> Cám ơn bạn đã mua sản phẩm của chúng tôi <3 ";
				// return $categoryName;
				 try {
					 // Server settings
					 $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
					 $mail->isSMTP();
					 $mail->Host = 'smtp.gmail.com';
					 $mail->SMTPAuth = true;
					 $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
					 $mail->Port = 587;
					 $mail->CharSet = 'UTF-8';
					 $mail->Username = 'xuanhiep284@gmail.com'; // YOUR gmail email 
					 $mail->Password = '313Xinchao'; // YOUR gmail password
		 
					 // Sender and recipient settings
					 $mail->setFrom('xuanhiep284@gmail.com', 'Nội Thất Đồ Gỗ');
					 $mail->addAddress($email, 'Receiver Name');
					 $mail->addReplyTo('xuanhiep284@gmail.com', 'Give us feedback'); // to set the reply to
					 // Setting the email content
					 $mail->IsHTML(true);
					 $mail->Subject = "Cám ơn bạn đã đặt mua hàng";
					 $mail->Body = 'Cám ơn '.$email.' đã đặt mua hàng Tại Nội Thất Đồ Gỗ Việt Đơn, Dưới đây là chi tiết đơn hàng của bạn : <br> '.$contentProduct;
		 
					 $mail->send();
					 // echo "Email message sent.";
				 } catch (Exception $e) {
					 echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
				 }
			}

			//xoa gio hang
			unset($_SESSION["cart"]);
		}
		//=============
	}	
?>