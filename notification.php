<?php require_once 'admin/core/init.php';?>
<!DOCTYPE html>
<html>
<head>
    <?php include'includes/head.php';?>
</head>
<body>
    <?php include'includes/nav.php';?>

    <div class="slider_area">
        <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text slider_text_register">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;">Registration successful</h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="service_area about_event" style="background: #000;">
        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="form-contact contact_form text-center">
                        <p>Thank you for your registration. We will revert shortly.<br>
                        In the meantime, please take a minute to follow us<br>
                        on our social media accounts:</p>
                        <div class="socail_links">
                            <ul>
                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>

    <?php include'views/partners.php';?>

    <?php include'includes/footer.php';?>
 
</body>
</html>
