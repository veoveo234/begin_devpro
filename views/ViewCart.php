<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>
<div class="box-listcart">
  <form action="index.php?controller=cart&action=update" method="post">
    <div class="showpro">
      <table>
        <thead>
          <tr>
            <th class="image">Ảnh sản phẩm</th>
            <th class="name">Tên sản phẩm</th>
            <th class="price">Giá bán lẻ</th>
            <th class="quantity">Số lượng</th>
            <th class="price">Thành tiền</th>
            <th>Xóa</th>
          </tr>
        </thead>
        <?php foreach ($_SESSION["cart"] as $product) : ?>
          <tbody>
            <tr>
            <td><img src="assets/upload/products/<?php echo $product["photo"]; ?>" class="img-responsive" /></td>
            <td><a href="san-pham/chi-tiet/<?php echo $product['id'] ?>/<?php echo $this->removeUnicode($product['name']);?>.html"><?php echo $product["name"] ?></a></td>
            <td><?php echo number_format($product["price"] - $product["price"] * $product["discount"] / 100) ?>đ </td>
            <td><input type="number" id="qty" min="1" class="input-control" value="<?php echo $product["number"]; ?>" name="product_<?php echo $product["id"]; ?>" required="Không thể để trống"></td>
            <td><p><b><?php echo number_format(($product["price"] - $product["price"] * $product["discount"] / 100) * $product["number"]); ?>đ</b></p></td>
            <td><a href="index.php?controller=cart&action=delete&id=<?php echo $product["id"]; ?>" data-id="2479395"><i class="fa fa-trash"></i></a></td>
          </tr>

          </tbody>

        <?php endforeach; ?>
        <?php if ($this->cartNumber() > 0) : ?>
          <tfoot>
            <tr>
              <td colspan="6"><a href="index.php?controller=cart&action=destroy" class="button pull-left">Xóa toàn bộ</a> <a href="trang-chu.html"class="button pull-right black">Tiếp tục mua hàng</a>
                <input type="submit" value="Cập nhật">
              </td>
            </tr>
            <?php if ($this->cartNumber() > 0) : ?>
              <tr>
                <td colspan="6">

                  <div class="total-cart"> Tổng tiền thanh toán:
                    <?php echo number_format($this->cartTotal()); ?>đ<br>
                    <a id="thanhtoantien" <?php  if(isset($_SESSION["customer_email"])) :?> onclick="thanks()" <?php endif; ?> href="thanh-toan.html" class="button black" >Thanh toán</a>
                  </div>
                </td>
                <script>
                  function thanks() {
                    alert('Cám ơn bạn đã ủng hộ Shop, hãy kiểm tra Email để xác nhận lại thông tin sản phẩm');
                  }
                </script>
              </tr>
            <?php endif; ?>
          </tfoot>
        <?php endif; ?>
      </table>
    </div>
  </form>
</div>