
<?php
require_once 'admin/core/init.php';
if(!Session::exists('username') AND !Session::exists('userToken'))
    Redirect::to('login');

/** Get Session User Data By Token */
$_session_user_token_ = Session::get('userToken');
$_session_user_ID_    = Hash::decryptAuthToken($_session_user_token_);

if(!is_integer($_session_user_ID_))
    Redirect::to('logout');

if(!($_session_user_data_ = FutureEventController::getParticipantByID($_session_user_ID_)))
    Redirect::to('logout');

$_participant_data_ = $_session_user_data_;
$_event_id          = $_participant_data_->event_id;
$_participant_id_   = $_participant_data_->id;

$_status_ = $_participant_data_->status;
$_status_color_ = 'label-warning';

if($_status_ == 'COMPLETED' || $_status_ == 'APPROVED')
    $_status_color_ = '#5cb85c';
if($_status_ == 'ACTIVE')
    $_status_color_ = '#1a7bb9';
if($_status_ == 'DENIED')
    $_status_color_ = '#c13c5a';
if($_status_ == 'EXPIRED')
    $_status_color_ = '#9f9597';

/** Local CBO Code  */
$_CBO_CODE_ = 'C0015';
    
/** Payment Information */
$_payment_entry_data_ = PaymentController::getPaymentTransactionEntryDataByParticipantID($_event_id, $_participant_id_);

$_PAYMENT_METHOD_                      = '';
$_PAYMENT_TRANSACTION_AMOUNT_CURRENCY_ = '';
$_PAYMENT_STATUS_                      = '';
$_PAYMENT_RECEIPT_                     = '';
$_PAYMENT_TRANSACTION_ID_              = '';
$_EXTERNAL_TRANSACTION_ID_             = '';
$_PAYMENT_TRANSACTION_TIME_            = '';
$_PAYMENT_APPROVAL_TIME_               = '';
$_PAYMENT_APPROVAL_COMMENT_            = '';

/** Get Participant Last Transaction   */
if($_payment_entry_data_):
    $_PAYMENT_METHOD_                      = $_payment_entry_data_->payment_method;
    $_PAYMENT_TRANSACTION_AMOUNT_CURRENCY_ = $_payment_entry_data_->amount.' '.$_payment_entry_data_->currency;
    $_PAYMENT_STATUS_                      = $_payment_entry_data_->transaction_status;
    $_PAYMENT_RECEIPT_                     = $_payment_entry_data_->receipt_id == ''?'-':$_payment_entry_data_->receipt_id;
    $_PAYMENT_TRANSACTION_ID_              = $_payment_entry_data_->transaction_id;
    $_EXTERNAL_TRANSACTION_ID_             = $_payment_entry_data_->external_transaction_id;
    $_PAYMENT_TRANSACTION_TIME_            = (strlen($_payment_entry_data_->transaction_time) > 1)?'-':date('D d-M-Y h:i:a', $_payment_entry_data_->transaction_time);
    $_PAYMENT_APPROVAL_TIME_               = (strlen($_payment_entry_data_->approval_time) > 1)?'-':date('D d-M-Y h:i:a', $_payment_entry_data_->approval_time);
    $_PAYMENT_APPROVAL_COMMENT_            = $_payment_entry_data_->approval_comment;

    if($_payment_entry_data_->payment_method != 'BANK_TRANSFER')
        $_PAYMENT_APPROVAL_TIME_              = date('D d-M-Y h:i:a', $_payment_entry_data_->callback_time);

    if($_payment_entry_data_->payment_method == '')
        $_PAYMENT_METHOD_ = 'ONLINE_PAYMENT';

endif;

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include 'includes/head.php';?>
</head>
<style>
    .service_area{
        padding-bottom:0;
    }
</style>
<body>
    <?php include'includes/nav-session.php';?>
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
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"><?=$_Dictionary->words('footer-content-event-title')?></h3>                            
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"><?=$_Dictionary->words('content-event-date')?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="service_area about_event" id="card-profile">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="<?=$_participant_data_->profile != null? VIEW_PROFILE.$_participant_data_->profile: "https://bootdey.com/img/Content/avatar/avatar7.png"?>" alt="Admin" class="rounnded-circle" width="100%">
                                <div class="mt-3">
                                    <h4><?= $_participant_data_->firstname .' '. $_participant_data_->lastname ?></h4>
                                    <p class="text-secondary mb-1 display_status_" style="color: <?=$_status_color_?> !important;"><?=Functions::getStatus($_status_)?> <i class="fa fa-check-circle"></i></p>
