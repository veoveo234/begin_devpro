<?php
    					// <!-- load file Layout.php -->
    					$this->fileLayout="Layout.php"
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
                                    <h2>Categories Edit & Add</h2>
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
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i> Categories Add & Edit</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <form method="post" action="<?php echo $action; ?>">
                                        <div class="row">
                                            <div class="col-lg col-md col-sm col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true">  Name category</i></span>
                                                         
                                                        <input style="background-color: rgba(144,144,144,0.3);" type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" name="name" class="form-control" required class="form-control" placeholder="Your Category">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-right-arrow-angle" aria-hidden="true">  Type</i></span>
                                                        <select  title="Type" style="background-color: rgba(144,144,144,0.3);width: 300px;" name="parent_id" class="form-control" >
                                                                    <option value="0" ></option>
                                                                    <?php
                                                                        $data= $this->modelListCategories();
                                                                    ?>
                                                                    <?php foreach($data as $rows) :?>
                                                                    <option style="color:black;zoom: 1.25;" <?php if(isset($record->parent_id) && $record->parent_id==$rows->id): ?> 
                                                                        selected <?php endif; ?> 
                                                                        value="<?php echo $rows->id;?>"><?php echo $rows->name; ?></option>
                                                                    <?php endforeach; ?> 
                                                                </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <input type="submit"  value="OK"  class="btn btn-ctl-bt waves-effect waves-light m-r-10"/>
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