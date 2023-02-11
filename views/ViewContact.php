<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>
<div class="mymap" style="text-align: center;">
    <h3>Bản đồ</h3>
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d59564.60454465777!2d105.6943675!3d21.0811365!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134558775d96277%3A0xc42f4f7e3ffc3a96!2zTGnDqm4gVHJ1bmcsIMSQYW4gUGjGsOG7o25nLCBIw6AgTuG7mWk!5e0!3m2!1svi!2s!4v1617544878443!5m2!1svi!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    <div class="box_contact">

        <div class="left_contact">
            <h3>Thông tin liên hệ</h3>
            <p>Địa chỉ : Liên Trung - Đan Phượng - Hà Nội</p>
            <p>Email : xuanhiep284@gmail.com</p>
            <p>Số điện thoại: 0981720620</p>

        </div>
        <div class="right_contact">
            <h3>Contact Form</h3>
            <form action="index.php?controller=request&action=create" method="POST">
                <label for="name-ontact">Họ Tên</label>
                <input type="text" name="name" id="name-contact" required>
                <label for="phone-contact">Số điện thoại</label>
                <input type="text" name="phone" id="phone-contact" required>
                <label for="email-contact">Email</label>
                <input type="email" name="email" id="email-contact" required>
                <label for="address-contact">Địa chỉ</label>
                <input type="text" name="address" id="address-contact" required> 
                <label for="content-contect">Nội dung liên hệ</label>
                <textarea name="content" id="content-contect" cols="80" rows="5" required></textarea>
                <input type="submit" value="Gửi">
            </form>
        </div>
    </div>
</div>