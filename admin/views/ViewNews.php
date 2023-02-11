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
                                    <h2>List News</h2>
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
                <h4>List News</h4>
                <div class="add-product">
                    <a href="index.php?controller=news&action=create">Add News</a>
                </div>
                <table>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Hot</th>
                        <th>Setting</th>
                    </tr>
                    <?php
                    foreach ($data as $rows) :
                    ?>
                        <tr>

                            <td>
                                <?php if ($rows->photo != "" && file_exists("../assets/upload/news/" . $rows->photo)) : ?>
                                    <img src="../assets/upload/news/<?php echo $rows->photo; ?>" style="width:100px;">
                                <?php endif; ?>
                            </td>
                            <td><?php echo $rows->name; ?></td>
                            <td style="text-align: center;">
                                <?php if (isset($rows->hot) && $rows->hot == 1) : ?>
                                    <span class="fa fa-check"></span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="index.php?controller=news&action=update&id=<?php echo $rows->id; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button> </a>&nbsp;
                                <a href="index.php?controller=news&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Are you sure?');"><button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button> </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="custom-pagination">
                    <ul class="pagination">
                        <li class="page-ittem"><a href="#" class="page-link">Trang</a></li>
                        <?php for ($i = 1; $i <= $numPage; $i++) : ?>
                            <li class="page-ittem"><a href="index.php?controller=news&page=<?php echo $i; ?>	" class="page-link"><?php echo $i ?></a></li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>