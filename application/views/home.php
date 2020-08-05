<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script type="text/javascript">
 $(document).ready(function(){
       
 
        $("#load_more").click(function(){
           
            var lastID = $('#load_more').attr('lastID');
            if(lastID != 0){

                jQuery.ajax({
                type:'POST',
                url:"<?php echo base_url() ?>"+"home/loadMoreData",
                data:{'<?php echo $this->security->get_csrf_token_name() ?>':'<?php echo $this->security->get_csrf_hash() ?>','id':+lastID},
                beforeSend:function(){
                    $('#loader').show();
                },
                success:function(html){
                    $('#load_more').remove();
                    $('.product-list').append(html);

                }
            });
            }
        });
    });
 </script>



 <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <!--  <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Shop</span>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    
 
                <div class="col-lg-12 order-1 order-lg-8">
                    <div class="product-show-option">
                       <!--  <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                           <div class="col-lg-5 col-md-5 text-right">
                                <p>Show 01- 09 Of 36 Product</p>
                            </div> -->
                            <div class="breadcrumb-text product-more">
                       <!--  <a href="<?php echo base_url('home'); ?>"><i class="fa fa-home"></i>Home </a>
                        <a href="./shop.html">Shop</a>
                        <span>Detail</span>
 -->
                    </div>
                        </div> 
                    </div>
                    <div class="row"></div>
                    <div class="product-list">
                        <div class="row" id="product">
                            <?php if ($ShowProduct) { ?>
                                <?php foreach ($ShowProduct as $show) { ?>
<!--                                 
  <div class="card" style="width: 15rem;">
  <img class="card-img-top" src="<?php echo base_url('admin/uploads/') ?><?php echo $show['product_image'] ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $show['product_title'] ?></h5>
    <p class="card-text"><?php if ($show['product_price'] > $show['offer_price']) { ?>
         <div class="badge badge-danger">-<?php echo floor(($show['product_price'] - $show['offer_price'])/$show['product_price'] * '100' ) ?>%</div>
          <?php } ?>
          Rs.<?php echo $show['offer_price'] ?>
                                            <?php if ($show['product_price'] != $show['offer_price']) { ?>
                                            <span>Rs.<?php echo $show['product_price'] ?>
                                            <?php } ?>


    </p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div> -->
                          <div class="col-lg-2 col-sm-2" id="pr">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <a href="<?php echo base_url(); ?>Product/productDetail/<?php echo $show['slug'] ?>?id=<?php echo base64_encode($show['id']); ?>">
                                        <img src="<?php echo base_url('admin/uploads/') ?><?php echo $show['product_image'] ?>" alt="">
                                       
                                       </a>
                                      <!--   <ul>
                                            
                                            <li class="quick-view"><a href="<?php echo base_url(); ?>Product/productDetail/<?php echo $show['slug'] ?>?id=<?php echo base64_encode($show['id']); ?>">+ Quick View</a></li>
                                        
                                        </ul> -->
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"></div>
                                        <a href="">
                                            
                                          <a href="<?php echo base_url(); ?>Product/productDetail/<?php echo $show['slug'] ?>?id=<?php echo base64_encode($show['id']); ?>">  <p><?php echo $show['product_title'] ?></p></a>
                                        </a>
                                        <?php if ($show['product_price'] > $show['offer_price']) { ?>
                                        
                                         <div class="badge badge-danger">-<?php echo floor(($show['product_price'] - $show['offer_price'])/$show['product_price'] * '100' ) ?>%</div>
                                     <?php } ?>
                                        <div class="product-price">Rs.<?php echo $show['offer_price'] ?>
                                            <?php if ($show['product_price'] != $show['offer_price']) { ?>
                                            <span>Rs.<?php echo $show['product_price'] ?></span>

                                        <?php } ?>
 
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php } ?>
                      

   
   <div class="container" style="text-align: center"><button class="btn" id="load_more" lastID="<?php echo $show['id']; ?>">LOAD MORE..<br><img style="display: none" id="loader" src="<?php echo base_url('assets/images/loading.gif'); ?>" height="80px" wieght="80px" > </button></div>
</div>
        <!--  <div class="load-more" lastID="<?php echo $show['id']; ?>" style="display: none;">
            <img src="<?php echo base_url('assets/images/loading.gif'); ?>"/> Loading more posts...
        </div>            
                --> 
    <?php } else { ?>
       <center> <p>No Product available</p> </center>
    <?php } ?>


                </div>
            </div>
        </div>
    </section>




