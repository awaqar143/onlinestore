
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
       
 
        $("#load_more").click(function(){
           
            var lastID = $('#load_more').attr('lastID');
            if(lastID != 0){

                jQuery.ajax({
                type:'POST',
                url:"<?php echo base_url() ?>"+"Home/loadMoreData",
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






           <!--          <div class="product-list"> -->
                        <div class="row">
                            <?php if ($ShowProduct) { ?>
                                <?php foreach ($ShowProduct as $show) { ?>
                                
                                
                            

                            <div class="col-lg-2 col-sm-2" id="pr">
                                <div class="product-item">

                                      <div class="pi-pic">
                                        <a href="<?php echo base_url(); ?>Product/productDetail/<?php echo $show['slug'] ?>?id=<?php echo base64_encode($show['id']); ?>">
                                        <img src="<?php echo base_url('admin/uploads/') ?><?php echo $show['product_image'] ?>" alt="">
                                       </a>
                                       
                                     <!--    <ul>
                                            
                                            <li class="quick-view"><a href="<?php echo base_url(); ?>Product/productDetail/<?php echo $show['slug'] ?>?id=<?php echo base64_encode($show['id']); ?>">+ Quick View</a></li>
                                        
                                        </ul> -->
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"></div>
                                        <a href="#">
                                             <a href="<?php echo base_url(); ?>Product/productDetail/<?php echo $show['slug'] ?>?id=<?php echo base64_encode($show['id']); ?>">  
                                            <p><?php echo $show['product_title'] ?></p>
                                        </a>
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
               
  <?php if($productNum > $productLimit){ ?> 
    <div class="container" style="text-align: center"><button class="btn" id="load_more" lastID="<?php echo $show['id']; ?>">LOAD MORE<br><img style="display: none" id="loader" src="<?php echo base_url('assets/images/loading.gif'); ?>" height="80px" wieght="80px" > </button></div>



       
 <?php } else { ?>
 <div class="container" class="load_more" lastID="0">
        <center>
        <p>That's All</p>
        </center>
        </div>
    <?php } ?>


   


              

<?php } else{ ?>
    <div class="container" class="load_more" lastID="0">
        <center>
        <p>That's All</p>
        </center>
        </div>
    <?php } ?>


   

</div>
                </div>
        
  <!--   </section>  -->
