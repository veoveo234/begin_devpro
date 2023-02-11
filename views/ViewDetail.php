<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>

<div class="search-list-pr">
    <!-- line 1 -->
    <!-- lấy tên sp -->
    <?php $nameproduct = $this->modelGetRecord(); ?>
    <!-- lấy tên danh mục chứa tên sp -->
    <?php $nameProducyCategorysub = $this->modelGetRecordParent($nameproduct->category_id)  ?>
    <!-- lấy tên category chứa danh mục -->
    <?php $nameProducyCategory = $this->modelGetRecordParentCategory($nameProducyCategorysub->parent_id)  ?>
    <div class="top-one">
        <a href="trang-chu.html"> Trang chủ</a> ›
        <!-- tên danh mục cha -->
        <a href="danh-muc/<?php echo $nameProducyCategory->id ?>/<?php echo  $this->removeUnicode($nameProducyCategory->name)?>.html"> <?php echo $nameProducyCategory->name ?> </a> ›
        <!-- tên danh mục con -->
        <a href="danh-muc-con/<?php echo $nameProducyCategorysub->id ?>/<?php echo  $this->removeUnicode($nameProducyCategorysub->name)?>.html"> <?php echo  $nameProducyCategorysub->name ?></a> ›
        <!-- tên sp -->
        <a href="san-pham/chi-tiet/<?php echo $nameproduct->id ?>/<?php echo  $this->removeUnicode($nameproduct->name)?>.html"> <?php echo  $nameproduct->name ?></a>
    </div>
    <!-- /line 1 -->
