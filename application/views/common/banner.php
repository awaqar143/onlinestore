 <section class="hero-section">
        <div class="hero-items owl-carousel">
            <?php foreach ($slider as $slider) { ?>
                       <div class="single-hero-items set-bg" data-setbg="<?php echo base_url('admin/uploads/') ?><?php echo $slider->product_image ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1><?php echo $slider->product_title ?></h1>
                            <p><?php echo $slider->short_description ?></p>
                            <a href="<?php echo base_url(); ?>Product/productDetail/<?php echo $slider->slug ?>?id=<?php echo base64_encode($slider->id); ?>" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span><?php echo floor(($slider->product_price - $slider->offer_price)/$slider->product_price * '100' ) ?>%</span></h2>
                    </div>
                </div>
            </div>
        <!--     <div class="single-hero-items set-bg" data-setbg="<?php echo base_url() ?>assets/img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div> -->
        <?php } ?>
        </div>
    </section>