 <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>



                        <span>Register</span>





                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->
       <?php  if($this->session->flashdata('signupSecess')) { ?>
    <!-- <div class="alert alert-block alert-error fade in">
        <button type="button" class="close" data-dismiss="alert">×</button> -->
       <center> <strong><?php echo $this->session->flashdata('signupSecess'); ?></strong></center>

    <!--  </div>  -->
     <?php } ?>
    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">



                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>


                        <form action="<?php echo base_url('Register/signup'); ?>" method="POST">
                            <div class="group-input">
                                <label for="username">Username<sup style="color: red">*</sup></label>
                                <input type="text" id="username" name="uname" value="<?php echo set_value('uname') ?>">
                                <?php echo form_error('uname'); ?>
                            </div>
                             <div class="group-input">
                                <label for="username">First Name<sup style="color: red">*</sup></label>
                                <input type="text" id="username" name="fname" value="<?php echo set_value('fname') ?>">
                                 <?php echo form_error('fname'); ?>
                            </div>
                             <div class="group-input">
                                <label for="username">Last Name</label>
                                <input type="text" id="username" name="lname" value="<?php echo set_value('lname') ?>">
                                 <?php echo form_error('lname'); ?>
                            </div>
                             <div class="group-input">
                                <label for="username">Mobile<sup style="color: red">*</sup></label>
                                <input type="text" id="username" name="mobile" value="<?php echo set_value('mobile') ?>">
                                 <?php echo form_error('mobile'); ?>
                            </div>
                             <div class="group-input">
                                <label for="username">Email<sup style="color: red">*</sup></label>
                                <input type="text" id="username" name="email" value="<?php echo set_value('email') ?>">
                                 <?php echo form_error('email'); ?>
                            </div>
                             

                            <div class="group-input">
                                <label for="pass">Password<sup style="color: red">*</sup></label>
                                <input type="password" id="pass" name="password">
                                 <?php echo form_error('password'); ?>
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirm Password<sup style="color: red">*</sup></label>
                                <input type="password" id="con-pass" name="conform_password">
                                 <?php echo form_error('password'); ?>
                            </div>

               
    
       <input type="hidden"  name="<?php echo $this->security->get_csrf_token_name() ?>" value="<?php echo $this->security->get_csrf_hash() ?>"> 
    

                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="./login.html" class="or-login">Or Login</a>
                        </div>
                    </div>



       

                    
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
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
    <!-- Partner Logo Section End -->
