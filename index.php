<?php require_once 'admin/core/init.php'; ?>

<!doctype html>
<html class="no-js" lang="zxx">

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
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="text-transform: none;">Magnam dolores commodi suscipit.</h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
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
                <div class="section_title mb-4 ">
                        <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                    </div>
                    <div class="section_title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <h3>In-person attendance registration </h3> 
                    </div>
                    
                    <div class="row">
                    <?php
                    $_DATA_PARTICIPATION_CATEGORY_  = FutureEventController::getActivePacipationCategoryByEventID(7);
                    if($_DATA_PARTICIPATION_CATEGORY_ ):
                    foreach($_DATA_PARTICIPATION_CATEGORY_ As $_event_participation_category_ ):
                        $currency_ = $_event_participation_category_->currency == 'USD'?'$':'RWF';
                    ?>
                      <div class="col-lg-3">
                        <div class="box wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s">
                          <h3> <?= $_event_participation_category_->name?> </h3>
                          <h4><sup> <?= $currency_?> </sup> <?= $_event_participation_category_->inperson_price?> <span>Lorem ipsum</span></h4>
                          <ul>
                            <li><i class="bx bx-check"></i> Quam adipiscing vitae </li>
                            <li><i class="bx bx-check"></i> Nec feugiat nisl </li>
                            <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis </span></li>
                          </ul>
                          <a href="registration/event/inperson/<?=Hash::encryptToken($_event_participation_category_->id)?>" class="buy-btn">Register</a>
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
    <div class="service_area  bg-gray pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                        <h3 class="red-title">Virtual attendance registration </h3> 
                    </div>
                    <div class="row">
                    <?php
                    $_DATA_PARTICIPATION_CATEGORY_  = FutureEventController::getActivePacipationCategoryByEventID(7);
                    if($_DATA_PARTICIPATION_CATEGORY_ ):
                    foreach($_DATA_PARTICIPATION_CATEGORY_ As $_event_participation_category_ ):
                        $currency_ = $_event_participation_category_->currency == 'USD'?'$':'RWF';
                    ?>
                      <div class="col-lg-3">
                        <div class="box wow fadeInLeft red-card" data-wow-duration="1.2s" data-wow-delay=".5s">
                          <h3><?= $_event_participation_category_->name?></h3>
                          <h4><sup><?= $currency_?> </sup><?= $_event_participation_category_->virtual_price?><span>Lorem ipsum</span></h4>
                          <ul>
                            <li><i class="bx bx-check"></i> Quam adipiscing vitae </li>
                            <li><i class="bx bx-check"></i> Nec feugiat nisl </li>
                            <li class="na"><i class="bx bx-x"></i> <span>Massa ultricies mi quis </span></li>
                          </ul>
                          <a href="registration/event/virtual/<?=Hash::encryptToken($_event_participation_category_->id)?>" class="buy-btn">Register</a>
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

    <?php include'includes/footer.php';?>
</body>

</html>