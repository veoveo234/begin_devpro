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
                <h4>List Products</h4>
                <div class="add-product">
                    <a href="index.php?controller=products&action=create">Add Product</a>
                </div>
                <table>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Danh mục</th>
                        <th>Discount</th>
                        <th>Hot</th>
                        <th>New</th>
                        <th>Setting</th>
                    </tr>
                    <?php
                    foreach ($data as $rows) :
                    ?>
                        <tr>

                            <td>
                                <?php if ($rows->photo != "" && file_exists("../assets/upload/products/" . $rows->photo)) : ?>
                                    <img src="../assets/upload/products/<?php echo $rows->photo; ?>" style="width:100px;">
                                <?php endif; ?>
                            </td>
                            <td><?php echo $rows->name; ?></td>
                            <td>
                                <?php
                                $category = $this->modelGetCategory($rows->category_id);
                                echo isset($category->name) ? $category->name : "";
                                ?>
                            </td>
                            <td style="text-align: center;">
                                <?php echo $rows->discount; ?> %
                            </td>
                            <td style="text-align: center;">
                                <?php if (isset($rows->hot) && $rows->hot == 1) : ?>
                                    <span class="fa fa-check"></span>
                                <?php endif; ?>
                            </td>
                            <td style="text-align: center;">
                                <?php if (isset($rows->new) && $rows->new == 1) : ?>
                                    <span class="fa fa-check"></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="index.php?controller=products&action=update&id=<?php echo $rows->id; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </a>&nbsp;
                                <a href="index.php?controller=products&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="custom-pagination">
                    <ul class="pagination">
                        <li class="page-ittem"><a href="#" class="page-link">Trang</a></li>
                        <?php for ($i = 1; $i <= $numPage; $i++) : ?>
                            <li class="page-ittem"><a href="index.php?controller=products&page=<?php echo $i; ?>	" class="page-link"><?php echo $i ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>