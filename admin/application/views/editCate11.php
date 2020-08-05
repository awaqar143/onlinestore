

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                               
                                      
                                      
                            <div class="col-lg-10">
                              
                                <?php echo form_open_multipart("Category/updateCate",['class'=>'form-horizontal']); ?>
                               
                                   <!--  <?php //echo form_hidden('cat_id',$editcate->cat_id); ?> -->
                                    
                                <div class="card">
                                    <div class="card-header">

                                        <strong>Edit</strong> Category
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="has-success form-group">
                                            <label for="inputIsValid" class=" form-control-label">Category Name</label>
                                           
                                            <?php echo form_input(['name'=>'Cat_name','class'=>'is-valid form-control-success form-control','placeholder'=>'Category Name','value'=>set_value('title',$editcate->cat_name)]); ?>
                                            <?php echo form_error('Cat_name'); ?>

                                       

                                        <div class="has-warning form-group">
                                            <label for="inputIsInvalid" class=" form-control-label">Category Description</label>
                                         
                                             <?php echo form_input(['name'=>'Cat_desc','class'=>'is-invalid form-control','placeholder'=>'Title','value'=>set_value('title',$editcate->cat_desc)]); ?>
                                             <?php echo form_error('Category Description'); ?>



                                        </div>
                                    
                                    </div>
                                     
                                                <input type="submit" name="submit" class="btn btn-success btn-sm" />
                                          
                                </div>
                           <!--  </form> -->
                            </div>
                        </div>
                    </div>