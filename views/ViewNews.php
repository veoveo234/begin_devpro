<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>
<!-- box content -->

<div class="box-all-product">


<!-- bàn ghế gỗ -->
<div class="product-hot go">
  <div class="title-hot" id="hotcl">
    <h5 class="show-and-hide"> tin tức</h5>
  </div>

  <!-- id="hots1"-->
  <div class="list-hot hots1">
    <div class="box-hot">
      <?php foreach ($data as $rows) : ?>
        <div class="one-hot">
          <div class="inside-box">
            <div class="inside-img">
              <a href="tin-tuc/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"> <img src="assets/upload/news/<?php echo $rows->photo ?>" alt="<?php echo $rows->name ?>" title="<?php echo $rows->name ?>"></a>
            </div>
            <div> <a href="tin-tuc/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"><?php echo $rows->name; ?>
              </a>
            </div>
            <div><?php echo $rows->description ?></div>

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
      <li class="page-item " style="padding-left: 10px;"><a class="page-link" href="tin-tuc/trang-<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor; ?>
  </ul>
</div>
<!-- end paging -->
<!-- /tủ rượu -->

</div>