<?php
if($_status_ == 'APPROVED'):
 ?>
                                    <button class="btn btn-xs btn-outline-danger disable_btn_deny " ><i class="fa fa-video icon"></i> Join session </button>
<?php
endif;
 ?>
                                    <!-- <a class="btn btn-xs btn-outline-info disable_btn_deny " href="https://apacongress.africa/programme/" target="_blank" ><i class="fa fa-video icon"></i> View Congress Programme </a> <br> <br> -->
                                    <a class="btn btn-xs btn-outline-info disable_btn_deny " href="<?php linkto('logout'); ?>" target="_blank" ><i class="fa fa-video icon"></i> Logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    

            </div>

                <div class="col-md-8" id="tab-div">
                    <div class="wlcm-mssg">
                        <h1><?=$_Dictionary->words('welcome-username')?> <?= $_participant_data_->firstname .' '. $_participant_data_->lastname ?></h1>
                        <p class="text-justify"><?=$_Dictionary->translate('client_area')?></p>
                    </div>
                    <div class="prog_tabs_area" id="program_section">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row" id="myProgram">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3 col-xs-6 div-program-mc active-pg" onclick="openCity(event, 'one')" id="defaultOpen">
                                                    <div class="pog-day">
                                                        <h4><?=$_Dictionary->translate('service_area')?> <i class="fa fa-caret-down"></i></h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-6 div-program-mc " onclick="openCity(event, 'two')" id="defaultOpen">
                                                    <div class="pog-day">
                                                        <h4><?=$_Dictionary->translate('personal_area')?> <i class="fa fa-caret-down"></i></h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-6 div-program-mc " onclick="openCity(event, 'three')" id="defaultOpen">
                                                    <div class="pog-day">
                                                        <h4><?=$_Dictionary->translate('event_area')?> <i class="fa fa-caret-down"></i></h4>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-xs-6 div-program-mc " onclick="openCity(event, 'four')" id="defaultOpen">
                                                    <div class="pog-day">
                                                        <h4><?=$_Dictionary->translate('payment_area')?> <i class="fa fa-caret-down"></i></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <script type="text/javascript">
                                        var header = document.getElementById("myProgram");
                                        var btns = header.getElementsByClassName("div-program-mc");
                                        for (var i = 0; i < btns.length; i++) {
                                        btns[i].addEventListener("click", function() {
                                            var current = document.getElementsByClassName("active-pg");
                                            current[0].className = current[0].className.replace(" active-pg", "");
                                            this.className += " active-pg";
                                        });
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="one" class="daycontent program-one">
                                        <div class="div-buttons text-center">
                                            <div class="row">
                                                <!-- <div class="col-md-6"><a href="<?=linkto('update/profile/'.Hash::encryptAuthToken($_session_user_ID_))?>" class="btn btn-primary"> Update Registration Details</a></div> -->
                                                <div class="col-md-6"><a class="btn btn-primary collapse0" data-toggle="collapse" data-parent="#accordion0" href="#collapseZero"><?=$_Dictionary->translate('update_reg_details')?></a></div>
                                                <div class="col-md-6"><a class="btn btn-primary collapse1" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><?=$_Dictionary->translate('book_hotel')?></a></div>
                                                <!-- Collapse -->
                                                <div class="bs-example col-md-12 text-left" id="book-info">
                                                    <div class="panel-group" id="accordion0">
                                                        <div class="panel panel-default">
                                                            <div id="collapseZero" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    <h3 class="card-sect-title"><?=$_Dictionary->translate('update_detail_tilte')?></h3>
                                                                    <p class="text-justify">
                                                                        <span class="text-black"><?=$_Dictionary->translate('update_detail_p')?></p>

                                                                    <p>
                                                                        <a style="color: #f47e20;" href='<?=linkto('update/profile/'.Hash::encryptAuthToken($_session_user_ID_))?>' target='_blank'> <u><?=$_Dictionary->translate('click_here')?></u> </a>  <?=$_Dictionary->translate('to_update')?></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end Collapse -->
                                                <!-- Collapse -->
                                                <div class="bs-example col-md-12 text-left" id="book-info">
                                                    <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    <h3 class="card-sect-title"><?=$_Dictionary->translate('travel_and_acc')?></h3>
                                                                    <p class="text-justify">
                                                                        <span class="text-black"><?=$_Dictionary->translate('travel_and_acc_desc')?></p>

                                                                    <p class="text-justify">
                                                                        <a style="color: #f47e20;" href='https://www.travelzuri.com/B2C/Admin/GTC/EventInfoCart.aspx?Ref_Type=HTL&CID=87&CityCode=KGL&EventName=Africa%20Protected%20Area%20Congress%20&SSr=EVTHL#' target='_blank'> <u><?=$_Dictionary->translate('click_here')?></u> </a> 
                                                                        <span class="text-black"><?=$_Dictionary->translate('to_book')?></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end Collapse -->
                                            </div>

                                            <a  class="btn btn-primary collapse2" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><?=$_Dictionary->translate('book_excursions')?></a><br>
                                            <!-- Collapse -->
                                                <div class="bs-example col-md-12 text-left" id="book-info">
                                                    <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                            <div id="collapseTwo" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    <h3 class="card-sect-title">Excursions & Visits in Rwanda</h3>
                                                                    <p class="text-justify">Welcome to Rwanda, the land of a thousand hills! Blessed with extraordinary biodiversity, with incredible wildlife living throughout its volcanoes, montane rainforest and sweeping plains Rwanda offers you an exceptional range of great value excursions to suit all ages, interests and abilities. Rwanda’s stunning scenery and warm, friendly people offer unique experiences in one of the most remarkable countries in the world. All excursions packages offered through accredited partners are carefully designed to suit your itinerary.<br> <br> For more information, explore available opportunities below:<br><a href="https://rtta.rw/" target="_blank" style="color:blue;"><u> Rwanda Tours and Travel Association</u></a>.</p>
                                                                    <h3 class="card-sect-title">Disclaimer:</h3>
                                                                    <p class="text-justify">While every effort is made to ensure that the information on this website is correct, some of the information, particularly those supplied by third parties, can change without notice. We do not guarantee and accept no liability whatsoever arising from or connected to, the accuracy, reliability, currency or completeness of the excursion booking sites.  </p>
                                                                    <p class="text-justify">The description and translations of each excursion have been provided directly by the excursion organisers. IUCN APAC is not responsible for the content or translations on third part.</p>
                                                                    <p class="text-justify">While the service providers make every effort to provide on-time service, IUCN APAC does not guarantee departure and arrival times, which may be delayed by any number of factors, including weather, traffic or road conditions, mechanical problems or any other cause or other conditions beyond the service providers’ control. As such, IUCN APAC makes no warranty as to the weather, or that excursions will be uninterrupted, on time or meet the requirements and expectations of excursion participants.</p>
                                                                    <p class="text-justify">IUCN APAC disclaims any responsibility and liability for any loss or damages that arise from dealings or disputes between excursion participants and excursion organisers.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end Collapse -->
                                                
                                            <!-- <a  class="btn btn-primary"  href="https://apacongress.africa/programme/">View Congress Programme </a><br> -->
                                        </div>
                                        
                                    </div>
                                    <div id="two" class="daycontent program-two">
                                         <h3 class="card-sect-title"><?=$_Dictionary->translate('CONTACT INFORMATION')?></h3>
                                        <div class="card mb-3" >
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('full-name')?></h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h6><?= $_participant_data_->firstname .' '. $_participant_data_->lastname ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('Email')?></h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h6><a href="mailto:email"><?= $_participant_data_->email ?></a></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('Telephone number 1')?></h6>
                                                    </div>
                                                    <div class="col-sm-8 text-secondary">
                                                        <h6><a href="tel:phone"><?= $_participant_data_->telephone ?></a></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('Telephone number 2')?></h6>
                                                    </div>
                                                    <div class="col-sm-8 text-secondary">
                                                        <h6><a href="tel:phone"><?= $_participant_data_->telephone_2 ?></a></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('Job title')?></h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h6><?= $_participant_data_->job_title ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('Job category')?></h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h6><?= $_participant_data_->job_category ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('language')?> </h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h6><?= $_participant_data_->language ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('Gender')?></h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h6><?= $_participant_data_->gender ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('Date of birth')?></h6>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h6><?= $_participant_data_->birthday ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        /** Display Organization Section - When Not Media - */
                                        if( $_participant_data_->participation_type_name != 'Media' && $_participant_data_->student_state == 0  ):
                                        ?>
                                                            <h3 class="card-sect-title"><?=$_Dictionary->translate('ORGANIZATION')?> </h3>
                                                            <div class="card mb-3" >
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Organization name')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->organisation_name ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Organization type')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->organisation_type ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                        <?php
                                            if($_participant_data_->participation_type_code == $_CBO_CODE_): 
                                        ?>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Date and year of registration')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-6 text-secondary">
                                                                            <h6><?= $_participant_data_->organization_registration_date_year ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Number of employees')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->organization_annual_turnover ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('What is your annual turnover')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-6 text-secondary">
                                                                            <h6><?= $_participant_data_->organization_annual_turnover ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('CBO Project Objectives ')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->cbo_project_objectives ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('CBO activities')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->cbo_activities ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>

                                        <?php
                                            endif;
                                        ?>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Industry')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->industry ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Organization Website')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                        <h6><a href="<?= $_participant_data_->website == ''?'#': str_replace('http:// http://', 'http://', 'http://'.$_participant_data_->website)  ?>"><?= $_participant_data_->website ?></a></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Company Location')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= countryCodeToCountry($_participant_data_->organisation_country) ?> / <?= $_participant_data_->organisation_city ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                        <?php
                                        /** Display Organization Section - When Not Media - Students - */
                                        elseif( $_participant_data_->participation_type_name != 'Media' && $_participant_data_->student_state == 1  ):
                                        ?>
                                                            <h3 class="card-sect-title"><?=$_Dictionary->translate('EDUCATION INSTITUTE OR ORGANIZATION')?></h3>
                                                            <div class="card mb-3" >
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('name-of-school-or-organization')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->educacation_institute_name ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Category')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->educacation_institute_category ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Industry')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->educacation_institute_industry ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('website')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                        <h6><a href="<?= $_participant_data_->educacation_institute_website == ''?'#': $_participant_data_->educacation_institute_website  ?>"><?= $_participant_data_->educacation_institute_website ?></a></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Institute Country/ City </h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= countryCodeToCountry($_participant_data_->educacation_institute_country) ?> / <?= $_participant_data_->educacation_institute_city ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                        <?php
                                        /** Display Organization Section - When  Media - */
                                        elseif( $_participant_data_->participation_type_name == 'Media'):
                                        ?>
                                                            <!-- info fo media person -->
                                                            <h3 class="card-sect-title"><?=$_Dictionary->translate('ORGANIZATION')?></h3>
                                                            <div class="card mb-3" >
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Organization name')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->organisation_name ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Media category')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->organisation_type ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Press card number')?> </h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->media_card_number ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Issuing authority')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                        <h6><?= $_participant_data_->media_card_authority ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Company Location')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= countryCodeToCountry($_participant_data_->organisation_country) ?> / <?= $_participant_data_->organisation_city ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            <h3 class="card-sect-title"><?=$_Dictionary->translate('TOOLS')?></h3>
                                                            <div class="card mb-3" >
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('List of equipment to be brought')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-8 text-secondary">
                                                                            <h6><?= $_participant_data_->media_equipment ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h6 class="mb-0">Special Request</h6>
                                                                        </div>
                                                                        <div class="col-sm-8 text-secondary">
                                                                            <h6><?= $_participant_data_->special_request ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <hr> -->
                                                                </div>
                                                            </div>
                                        <?php
                                            endif;
                                        ?>
                                                            <h3 class="card-sect-title"><?=$_Dictionary->translate('WHAT ARE YOUR OBJECTIVES FOR ATTENDING THIS CONGRESS?')?></h3>
                                                            <div class="card mb-3">
                                                                <div  class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"> objectives</h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6 style="text-align:left;"><?= $_participant_data_->attending_objective_1 ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <!-- <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Second objective </h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6 style="text-align:left;"><?= $_participant_data_->attending_objective_2 ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Third objective </h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6 style="text-align:left;"><?= $_participant_data_->attending_objective_3 ?> </h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr> -->
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('WHERE DID YOU HEAR ABOUT APAC?')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-6 text-secondary">
                                                                            <h6><?= $_participant_data_->info_source ?> </h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                        <?php
                                        /** Only For In-person participation event */
                                        if($_participant_data_->participation_subtype_category == 'INPERSON'):
                                        ?>
                                                            <h3 class="card-sect-title"><?=$_Dictionary->translate('BADGE COLLECTION IDENTIFICATION')?></h3>
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Type of ID document')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->id_type ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Document number')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->id_number ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <!-- <hr> -->
                                                                    <!-- <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h6 class="mb-0">Country/ City of residence</h6>
                                                                        </div>
                                                                        <div class="col-sm-8 text-secondary">
                                                                            <h6><?= countryCodeToCountry($_participant_data_->residence_country) ?> / <?= $_participant_data_->residence_city ?></h6>
                                                                        </div>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                        <?php
                                        endif;
                                        ?>

                                                            <h3 class="card-sect-title"><?=$_Dictionary->translate('EMERGENCY CONTACT')?></h3>
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('full-name')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->emergency_contact_firstname .' '.$_participant_data_->emergency_contact_lastname ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Email')?> </h6>
                                                                        </div>
                                                                        <div class="col-sm-9 text-secondary">
                                                                            <h6><?= $_participant_data_->emergency_contact_email ?></h6>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h6 class="mb-0"><?=$_Dictionary->translate('Telephone number')?></h6>
                                                                        </div>
                                                                        <div class="col-sm-8 text-secondary">
                                                                            <h6><?= $_participant_data_->emergency_contact_telephone ?></h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                           
                    

                                    </div>

                                    <div id="three" class="daycontent program-three">
                                        <h3 class="card-sect-title"><?=$_Dictionary->translate('event')?> </h3>
                                        <div class="card mt-3">
                                            <div class="card-body side-card">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('event-name')?> </h6>
                                                    </div>
                                                    <div class="col-sm-8 text-secondary">
                                                        <h6><?= $_participant_data_->event_name ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('event-type')?></h6>
                                                    </div>
                                                    <div class="col-sm-7 text-secondary">
                                                        <h6><?= Functions::getEventCategory($_participant_data_->participation_subtype_category) ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('participation-type')?></h6>
                                                    </div>
                                                    <div class="col-sm-6 text-secondary">
                                                        <h6><?= $_participant_data_->participation_type_name ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('participation-sub-type')?></h6>
                                                    </div>
                                                    <div class="col-sm-6 text-secondary">
                                                        <h6><?= $_participant_data_->participation_subtype_name ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-5">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('payment-state')?></h6>
                                                    </div>
                                                    <div class="col-sm-7 text-secondary">
                                                        <h6><?= $_participant_data_->payment_state ?></h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h6 class="mb-0"><?=$_Dictionary->translate('participation-price')?></h6>
                                                    </div>
                                                    <div class="col-sm-6 text-secondary">
                                                        <h6><?= $_participant_data_->participation_subtype_price ?> <small><?= $_participant_data_->participation_subtype_currency ?></small> </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <!-- <a class="btn btn-xs btn-outline-info disable_btn_deny col-md-12 col-xs-12 col-lg-12 col-sm-12 " href="https://apacongress.africa/programme/" target="_blank" ><i class="fa fa-video icon"></i> View Congress Programme </a> <br> <br> -->
                                        <a  class="btn btn-primary col-md-12 col-xs-12 col-lg-12 col-sm-12 collapse2" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><?=$_Dictionary->translate('view-program')?> </a><br>
                                        <!-- Collapse --> <br>
                                        <div class="bs-example col-md-12 text-left" id="book-info">
                                                    <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                            <div id="collapseThree" class="panel-collapse collapse in">
                                                                <div class="panel-body">
                                                                    <h3 class="card-sect-title"><?=$_Dictionary->translate('view-program')?></h3>
                                                                    <p class="text-justify"><?=$_Dictionary->translate('more-details')?><br> 
                                                                    <p>
                                                                        <a style="color: #f47e20;" href="https://apacongress.africa/programme/" target='_blank'> <u><?=$_Dictionary->translate('click_here')?></u> </a><?=$_Dictionary->translate('congress-programme')?></span>
                                                                    </p>                                                                
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        </div>
                                        <!-- end Collapse -->    
                                    </div>

                                    <div id="four" class="daycontent program-three">
                                    <?php
