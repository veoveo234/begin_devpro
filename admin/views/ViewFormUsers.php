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
                                    <h2>User Edit</h2>
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
                                    <li class="active"><a href="#description"><i class="icon nalika-edit" aria-hidden="true"></i> User Edit</a></li>
                                </ul>
                                <div id="myTabContent" class="tab-content custom-product-edit">
                                    <div class="product-tab-list tab-pane fade active in" id="description">
                                        <form method="post" action="<?php echo $action; ?>">
                                        <div class="row">
                                            <div class="col-lg col-md col-sm col-xs-12">
                                                <div class="review-content-section">
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-user" aria-hidden="true">  Name:   </i></span>
                                                        
                                                        <input style="background-color: rgba(144,144,144,0.3);" type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" name="name" class="form-control" required class="form-control" placeholder="Your Name">
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-google-plus" aria-hidden="true">  Email:   </i></span>
                                                        <input style="background-color: rgba(144,144,144,0.3);" type="email" value="<?php echo isset($record->email)?$record->email:""; ?>"<?php if(isset($record->email)): ?> disabled <?php else: ?>  <?php endif; ?> name="email" class="form-control" placeholder="Your Email" required>
                                                    </div>
                                                    <div class="input-group mg-b-pro-edt">
                                                        <span class="input-group-addon"><i class="icon nalika-favorites" aria-hidden="true">  Password: </i></span>
                                                        
                                                        <input style="background-color: 	rgba(144,144,144,0.3);"  type="password" name="password" <?php if(isset($record->email) ) :?> class="form-control" <?php else: ?> required <?php endif; ?> class="form-control" placeholder="Your Password">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="text-center custom-pro-edt-ds">
                                                    <input type="submit"  value="Save"  class="btn btn-ctl-bt waves-effect waves-light m-r-10"/>
                                                    <input type="reset" value="Reset" class="btn btn-ctl-bt waves-effect waves-light"/>
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