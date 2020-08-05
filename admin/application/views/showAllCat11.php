



            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-9">






                              
                              <div class="form-actions form-group">
                                <a href="<?php echo base_url('Category/AddCat'); ?>">
                                                <button type="submit" class="btn btn-success btn-sm">Add Category</button>
                                            </a>
                                            </div>
                                <!-- END USER DATA-->
                            
                        <!--  END TOP CAMPAIGN-->
                          
                                <!-- END DATA TABLE -->
                            </div>

                        </div>

                        <?php if ( $feedback = $this->session->flashdata('feedback'));
                            $feedback_class = $this->session->flashdata('feedback_class');
                            ?>

                             <div class="col-lg-6 col-lg-offset-3">
                             <div class="alert alert-dismissible <?= $feedback_class ?>">
                            <?= $feedback ?>
            
                           </div>
                             </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>Catgory Name</th>
                                                <th>Catgory Description</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                          
                                           <?php foreach ($showAllCat as $showAllCat) { ?>
                                          
                                          
                                            <tr>
                                                <td><?php echo $showAllCat->cat_name ?></td>
                                                <td><?php echo $showAllCat->cat_desc ?></td>
                                                <td>
                                  
                                        
                                       
                                        <a href="<?php echo site_url('Category/editCat');?>?cat_id=<?php echo ($showAllCat->cat_id) ?>"            
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
                                    
                                    <a onclick="return confirm('Are you sure??')" href="<?php echo base_url('Category/DeleteCat');?>?catid=<?php echo $showAllCat->cat_id ?>" data-toggle="tooltip" data-placement="bottom" title="Hapus Mahasiswa" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</a> 
                                                </td>
                                               
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                               