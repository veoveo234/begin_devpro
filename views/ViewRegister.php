<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>
<div class="login">
      <h1>Đăng Kí</h1>
      <?php if (isset($_GET["notify"]) && $_GET["notify"] == "error") : ?>
        <h3 style="color:red">Đăng kí chưa thành công , do Email đã tồn tại</h3>
      <?php else : ?>
        <p> Nếu bạn chưa có tài khoản, hãy đăng ký ngay để nhận thông tin ưu đãi cùng những ưu đãi từ cửa hàng.</p>
      <?php endif; ?>
      <form method='post' action="index.php?controller=account&action=registerPost">
        <h5 class="title"><span>Đăng ký tài khoản</span></h5>
        <div class="form-group">
          <label>Họ và tên:</label>
          <input type="text" name="name" class="input-control">
        </div>
        <div class="form-group">
          <label>Email:<b id="req">*</b></label>
          <input type="email" name="email" class="input-control" required>
        </div>
        <div class="form-group">
          <label>Địa chỉ:</label>
          <input type="text" name="address" class="input-control">
        </div>
        <div class="form-group">
          <label>Điện thoại:</label>
          <input type="text" name="phone" class="input-control">
        </div>
        <div class="form-group">
          <label>Mật khẩu:<b id="req">*</b></label>
          <input type="password" name="password" class="input-control" required="">
        </div>
        <div class="form-group">
          <input type="submit" class="button" value="Đăng ký">
        </div>
        <div>
          <p>Nếu bạn đã có tài khoản, click <a href="dang-nhap.html" class="button">Đăng nhập</a></p>
        </div>
      </form>
    </div>