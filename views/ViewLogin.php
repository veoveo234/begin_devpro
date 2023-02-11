<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>
 <div class="login">
      <h1>Đăng Nhập</h1>
      <?php if (isset($_GET["notify"]) && $_GET["notify"] == "error") : ?>
        <h3 style="color:red">Đăng kí chưa thành công, kiểm tra lại</h3>
      <?php else : ?>
        <p> Nếu bạn đã có tài khoản xin vui lòng đăng nhập</p>
      <?php endif; ?>
      <form method='post' action="index.php?controller=account&action=loginPost">
        <p class="title"><span>Đăng nhập tài khoản</span></p>
        <div class="form-group">
          <label>Email:<b id="req">*</b></label>
          <input type="email" class="input-control" name="email" required="">
        </div>
        <div class="form-group">
          <label>Mật khẩu:<b id="req">*</b></label>
          <input type="password" class="input-control" name="password" required="">
        </div>
        <input type="submit" class="button" value="Đăng nhập">
        <div>
          <p>Nếu bạn chưa có tài khoản, click <a href="dang-ki.html" class="button">Đăng kí</a></p>
        </div>
      </form>
    </div>