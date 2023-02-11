<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://localhost:8080/php54/end_2/">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nội Thất Đồ Gỗ Việt</title>
    <link rel="stylesheet" href="assets/frontend/css/style2.css">
    <link rel="stylesheet" href="assets/frontend/css/style3.css">
    
    <link rel="stylesheet" href="assets/frontend/css/bootstrap-5.0.0-beta1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    
    <script src="assets/frontend/js/jquery-3.5.1.js"></script>
    <script src="assets/frontend/js/bootstrap.min.js"></script>

    <script src="assets/frontend/js/js3.js"></script>
    <script src="assets/frontend/js/js2.js"></script>
    <script src="assets/frontend/js/js.js"></script>
    
    <script src="assets/frontend/js/jsmenu-trangtrong.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
    <script src="assets/frontend/js/smenu.js"></script>

    <!-- zoom img -->
    <script src="assets/frontend/js/zoomssCustom.js" ></script>
    
    <script src="assets/frontend/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="assets/frontend/js/jsmenu.js"></script>
    
</head>
<!-- pluggin cmt FB -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0" nonce="w1tHQFUK"></script>
<!-- end pluggin cmt FB -->

<body>
    <!-- header -->

    <header>
        <?php include "views/ViewHeader.php"; ?>
    </header>
    <!-- /header -->
    <!-- /body -->

    <!-- all list -->


    <div class="box-content">
        <!-- left -->
        <div class="left-page">
            <?php echo $this->view; ?>
        </div>
        <!-- /end left -->
        <!-- right page -->
        <div class="right-page">
            <div class="choose-me">
                <h3>Chính Sách 5H</h3>
                <ol>
                    <li>Hết mình vì khách hàng</li>
                    <li>Hàng tự sản xuất, đảm bảo chất lượng </li>
                    <li>Hỗ trợ trả góp</li>
                    <li>Hỗ trợ giao hàng</li>
                    <li>Hợp với mọi nhà</li>
                </ol>
            </div>

            <div class="timtheogia">
                <h5>Tìm theo mức giá</h5>
                <label for="gianhonhat">Giá từ</label><br>
                <input type="number" min="0" value="0" id="fromPrice" placeholder="0">
                <br>
                <label for="gialonnhat">Đến</label><br>
                <input type="number" min="0" value="0" id="toPrice" placeholder="0">
                <br>
                <button> <a onclick="location.href = 'tim-kiem/gia-' + document.getElementById('fromPrice').value + '-den-' + document.getElementById('toPrice').value+'.html';">Tìm</a></button>
            </div>
            <div class="hotproduct-show left-product-hot">
                <div class="box-pro choose-me">
                    <h3>Nổi bật !!!</h3>
                    <div class="one-box-pro" onclick="location.href = 'san-pham/chi-tiet/13/sofa-phong-khach-goc-l-go-huong-hien-dai-vang-dep-gia-re.html'">
                        <img style="border: 1px solid #ccc;" src="assets/upload/products/1616255800_sofa-phong-khach-goc-l-go-huong-hien-dai-vang-dep-gia-re-6.jpg" alt="">
                        <p style="padding: 0 10px;font-weight: bold;">Sofa gỗ Phòng Khách Góc L Gỗ Hương Hiện Đại Vàng Đẹp Giá Rẻ</p>
                        <p class="box-price"><span> 26,500,000đ</span> <span> 21,465,000đ </span></p>
                        <div class="buypro"> <a href="index.php?controller=cart&action=create&id=13"> <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Mua <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> </a></div>
                    </div>
                    <div class="one-box-pro" onclick="location.href='san-pham/chi-tiet/10/nem-mousse-ep-van-thanh.html'">
                        <img style="border: 1px solid #ccc;" src="assets/upload/products/1616254920_nem-mousse-ep-van-thanh.jpg" alt="">
                        <p style="padding: 0 10px;font-weight: bold;">Nệm Mousse Ép Vạn Thành</p>
                        <p><span> 2,120,000đ </span> <span> 2,120,000đ </span></p>
                        <div class="buypro"> <a href="index.php?controller=cart&action=create&id=10"> <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Mua <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> </a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end right page -->
    </div>
    <!-- /all list -->
    <!-- experience -->
    <div class="client container ">
        <script src="assets/frontend/js/slick.js"></script>
        <div class="container">
            <h3>ĐỐI TÁC - KHÁCH HÀNG</h3>
            <section class="customer-logos slider">
                <div class="slide"><img src="assets/frontend/images/client.jpg"></div>
                <div class="slide"><img src="assets/frontend/images/client2.jpg"></div>
                <div class="slide"><img src="assets/frontend/images/client3.jpg"></div>
                <div class="slide"><img src="assets/frontend/images/clien4.jpg"></div>
                <div class="slide"><img src="assets/frontend/images/clien5.jpg"></div>
                <div class="slide"><img src="assets/frontend/images/client6.jpg"></div>
                <div class="slide"><img src="assets/frontend/images/client7.jpg"></div>
                <div class="slide"><img src="assets/frontend/images/client8.jpg"></div>
                <div class="slide"><img src="assets/frontend/images/client9.jpg"></div>
            </section>
        </div>

    </div>
    <!-- /experience -->

    <div class="clear">
    </div>
    <!-- footer -->
    <footer>
        <?php include "ViewFooter.php" ?>
    </footer>
    <!-- /footer -->
    <!-- back to top -->

    <!-- /back to top -->
</body>

</html>