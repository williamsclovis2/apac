<header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="<?php linkto('index'); ?>">
                                        <img src="<?php linkto('img/apac-web-logo.png'); ?>" class="img img-responsive" style="width: 150px;" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10">
                                <div class="main-menu  d-none d-xl-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="https://apacongress.africa/">Home</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <?php if(isset($_SESSION['username'])) {?>
                                            <li><a href="<?php linkto('logout'); ?>">Logout</a></li>
                                            <?php } else { ?>
                                            <li><a href="<?php linkto('login'); ?>">Login</a></li>
                                            <?php } ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-xl-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>