<div class="menu-top">
  <!-- left -->
  <div class="menu-left">
    <div class="sub-menu">
      <a href="#" id="inside_sub">
        <i class="fa fa-bars" aria-hidden="true"></i>
        DANH MỤC SẢN PHẨM
      </a>

      <ul class="list-sub list-sub-home">
        <?php
        $categories = $this->modelListCategories();
        ?>
        <?php foreach ($categories as $rows) : ?>
          <li><a href="danh-muc/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html">
              <img src="assets/frontend/images/icon-bg.png" alt="">
              <?php echo $rows->name; ?>
            </a>
            <?php
            $categoriesSub = $this->modelListCategoriesSub($rows->id);
            ?>
              <ul class="list-sub-2">
                <?php foreach ($categoriesSub as $rowsSub) : ?>
                <li><a href="danh-muc-con/<?php echo $rowsSub->id; ?>/<?php echo $this->removeUnicode($rowsSub->name) ?>.html">
                    <?php echo $rowsSub->name ?>
                  </a>
                </li>
                <?php endforeach; ?>
              </ul>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
  <!-- /left -->

  <!-- right/list -->
  <div class="clear"></div>
  <div class="list-product">
    <ul>
      <li>
        <a href="trang-chu.html">TRANG CHỦ </a>
      </li>
      <li><a href="gio-hang.html">GIỎ HÀNG </a>
    
      </li>
      <li><a href="tin-tuc.html">TIN TỨC </a>
   
      </li>
      <li><a href="lien-he.html">LIÊN HỆ </a>
      </li>
      <li><a href="#">THÊM THÔNG TIN </a>
        <ul class="menu-sp">
          <li><a href="#"> Đối Tác</a></li>
          <li><a href="#"> Đại Lí </a></li>
          <li><a href="#"> Giới thiệu </a></li>
          <li><a href="#"> Tra cứu hóa đơn </a></li>
        </ul>
      </li>
                  
    </ul>
  </div>
  <!-- /right/list -->
</div>