if($_participant_data_->payment_state == 'PAYABLE'):
    ?>

                                    <h3 class="card-sect-title"><?=$_Dictionary->translate('payment')?></h3>
                                    <div class="card mt-3">
                                        <div class="card-body side-card">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0"><?=$_Dictionary->translate('payment-metthod')?></h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <h6><?=$_PAYMENT_METHOD_?></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0"><?=$_Dictionary->translate('amount-paid')?></h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <h6><?=$_PAYMENT_TRANSACTION_AMOUNT_CURRENCY_?></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0"><?=$_Dictionary->translate('transaction-status')?></h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    <h6><?=$_PAYMENT_STATUS_?></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <h6 class="mb-0"><?=$_Dictionary->translate('payment-receipt')?></h6>
                                                </div>
                                                <div class="col-sm-7 text-secondary">
                                                    <h6><?=$_PAYMENT_RECEIPT_?></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h6 class="mb-0"><?=$_Dictionary->translate('transaction-id')?></h6>
                                                </div>
                                                <div class="col-sm-6 text-secondary">
                                                    <h6><?=$_PAYMENT_TRANSACTION_ID_?></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <h6 class="mb-0"><?=$_Dictionary->translate('ex-transaction')?></h6>
                                                </div>
                                                <div class="col-sm-5 text-secondary">
                                                    <h6><?=$_EXTERNAL_TRANSACTION_ID_?></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <h6 class="mb-0"><?=$_Dictionary->translate('payment-t-time')?></h6>
                                                </div>
                                                <div class="col-sm-5 text-secondary">
                                                    <h6><?=$_PAYMENT_TRANSACTION_TIME_?></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-7">
                                                    <h6 class="mb-0"><?=$_Dictionary->translate('payment-a-time')?></h6>
                                                </div>
                                                <div class="col-sm-5 text-secondary">
                                                    <h6><?=$_PAYMENT_APPROVAL_TIME_?></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                            <div class="col-sm-12">
                                                    <h6 class="mb-0"><?=$_Dictionary->translate('payment-a-com')?></h6>
                                                </div>
                                                <div class="col-sm-12 text-secondary">
                                                    <h6><?=$_PAYMENT_APPROVAL_COMMENT_?></h6>
                                                </div>
                                            </div>
                                            <!-- <hr> -->
                                        </div>
                                    </div>

                                                                    
                                    <?php
                                    endif;
                                        ?>

                                    <?php
                                    # Need Accommodation 
                                    if($_participant_data_->need_accommodation_state == 1):
                                        ?>

                                                                        

                                                                    
                                    <?php
                                    endif;
                                        ?>
                                    <div>



                                </div>
                                <script>
                                    function openCity(evt, cityName) {
                                        var i, tabcontent, tablinks;
                                        tabcontent = document.getElementsByClassName("daycontent");
                                        for (i = 0; i < tabcontent.length; i++) {
                                            tabcontent[i].style.display = "none";
                                        }
                                        tablinks = document.getElementsByClassName("tablinks");
                                        for (i = 0; i < tablinks.length; i++) {
                                            tablinks[i].className = tablinks[i].className.replace(" active-day", "");
                                        }
                                        document.getElementById(cityName).style.display = "block";
                                        evt.currentTarget.className += " active-day";
                                    }

                                    document.getElementById("defaultOpen").click();
                                </script>
                            </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>
       
    </div>
</div>
<style>
    .selectedTab{
        background: #f47e20;
        border-color: #f47e20;
        border: none !important;
    }
</style>
    <?php include 'includes/footer.php';?>
    <script src="<?php linkto('forms/register-form.js'); ?>"></script>
    <script>
        $('.collapse0').on('click', function(){
            $('.collapse0').addClass('selectedTab');
            $('.collapse1').removeClass('selectedTab');
            $('.collapse2').removeClass('selectedTab');
            $('#collapseOne').removeClass('show');
            $('#collapseTwo').removeClass('show');
        });
        $('.collapse1').on('click', function(){
            $('.collapse0').removeClass('selectedTab');
            $('.collapse1').addClass('selectedTab');
            $('.collapse2').removeClass('selectedTab');
            $('#collapseZero').removeClass('show');
            $('#collapseTwo').removeClass('show');
        });
        $('.collapse2').on('click', function(){
            $('#collapseZero').removeClass('show');
            $('#collapseOne').removeClass('show');
            $('.collapse0').removeClass('selectedTab');
            $('.collapse1').removeClass('selectedTab');
            $('.collapse2').addClass('selectedTab');
        });
    </script>
</body>

</html>