


 <link href="<?php echo base_url(); ?>asset/bower_components/jquery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/bower_components/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />
    

    
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Products</h4>
                </div>
                <div class="page-header-breadcrumb">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">
                                <i class="icofont icofont-home"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Products</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Update Product</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Product edit card start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Update Product</h5>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                     <?php echo form_open_multipart('Product/editProduct'); ?>
                                     <input type="hidden" class="form-control" name="id" value="<?php echo $prodDetail['id']; ?>" >
                                      <input type="hidden" class="form-control" name="oldimg" value="<?php echo $prodDetail['product_image']; ?>" >
                                        <div class="product-edit">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="">
                                                         <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                 <!--   <label class="col-sm-2 col-form-label">Name</label> -->
                                                                    <input class="form-control" name="title" value="<?php echo $prodDetail['product_title'] ?>" placeholder="Product Title" type="text">
                                                                </div>
                                                            </div>
                                                          
                                                          <div class="col-sm-6">
                                                                <div class="input-group">
                                                                 <!--  <label class="col-sm-2 col-form-label">SKU</label> -->
                                                                    <input class="form-control" name="sku" value="<?php echo $prodDetail['sku'] ?>" placeholder="SKU" type="text">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <!-- <span class="input-group-addon"><i class="icofont icofont-ui-note"></i></span> -->
                                                                    <input class="form-control" name="offer_price" value="<?php echo $prodDetail['offer_price'] ?>" placeholder="Offer Price" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                   <!--  <span class="input-group-addon"><i class="icofont icofont-cur-dollar"></i></span> -->
                                                                    <input class="form-control" name="price" value="<?php echo $prodDetail['product_price'] ?>" placeholder="Price" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <!-- <span class="input-group-addon"><i class="icofont icofont-numbered"></i></span> -->
                                                                    <input class="form-control" name="stock"  value="<?php echo $prodDetail['product_stock'] ?>" placeholder="Quantity" type="text">
                                                                </div>
                                                            </div>
                                                           

                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <!-- <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span> -->
                                                                    <input class="form-control" value="<?php echo $prodDetail['short_description'] ?>" name="short_description" placeholder="Product Short Description" type="text" maxlength="100">
                                                                </div>
                                                            </div>
                                                                


                                                        </div>
                                                        <div class="row">

                                                             <div class="col-sm-6">
                                                                <div class="input-group">
                                                                   <!--  <span class="input-group-addon"><i class="icofont icofont-all-caps"></i></span> -->
                                                                     <input class="form-control" value="<?php echo $prodDetail['product_tag']?>" name="tag" placeholder="Product Tag" type="text">
                                                                </div>
                                                            </div>
                                                            
                                                             <div class="col-sm-6">
                                                                <select name="cat_id" class="form-control form-control-default">
                                                                    <option value="opt1">Select a Category</option>
                                                                    
                                                                    <?php foreach($catDetail as $cat) {?>
                                                                         <option value="<?php echo $cat['id'] ?>"
                                                                            <?php if($prodDetail['cat_id'] == $cat['id']) { echo "selected" ;} ?> > <?php echo $cat['cat_name'] ?></option>
                                                                     <?php } ?>

                                                                </select>
                                                            </div>
                                                        </div>

                                                       <!--  <div class="row">
                                                           



                                                            <div class="col-sm-6">
                                                                <div class="input-group">
 
                                                            
                                                            <input class="" type="text" name="multi_size" value="" placeholder="Size" id="input-tag" data-role="tagsinput">
                                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                    -->
                                    <!--  <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                   <label class="col-sm-2 col-form-label">Name</label> -->
                                                                 <!--    <input class="form-control" type="text" name="multi_size" value="" placeholder="Size" id="input-tag" data-role="tagsinput">
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
 
                                                            
                                                            <input class="form-control" type="text" name="multi_color"  placeholder="Colour" id="input-tag" data-role="tagsinput">
                                                            
                                                                </div>
                                                            </div>
 -->
                                                        
                                                          
                                                       
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                   <!--  <span class="input-group-addon"><i class="icofont icofont-clip"></i></span> -->
                                                                        <input name="userfile" class="form-control" type="file">
                                                                       </div>
                                                            </div>
                                                             <div class="col-sm-3">
                                                                <div class="input-group">
                                                                  
                                                                   <img src="<?php echo site_url();?>uploads/<?php echo $prodDetail['product_image']; ?>" width="100px" class="img-thumbnail">
                                                              
                                                                </div>
                                                            </div>
                                                           <!--  <div class="col-sm-6">
                                                                   <div class="checkbox-fade fade-in-primary checkbox">
                                                                <label>
                                                                    <input value="1" type="checkbox" name="status" class="form-control" checked="">
                                                                    <span class="cr"><i class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                    Change Status Of The Product
                                                                </label>
                                                            </div>
                                                            </div> -->``
                                                        </div>

                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                     <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span>
                                                                        <textarea name="description" value="HI" placeholder="Please Provide a valid Formated Product Description!" id="editor1"><?php echo $prodDetail['product_desc'] ?></textarea>
                                                                    </div>     
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h5>SEO DETAILS</h5>
                                                                         
                                                                        </div>
                                                                        <div class="card-block">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="input-group">
                                                                                   
                                                                                    <input class="form-control" name="meta_title" value="<?php echo $prodDetail['meta_title'] ?>" placeholder="Meta Title" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                    <div class="input-group">
                                                                                       
                                                                                        <input class="form-control" name="meta_tag" value="<?php echo $prodDetail['meta_tag'] ?>" placeholder="Meta Tag" type="text">
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="input-group">
                                                                                       
                                                                                        <textarea class="form-control" name="meta_desc" placeholder="Meta Description"><?php echo $prodDetail['meta_desc'] ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                             <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h5>Upload Product Multiple Image </h5>
                                                                            <div class="card-header-right">  
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-block">
                                                                            <input type="file" name="imgFiles[]" id="filer_input" multiple="multiple">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                          




                                                             <!--   <div class="form-group"> -->
                    
                    <!--  -->

                     <div class="row">
                    
                        
                        <?php foreach($imgDetail as $img){ ?>
                           
                            <div class="col-lg-3 col-sm-5">
                             <div class="thumbnail">
                                                                       
                                                                          
                            <div class="img-box" id="imgb_<?php echo $img['id']; ?>">
                                <img src="<?php echo base_url('uploads/multifile/'.$img['product_image']); ?>"  class="img-fluid img-thumbnail">
                                <center>
                                <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $img['id']; ?>')">delete</a>
                          </center>
                            </div>
                        
                        </div>
                   
                </div>
                <?php } ?>
