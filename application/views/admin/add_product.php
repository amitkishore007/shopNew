
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> eCommercen Dashboard
                            <small>recent ecommerce statistics, charts, recent orders and sales</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        

                        <!-- start row -->
                        
                        <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-row-seperated" action="#">
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-shopping-cart"></i>Test Product </div>
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
                                                                    <input type="text" class="form-control" name="product[name]" placeholder=""> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Description:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div name="summernote" id="summernote_1"> </div>
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Categories:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                     <div class="input-group select2-bootstrap-append">
                                                                        <select id="single-append-text" class="form-control select2-allow-clear">
                                                                            <option></option>
                                                                            <optgroup label="Alaskan">
                                                                                <option value="AK">Alaska</option>
                                                                                <option value="HI" disabled="disabled">Hawaii</option>
                                                                            </optgroup>
                                                                            <optgroup label="Pacific Time Zone">
                                                                                <option value="CA">California</option>
                                                                                <option value="NV">Nevada</option>
                                                                                <option value="OR">Oregon</option>
                                                                                <option value="WA">Washington</option>
                                                                            </optgroup>
                                                                            <optgroup label="Mountain Time Zone">
                                                                                <option value="AZ">Arizona</option>
                                                                                <option value="CO">Colorado</option>
                                                                                <option value="ID">Idaho</option>
                                                                                <option value="MT">Montana</option>
                                                                                <option value="NE">Nebraska</option>
                                                                                <option value="NM">New Mexico</option>
                                                                                <option value="ND">North Dakota</option>
                                                                                <option value="UT">Utah</option>
                                                                                <option value="WY">Wyoming</option>
                                                                            </optgroup>
                                                                            <optgroup label="Central Time Zone">
                                                                                <option value="AL">Alabama</option>
                                                                                <option value="AR">Arkansas</option>
                                                                                <option value="IL">Illinois</option>
                                                                                <option value="IA">Iowa</option>
                                                                                <option value="KS">Kansas</option>
                                                                                <option value="KY">Kentucky</option>
                                                                                <option value="LA">Louisiana</option>
                                                                                <option value="MN">Minnesota</option>
                                                                                <option value="MS">Mississippi</option>
                                                                                <option value="MO">Missouri</option>
                                                                                <option value="OK">Oklahoma</option>
                                                                                <option value="SD">South Dakota</option>
                                                                                <option value="TX">Texas</option>
                                                                                <option value="TN">Tennessee</option>
                                                                                <option value="WI">Wisconsin</option>
                                                                            </optgroup>
                                                                            <optgroup label="Eastern Time Zone">
                                                                                <option value="CT">Connecticut</option>
                                                                                <option value="DE">Delaware</option>
                                                                                <option value="FL">Florida</option>
                                                                                <option value="GA">Georgia</option>
                                                                                <option value="IN">Indiana</option>
                                                                                <option value="ME">Maine</option>
                                                                                <option value="MD">Maryland</option>
                                                                                <option value="MA">Massachusetts</option>
                                                                                <option value="MI">Michigan</option>
                                                                                <option value="NH">New Hampshire</option>
                                                                                <option value="NJ">New Jersey</option>
                                                                                <option value="NY">New York</option>
                                                                                <option value="NC">North Carolina</option>
                                                                                <option value="OH">Ohio</option>
                                                                                <option value="PA">Pennsylvania</option>
                                                                                <option value="RI">Rhode Island</option>
                                                                                <option value="SC">South Carolina</option>
                                                                                <option value="VT">Vermont</option>
                                                                                <option value="VA">Virginia</option>
                                                                                <option value="WV">West Virginia</option>
                                                                            </optgroup>
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
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="product[sku]" placeholder=""> </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Price:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-3">
                                                                    <input id="touchspin_2" type="text" value="0" name="demo2" class="form-control"> </div>
                                                            </div>
                                                             <div class="form-group">
                                                                <label class="col-md-2 control-label">Image
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                        <div>
                                                                            <span class="btn default btn-file">
                                                                                <span class="fileinput-new"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="..."> </span>
                                                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Status:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <select class="table-group-action-input form-control input-medium" name="product[status]">
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
                                                                    <button type="button" data-loading-text="Loading..." class="btn btn-primary btn-lg mt-ladda-btn ladda-button mt-progress-demo" data-style="expand-left">
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
                                </form>
                            </div>
                        </div>

                        <!-- end row -->

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
         