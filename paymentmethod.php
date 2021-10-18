<?php 
require_once 'admin/core/init.php';

if(!Input::checkInput('authtoken_', 'get', 1))
  Redirect::to('');

$_AUTHTOKEN_           = Input::get('authtoken_', 'get');

if(!is_integer(($_AUTHTOKEN_ID_   = Hash::decryptAuthToken($_AUTHTOKEN_))))
    Redirect::to('');

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include 'includes/head.php';?>
</head>

<body>
    <?php include 'includes/nav-session.php';?>
    <?php
        $getContent = DB::getInstance()->get('future_event', array('id', '=', $activeEventId));
        $banner     = $getContent->first()->banner;
        $event_name = $getContent->first()->event_name;
        $start_date = date('j', strtotime(dateFormat($getContent->first()->start_date)));
        $end_date   = date("j F Y", strtotime(dateFormat($getContent->first()->end_date)));
        $event_date = $start_date." - ".$end_date;
    ?>

    <div class="slider_area">
        <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text slider_text_register">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;"><?=$_Dictionary->translate('Please select a method of payment below')?> </h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>

    <div class="service_area about_event passes"  id="payment_area">
        <div class="container">
            <div id="div-messages"></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="payment-meth wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                        <a class="btn btn-primary  DPO_link" data-e="<?=Hash::encryptToken($activeEventId)?>" data-a="<?=$_AUTHTOKEN_?>"  data-d="cc"  style="width:100%; color: white;"><?=$_Dictionary->translate('Click to pay with one of services listed bellow')?> </a>
                        <div class="row img-card">
                            <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/visa.png"></a></div>
                            <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/MC.png"></a></div>
                            <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/AE.png"></a></div>

                            <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/PP.png"></a></div>
                            <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/MP.png"></a></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/AT.png"></a></div>
                            <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/Tigo.jpg"></a></div>
                            <div class="col-md-2"><a href="#"><img class="img img-responsive" src="<?=DN_IMG_CARDS?>/MM.png"></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-meth wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">
                        <a class="btn btn-primary  DPO_link " style="color: white;" data-e = "<?=Hash::encryptToken($activeEventId)?>" data-a="<?=$_AUTHTOKEN_?>" data-d="bt" ><i class="fa fa-bank"></i> <?=$_Dictionary->translate('Pay using bank transfer')?></a>
                        
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php';?>
    <script src="<?php linkto('forms/register-form.js'); ?>"></script>
</body>

</html>