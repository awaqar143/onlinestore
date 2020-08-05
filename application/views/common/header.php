<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estore</title>
    <link rel="shortcut icon" href="<?php echo base_url('admin/uploads/logo/logo.png') ?>">

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

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-user"></i>
                        <?php if($this->session->userdata('uname')!="")
        {
            echo $this->session->userdata('uname');
        }
        else{
            echo "User";
            
        }
        ?>
                    </div>
                   <!--  <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +65 11.188.888
                    </div> -->
                </div>

                <div class="ht-right">
                    <a href="<?php echo base_url('register'); ?>" class="signup-panel"><i class="fa fa-user"></i>Sign Up</a>

                    <?php if($this->session->userdata('uname')=="") { ?>
                    <a href="<?php echo base_url('Login/login') ?>" class="login-panel"><i class="fa fa-user"></i>Login     </a>

                     <?php } else { ?>
                         <a href="<?php echo base_url('Login/logout') ?>" class="login-panel"><i class="fa fa-user"></i>Logout     </a>
                            
                    
                     <?php } ?>
                  
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-7">
                        <div class="logo">
                            <a href="<?php echo base_url() ?>">
                                <img src="<?php echo base_url('admin/uploads/logo/logo.png') ?>" alt="">
                            </a>
                        </div>
                    </div>

  
             
               
                      <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                             <!-- <button type="button" class="category-btn">All Categories</button> -->
                            <form action="<?php echo base_url('Product/ProductSearch'); ?>" method="post" class="input-group">
                                <input type="text" placeholder="What do you need?" name="search">
                                <button type="submit"><i class="ti-search"></i></button>
                                 <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>"> 
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <!-- <li class="heart-icon"><a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li> -->
                            <li class="cart-icon"><a href="<?php echo base_url('cart'); ?>">
                                    <i class="fa fa-shopping-cart" style="font-size:30px"></i>
                                   
                                    
                                    <span><?php echo $this->cart->total_items() ?></span>
                                
                                </a>
                                <!-- <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-1.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="si-pic"><img src="img/select-product-2.jpg" alt=""></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>$60.00 x 1</p>
                                                            <h6>Kabino Bedside Table</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i class="ti-close"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5>$120.00</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="#" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li> -->
                            <?php if (!empty($this->cart->total())) { ?>
                            
                            <li class="cart-price">Rs.<?php echo $this->cart->total() ?></li>
                            
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


<?php if($this->session->flashdata('succ')): ?>
 <!--    <div class="alert alert-success" role="alert">
  <p><center></strong><?php echo $this->session->flashdata('success'); ?></center></p> -->
<!-- </div>  -->
<?php echo '<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><center><strong>Success! </strong>' .$this->session->flashdata('succ').'</center></p></div>'; ?>


    <?php endif; ?>
    <?php if($this->session->flashdata('dang')): ?>
 <!--    <div class="alert alert-success" role="alert">
  <p><center></strong><?php echo $this->session->flashdata('success'); ?></center></p> -->
<!-- </div>  -->
<?php echo '<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p><center>' .$this->session->flashdata('dang').'</center></p></div>'; ?>


    <?php endif; ?>
     



        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>


                        
                        <ul class="depart-hover">
                         
                            <?php foreach ($productCat as $cat) { ?>
                            <li><a href="<?php echo base_url('Product/ProductSearchSide') ?>/<?php echo $cat->slug ?>?pid=<?php echo base64_encode($cat->id) ?>"><?php echo $cat->cat_name ?></a></li>
  <?php } ?>
                        </ul>
                  
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>

                        <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                       <!--  <li><a href="./shop.html">Shop</a></li> -->
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <?php foreach ($productCat as $cat) { ?>
                                
                                <li><a href="<?php echo base_url('Product/ProductSearchSide') ?>/<?php echo $cat->slug ?>?pid=<?php echo base64_encode($cat->id) ?>"><?php echo $cat->cat_name ?></a></li>
                                <?php }?>
                            </ul>
                        </li>
                       <!--  <li><a href="./blog.html">Blog</a></li> -->
                        <li><a href="<?php echo base_url('contact') ?>">Contact</a></li>
                       
                       <li><a href="<?php echo base_url('contact/about') ?>">About Us</a></li>
                       <!--  <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                                <li><a href="./check-out.html">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                                <li><a href="./register.html">Register</a></li>
                                <li><a href="./login.html">Login</a></li>
                            </ul> -->
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>