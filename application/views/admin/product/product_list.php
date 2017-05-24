<!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Product list
                            
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- start  row -->
                       
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Manage product</span>
                                        </div>
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                            <thead>
                                                <tr class="">
                                                    <th>S. No.</th>
                                                    <th>Title</th>

                                                    <th>Image</th>
                                                    <th>Vandor</th>
                                                    <th>Status</th>
                                                    <th>hot sale</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php if (isset($products)):  $i=1; ?>

                                            <?php foreach ($products as $product):  ?>

                                                <tr id='row_<?php echo $product->product_id ?>'>
                                                    <td><?php echo $i; ?></td>
                                                    <td><img src="<?php echo base_url('uploads/'.$product->thumbnail); ?>" height='80' ></td>
                                                    <td><?php echo $product->title; ?></td>
                                                    <td><?php echo $product->username; ?></td>
                                                    <td><?php echo $product->status ? "Published" : "Not published"; ?>  <input type="checkbox" checked class="make-switch product-status" data-on-text="Public" data-productId='<?php echo $product->product_id; ?>' data-off-text="Private" data-size="mini"></td>
                                                   <td><input type="checkbox" checked class="make-switch hot-sale" data-on-text="Active" data-productId='<?php echo $product->product_id; ?>'  data-off-text="Inactive" data-size="mini"></td>
                                                    <td>
                                                    <a href="<?php echo base_url('product/edit/'.$product->product_id); ?>" class='btn btn-sm btn-info'>Edit</a>
                                                     <a class="btn red-mint btn-large delete-product " data-productId = "<?php echo $product->product_id; ?>" data-toggle="confirmation" data-original-title="Are you sure ?"
                                            title="">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                            

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                                
                            </div>
                        </div>


                        <!-- end  row -->
                            
                        

                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->