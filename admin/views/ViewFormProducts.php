<?php
// <!-- load file Layout.php -->
$this->fileLayout = "Layout.php"
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
                                    <h2>Product Edit</h2>
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
            <div class="review-tab-pro-inner">
                <ul id="myTab3" class="tab-review-design">
                    <li class="active"><a href=""><i class="icon nalika-edit" aria-hidden="true"></i> Product Edit</a></li>
                </ul>
                <div id="myTabContent" class="tab-content custom-product-edit">
                    <div class="product-tab-list tab-pane fade active in">
                        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
                            <div class="row">
                                <div class="col-lg col-md col-sm col-xs-12">
                                    <div class="review-content-section">
                                        <!-- name -->
                                        <div class="input-group mg-b-pro-edt" style="width: 100%;">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-user" aria-hidden="true"> Name product: </i></span>
                                            <input style="background-color: rgba(144,144,144,0.3);" type="text" value="<?php echo isset($record->name) ? $record->name : ""; ?>" name="name" class="form-control" required class="form-control">
                                        </div>
                                        <!-- end name -->
                                        <!-- danh mục -->
                                        <div class="input-group mg-b-pro-edt" style="width: 500px;">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-right-arrow-angle" aria-hidden="true"> Danh Mục: </i></span>
                                            <select title="Type" style="background-color: rgba(144,144,144,0.3);" name="category_id" class="form-control">
                                                <option value="0"></option>
                                                <?php
                                                $data = $this->modelListCategories();
                                                ?>
                                                <?php foreach ($data as $rows) : ?>
                                                    <option style="color:black;zoom: 1.25;" <?php if (isset($record->category_id) && $record->category_id == $rows->id) : ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                                                    <?php
                                                    $dataSub = $this->modelReadCategorySub($rows->id);
                                                    ?>
                                                    <?php foreach ($dataSub as $rowsSub) : ?>
                                                        <option style="color:black;zoom: 1.25;" <?php if (isset($record->category_id) && $record->category_id == $rowsSub->id) : ?> selected <?php endif; ?> value="<?php echo $rowsSub->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name; ?></option>
                                                    <?php endforeach; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <!-- end danh mục -->
                                        <!-- giảm giá -->
                                        <div class="input-group mg-b-pro-edt" style="width: 500px;">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"> Giảm giá : </i></span>
                                            <input style="background-color: rgba(144,144,144,0.3);" type="number" min="0" max="100" value="<?php echo isset($record->discount) ? $record->discount : "0"; ?>" name="discount" class="form-control" required>
                                        </div>
                                        <!-- end giảm giá -->
                                        <!-- giá -->
                                        <div class="input-group mg-b-pro-edt " style="width: 500px;">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"> Giá : </i></span>
                                            <input style="background-color: rgba(144,144,144,0.3);" type="number" min="0" value="<?php echo isset($record->price) ? $record->price : "0"; ?>" name="price" class="form-control" required>
                                        </div>
                                        <!-- end giá -->
                                        <!-- sp hot -->
                                        <div class="input-group mg-b-pro-edt" style="width: 500px;">
                                            <input style="background-color: rgba(144,144,144,0.3); margin-left: 150px;" type="checkbox" <?php if (isset($record->hot) && $record->hot == 1) : ?> checked <?php endif; ?> name="hot" id="hot">
                                            <label style="color:white;" for="hot">&nbsp;&nbsp;Sản phẩm nổi bật</label>
                                        </div>
                                        <!-- end sp new -->
                                        <div class="input-group mg-b-pro-edt" style="width: 500px;">
                                            <input style="background-color: rgba(144,144,144,0.3); margin-left: 150px;" type="checkbox" <?php if (isset($record->new) && $record->new == 1) : ?> checked <?php endif; ?> name="new" id="new">
                                            <label style="color:white;" for="new">&nbsp;&nbsp;Sản phẩm Mới</label>
                                        </div>
                                        <!-- end sp new -->
                                        <!-- giới thiệu -->

                                        <div class="input-group mg-b-pro-edt ">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"> Giới thiệu : </i></span>
                                            <textarea name="description" id="description"><?php echo isset($record->description) ? $record->description : ""; ?></textarea>
                                            <script type="text/javascript">
                                                CKEDITOR.replace("description");
                                            </script>
                                        </div>
                                        <!--end giới thiệu -->
                                        <!-- chi tiết -->

                                        <div class="input-group mg-b-pro-edt ">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"> Chi tiết : </i></span>
                                            <textarea name="content"><?php echo isset($record->content) ? $record->content : ""; ?></textarea>
                                            <script type="text/javascript">
                                                CKEDITOR.replace("content");
                                            </script>
                                        </div>
                                        <!-- end chi tiết -->
                                        <!-- upload anh -->
                                        <div class="input-group mg-b-pro-edt " style="width: 500px;">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"> Ảnh : </i></span>
                                            <input type="file" name="photo" style="color:white">
                                        </div>

                                        <div class="input-group mg-b-pro-edt ">
                                            <!-- rows -->
                                            <?php if (isset($record->photo) && file_exists("../assets/upload/products/" . $record->photo)) : ?>
                                                <!-- rows -->
                                                <div class="row" style="margin-top:5px;">
                                                    <img src="../assets/upload/products/<?php echo $record->photo; ?>" style="width:100px;margin-left: 150px;">
                                                </div>
                                                <!-- end rows -->
                                            <?php endif; ?>
                                        </div>

                                        <!-- anh mo ta  -->
                                        <div class="input-group mg-b-pro-edt " style="width: 500px;">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"> Ảnh bonus 1: </i></span>
                                            <input type="file" name="photo1" style="color:white">
                                        </div>

                                        <div class="input-group mg-b-pro-edt ">
                                            <!-- rows -->
                                            <?php if (isset($record->photo1) && file_exists("../assets/upload/products/" . $record->photo1)) : ?>
                                                <!-- rows -->
                                                <div class="row" style="margin-top:5px;">
                                                    <img src="../assets/upload/products/<?php echo $record->photo1; ?>" style="width:100px;margin-left: 150px;">
                                                </div>
                                                <!-- end rows -->
                                            <?php endif; ?>
                                        </div>

                                        <!-- end anh mo ta  -->

                                        <!-- anh mo ta  -->
                                        <div class="input-group mg-b-pro-edt " style="width: 500px;">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"> Ảnh bonus 2: </i></span>
                                            <input type="file" name="photo2" style="color:white">
                                        </div>

                                        <div class="input-group mg-b-pro-edt ">
                                            <!-- rows -->
                                            <?php if (isset($record->photo2) && file_exists("../assets/upload/products/" . $record->photo2)) : ?>
                                                <!-- rows -->
                                                <div class="row" style="margin-top:5px;">
                                                    <img src="../assets/upload/products/<?php echo $record->photo2; ?>" style="width:100px;margin-left: 150px;">
                                                </div>
                                                <!-- end rows -->
                                            <?php endif; ?>
                                        </div>

                                        <!-- end anh mo ta  -->

                                        <!-- anh mo ta  -->
                                        <div class="input-group mg-b-pro-edt " style="width: 500px;">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"> Ảnh bonus 3: </i></span>
                                            <input type="file" name="photo3" style="color:white">
                                        </div>

                                        <div class="input-group mg-b-pro-edt ">
                                            <!-- rows -->
                                            <?php if (isset($record->photo3) && file_exists("../assets/upload/products/" . $record->photo3)) : ?>
                                                <!-- rows -->
                                                <div class="row" style="margin-top:5px;">
                                                    <img src="../assets/upload/products/<?php echo $record->photo3; ?>" style="width:100px;margin-left: 150px;">
                                                </div>
                                                <!-- end rows -->
                                            <?php endif; ?>
                                        </div>

                                        <!-- end anh mo ta  -->

                                        <!-- anh mo ta  -->
                                        <div class="input-group mg-b-pro-edt " style="width: 500px;">
                                            <span style="width: 150px;" class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true"> Ảnh bonus 4: </i></span>
                                            <input type="file" name="photo4" style="color:white">
                                        </div>

                                        <div class="input-group mg-b-pro-edt ">
                                            <!-- rows -->
                                            <?php if (isset($record->photo4) && file_exists("../assets/upload/products/" . $record->photo4)) : ?>
                                                <!-- rows -->
                                                <div class="row" style="margin-top:5px;">
                                                    <img src="../assets/upload/products/<?php echo $record->photo4; ?>" style="width:100px;margin-left: 150px;">
                                                </div>
                                                <!-- end rows -->
                                            <?php endif; ?>
                                        </div>

                                        <!-- end anh mo ta  -->
                                        <!-- end upload anh -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="text-center custom-pro-edt-ds">
                                        <input type="submit" value="OK" class="btn btn-ctl-bt waves-effect waves-light m-r-10" />

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>