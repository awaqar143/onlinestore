<div class="page-body">
                <!-- Horizontal-border table start -->
                <div class="card">
                    <div class="card-header">
                        <h5>View</h5>
                        
                        
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-framed">
                             
                                <tbody>
                                    <tr>
                                        
                                        <td>Product Title</td>
                                        <td><?php echo $viewDetial['product_title'] ?></td>
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td>Category</td>
                                        <td><?php echo $category['cat_name'] ?></td>
                                        
                                    </tr>
                                     <tr>
                                        
                                        <td>Product Price</td>
                                        <td><?php echo $viewDetial['product_price'] ?></td>
                                        
                                    </tr>
                                     <tr>
                                        
                                        <td>Offer Price</td>
                                        <td><?php echo $viewDetial['offer_price'] ?></td>
                                        
                                    </tr>
                                     <tr>
                                        
                                        <td>Stock</td>
                                        <td><?php echo $viewDetial['product_stock'] ?></td>
                                        
                                    </tr>
                                     <tr>
                                        
                                        <td>short Description</td>
                                        <td><?php echo $viewDetial['short_description'] ?></td>
                                        
                                    </tr>
                                      <tr>
                                        
                                        <td>Color</td>
                                        <td>
                                        <?php foreach ($color as $col) { ?>
                                       
                                        <?php echo $col['product_color'] ?>,
                                        <?php } ?>
                                        </td                                     
                                    </tr>
                                      <tr>
                                        
                                        <td>Size</td>
                                        <td>
                                          <?php foreach ($size as $size) { ?>
                                          
                                           <?php echo $size['product_size'] ?>,
                                            

                                            <?php } ?>
                                          </td>
                                        
                                    </tr>
                                     <tr>
                                        
                                        <td>Product Tag</td>
                                        <td><?php echo $viewDetial['product_tag'] ?></td>
                                        
                                    </tr>

                                    <tr>
                                        
                                        <td>Meta Title</td>
                                        <td><?php echo $viewDetial['meta_title'] ?></td>
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td>Meta Tag</td>
                                        <td><?php echo $viewDetial['meta_tag'] ?></td>
                                        
                                    </tr>
                                    <tr>
                                        
                                        <td>Meta Description</td>
                                        <td><?php echo $viewDetial['meta_desc'] ?></td>
                                        
                                    </tr>

                                     <tr>
                                        
                                        <td>User</td>
                                        <td><?php echo $viewDetial['user'] ?></td>
                                        
                                    </tr>
                                     <tr>
                                        
                                        <td>Update By</td>
                                        <td><?php echo $viewDetial['updated_by'] ?></td>
                                        
                                    </tr>
                                     <tr>
                                        
                                        <td>Create Date</td>
                                        <td><?php echo $viewDetial['product_time'] ?></td>
                                        
                                    </tr>
                                     <tr>
                                        
                                        <td>Updated Date/Time</td>
                                        <td><?php echo $viewDetial['updated_date'] ?></td>
                                        
                                    </tr>

                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card">
                    
                    <div class="card-header">
                        <h5>Product Image</h5>
 </div>
  <div class="card-block table-border-style">
                        <div class="table-responsive">
                                                        <div class="col-sm-3">
                                                                <div class="input-group">
                                                                  
                                                                   <img src="<?php echo site_url();?>uploads/<?php echo $viewDetial['product_image']; ?>" width="150px" class="img-thumbnail">
                                                              
                                                                </div>
                                                            </div>
</div>
</div>
</div>

 <div class="card">
    
  <div class="card-header">
<h5>Product Multi Images</h5>
</div>
<div class="row">
                    
                        
                        <?php foreach($viewImg as $img){ ?>
                           
                            <div class="col-lg-3 col-sm-5">
                             <div class="thumbnail">
                                                                       
                                                                          
                            <div class="img-box" id="imgb_<?php echo $img['id']; ?>">
                                <img src="<?php echo base_url('uploads/multifile/'.$img['product_image']); ?>"  class="img-fluid img-thumbnail">
                               <!--  <center>
                                <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $img['id']; ?>')">delete</a>
                          </center> -->
                            </div>
                        
                        </div>
                   
                </div>
                <?php } ?>
</div>

  </div>

  <div class="form-group">
    <a href="<?php echo base_url('Product/showAllProd'); ?>" class="btn btn-primary">Go Back</a>
  </div>