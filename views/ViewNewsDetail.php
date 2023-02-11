<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>
<div class="description" style="text-align: center;">
    <div class="title-des">
        <h4 style="border: 0;text-decoration:underline ;"> <?php echo $record->name ?> </h4>
    </div>
    <div class="all-des" style="font-weight: normal;border: 0;">
    <img src="assets/upload/news/<?php echo $record->photo ?>">

    </div>
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
    <div class="all-des" >
        <?php echo $record->content ?>
    </div>

</div>
<!-- /all list -->