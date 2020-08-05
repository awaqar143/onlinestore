 <!-- jquery file upload Frame work -->
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
                        <li class="breadcrumb-item"><a href="#!">Slider</a>
                        </li>
                        <li class="breadcrumb-item"><a href="#!">Add Slider</a>
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
                                <h5>Add Slider</h5>
                            </div>
                            <div class="card-block">
                                <div class="row">
                                    <div class="col-sm-12">
                                     <?php echo form_open_multipart('Slider/addProductSlider'); ?>
                                        <div class="product-edit">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                 <!--   <label class="col-sm-2 col-form-label">Name</label> -->
                                                                    <input class="form-control" name="title" value="<?php echo set_value('title') ?>" placeholder="Product Title" type="text">
                                                                </div>
                                                            </div>
                                                          
                                                          <div class="col-sm-6">
                                                                <div class="input-group">
                                                                 <!--  <label class="col-sm-2 col-form-label">SKU</label> -->
                                                                    <input class="form-control" name="sku" value="<?php echo set_value('sku') ?>" placeholder="SKU" type="text">
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <!-- <span class="input-group-addon"><i class="icofont icofont-ui-note"></i></span> -->
                                                                    <input class="form-control" name="offer_price" value="<?php echo set_value('offer_price') ?>" placeholder="Offer Price" type="text">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                   <!--  <span class="input-group-addon"><i class="icofont icofont-cur-dollar"></i></span> -->
                                                                    <input class="form-control" name="price" value="<?php echo set_value('price') ?>" placeholder="Price" type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <!-- <span class="input-group-addon"><i class="icofont icofont-numbered"></i></span> -->
                                                                    <input class="form-control" name="stock" value="<?php echo set_value('stock') ?>" placeholder="Quantity" type="text">
                                                                </div>
                                                            </div>
                                                           

                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                    <!-- <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span> -->
                                                                    <input class="form-control" name="short_description" value="<?php echo set_value('short_description') ?>" placeholder="Product Short Description" type="text" maxlength="100">
                                                                </div>
                                                            </div>
                                                                


                                                        </div>
                                                        <div class="row">

                                                             <div class="col-sm-6">
                                                                <div class="input-group">
                                                                   <!--  <span class="input-group-addon"><i class="icofont icofont-all-caps"></i></span> -->
                                                                     <input class="form-control" name="tag" value="<?php echo set_value('tag') ?>" placeholder="Product Tag" type="text">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-sm-6">
                                                                <select name="cat_id" class="form-control form-control-default">
                                                                    <option value="opt1">Select a Category</option>
                                                                    
                                                                    <?php foreach($cat as $cat) {?>
                                                                         <option value="<?php echo $cat->id ?>"><?php echo $cat->cat_name ?></option>
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
                                     <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                 <!--   <label class="col-sm-2 col-form-label">Name</label> -->
                                                                    <input class="form-control" type="text" name="multi_size" value="<?php echo set_value('multi_size') ?>" placeholder="Size" id="input-tag" data-role="tagsinput">
                                                                </div>
                                                            </div>
                                                          
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
 
                                                            
                                                            <input class="form-control" type="text" name="multi_color" value="<?php echo set_value('multi_color') ?>"  placeholder="Colour" id="input-tag" data-role="tagsinput">
                                                            
                                                                </div>
                                                            </div>

                                                        </div>

                                                       
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <div class="input-group">
                                                                   <!--  <span class="input-group-addon"><i class="icofont icofont-clip"></i></span> -->
                                                                        <input name="userfile" class="form-control" type="file">
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
                                                            </div> -->








                                                        </div>

                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                     <div class="input-group">
                                                                    <span class="input-group-addon"><i class="icofont icofont-copy-alt"></i></span>
                                                                        <textarea name="description" placeholder="Please Provide a valid Formated Product Description!" id="editor1"><?php echo set_value('description') ?></textarea>
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
                                                                                   
                                                                                    <input class="form-control" name="meta_title" value="<?php echo set_value('meta_title') ?>" placeholder="Meta Title" type="text">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                    <div class="input-group">
                                                                                       
                                                                                        <input class="form-control" name="meta_tag" value="<?php echo set_value('meta_tag') ?>" placeholder="Meta Tag" type="text">
                                                                                    </div>
                                                                                </div>
                                                                        </div>
                                                                            <div class="row">
                                                                                <div class="col-sm-12">
                                                                                    <div class="input-group">
                                                                                       
                                                                                        <textarea class="form-control" name="meta_desc" placeholder="Meta Description"><?php echo set_value('meta_desc') ?></textarea>
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
                        <!-- Basic Form Inputs card end -->
             
  <script type="text/javascript" src="<?php echo base_url(); ?>asset/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?> asset/src/jquery.tagsinput.js" ></script>
<script>
    

$(document).ready(function()
{
    $('#input-tag').tagsinput(
    {
        width: 'auto'
    });
    $("input").val()

});


</script>



<!-- 
    <script type="text/javascript">
$(document).ready(function() {

var category = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('text'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: "<?php echo base_url('Product/addProduct');?>"
});
category.initialize();

elt = $('#input-tag');
    elt.tagsinput({
    itemValue: 'category_id',
    itemText: 'name',
    typeaheadjs: {
        name: 'category',
        displayKey: 'text',
        source: category.ttAdapter()
    }
 });
});
</script> -->

