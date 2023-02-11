<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangChu.php";
?>
<div class="all_sp">

	<!-- product-hot -->
	<div class="product-hot">
		<div class="title-hot">
			<div class="img-title">
				<img src="assets/frontend/images/divider.png" alt="">
			</div>
			<h2> sản phẩm bán chạy</h2>
		</div>
		<div class="list-hot">
			<div class="box-hot">
				<?php
				$hotProduct = $this->modelHotProduct();
				?>
				<?php foreach ($hotProduct as $rows) : ?>
					<div class="one-hot">
						<div class="inside-box">
							<div class="inside-img">
								<a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"> <img style="height: 295px;" src="assets/upload/products/<?php echo $rows->photo; ?>" alt=""></a>
								<div class="new-icon">
									<img src="assets/frontend/images/hot-icon.gif" alt="">
								</div>

								<div class="sale-percent">
									<?php echo number_format($rows->discount);?>%
								</div>
							</div>
							<div class="namesp"> <a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"> <?php echo $rows->name; ?></a></div>

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
									
									<div> <?php echo number_format($rows->price - ($rows->price*$rows->discount/100)); ?>đ</div>
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

	<!-- /product-hot -->


	<!-- product-new -->
	<div class="product-hot product-new">
		<div class="title-hot">
			<div class="img-title">
				<img src="assets/frontend/images/divider.png" alt="">
			</div>

			<h2> sản phẩm mới</h2>
		</div>
		<div class="list-hot">
			<div class="box-hot">
				<?php
				$newProduct = $this->modelNewProduct();
				?>
				<?php foreach ($newProduct as $rows) : ?>
					<div class="one-hot">
						<div class="inside-box">
							<div class="inside-img">
								<a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"> <img style="height: 295px;" src="assets/upload/products/<?php echo $rows->photo; ?>" alt=""></a>
								<div class="new-icon">
									<img src="assets/frontend/images/new-icon.png" alt="">
								</div>

								<div class="sale-percent">
									<?php echo number_format($rows->discount);?>%
								</div>
							</div>
							<div class="namesp"> <a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"> <?php echo $rows->name; ?></a></div>

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
									
									<div> <?php echo number_format($rows->price - ($rows->price*$rows->discount/100)); ?>đ</div>
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

	<!-- /product-new -->

	<!-- sale   -->

	<div class="product-hot product-sale">
		<div class="title-hot">
			<h3> Big Sale</h3>
			
		</div>
		<div class="list-hot">
		<div class="box-hot">
				<?php
				$saleProduct = $this->modelSaleProduct();
				?>
				<?php foreach ($saleProduct as $rows) : ?>
					<div class="one-hot">
						<div class="inside-box">
							<div class="inside-img">
								<a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"> <img style="height: 295px;" src="assets/upload/products/<?php echo $rows->photo; ?>" alt=""></a>
								<div class="new-icon">
									<img src="assets/frontend/images/sale-icon.jpg" alt="">
								</div>

								<div class="sale-percent">
									<?php echo number_format($rows->discount);?>%
								</div>
							</div>
							<div class="namesp"> <a href="san-pham/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html"> <?php echo $rows->name; ?></a></div>

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
									
									<div> <?php echo number_format($rows->price - ($rows->price*$rows->discount/100)); ?>đ</div>
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

	<!-- sale   -->

</div>


    <!-- news -->

    <div class="new-box product-sale">
        <div class="container">
        <div class="title-hot">
			<h3> Tin Tức</h3>
		</div>
            <div id="mixedSlider">
                <div class="MS-content">
				<?php 
            	$news = $this->modelHotNews();
             ?>
             <?php foreach($news as $rows): ?>
                    <div class="item">
						<a href="tin-tuc/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html">
                        <div class="imgTitle" onclick="">
                            <h5 class="blogTitle"><?php echo $rows->name; ?>
                           </h5>
                            <img style="height: 250px;" src="assets/upload/news/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>" />
                        </div>
						</a>
                        <p> <?php echo $rows->description ?></p>
                        <a href="tin-tuc/chi-tiet/<?php echo $rows->id; ?>/<?php echo $this->removeUnicode($rows->name) ?>.html">Read More</a>
                    </div>
					<?php endforeach; ?>
                </div>
                <div class="MS-controls">
                    <button class="MS-left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
                    <button class="MS-right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
   
    </div>
  <script src="assets/frontend/js/jquery-1.12.4.min.js"></script>
  <script src="assets/frontend/js/multislider.js"></script> 
  <script src="assets/frontend/js/news.js"></script>
    <!-- /news -->
