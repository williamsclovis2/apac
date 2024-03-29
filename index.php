
<?php require_once 'admin/core/init.php'; ?>

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

        $_MEDIA_CODE_  = 'C004';
		$_CBO_CODE_    = 'C0015';
    ?>

    <div class="slider_area">
        <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text slider_text_register">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"><?=$_Dictionary->translate('content-event-title')?></h3>                            
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                            
                            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"><?=$_Dictionary->words('content-event-date')?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service_area about_event  pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"><b><?=$_Dictionary->words('in-person-section-title')?><b></h5>
                    <div class="section_title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <h3><?=$_Dictionary->content('In-person attendance registration')?></h3> 
                        <p><?=$_Dictionary->translate('in-person-section-description')?> </p>
                    </div>
                    <div class="service_area outcomes wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s" style="padding:0;">
                        <div class="container">
                            <div class="row">
                                <div class="about_list">
                                    <h5 style="margin:10px 0;"><b><?=$_Dictionary->translate('in-person-participation-offers')?></b></h5>
                                    <ul>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <li><?=$_Dictionary->translate('opening-and-closing')?></li>
                                                <li><?=$_Dictionary->translate('all-congress-sessions')?></li>
                                                <li><?=$_Dictionary->translate('the-exhibition')?></li>
                                                <li><?=$_Dictionary->translate('to-congress-material')?></li>
                                            </div>
                                            <div class="col-md-6">
                                                <li><?=$_Dictionary->translate('in-person-and-virtual-networking')?></li>
                                                <li><?=$_Dictionary->translate('cultural-events')?></li>
                                                <li><?=$_Dictionary->translate('virtual-platform')?></li>
                                                <li><?=$_Dictionary->translate('virtual-sessions-for-12-months')?></li>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php
                    $_DATA_PARTICIPATION_CATEGORY_  = FutureEventController::getVisiblePacipationSubCategory($activeEventId, 'INPERSON');
                    if($_DATA_PARTICIPATION_CATEGORY_ ):
                    foreach($_DATA_PARTICIPATION_CATEGORY_ As $_event_participation_category_ ):
                    $_event_participation_category_ = (Object) $_event_participation_category_ ;
                    $currency_                      = $_event_participation_category_->participation_sub_type_currency == 'USD'?'$':'RWF';
                    ?>
                      <div class="col-lg-3">
                        <div class="box wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s">
                          <h3> <?= $_Dictionary->content($_event_participation_category_->participation_type_name)?> </h3>
                          <h4>
                          <?php
                            //    if($_event_participation_category_->participation_sub_type_price > 0):
                          ?>
                            <sup> <?= $currency_?> </sup> <?= $_event_participation_category_->participation_sub_type_price?>
                            <?php
                            // endif;
                            ?>
                           <span><?= $_event_participation_category_->participation_sub_type_name == ''?'':$_Dictionary->content($_event_participation_category_->participation_sub_type_name) ?> </span></h4>
                           <div class="div-inst">
                                <p class=><?= $_event_participation_category_->participation_type_form_order == ''?'111':$_Dictionary->content('discount-inperson-'.$_event_participation_category_->participation_type_form_order)?></p>
                           </div>
                           <a href="registration/event/inperson/<?=Hash::encryptToken($_event_participation_category_->participation_sub_type_id)?>" class="buy-btn"> 
                              <?php
    if($_event_participation_category_->participation_type_code == $_MEDIA_CODE_ or $_event_participation_category_->participation_type_code == $_CBO_CODE_ )
      echo $_Dictionary->words('Apply');
    else
      echo $_Dictionary->words('Register');                         
                              ?>
                            </a>
                            </div>
                      </div>
                      <?php
                         endforeach;
                         endif;
                      ?>
                     
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="service_area  bg-gray pricing vitual-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                      <h3 class="red-card" style="color: #a42f1d !important;"><?=$_Dictionary->content('Virtual attendance registration')?></h3>
                      <p><?=$_Dictionary->translate('virtual-section-description')?></p>  
                    </div>
                    <div class="service_area outcomes wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s" style="padding:0;">
                        <div class="container">
                            <div class="row">
                                <div class="about_list">
                                    <h5 style="margin:10px 0;"><b><?=$_Dictionary->translate('online-pass-offers')?></b></h5>
                                    <ul>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <li><?=$_Dictionary->translate('access-to-the-opening')?></li>
                                                <li><?=$_Dictionary->translate('selected-congress-sessions')?></li>
                                                <li><?=$_Dictionary->translate('access-to-congress')?></li>
                                                <li><?=$_Dictionary->translate('virtual-platform')?></li>
                                                <li><?=$_Dictionary->translate('on-demand-access')?></li>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                    <?php
                    $_DATA_PARTICIPATION_CATEGORY_  = FutureEventController::getVisiblePacipationSubCategory($activeEventId, 'VIRTUAL');
                    if($_DATA_PARTICIPATION_CATEGORY_ ):
                        foreach($_DATA_PARTICIPATION_CATEGORY_ As $_event_participation_category_ ):
                            $_event_participation_category_ = (Object) $_event_participation_category_ ;
                            $currency_                      = $_event_participation_category_->participation_sub_type_currency == 'USD'?'$':'RWF';
                    ?>                   
                      <div class="col-lg-3">
                        <div class="box wow fadeInLeft red-card" data-wow-duration="1.2s" data-wow-delay=".5s">
                          <h3><?= $_Dictionary->content($_event_participation_category_->participation_type_name)?></h3>
                          <h4>
                            <sup><?= $currency_?> </sup><?= $_event_participation_category_->participation_sub_type_price?>
                            <span><?= $_Dictionary->content($_event_participation_category_->participation_sub_type_name) ?></span></h4>
                            <div class="div-inst">
                                <p class=><?= $_Dictionary->content('discount-virtual-'.$_event_participation_category_->participation_type_form_order)?></p>
                            </div>
                          <a href="registration/event/virtual/<?=Hash::encryptToken($_event_participation_category_->participation_sub_type_id)?>" class="buy-btn">
                          <?php
                              if($_event_participation_category_->participation_type_code == $_MEDIA_CODE_ or $_event_participation_category_->participation_type_code == $_CBO_CODE_ )
                                echo $_Dictionary->words('Apply');
                              else
                                echo $_Dictionary->words('Register');                         
                            ?>
                        </a>
                        </div>
                      </div>
                    <?php
                        endforeach;
                    endif;
                    ?>     
                    <div class="col-md-12 wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s" style="margin:50px 0 0 0">
                        <hr>
                        <div class="section_title">
                        <h3 class="red-card" style="color: #a42f1d !important;"><?=$_Dictionary->translate('important')?></h3>
                       
                        <ul class="instructions_li">
                            <!-- <li><?=$_Dictionary->translate('registration_fees')?></li> -->
                            <li><?=$_Dictionary->translate('instruction_two')?></li>
                            <li><?=$_Dictionary->translate('instruction_three')?></li>
                        </ul>
                        <p><?=$_Dictionary->translate('for_more')?></p>
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