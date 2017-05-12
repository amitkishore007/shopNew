
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Add a new product
                            
                        </h1>
                        <!-- END PAGE TITLE-->
                        

                        <!-- start row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-horizontal form-row-seperated" >
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i>New Product </div>
                                            <div class="actions btn-set">
                                                <button type="button" name="back" class="btn btn-secondary-outline">
                                                    <i class="fa fa-angle-left"></i> Back</button>
                                                <button class="btn btn-secondary-outline">
                                                    <i class="fa fa-reply"></i> Reset</button>
                                                <button class="btn btn-success">
                                                    <i class="fa fa-check"></i> Save</button>
                                                <button class="btn btn-success">
                                                    <i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                                                <div class="btn-group">
                                                    <a class="btn btn-success dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                                                        <i class="fa fa-share"></i> More
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu pull-right">
                                                        <li>
                                                            <a href="javascript:;"> Duplicate </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;"> Delete </a>
                                                        </li>
                                                        <li class="dropdown-divider"> </li>
                                                        <li>
                                                            <a href="javascript:;"> Print </a>
                                                        </li>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tabbable-bordered">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_general" data-toggle="tab"> General </a>
                                                    </li>
                                                    
                                                   
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_general">
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Name:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control product_name" name="product[name]" placeholder=""> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Description:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div name="summernote" class='add_product_desc' id="summernote_1"> </div>
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Categories:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                     <div class="input-group select2-bootstrap-append">
                                                                        <select id="single-append-text" class="form-control select2-allow-clear product_cat">
                                                                            <option value=''> Choose categroy</option>
                                                                           
                                                                        </select>
                                                                        <span class="input-group-btn">
                                                                            <button class="btn btn-default" type="button" data-select2-open="single-append-text">
                                                                                <span class="glyphicon glyphicon-search"></span>
                                                                            </button>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">SKU:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" class="form-control product_sku" name="product[sku]" placeholder=""> 
                                                                </div>


                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Price:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input id="touchspin_2" type="text" value="0" name="demo2" class="form-control product_price"> 
                                                                </div>

                                                                <label class="col-md-2 control-label">Shipping cost:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input id="touchspin_3" type="text" value="0" name="demo2" class="form-control product_shipping"> 
                                                                </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-2 control-label">Image
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <form id="product_image" method="POST" action='<?php echo base_url('product/upload_image'); ?>' enctype="multipart/form-data">
                                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                            <span class="btn green btn-file">
                                                                                <span class="fileinput-new"> Select file </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="..." id='file'> </span>
                                                                            <span class="fileinput-filename"> </span> &nbsp;
                                                                            <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                                                <div class="progressBar">
                                                                                    <div class="bar"></div>
                                                                                    <div class="percent">0%</div>
                                                                                </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Status:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select class="table-group-action-input form-control input-medium product_status" name="product[status]">
                                                                        <option value="">Select...</option>
                                                                        <option value="1">Published</option>
                                                                        <option value="0">Not Published</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                                    <span class="required"> &nbsp; </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                <input type="hidden" value='' class='thumbnail' name="thumbnail">
                                                                    <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo add_product" data-style="expand-left">
                                                                        <span class="ladda-label">Submit</span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- end row -->

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
         