<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
/* Update item quantity */
function updateCartItem(obj, rowid){
	$.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
		if(resp == 'ok'){
			location.reload();
		}else{
			alert('Cart update failed, please try again.');
		}
	});
}
</script>






 <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php if ($this->cart->total_items() > 0) {  foreach ($cartItems as $item) { ?>
                                <tr>
                                    <td class="cart-pic first-row"><img src="<?php echo base_url('admin/uploads/'); ?><?php echo $item['image'] ?>" alt="" width="100px" height="100px" ></td>
                                    <td class="cart-title first-row">
                                        <h5><?php echo $item['name'] ?></h5>
                                    </td>
                                    <td class="p-price first-row"><?php echo $item['price'] ?> </td>
                                    <td class="qua-col first-row">
                                        <div class="quantity">
                                            <div class="">
                                                <input class="form-control" type="number" min="1" max="5" value="<?php echo $item['qty'] ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">Rs.<?php echo $item['subtotal'] ?></td>
                                    
                                    
                                    <td class="close-td first-row"> 
                <a href="<?php echo base_url('cart/removeItem/'.$item["rowid"]); ?>"  onclick="return confirm('Are you sure?')"><i class="ti-close"></i></a>
            </td>


                                    <!-- <td class="close-td first-row"><i class="ti-close"></i></td></a> -->
                                </tr>
                                <?php } }  else { ?>

                                	<tr><td colspan="6"><p>Your cart is empty.....</p></td>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="<?php echo base_url('home') ?>" class="primary-btn continue-shop">Continue shopping</a>
                                <!-- <a href="#" class="primary-btn up-cart">Update cart</a> -->
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                    <li class="subtotal">Subtotal <span>Rs.<?php echo $this->cart->total() ?></span></li>
                                    <li class="cart-total">Total <span>Rs.<?php echo $this->cart->total() ?></span></li>
                                </ul>
                                <a href="<?php echo base_url('Checkout') ?>" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

