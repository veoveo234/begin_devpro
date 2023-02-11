<?php

 function removeUnicode ($str){
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
?>
<script> 
    function timkiem() {
        let str =document.getElementById('key').value;
        str = str.toString().replace(/([áàảãạăắặằẳẵâấầẩẫậ])/g,"a");
        str = str.toString().replace(/([đ])/g,"d");
        str = str.toString().replace(/([éèẻẽẹêếềểễệ])/g,"e");
        str = str.toString().replace(/([íìỉĩị])/g,"i");
        str = str.toString().replace(/([óòỏõọôốồổỗộơớờởỡợ])/g,"o");
        str = str.toString().replace(/([úùủũụưứừửữự])/g,"u");
        str = str.toString().replace(/([ýỳỷỹỵ])/g,"y");
        str = str.toString().replace(/([ÁÀẢÃẠĂẮẶẰẲẴÂẤẦẨẪẬ])/g,"A");
        str = str.toString().replace(/([Đ])/g,"D");
        str = str.toString().replace(/([ÉÈẺẼẸÊẾỀỂỄỆ])/g,"E");
        str = str.toString().replace(/([ÍÌỈĨỊ])/g,"I");
        str = str.toString().replace(/([ÓÒỎÕỌÔỐỒỔỖỘƠỚỜỞỠỢ])/g,"O");
        str = str.toString().replace(/([ÚÙỦŨỤƯỨỪỬỮỰ])/g,"U");
        str = str.toString().replace(/([ÝỲỶỸỴ])/g,"Y");
        str=str.toString().trim();
        str = str.toString().replaceAll(",", "");
        str = str.toString().replaceAll(".", "");       
        str = str.toString().replaceAll(" ", "-");
        str = str.toString().replaceAll("?", "");
        str = str.toString().toLowerCase();
        let strSearch="";
        strSearch ='location.href=\'tim-kiem/key-'+ str+'.html\'';
        return document.getElementById("btnsearch").setAttribute("onclick",strSearch);
    }

</script>
<header>
    <!-- container -->
    <div class="onthetop">

        <!-- left -->
        <div class="text">
            <span>Nội Thất Đồ Gỗ Việt, Nội Thất Giá Rẻ Cho Gia Đình, Khách Sạn

            </span>
        </div>
        <!-- /left -->
        <!-- right -->
        <div class="topmenu ">
            <ul class="linemenu ">
                <li><a href="#"> Giới thiệu</a></li>
                <li><a href="#doitac"> Đối tác</a></li>
                <li><a href="#">Báo Giá Nội Thất </a></li>
                <li><a href="#">Hỗ Trợ Khách Hàng </a></li>
                <?php if (isset($_SESSION["customer_email"])) : ?>
                    <li><a href="danh-sach-don-hang.html">Xin chào <?php echo $_SESSION["customer_email"] ?> </a></li>
                    <li><a href="dang-xuat.html">Đăng xuất </a></li>
                <?php else : ?>
                    <li><a href="dang-nhap.html">Đăng nhập </a></li>
                    <li><a href="dang-ki.html">Đăng kí </a></li>

                <?php endif; ?>
            </ul>
        </div>
        <!-- /right -->

    </div>
    <!-- /container -->

    <!-- logo home -->
    <div class="homedgv">


        <!-- row -->

        <div class="row">
            <!-- logo -->
            <div class="logo ">
                <a href="trang-chu.html" title="Trang chủ | Nội Thất Đồ Gỗ Việt, Nội Thất Giá Rẻ Cho Gia Đình, Khách Sạn"> <img src="assets/frontend/images/logo.png" alt=""></a>
            </div>
            <!-- /logo -->

            <!-- search -->
            <div class="search ">

                <!-- form search -->

                <div class="form-search">
                    <!-- select -->

                    <div class="type-search">
                        <select>
                            <option value="">Tất cả danh mục</option>
                            <option value="">Nội thất phòng khách</option>
                            <option value="">Nội thất phòng ngủ</option>
                            <option value="">Nội thất nhà bếp</option>
                            <option value="">Nội thất phòng thờ</option>
                            <option value=""> Nội Thất Trẻ Em </option>
                            <option value=""> Ghế Sofa </option>
                            <option value=""> Nội Thất Văn Phòng </option>
                            <option value=""> Đồ Gỗ Mỹ Nghệ </option>
                            <option value=""> Nệm Cao Su </option>
                            <option value=""> Nệm </option>
                            <option value=""> Thương Hiệu Nệm </option>
                            <option value=""> Hàng Thanh Lý </option>
                            <option value=""> Combo Nội Thất </option>
                            <option value=""> Sale giá sốc </option>
                        </select>
                    </div>
                    <!-- /select -->

                    <!-- text serach -->

                    <div class="inp-search " style="position: relative;">
                        <input type="text" placeholder=" Bạn cần tìm gì ?" id="key" >
                        <i id="btnsearch" class="fa fa-search" aria-hidden="true" onclick="timkiem()"></i>
                        <div class="smart-search">
                            <ul>
                              
                            </ul>
                        </div>
                    </div>
                    <!-- /text serach -->
<script>
var input = document.getElementById("key");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("btnsearch").click();
  }
});
</script>
                </div>
                <!-- /form search -->
            </div>

            <?php
            $numberProduct = 0;
            if (isset($_SESSION["cart"])) {
                foreach ($_SESSION["cart"] as $value) {
                    $numberProduct++;
                }
            }
            ?>
            <!-- cart + phone -->
            <div class="cart-phone ">
                <div class="cart">
                    <div class="box-insidecart">

                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        <span class="text__cart"> Giỏ hàng </span>
                        <span class="count__cart"><?php echo $numberProduct ?> </span>

                    </div>
                    <?php
                    if (isset($_SESSION["cart"])) : ?>
                        <div class="inside-cart">
                            <ul class="danhsachpro">
                                <?php foreach ($_SESSION["cart"] as $product) : ?>

                                    <li>
                                        <div class="cart-box">
                                            <div class="img-sp"><img onclick="window.location.href='san-pham/chi-tiet/<?php echo $product['id'] ?>/<?php echo removeUnicode($product['name']);?>.html'" src="assets/upload/products/<?php echo $product["photo"] ?>" title="<?php echo $product["name"] ?>" alt="<?php echo $product["name"] ?>"></div>
                                            <div class="inf-sp" onclick="window.location.href='san-pham/chi-tiet/<?php echo $product['id'] ?>/<?php echo removeUnicode($product['name']);?>.html'">
                                                <p class="name-sp-cart"><a ><?php echo $product["name"] ?></a></p>
                                                <p><?php echo $product["number"] ?> X <?php echo number_format($product["price"] - $product["price"] * $product["discount"] / 100) ?>đ</p>
                                            </div>
                                            <div><i class="fa fa-times" onclick="window.location.href='index.php?controller=cart&action=delete&id=<?php echo $product['id']; ?>';"></i></div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>

                            </ul>
                            <?php if ($numberProduct > 0) : ?>
                                <a href="thanh-toan.html" class="paypay" <?php  if(isset($_SESSION["customer_email"])) :?> onclick="thanks()" <?php endif; ?>>
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Thanh toán
                                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                </a>
                            <?php endif ?>

                        </div>
                    <?php endif; ?>
                    <script>
                  function thanks() {
                    alert('Cám ơn bạn đã ủng hộ Shop, hãy kiểm tra Email để xác nhận lại thông tin sản phẩm');
                  }
                </script>
                </div>
                <div class="phone">
                    <div class="icon-phone">
                        <i class="fa fa-mobile-phone" aria-hidden="true"></i>
                    </div>
                    <div class="number">0981 720 620</div>
                </div>
            </div>
            <!-- /cart + phone -->
            <!-- /search -->
        </div>
        <!-- /row -->
    </div>
    <!-- /logo home -->

    <div class="all-content" id="id_all-content">
        <!-- cách mỗi bên trái phải 3% 
            => content = 94%
        -->
        <div class="navigation">
            <!-- menu top -->
            <?php
            //load MVC bang tay
            include "controllers/ControllerCategories.php";
            $obj = new ControllerCategories();
            $obj->index();
            ?>
            <!-- /menu top -->



        </div>

    </div>
</header>