<header>
        <div class="header-area">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-1 col-lg-1">
                                <div class="logo">
                                    <a href="<?php linkto('index'); ?>">
                                        <img src="<?php linkto('img/logo.png'); ?>" class="img img-responsive" style="width: 60px;" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-11 col-lg-11">
                                <div class="main-menu  d-none d-xl-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="<?php linkto('index'); ?>">Home</a></li>
                                            <li><a href="<?php linkto('#program'); ?>" class="scroll">Program</a></li>
                                            <li><a href="<?php linkto('#speakers_area'); ?>" class="scroll">Speakers</a></li>
                                            <li><a href="<?php linkto('exhibitors'); ?>">Exhibitors</a></li>
                                            <li><a href="<?php linkto('partner'); ?>">Partner with us</a></li>
                                            <li><a href="learn">Destination Information</a></li>
                                            <li><a href="<?php linkto('contact'); ?>">Contact Us</a></li>
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