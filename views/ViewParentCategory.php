<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>

<div class="clear">
</div>
<div class="search-list-pr">
    <!-- line 1 -->
    <div class="top-one">
        <?php $nameCategory =$this->modelGetCategory()  ?>
        <a href="trang-chu.html"> Trang chủ</a> › <a href="danh-muc/<?php echo $nameCategory->id ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>.html"> 
       <?php echo  $nameCategory->name ?></a>
    </div>
    <!-- /line 1 -->
    <!-- line 2 -->
    <div class="top-two">
        <?php $ParnentCategory_id = $this->modelGetListCategoryNameSub(); ?>
        Từ khóa :
        <?php foreach ($ParnentCategory_id as $ca) : ?>
            <a href="danh-muc-con/<?php echo $ca->id; ?>/<?php echo $this->removeUnicode($ca->name) ?>.html"><?php echo $ca->name ?></a>
        <?php endforeach ?>
    </div>
    <!-- /line 2 -->

    <!-- line3 -->
    <div class="price-range">
        <ul class="list-price">
            <li style="font-size: 20px;"> <?php echo $nameCategory->name?> </li>
        </ul>
    </div>

    <!-- /line3 -->

</div>
<div class="box-all-product">

    <!-- bàn ghế gỗ -->
    <?php foreach ($ParnentCategory_id as $ca) : ?>
        <div class="product-hot go">
            <div class="title-hot" id="hotcl" onclick="location.href='danh-muc-con/<?php echo $ca->id; ?>/<?php echo $this->removeUnicode($ca->name) ?>.html'">
                <h5 class="show-and-hide"><?php echo $ca->name ?></h5>

            </div>
            <?php $ListProduct = $this->modelGetListProductSub($ca->id) ?>
            <!-- id="hots1"-->
            <div class="list-hot hots1">
                <div class="box-hot">
                    <?php foreach ($ListProduct as $rows) : ?>
                        <div class="one-hot">
                            <div class="inside-box">
                                <div class="inside-img">
                                    <a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"> <img style="height: 285px;" src="assets/upload/products/<?php echo $rows->photo; ?>" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>"></a>
                                    <div class="sale-percent">
                                        <?php echo number_format($rows->discount); ?>%
                                    </div>
                                </div>
                                <div style="min-height: 48px;"> <a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"><?php echo $rows->name; ?>
                                    </a>
                                </div>

                                <div class="code-pro">
                                    <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=1">
                                        <img style="width: 20px;border: 0;" src="assets/frontend/images/star.jpg">
                                    </a>
                                    <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=2">
                                        <img style="width: 20px;border: 0;" src="assets/frontend/images/star.jpg">
                                    </a>
                                    <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=3">
                                        <img style="width: 20px;border: 0;" src="assets/frontend/images/star.jpg">
                                    </a>
                                    <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=4">
                                        <img style="width: 20px;border: 0;" src="assets/frontend/images/star.jpg">
                                    </a>
                                    <a href="index.php?controller=products&action=rating&id=<?php echo $rows->id; ?>&star=5">
                                        <img style="width: 20px;border: 0;" src="assets/frontend/images/star.jpg">
                                    </a>

                                </div>
                                <div class="price">
                                    <div class="left-price">

                                        <div> <?php echo number_format($rows->price - ($rows->price * $rows->discount / 100)); ?>đ</div>
                                        <div><?php echo number_format($rows->price); ?>đ
                                        </div>

                                    </div>
                                    <div class="endow">
                                        <span onclick="window.location='index.php?controller=cart&action=create&id=<?php echo $rows->id; ?>';">&nbsp;<i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Mua <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> &nbsp;</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="xemthem"  >
                    <a style="margin-left: 30px;color:#623827;font-weight: bold;" href="danh-muc-con/<?php echo $ca->id; ?>/<?php echo $this->removeUnicode($rows->name)  ?>.html">Xem tất cả <?php echo $ca->name ?></a>
                </div>
            </div>
        </div>
    <?php endforeach ?>

</div>