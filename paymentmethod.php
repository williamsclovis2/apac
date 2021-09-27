<?php require_once 'admin/core/init.php'; ?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include'includes/head.php';?>
</head>

<body>
    <?php include 'includes/nav.php';?>

    <div class="slider_area">
        <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text slider_text_register">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;">choose payment method</h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <div class="service_area about_event passes"  id="payment_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-4 ">
                    <p class="wow fadeInUp note" data-wow-duration="1s" data-wow-delay=".1s">Note:</p>
                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="payment-meth wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                <a class="btn btn-primary  DPO_link" href="#" style="width:100%;">Click to pay with one of  services listed  bellow </a>
                                <div class="row img-card">
                                    <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/tigo-pesa.png"></a></div>
                                    <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/tigo-pesa.png"></a></div>
                                    <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/tigo-pesa.png"></a></div>

                                    <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/tigo-pesa.png"></a></div>
                                    <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/tigo-pesa.png"></a></div>
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/tigo-pesa.png"></a></div>
                                    <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/tigo-pesa.png"></a></div>
                                    <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/tigo-pesa.png"></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="payment-meth wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                                <a class="btn btn-primary  DPO_link " href="#"><i class="fa fa-bank"></i> Pay using bank transfer</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include'includes/footer.php';?>
</body>

</html>