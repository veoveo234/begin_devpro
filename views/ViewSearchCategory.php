<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>

<div class="clear">
</div>
<div class="search-list-pr">
  <!-- line 1 -->
  <?php $nameCategory = $this->modelGetCategory()  ?>
  <div class="top-one">
    <a href="trang-chu.html"> Trang chủ</a> ›
    <?php $ParentCategory = $this->modelGetCategory($nameCategory->parent_id); ?>
    <!-- tên danh mục cha -->
    <a href="danh-muc/<?php echo $ParentCategory->id ?>/<?php echo $this->removeUnicode($ParentCategory->name) ?>.html"> <?php echo $ParentCategory->name ?> </a> ›
    <!-- tên danh mục con -->
    <a href="danh-muc-con/<?php echo $nameCategory->id ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>.html"> <?php echo  $nameCategory->name ?></a>
  </div>
  <!-- /line 1 -->
  <!-- line 2 -->
  <div class="top-two">
    <?php
    $category2 = $this->modelGetListCategoryNameSub($nameCategory->parent_id);
    ?>
    Từ khóa :
    <?php foreach ($category2 as $ca) : ?>
      <a href="danh-muc-con/<?php
                            echo $ca->id ?>/<?php echo $this->removeUnicode($ca->name) ?>.html"><?php echo $ca->name ?></a>
    <?php endforeach ?>
  </div>
  <!-- /line 2 -->

  <!-- line3 -->
  <div class="price-range">
    <ul class="list-price">
      <li onclick="window.location.href='tim-kiem/danh-muc-con/<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>/gia-0-den-2000000.html'"> Dưới 2 triệu </li>
      <li onclick="window.location.href='tim-kiem/danh-muc-con/<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>/gia-2000000-den-5000000.html'">Từ 2 đến 5 triệu </li>
      <li onclick="window.location.href='tim-kiem/danh-muc-con/<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>/gia-5000000-den-10000000.html'">Từ 5 đến 10 triệu </li>
      <li onclick="window.location.href='tim-kiem/danh-muc-con/<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>/gia-10000000-den-20000000.html'">Từ 10 đến 20 triệu </li>
      <li onclick="window.location.href='tim-kiem/danh-muc-con/<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>/gia-20000000-den-30000000.html'">Từ 20 đến 30 triệu </li>
      <li onclick="window.location.href='tim-kiem/danh-muc-con/<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>/gia-30000000-den-70000000.html'">Từ 30 đến 70 triệu </li>
      <li onclick="window.location.href='tim-kiem/danh-muc-con/<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>/gia-70000000-den-1000000000.html'">Trên 70 triệu </li>
    </ul>
  </div>

  <!-- /line3 -->

  <!-- bàn ghế gỗ  -->

  <!-- /bàn ghế gỗ  -->
</div>
<div class="box-all-product">
  <!-- bàn ghế gỗ -->
  <div class="product-hot go">
    <div class="title-hot" id="hotcl">
      <h5 class="show-and-hide"><?php echo  $nameCategory->name ?>- Giá từ <?php echo number_format($fromPrice) ?>đ đến <?php echo number_format($toPrice) ?>đ</h5>

    </div>

    <!-- id="hots1"-->
    <div class="list-hot hots1">
      <div class="box-hot">
        <?php foreach ($data as $rows) : ?>
          <div class="one-hot">
            <div class="inside-box">
              <div class="inside-img">
                <a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name)?>.html"> <img src="assets/upload/products/<?php echo $rows->photo; ?>" style="height: 285px;" title="<?php echo $rows->name; ?>" alt="<?php echo $rows->name; ?>"></a>
                <div class="sale-percent">
                  <?php echo number_format($rows->discount); ?>%
                </div>
              </div>
              <div style="min-height: 48px;"> <a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name)?>.html"><?php echo $rows->name; ?>
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
    </div>
  </div>

  <!-- paging -->
  <div style="clear: both;"></div>
  <div style="margin-left: 5%;">
    <ul class="pagination">
      <li class="page-item"><span>Trang</span></li>
      <?php for ($i = 1; $i <= $numPage; $i++) : ?>
        <li class="page-item " style="padding-left: 10px;"><a class="page-link" href="tim-kiem/danh-muc-con/<?php echo isset($_GET['id']) ? $_GET['id'] : 0; ?>/<?php echo $this->removeUnicode($nameCategory->name) ?>/gia-<?php echo $fromPrice ?>-den-<?php echo $toPrice; ?>/trang-<?php echo $i; ?>.html"><?php echo $i; ?></a></li>
      <?php endfor; ?>
    </ul>
  </div>
  <!-- end paging -->
  <!-- /tủ rượu -->

</div>