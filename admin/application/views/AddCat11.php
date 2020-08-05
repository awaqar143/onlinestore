
           


            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
             
                            <div class="col-lg-10">
                                <form action="<?php echo base_url('Category/AddCat'); ?>"method="post" >
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Add New</strong> Category
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="has-success form-group">
                                            <label for="inputIsValid" class=" form-control-label">Category Name</label>
                                            <input type="text" name="cat_name" class="is-valid form-control-success form-control">
                                        </div>
                                        <div style="color:red"><?php echo form_error('cat_name'); ?></div>

                                        <div class="has-warning form-group">
                                            <label for="inputIsInvalid" class=" form-control-label">Category Description</label>
                                            <input type="text" name="cat_desc" class="is-invalid form-control">


                                        </div>
                                     <div style="color:red"><?php echo form_error('cat_desc'); ?></div>
                                    </div>
                                     
                                                <input type="submit" name="submit" class="btn btn-success btn-sm" />
                                           
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                            
                                            
                                            
                                
                       