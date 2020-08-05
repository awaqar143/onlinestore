
   <div class="row">
                            <!-- Invoice list card start -->
                            <div class="col-sm-12">
                                <div class="card card-border-primary">
                                    <div class="card-header">
                                        <h1>ORDER # <?php echo $order['id']; ?> </h1>
                                        <?php if($order['status']=='') { ?>
                                        <h5 class="f-right" > Status: Pendding </h5>
                                    <?php } elseif($order['status']=='0') { ?>
                                       <h5 class="f-right" > Status: Canceled </h5>
                                        <?php } elseif($order['status']=='1') { ?>
                                       <h5 class="f-right" > Status: Shiffed </h5>
                                          <?php } else { ?>
                                       <h5 class="f-right" > Status: Delivered </h5>
                                   <?php } ?>
                                          
                                   </div>     
                                    
                                    <div class="card-header">
                                        <h5>Customer Detials</h5>


                                   
                                          
                                    </div>
                                     <div class="card-header">


                                           <div class="row">
                                            <div class="col-sm-6">
                                                <ul class="list list-unstyled">

                                       <h5>Name:  <?php echo $order['name'] ?></h5>
                                   </ul>
                                   <br>
                                         <ul class="list list-unstyled">
                                       <h5>MOBILE: <?php echo $order['phone'] ?> </h5>
                                   </ul>
                                   <br>
                                    <ul class="list list-unstyled">
                                    <h5>E-MAIL: <?php echo $order['email'] ?> </h5>
                                </ul>
                                <br>
                                 <ul class="list list-unstyled">
                                <h5>Address: <?php echo $order['address'] ?></h5>
                            </ul>
                            <br>
                              <ul class="list list-unstyled">
                                <h5>Order Date: <?php echo $order['created'] ?></h5>
                            </ul>
                            <br>
                                      </div>
                                  </div>
                                   </div>
                                       
                          <div class="card-header">
                                        <h5>Product Detials</h5>


                                   
                                          
                                    </div>
                                
                                   <div class="card-block">
                        <div class="row">
                            <table style="font-size: 15px">
                                <thead>
                                    <tr>
                                        <th><h5>Product</h5></th>
                                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>

                                        <th><h5>Quantity</h5></th>
                                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                        <th><h5>Color</h5></th>
                                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                        <th><h5>Size</h5></th>
                                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                        <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                        <th><h5>sub total</h5></th>
                                      
                                    </tr>
                                </thead>
                                  <?php foreach ($item as $item) { ?>
                                <tbody>

                                    <tr>
                                        
                                        <td><?php echo $item['product_title'] ?></td>
                                        <td></td>
                                         

                                        <td><?php echo $item['quantity'] ?></td><td></td>
                                        <td><?php echo $item['color'] ?></td><td></td>
                                        <td><?php echo $item['size'] ?></td><td></td><td></td>
                                        <td><?php echo $item['sub_total'] ?></td><td></td>
                                      
                                       
                                    </tr>
                                  
                                 
                                </tbody>
                                   <?php } ?>
                                     <tfoot>
                                        <td>Total</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                         <td></td>
                                          <td></td>
                                           <td></td>
                                            <td></td>
                                             <td></td>

                                        <td><?php echo $order['grand_total'] ?></td>

                                    </tfoot>
                                   
                              
                            </table>
                        </div>
                    </div>
                </div>
                                    
                                       
                                    </div>
                                  
                                </div>
                                      <div class="form-group">
    <a href="<?php echo base_url('order/showOrder'); ?>" class="btn btn-primary">Go Back</a>
  </div>