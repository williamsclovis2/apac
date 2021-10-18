<header>
<style>
.dropdown-item{
    cursor: pointer;
}
</style>
        <div class="header-area header-area-session">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2" style="padding:0;">
                                <div class="logo">
                                    <a href="https://apacongress.africa/">
                                        <img src="<?php linkto('img/apac-web-logo.png'); ?>" class="img img-responsive" style="width: 150px;" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-10" style="padding:0;">
                                <div class="main-menu  d-none d-xl-block">
                                    <nav>
                                    <ul id="navigation">
                                            <li><a href="https://apacongress.africa/"><?=$_Dictionary->words('Home')?></a></li>
                                            <li><a href="https://apacongress.africa/about/"><?=$_Dictionary->words('About')?></a></li>
                                            <li><a href="https://apacongress.africa/programme/"><?=$_Dictionary->words('Program')?></a></li>
                                            <li><a href="<?php linkto('index'); ?>"><?=$_Dictionary->words('Registration')?></a></li>
                                            <li><a href="https://apacongress.africa/call-for-proposals/"><?=$_Dictionary->translate('Call for proposals')?></a></li>
                                            <li><a href="#"><?=$_Dictionary->translate('Media')?></a></li>
                                            <li><a href="https://apacongress.africa/contact/"><?=$_Dictionary->translate('Contact Us')?></a></li>
                                            <li><a href="https://apacongress.africa/our-partners/"><?=$_Dictionary->translate('our partners')?></a></li>
                                            <li><a href="https://apacongress.africa/sponsorship/"><?=$_Dictionary->words('Sponsorship')?></a></li>
                                            <?php if(isset($_SESSION['username'])) {?>
                                            <li><a href="<?php linkto('logout'); ?>"><?=$_Dictionary->words('Logout')?></a></li>
                                            <?php } else { ?>
                                            <li><a href="<?php linkto('login'); ?>"><?=$_Dictionary->words('Login')?></a></li>
                                            <?php } ?>
                                            <li class="dropdown drop-language">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <?php
                                                if($_LangName == 'English'):
                                                    ?>
                                                                    <img src="<?php linkto("img/En.png")?>">  English
                                                <?php
                                                elseif($_LangName == 'French'):
                                                    ?>
                                                                    <img src="<?php linkto("img/french.png")?>"> French
                                                <?php
                                                else:
                                                    ?>
                                                                    <img src="<?php linkto("img/En.png")?>">  English
                                               
                                                <?php
                                                endif;
                                                    ?>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" onclick="multilangselect('eng-lang')"><img src="<?php linkto("img/En.png")?>"> English </a>
                                                    <a class="dropdown-item" onclick="multilangselect('fr-lang')"><img src="<?php linkto("img/french.png")?>"> French </a>
                                                   
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