</div>

         <script>
function deleteImage(id){
    var result = confirm("Are you sure to delete?");
    if(result){
        $.post( "<?php echo base_url('Product/deleteimg'); ?>", {id:id}, function(resp) {
            if(resp == 'ok'){
                $('#imgb_'+id).remove();
                alert('The image has been removed from the gallery');
            }else{
                alert('Some problem occurred, please try again.');
            }
        });
    }
}
</script>




                                                            <!--  <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h5>SEO DETAILS</h5>
                                                                            <div class="card-header-right">
                                                                                <i class="icofont icofont-rounded-down"></i>
                                                                                <i class="icofont icofont-refresh"></i>
                                                                                <i class="icofont icofont-close-circled"></i>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-block">
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="input-group">
                                                                                    <span class="input-group-addon"><i class="icofont icofont-underline"></i></span>
                                                                                    <input class="form-control" name="meta_title" placeholder="Meta Title" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="icofont icofont-ui-keyboard"></i></span>
                                                                                        <input class="form-control" name="meta_tag" placeholder="Meta Tag" type="text">
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="input-group">
                                                                                        <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span>
                                                                                        <textarea class="form-control" name="meta_desc" placeholder="Meta Description"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                             <div class="form-group">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit
                                                                </button>
                                                                <a href="<?php echo base_url('Product/showAllProd'); ?>" class="btn btn-primary">Go Back</a>
                                                            </div>
                                                            

                                                        </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product edit card end -->
                    
                </div>