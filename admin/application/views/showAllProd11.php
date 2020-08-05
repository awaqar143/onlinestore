



            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">






                              
                              <div class="form-actions form-group">
                                <a href="<?php echo base_url('Category/AddCat'); ?>">
                                                <button type="submit" class="btn btn-success btn-sm">Add Product</button>
                                            </a>
                                            </div>
                                <!-- END USER DATA-->
                            
                        <!--  END TOP CAMPAIGN-->
                          
                                <!-- END DATA TABLE -->
                            </div>

                        </div>
<!-- 
                        <?php if ( $feedback = $this->session->flashdata('feedback'));
                            $feedback_class = $this->session->flashdata('feedback_class');
                            ?> -->

                             <div class="col-lg-6 col-lg-offset-3">
                             <div class="alert alert-dismissible <?= $feedback_class ?>">
                           <!--  <?= $feedback ?> -->
            
                           </div>
                             </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>P id </th>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                              
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <
                                         <!--  ?php foreach ($showAllCat as $showAllCat) { ?> -->
                                          
                                          <?php foreach ($data as $data) { ?>
                                             
                                          
                                            <tr>
                                                <td><?php echo $data->product_id ?></td>
                                                <td><?php echo $data->product_title ?></td>
                                                <td><?php echo $data->cat_name ?></td>
                                                <td><?php echo $data->product_price ?></td>
                                                <td>
                                        <a href=""            
                                        <button type="edit" class="btn btn-primary btn-sm">
                                          Edit
                                        </button>
                                    </a>

                                    <!--   </a>
                                        <a href="<?php echo base_url('Category/DeleteCat');?>?catid=<?php echo $showAllCat->cat_id ?>"
                                        <button type="delete" class="btn btn-danger btn-sm">
                                             Delete
                                        </button>
                                    </a> -->
                                    
                                    <a onclick=""></i> Delete</a> 
                                                </td>
                                               
                                            </tr>
                                        
                                        </tbody>
                                    <?php }?>
                                    </table>
                                </div>
                               