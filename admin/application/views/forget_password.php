





<style type="text/css">
    .alert.alert-warning.icons-alert {
    text-align: left;
    }
    .alert.alert-success.icons-alert {
    text-align: left;
    }
    .alert.alert-danger.icons-alert {
    text-align: left;
    }
</style>
            <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
	
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body">

                            <div class="text-center">
                                <img src="<?php echo base_url(); ?>asset/assets/images/yadi-ci-logo.png" alt="logo.png">
                            </div>
                              	 <?php if(validation_errors() != null): ?>
      <?php echo '<div class="alert alert-warning icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
    <?php endif; ?>

                            <div class="auth-box">

                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Forget Password</h3>
                                    </div>
                                   
                                        <div class="col-md-12" style="margin-bottom: -40px;">
                                        <?php echo form_open('login/forget_pass_email'); ?>
                                <div class="input-group">
                                    <input type="text" name="email" class="form-control" placeholder="please Enter Your Email">
                                    <span class="md-line"></span>
                                </div>
                               
                               
                              <div class="col-sm-5 col-xs-12 forgot-phone text-right">
                                        <a href="<?php echo base_url(); ?>login/index" class="text-right f-w-600 text-inverse"> Login</a>
                                    </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Submit</button>
                                    </div>
                                </div>
                                <hr/>
                               
                                </div>
                            </form>
                            </div>
                       
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        
        <!-- end of container-fluid -->
    </section>    
    
   