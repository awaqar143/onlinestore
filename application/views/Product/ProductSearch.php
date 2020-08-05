<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Search Result</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
	  

                <div class="col-lg-12 order-1 order-lg-8">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                
                            </div>
                            
                        </div>
                    </div>
                      
                    <div class="product-list">
                       
                                      
                        <div class="row">
                             <?php if ($ShowProduct) { ?>
                                        <?php foreach ($ShowProduct as $show) { ?>
                          
                            <div class="col-lg-2 col-sm-2">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <a href="<?php echo base_url()?>Product/productDetail/<?php echo $show['slug'] ?>?id=<?php echo base64_encode($show['id'])?>">
                                        <img src="<?php echo base_url('admin/uploads/') ?><?php echo $show['product_image'] ?>" alt="">
                                    </a>
                                        <!-- <div class="sale pp-sale">Sale</div> -->
                                        <!-- <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div> -->
                                        <!--<ul>  -->
                                            
                                            <!-- <li class="quick-view"><a href="<?php echo base_url()?>Product/productDetail/<?php echo $show['slug'] ?>?id=<?php echo base64_encode($show['id'])?>">+ Quick View</a></li> -->
                                        
                                        <!--</ul> -->
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">Towel</div>
                                        <a href="<?php echo base_url()?>Product/productDetail/<?php echo $show['slug'] ?>?id=<?php echo base64_encode($show['id'])?>">
                                            <h5><?php echo $show['product_title'] ?></h5>
                                        </a>

                                          <?php if ($show['product_price'] > $show['offer_price']) { ?>
                                        
                                         <div class="badge badge-danger">-<?php echo floor(($show['product_price'] - $show['offer_price'])/$show['product_price'] * '100' ) ?>%</div>
                                     <?php } ?>
                                        
                                        <div class="product-price">
                                          Rs.  <?php echo $show['product_price'] ?>
                                            <span>Rs. <?php echo $show['product_price'] ?></span>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                          
                         <?php } } else { ?>

                            <div>
                                
                                <p>No Result Found.</p>

                            </div>


                           <?php } ?>
                           
                    
                           
                        </div>

                        
                    </div>
                   
                  </div>

                   
               
           
    </section>