</div>
<!-- all list -->
<div class="buypro">
    <!-- left :40% -->
    <div class="left-buypro">
        <div class="divimg">
            <div class="imglarge">
                <div class="image-wrap" id="magnifying_area">
                    <img src="assets/upload/products/<?php echo $record->photo; ?>" alt="" id="img1">
                </div>
            </div>
            <div class="imgsmall">
                <img src="assets/upload/products/<?php echo $record->photo1; ?>" alt="">
                <img src="assets/upload/products/<?php echo $record->photo2; ?>" alt="">
                <img src="assets/upload/products/<?php echo $record->photo3; ?>" alt="">
                <img src="assets/upload/products/<?php echo $record->photo4; ?>" alt="">
            </div>
        </div>
    </div>
    <script>
        var magnifying_area = document.getElementById("magnifying_area");
        var img1 = document.getElementById("img1");

        magnifying_area.addEventListener("mousemove", function(event) {
            clientX = event.clientX - magnifying_area.offsetLeft
            clientY = event.clientY - magnifying_area.offsetTop

            var mWidth = magnifying_area.offsetWidth
            var mHeight = magnifying_area.offsetHeight
            clientX = clientX / mWidth * 100
            clientY = clientY / mHeight * 100

            //img1.style.transform = 'translate(-50%,-50%) scale(2)'
            img1.style.transform = 'translate(-' + clientX + '%, -' + clientY + '%) scale(2)'
        })

        magnifying_area.addEventListener("mouseleave", function() {
            img1.style.transform = 'translate(-50%,-50%) scale(1)'
        })
    </script>
    <!-- /left  -->
    <!-- right -->
    <div class="right-buypro">
        <div class="title ">
            <?php echo $record->name ?>

        </div>
        <div class="code">
            <b> Ngày thêm</b>: <?php
                                $date = date_create($record->date);
                                echo date_format($date, "d-m-Y") ?>
        </div>
        <div class="price">
            <span> <?php echo number_format($record->price - ($record->price * $record->discount / 100)); ?>đ </span>
            <span class="thou"> <?php echo number_format($record->price); ?>đ</span>
            <span> -<?php echo number_format($record->discount); ?>%</span>
        </div>
        <div class="choose">
            <div class="choose-color">
                <div>
                    CHỌN MÀU SẮC:
                </div>
                <div>
                    <input type="radio" name="" id="" checked=checked>
                    <label for="">Tự nhiên</label>
                </div>
            </div>
            <div class="choose-size">
                <div>CHỌN KÍCH THƯỚC</div>
                <div>
                    <div class="typei">
                        <input type="radio" name="size" id="size" checked=checked>
                        <label for="size">Mặc định</label>
                        <input type="radio" name="size" id="size2" checked=checked>
                        <label for="size2">Khác <a href="lien-he.html"> (Liên Hệ chúng tôi)</a> </label>
                    </div>

                </div>
            </div>
        </div>
        <div class="buy-count">
            <input type="number" min="0" id="count" value="1">
            <div>
                (Chọn số lượng)
            </div>

        </div>
        <div class="how-to-buy">
            <div class="topp">
                <div onclick="window.location.href='thanh-toan.html'">
                    MUA NGAY
                </div>
                <div id="add_cart">
                    <a style="text-decoration: none;" href="index.php?controller=cart&action=create&id=<?php echo $record->id; ?>">THÊM VÀO GIỎ
                    </a>

                </div>
            </div>
            <div class="bott">
                <div class="inside-bott1">
                    <div> MUA TRẢ GÓP 0%</div>
                    <span> Thủ tục đơn giản</span>
                </div>
                <div class="inside-bott2">
                    <div> TRẢ GÓP 0% QUA THẺ</div>
                    <span> Visa, Master, JCB</span>
                </div>
            </div>
        </div>
        <!-- rating -->
        <div style="border:1px solid #dddddd; margin-top: 15px;" id="rating">
            <h4 style="padding-left: 10px;">Rating</h4>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"></td>
                    <td><span class="label label-primary"><?php echo $this->modelGetStar($record->id, 1); ?> vote</span></td>
                </tr>
                <tr>
                    <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
                    <td><span class="label label-warning"><?php echo $this->modelGetStar($record->id, 2); ?> vote</span></td>
                </tr>
                <tr>
                    <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
                    <td><span class="label label-danger"><?php echo $this->modelGetStar($record->id, 3); ?> vote</span></td>
                </tr>
                <tr>
                    <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
                    <td><span class="label label-info"><?php echo $this->modelGetStar($record->id, 4); ?> vote</span></td>
                </tr>
                <tr>
                    <td style="width: 80%; padding-left: 10px;"><img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"> <img src="assets/frontend/images/star.jpg"></td>
                    <td><span class="label label-success"><?php echo $this->modelGetStar($record->id, 5); ?> vote</span></td>
                </tr>
            </table>
            <br>
        </div>
        <!-- /rating -->
        <div class="detail">
            <b> Chất liệu:</b> Gỗ nguyên chất 100% <br>
            <b> Tình trạng:</b> Hàng mới 100%<br>
            <b> Trạng thái:</b> Còn hàng.<br>
            <b> Chi phí giao hàng:</b><br>
            Giao ráp miễn phí tại các quận nội thành tại TPHN.<br>
            Đan phượng, Hoài Đức,Thượng Cát <b> 250.000 vnđ/đơn hàng</b><br>
            Các tỉnh thành khác: <b> 400.000 vnđ/đơn hàng</b><br>
            <b> Thời gian giao hàng:</b> Từ 6 giờ đến 10 ngày làm việc.
        </div>
        <div class="social">
            <div class="fb" onclick="window.location.href='https://facebook.com/Noithatdogo-101806412076451'">
                <i class="fa fa-facebook" aria-hidden="true"></i>
                Facebook
            </div>
            <div class="tw">
                <i class="fa fa-twitter" aria-hidden="true"></i>
                Twitter
            </div>
            <div class="em">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                Email
            </div>
            <div class="pin">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
                Printerest
            </div>
            <div class="you">
                <i class="fa fa-youtube-play" aria-hidden="true"></i>
                Youtube
            </div>
            <div class="plus">
                <i class="fa fa-plus" aria-hidden="true"></i>
                Thêm ... 8
            </div>
        </div>
    </div>
    <!-- /right -->
</div>
<div class="description">
    <div class="title-des">
        <h4>Giới thiệu</h4>
    </div>
    <div class="all-des" style="font-weight: normal;">
        <?php echo $record->description ?>

    </div>
</div>

<div class="description" style="margin: 0 auto;">
    <div class="title-des">
        <h4>MÔ TẢ CHI TIẾT</h4>
    </div>
    <div class="all-des">
        <?php echo $record->content ?>
    </div>

</div>
<div style="display: flex;justify-content: center;margin-top: 40px;" class="fb-comments" data-href="https://www.facebook.com/N%E1%BB%99i-Th%E1%BA%A5t-%C4%90%E1%BB%93-G%E1%BB%97-101806412076451" data-width="" data-numposts="5"></div>

<!-- /all list -->