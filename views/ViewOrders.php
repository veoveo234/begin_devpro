<?php
//load file LayoutTrangChu.php
$this->fileLayout = "LayoutTrangTrong.php";
?>


<div class="box-listcart">
  <form action="index.php?controller=cart&action=update" method="post">
  <h2 style="color:#b5800f;">Danh sách đơn hàng</h2>
    <div class="showpro">
      <table >
        <thead>
          <tr>
            <th class="name">Tên khách hàng</th>
            <th class="phone">Số điện thoại</th>
            <th class="date">Ngày</th>
            <th class="price">Giá</th>
            <th class="status">Trạng Thái</th>
            <th class="delivery">Giao Hàng</th>
          </tr>
          <tbody>
          <?php foreach ($listRecord as $rows) : ?>
                        <?php
                        //lay ban ghi customer
                        $customer = $this->modelGetCustomers($rows->customer_id);
                        ?>
            <tr>
                <td><?php echo $customer->name; ?></td>
                <td><?php echo $customer->phone; ?></td>
                <td><?php
                                $date = Date_create($rows->date);
                                echo Date_format($date, "d/m/Y");
                                ?></td>
                <td><?php echo number_format($rows->price); ?>đ</td>
                <td>
                <?php if ($rows->status == 1) : ?>
                                    <span class="label label-primary">Đã nhận</span>
                                    <?php endif; ?>
                                <?php if ($rows->status == 2)  : ?>
                                    <span style="background-color: #3366FF;" class="label label-danger">Đang giao hàng</span>
                                    <?php endif; ?>
                                <?php if ($rows->status == 3)  : ?>
                                    <span class="label label-danger">Đã hủy</span>
                                <?php endif; ?></td>
                <td>
                <?php if($rows->status == 0 ): ?>
                                <a href="index.php?controller=account&action=removeOrders&id=<?php echo $rows->id; ?>" class="label label-success">Hủy đơn hàng</a>
                              <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </thead>
      </table>
        <!-- paging -->
        <div style="clear: both;"></div>
        <div style="margin:2% 5%;">
            <ul class="pagination">
                <li class="page-item"><span>Trang</span></li>
                <?php for ($i = 1; $i <= $numPage; $i++) : ?>
                    <li class="page-item " style="padding-left: 10px;"><a class="page-link" href="danh-sach-don-hang/trang-<?php echo $i; ?>.html"><?php echo $i; ?></a></li>
                <?php endfor; ?>
            </ul>
        </div>
        <!-- end paging -->
    </div>
  </form>
</div>