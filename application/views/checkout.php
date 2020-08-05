<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Check Out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="checkout-section spad">
        <div class="container">
            <form action="#" class="checkout-form" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <a href="#" class="content-btn">Click Here To Login</a>
                        </div>
                        <h4>Biiling Details</h4>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="fir">Name<span>*</span></label>
                                <input type="text" id="fir" name="name">
                               <?php echo form_error('name'); ?>
                            </div>
                            
                           
                            <div class="col-lg-6">
                                <label for="email">Email Address<span>*</span></label>
                                <input type="text" id="email" name="email">
                                <?php echo form_error('email'); ?>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone<span>*</span></label>
                                <input type="text" id="phone" name="mobile">
                                <?php echo form_error('mobile'); ?>
                            </div>
                             <div class="col-lg-12">
                                <label for="street">Street Address<span>*</span></label>
                                <input type="text" id="street" class="street-first" name="address">
                                <?php echo form_error('address'); ?>
                                
                            </div>
                            <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>"> 
                         <!--  <button type="submit" name="placeOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></button> -->
                         
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="checkout-content">
                            <input type="text" placeholder="Enter Your Coupon Code">
                        </div>
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Product <span>Total</span></li>
                                    <?php foreach ($cartitem as $item) { ?>
                                    
                                    <li class="fw-normal"><?php echo $item['name'] ?> x <?php echo $item['qty'] ?><span><?php echo $item['subtotal'] ?></span></li>

                                <?php } ?>
                                    
                                    <!-- <li class="fw-normal">Subtotal <span>$240.00</span></li> -->
                                    <li class="total-price">Total <span>Rs.<?php echo $this->cart->total() ?></span></li>
                                </ul>
                                <div class="payment-check">
                                     <div class="pc-item">
                                        <label for="pc-cod">
                                            Cash on Delivery
                                            <input type="checkbox" id="pc-cod" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                   <!--  <div class="pc-item">
                                        <label for="pc-check">
                                            Cheque Payment
                                            <input type="checkbox" id="pc-check">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> -->
                                  <!--   <div class="pc-item">
                                        <label for="pc-paypal">
                                            Paypal
                                            <input type="checkbox" id="pc-paypal">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div> -->
                                </div>
                                <div class="order-btn">
                                    <a href="<?php echo base_url('cart/'); ?>" class="site-btn place-warning"><i class="glyphicon glyphicon-menu-left"></i> Back to Cart</a>
                                    <button type="submit" class="site-btn place-btn" name="placeOrder">Place Order</button>


                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>