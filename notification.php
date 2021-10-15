<?php require_once 'admin/core/init.php';?>
<!DOCTYPE html>
<html>
<head>
    <?php include'includes/head.php';?>
</head>
<body>
    <?php include 'includes/nav-session.php';?>

    <div class="slider_area">
        <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1" style="height: 250px;">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text slider_text_register">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;"><?=$_Dictionary->translate('successful Registration')?></h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="service_area about_event">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="form-contact contact_form text-center">
                        <p><?=$_Dictionary->translate('content-notification-success')?></p>
                        <div class="socail_links">
                            <ul>
                                <li><a href="https://twitter.com/APA_Congress" target="_bank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.facebook.com/APACongress" target="_bank"><i class="ti-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/africaprotectedareascongress/" target="_bank"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
    <?php include 'includes/footer.php';?>
    <script src="<?php linkto('forms/register-form.js'); ?>"></script>
 
</body>
</html>
