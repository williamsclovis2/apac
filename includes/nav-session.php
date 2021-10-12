<header>
        <div class="header-area header-area-session">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2" style="padding:0;">
                                <div class="logo">
                                    <a href="<?php linkto('index'); ?>">
                                        <img src="<?php linkto('img/apac-web-logo.png'); ?>" class="img img-responsive" style="width: 150px;" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10" style="padding:0;">
                                <div class="main-menu  d-none d-xl-block">
                                    <nav>
                                    <ul id="navigation">
                                            <li><a href="<?php linkto('index'); ?>">Home</a></li>
                                            <li><a href="<?php linkto('index'); ?>">About</a></li>
                                            <li><a href="<?php linkto('index'); ?>">Programme</a></li>
                                            <li><a href="<?php linkto('index'); ?>">Registration</a></li>
                                            <li><a href="<?php linkto('index'); ?>">Call for proposals</a></li>
                                            <li><a href="<?php linkto('index'); ?>">Media</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                            <li><a href="<?php linkto('index'); ?>">our partners</a></li>
                                            <li><a href="<?php linkto('index'); ?>">Sponsorship</a></li>
                                            <?php if(isset($_SESSION['username'])) {?>
                                            <li><a href="<?php linkto('logout'); ?>">Logout</a></li>
                                            <?php } else { ?>
                                            <li><a href="<?php linkto('login'); ?>">Login</a></li>
                                            <?php } ?>
                                            <li class="dropdown drop-language">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php
                                                // echo $_LangName;
                                                if($_LangName == 'English'):
                                                    ?>
                                                                    <img src="<?php linkto("img/En.png")?>">  English
                                                <?php
                                                elseif($_LangName == 'French'):
                                                    ?>
                                                                    <img src="<?php linkto("img/french.png")?>"> French
                                                <?php
                                                elseif($_LangName == 'Arabic'):
                                                    ?>
                                                                    <img src="<?php linkto("img/arabic.png")?>"> Arabic
                                                <?php
                                                elseif($_LangName == 'Portuguese'):
                                                    ?>
                                                                    <img src="<?php linkto("img/pt.png")?>"> Portuguese
                                                <?php
                                                endif;
                                                    ?>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" onclick="multilangselect('eng-lang')"><img src="<?php linkto("img/En.png")?>"> English </a>
                                                    <a class="dropdown-item" onclick="multilangselect('fr-lang')"><img src="<?php linkto("img/french.png")?>"> French </a>
                                                    <a class="dropdown-item" onclick="multilangselect('ar-lang')"><img src="<?php linkto("img/arabic.png")?>"> Arabic</a>
                                                    <a class="dropdown-item" onclick="multilangselect('pt-lang')"><img src="<?php linkto("img/pt.png")?>"> Portuguese</a>
                                                </div>
                                            </li>
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