<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i>Home </a>
                        <a href="./shop.html">Shop</a>
                        <span>Detail</span>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
  
    <!-- Product Shop Section Begin -->

    







    <form action="<?php echo base_url('Product/addToCart') ?>" method="post">
        
         <?php if($this->session->flashdata('danger')): ?>
     <center style="color: red" > <?php echo 
                
                $this->session->flashdata('danger'); ?></center>
    <?php endif; ?>
       <input type="hidden" name="prodID" value="<?php echo $productDetail['id'] ?>">
       <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>"> 
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
               
            
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <?php if (!empty($multiImg)) { ?>
                                
                                <img class="product-big-img" src="<?php echo base_url('admin/uploads/multifile/') ?><?php echo $multiImg['0']['product_image'] ?>" alt="">
                            <?php } ?>
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                  <!--   <div class="pt active" data-imgbigurl="img/product-single/product-1.jpg"><img
                                            src="img/product-single/product-1.jpg" alt=""></div> -->



                                    <!-- <div class="pt" data-imgbigurl="img/product-single/product-2.jpg"><img
                                            src="img/product-single/product-2.jpg" alt=""></div>
                                    <div class="pt" data-imgbigurl="img/product-single/product-3.jpg"><img
                                            src="img/product-single/product-3.jpg" alt=""></div> -->
                                            <?php if (!empty($multiImg)) {
                                       ?>
                                            <?php foreach ($multiImg as $multiImg) {
                                                
                                            ?>
                                    <div class="pt" data-imgbigurl="<?php echo base_url('admin/uploads/multifile/') ?><?php echo $multiImg['product_image'] ?>"><img
                                            src="<?php echo base_url('admin/uploads/multifile/') ?><?php echo $multiImg['product_image'] ?>" alt=""></div>

                                        <?php } ?>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <!-- <span>oranges</span> -->
                                    <h3><?php echo $productDetail['product_title'] ?></h3>
                                    <!-- <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a> -->
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div>
                                <div class="pd-desc">
                                    <p><?php echo $productDetail['short_description'] ?></p>
                                    <h4>Rs.<?php echo $productDetail['offer_price'] ?> <span>Rs.<?php echo $productDetail['product_price'] ?></span> </h4>
                                    <br>
                                    <?php if ($productDetail['product_stock'] > 0) { ?>
                                     
                                    <p>In Stock:   <span style="color:red"><?php echo $productDetail['product_stock'] ?> </span></p>
                                  <?php } else { ?>

                                    <span style="color: red">Out of stock</span>

                                  <?php } ?>
                                </div>
                                
                                    
    <?php if (!empty($multi_color)) { ?>
                                
                                      
<div class="form-group">
   
     <label for="staticEmail" class="col-sm-2 col-form-label">Colour</label>
    
    <select name="color" class="form-control-sm" id="exampleFormControlSelect1">
      <option>Select Colour</option>
      <?php foreach ($multi_color as $color) { ?>
      <option value="<?php echo $color['id'] ?>"><?php echo $color['product_color'] ?></option>
     
     <?php } ?>
    </select>
 
        </div>  
        <?php }?>    
        <div></div>                      
                              
                                <div class="pd-size-choose">
                                    <?php if (!empty($multi_size)) { ?>
                                        
                                    <?php foreach ($multi_size as $size) { ?>
                                    <div class="sc-item">
                                        
                                    
                                       <input type="radio" id="sm-size" name="size" value="<?php echo $size['id']?>" >
                                        <label for="sm-size"> <?php echo $size['product_size'] ?></label>
                                          
                                    </div>
                            <?php } } ?>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                    
                                        <input type="text" value="1" min="1" name="quantity" maxlength="10">
                                    
                                    </div>
                                   <!--  <a href="<?php echo base_url(); ?>Product/addToCart/<?php echo $productDetail->id ?>" class="primary-btn pd-cart">Add To Cart</a> -->
                                   <?php if ($productDetail['product_stock'] > 0) { ?>
                                   
                                   <button type="submit" name="cart" class="primary-btn pd-cart">Add To Cart </button>
                                   <?php } else { ?>

                                    <button type="submit" disabled="" name="cart" class="primary-btn pd-cart">Add To Cart </button>

                                  <?php } ?>

                                </div>
                                
    
                                <div>
                                    
                                </div>
                            </form>
                                <ul class="pd-tags">

                                    
                                    <li><span>CATEGORIES</span>: <?php echo $cat['cat_name'] ?>
                                        
                                    </li> 
                                    <li><span>TAGS</span>: <?php echo $productDetail['product_tag'] ?></li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku : <?php echo $productDetail['sku'] ?></div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                
                                        <?php echo $productDetail['product_desc'] ?>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="img/product-single/tab-desc.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">Rs.<?php echo $productDetail['offer_price'] ?></div>
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock"><?php echo $productDetail['product_stock'] ?> in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight"><?php echo $productDetail['product_weight'] ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    
                                                    
                                                    <div class="p-size">

                                                        <?php foreach ($multi_size as $size) { ?>

                                                        <?php echo $size['product_size'] ?>,
                                                            
                                                         <?php } ?>   
                                                        </div>
                                                
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td>
                                                    <div class="p-size">
                                                              <?php foreach ($multi_color as $color) { ?>

                                                        <?php echo $color['product_color'] ?>,
                                                            
                                                         <?php } ?>  
                                                     </div>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code"><?php echo $productDetail['sku'] ?></div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-2.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-1.jpg" alt="">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-2.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Shoes</div>
                            <a href="#">
                                <h5>Guangzhou sweater</h5>
                            </a>
                            <div class="product-price">
                                $13.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-3.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-4.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Converse Shoes</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>