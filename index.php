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
                                    <h5 style="margin:10px 0;"><b>In Person Participation offers complete congress experience. Delegates will have:</b></h5>
                                    <ul>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <li>Access to the opening and closing ceremonies.</li>
                                                <li>Access all congress sessions.</li>
                                                <li>Access to the exhibition. </li>
                                                <li>Access to congress material. </li>
                                            </div>
                                            <div class="col-md-6">
                                                <li>Access to in person and virtual networking sessions.</li>
                                                <li>Access to social and cultural events. </li>
                                                <li>Access to the virtual platform during and after the event.</li>
                                                <li>On-demand access to all recorded virtual sessions for 12 months.</li>
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
                               if($_event_participation_category_->participation_sub_type_price > 0):
                          ?>
                            <sup> <?= $currency_?> </sup> <?= $_event_participation_category_->participation_sub_type_price?>
                            <?php
                            endif;
                            ?>
                           <span><?= $_event_participation_category_->participation_sub_type_name == ''?'':$_Dictionary->content($_event_participation_category_->participation_sub_type_name) ?> </span></h4>
                           <div class="div-inst">
                                <p class=><?= $_event_participation_category_->participation_type_form_order == ''?'111':$_Dictionary->content('discount-inperson-'.$_event_participation_category_->participation_type_form_order)?></p>
                           </div>
                          <a href="registration/event/inperson/<?=Hash::encryptToken($_event_participation_category_->participation_sub_type_id)?>" class="buy-btn"> <?= $_Dictionary->words('Register')?></a>
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
                      <p>This option provides you with all the Congress essentials from anywhere with a stable internet connection. The virtual experience provides delegates more value and flexibility to browse content at their own pace and zoom in on the topics of their choosing. With a variety of select, top-quality sessions, from high-level discussions to more technical ones, virtual participation offers an interactive experience and real-time access to the expertise and insights shared at the Congress. Many sessions allow you to share your thoughts and ask for feedback from the experts. </p>  
                    </div>
                    <div class="service_area outcomes wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s" style="padding:0;">
                        <div class="container">
                            <div class="row">
                                <div class="about_list">
                                    <h5 style="margin:10px 0;"><b>The online pass offers:</b></h5>
                                    <ul>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <li>Access to the opening and closing ceremonies.</li>
                                                <li>Access to selected congress sessions. </li>
                                                <li>Access to congress material. </li>
                                                <li>Access to the virtual platform during and after the event.</li>
                                                <li>On-demand access to all recorded virtual sessions for 12 months.</li>
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
                          <a href="registration/event/virtual/<?=Hash::encryptToken($_event_participation_category_->participation_sub_type_id)?>" class="buy-btn"><?= $_Dictionary->words('Register')?></a>
                        </div>
                      </div>
                    <?php
                        endforeach;
                    endif;
                    ?>     
                    <div class="col-md-12 wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s" style="margin:50px 0 0 0">
                        <hr>
                        <div class="section_title">
                        <h3 class="red-card" style="color: #a42f1d !important;">Important</h3>
                        <p>Registration Fees does not include Value Added Taxes (VAT). Should the Government of Rwanda charge VAT or other applicable taxes on the registration fees, this will be added to the final invoice amount. This is also applicable to other delegate related costs such as registration cancellation costs. </p>  
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