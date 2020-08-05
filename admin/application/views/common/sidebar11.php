
 <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo base_url() ?>assets/images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                    
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Category</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('Category/AddCat') ?>">Add Category</a>
                                </li>
                               <!--  <li>
                                    <a href="">Edit Category</a>
                                </li> -->
                                <li>
                                    <a href="<?php echo base_url('Category/showAllCat'); ?>">All Category</a>
                                </li>
                            </ul>
                        </li>
                       
                        </li>
                    </ul>

                     <ul class="list-unstyled navbar__list">
                    
                        
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Products</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo base_url('Product/addProduct') ?>">Add Product</a>
                                </li>
                               <!--  <li>
                                    <a href="">Edit Category</a>
                                </li> -->
                                <li>
                                    <a href="<?php echo base_url('Product/showAllProd'); ?>">All Products</a>
                                </li>
                            </ul>
                        </li>
                       
                        </li>
                    </ul>


                </nav>
            </div>
        </aside>

                               