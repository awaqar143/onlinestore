
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order | Success</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" type="text/css">
</head>





<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<!------ Include the above in your HEAD tag ---------->

<center><h2>ORDER STATUS</h2>
<p class="ord-succ">Your order has been placed successfully.</p></center

<div class="container">
    <div class="row">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong><p><b>Order Info</b></p></strong>
                        <br>

                        <p>Reference ID # <?php echo $order['id'] ?></p>
                        
                        <p> Total Rs.<?php echo $order['grand_total']; ?> </p>
                        <p> Placed on: <?php echo $order['created']; ?> </p>
                        
                       <p> Buyer Name: <?php echo $order['name']; ?> </p>
                       <p> Phone: <?php echo $order['phone']; ?> </p>
                       <p> E-mail: <?php echo $order['email']; ?> </p>
                </div>
              
            </div>
            <div class="row">
                <div class="text-center">
                    <!-- <h1>Receipt</h1> -->
                </div>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">SubTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach ($order['items'] as $item) { ?>
                        <tr>
                            <td class="col-md-9"><em><?php echo $item['product_title'] ?></em></h4></td>
                            <td class="col-md-1" style="text-align: center"> <?php echo $item['quantity'] ?> </td>
                            <td class="col-md-1 text-center"><?php echo $item['offer_price']?></td>
                            <td class="col-md-1 text-center"><?php echo $item['sub_total'] ?></td>
                        </tr>
                       <?php } ?>
                       <!--  <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>Tax: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>$6.94</strong>
                            </p>
                            <p>
                                <strong>$6.94</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>$31.53</strong></h4></td>
                        </tr> -->
                    </tbody>
                </table>
                <a href="<?php echo base_url('home'); ?>" class="btn btn-success btn-lg btn-block">
                    Go To Home Page   <span class="glyphicon glyphicon-chevron-right"></span>
                </a></td>
            </div>
        </div>
    </div>