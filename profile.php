<?php
require_once 'admin/core/init.php';
if(!Session::exists('username') AND !Session::exists('userToken'))
    Redirect::to('login');

/** Get Session User Data By Token */
$_session_user_token_ = Session::get('userToken');
$_session_user_ID_    = Hash::decryptAuthToken($_session_user_token_);

if(!is_integer($_session_user_ID_))
    Redirect::to('login');

if(!($_session_user_data_ = FutureEventController::getParticipantByID($_session_user_ID_)))
    Redirect::to('login');

$_participant_data_ = $_session_user_data_;

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

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include 'includes/head.php';?>
</head>

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
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"><?=$event_name?></h3>                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                            <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"><?=$event_date?></p>
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
                                <img src="<?=$_participant_data_->profile != null? VIEW_PROFILE.$_participant_data_->profile: "https://bootdey.com/img/Content/avatar/avatar7.png"?>" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?= $_participant_data_->firstname .' '. $_participant_data_->lastname ?></h4>
                                    <p class="text-secondary mb-1 display_status_" style="color: <?=$_status_color_?> !important;"><?=Functions::getStatus($_status_)?> <i class="fa fa-times-circle"></i></p>
<?php
if($_status_ == 'APPROVED'):
 ?>
                                    <button class="btn btn-xs btn-outline-danger disable_btn_deny " ><i class="fa fa-video icon"></i> Join session </button>
<?php
endif;
 ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3 class="card-sect-title">Event </h3>
                    <div class="card mt-3">
                        <div class="card-body side-card">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Event Name </h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <h6><?= $_participant_data_->event_name ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Event Type</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <h6><?= Functions::getEventCategory($_participant_data_->participation_subtype_category) ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="mb-0">Participation Type</h6>
                                </div>
                                <div class="col-sm-6 text-secondary">
                                    <h6><?= $_participant_data_->participation_type_name ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="mb-0">Participation Subtype</h6>
                                </div>
                                <div class="col-sm-6 text-secondary">
                                    <h6><?= $_participant_data_->participation_subtype_name ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Payment State</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <h6><?= $_participant_data_->payment_state ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="mb-0">Participation Price</h6>
                                </div>
                                <div class="col-sm-6 text-secondary">
                                    <h6><?= $_participant_data_->participation_subtype_price ?> <small><?= $_participant_data_->participation_subtype_currency ?></small> </h6>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
<?php
if($_participant_data_->payment_state == 'PAYABLE'):
    ?>
                    <h3 class="card-sect-title">Payment </h3>
                    <div class="card mt-3">
                        <div class="card-body side-card">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Payment Status</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <!-- <h6>Pending</h6> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body side-card">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Payment method</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <!-- <h6>Visa Card</h6> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body side-card">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h6 class="mb-0">Amount paid</h6>
                                </div>
                                <div class="col-sm-7 text-secondary">
                                    <!-- <h6>$200</h6> -->
                                </div>
                            </div>
                        </div>
                    </div>
<?php
endif;
    ?>
                </div>

                <div class="col-md-8">
                    <h3 class="card-sect-title">CONTACT INFORMATION </h3>
                    <div class="card mb-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->firstname .' '. $_participant_data_->lastname ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><a href="mailto:email"><?= $_participant_data_->email ?></a></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Telephone number 1</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><a href="tel:phone">+<?= $_participant_data_->telephone ?></a></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Telephone number 2</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><a href="tel:phone">+<?= $_participant_data_->telephone_2 ?></a></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->job_title ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Job category</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->job_category ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Language</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->language ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Gender</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->gender ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Date of birth</h6>
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
                    <h3 class="card-sect-title">ORGANIZATION</h3>
                    <div class="card mb-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Organization name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->organisation_name ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Organization type</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->organisation_type ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Industry</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->industry ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Organization Website</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <h6><a href="<?= $_participant_data_->website == ''?'#': $_participant_data_->website  ?>"><?= $_participant_data_->website ?></a></h6>
                                </div>
                            </div>
                            <hr>
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City / Country</h6>
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
                    <h3 class="card-sect-title">EDUCATION INSTITUTE</h3>
                    <div class="card mb-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Institute Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->educacation_institute_name ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Institute Type</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->educacation_institute_category ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Industry</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->educacation_institute_industry ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Institute Website</h6>
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
                    <h3 class="card-sect-title">ORGANIZATION</h3>
                    <div class="card mb-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Organization name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->organisation_name ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Media category</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->organisation_type ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Press card number </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->media_card_number ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Issuing authority</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                <h6><?= $_participant_data_->media_card_authority ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">City / Country</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= countryCodeToCountry($_participant_data_->organisation_country) ?> / <?= $_participant_data_->organisation_city ?></h6>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <h3 class="card-sect-title">TOOLS</h3>
                    <div class="card mb-3" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">List of equipment to be brought</h6>
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
                    <h3 class="card-sect-title">WHAT ARE YOUR OBJECTIVES FOR ATTENDING THIS CONGRESS?</h3>
                    <div class="card mb-3">
                        <div  class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">first objective</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6 style="text-align:left;"><?= $_participant_data_->attending_objective_1 ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
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
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6 class="mb-0">Where did you hear about us ? </h6>
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
                    <h3 class="card-sect-title">IDENTIFICATION</h3>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Type of ID document </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->id_type ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Document number </h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <h6><?= $_participant_data_->id_number ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">Country/ City of residence</h6>
                                </div>
                                <div class="col-sm-8 text-secondary">
                                    <h6><?= countryCodeToCountry($_participant_data_->residence_country) ?> / <?= $_participant_data_->residence_city ?></h6>
                                </div>
                            </div>
                         
                           
                        </div>
                    </div>
<?php
endif;
?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>