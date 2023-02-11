<?php
//load file Layout.php
$this->fileLayout = "Layout.php";
?>

<div class="breadcome-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="breadcome-list">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-wp">
                                <div class="breadcomb-icon">
                                    <i class="icon nalika-home"></i>
                                </div>
                                <div class="breadcomb-ctn">
                                    <h2>List Products</h2>
                                    <p>Welcome to Veo <span class="bread-ntd">Admin Template</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            <div class="breadcomb-report">
                                <button data-toggle="tooltip" data-placement="left" title="Download Report" class="btn"><i class="icon nalika-download"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="product-status-wrap">
                <h4>List Orders</h4>
                <table>
                    <tr>
                        <th>Mã khách hàng</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                    </tr>
                    <?php
                    foreach ($data as $rows) :
                    ?>
                        <tr>
                            <td><?php echo $rows->customer_id; ?></td>
                            <td><?php echo $rows->id; ?></td>
                            <td>
                                <?php  $date = Date_create($rows->date);
                                echo Date_format($date, "d/m/Y");
                                ?>
                            </td>
                            <td>
                                <?php echo $rows->price."đ";?> 
                            </td>
                            <td >
                                <select style="background-color: gray;" onchange="location=this.value">
                                    <option <?php if ($rows->status == 0) : ?> selected <?php endif; ?> value="">Đang đặt </option>
                                    <option <?php if ($rows->status == 3 ) : ?>  disabled <?php endif; ?> <?php if ($rows->status == 1) : ?> selected disabled <?php endif; ?> value="index.php?controller=orders&action=received&customer_id=<?php echo $rows->customer_id; ?>&codeorders=<?php echo $rows->id; ?>">Đã nhận</option>
                                    <option <?php if ($rows->status == 1 || $rows->status == 2|| $rows->status == 3) : ?>  disabled <?php endif; ?> <?php if ($rows->status == 2) : ?> selected disabled <?php endif; ?> value="index.php?controller=orders&action=shipping&customer_id=<?php echo $rows->customer_id; ?>&codeorders=<?php echo $rows->id; ?>">Đang giao</option>
                                    <option <?php if ($rows->status == 1 ) : ?>  disabled <?php endif; ?> <?php if ($rows->status == 3) : ?> selected disabled <?php endif; ?> value="index.php?controller=orders&action=destroy&customer_id=<?php echo $rows->customer_id; ?>&codeorders=<?php echo $rows->id; ?>">Đã hủy</option>
                                </select>
                                <a href="index.php?controller=orders&action=detail&id=<?php echo $rows->id; ?>" class="label label-success">Chi tiết</a>
                            </td>
                            
                            <!-- <td>
                                <a href="index.php?controller=products&action=update&id=<?php echo $rows->id; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </a>&nbsp;
                                <a href="index.php?controller=products&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button> </a>
                            </td> -->
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="custom-pagination">
                    <ul class="pagination">
                        <li class="page-ittem"><a href="#" class="page-link">Trang</a></li>
                        <?php for ($i = 1; $i <= $numPage; $i++) : ?>
                            <li class="page-ittem"><a href="index.php?controller=orders&page=<?php echo $i; ?>	" class="page-link"><?php echo $i ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>