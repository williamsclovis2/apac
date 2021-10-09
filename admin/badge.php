<?php
require_once 'core/init.php';
require_once 'config/phpqrcode/qrlib.php';

// if(!isset($_SESSION['username']))
//     Redirect::to('login');

if(!Input::checkInput('authtoken_', 'get', 1))
	Redirect::to('dashboarrd');


$_QR_CODE_ = Input::get('authtoken_', 'get');
$_QR_ID_   = FutureEventController::decodeQrString($_QR_CODE_);

/** Find Participant By Qr ID */
if(!($_participant_data_ = FutureEventController::getParticipantByQrID($_QR_ID_)))
	Redirect::to('404');


$getContent   = DB::getInstance()->get('future_event', array('id', '=', $activeEventId));
$banner       = $getContent->first()->banner;
$event_name   = $getContent->first()->event_name;
$start_date   = date('j', strtotime(dateFormat($getContent->first()->start_date)));
$end_date     = date("j F Y", strtotime(dateFormat($getContent->first()->end_date)));
$event_date   = $start_date." - ".$end_date;

$_EVENT_NAME_ 		       = $_participant_data_->event_name;
$_PARTICIPANT_FULL_NAME_   = $_participant_data_->firstname.' '.$_participant_data_->lastname;
$_COMPANY_NAME_			   = 'Cube communication Ltd';
$_EVENT_START_END_DATE_    = $start_date.' - '.$end_date;
$_EVENT_ADDRESS_	       = 'Kigali Rwanda';
$_PARTICIPANT_PROFILE_     = $_participant_data_->profile != null? VIEW_PROFILE.$_participant_data_->profile: "https://bootdey.com/img/Content/avatar/avatar7.png";

$_PARTICIPATION_TYPE_NAME_ = $_participant_data_->participation_type_name;

/** Handle Qr COde */
$_qrID_		= $_participant_data_->qrID;
$_qrEncoded_= "http://apacongress.torusguru.com/participant/ebadge/$_participant_data_->qrCode";
$_DR_		= DN_IMG_QR;
$_qrFilename_= $_qrID_.".png";
$_qrFile_ 	= $_DR_.$_qrFilename_;
QRcode::png($_qrEncoded_, $_qrFile_);

$_PARTICIPANT_QR_IMAGE_    = VIEW_QR.$_qrFilename_;
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include 'includes/head.php';?>
	<style>
		body {
			font-family: ubuntu-light;
			background-color: #c2d4d79e;
			font-size: 13px;
			overflow-x: hidden;
		}
		.card-container {
			width: 300px;
			height: 430px;
			background: #fff;
			background-image: url(../img/banner/badgebg.png);
			background-repeat: no-repeat;
			background-size: cover;
			border-radius: 6px;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			box-shadow: 0px 0px 0px 0px #f1f1f1;
			overflow: hidden;
			display: inline-block;
		}
		.p-category {
			margin: auto;
			text-align: center;
			padding: 8px 0;
			background: #37af47;
			bottom: 0;
			margin-top: 49px;
		}
		.inner-img {
			width: 106px;
			height: 100px;
			border-radius: 100%;
			border: 0px solid #fff;
			margin: auto;
			text-align: center;
			margin-top: -50px;
		}
	</style>
</head>

<body>
    <div class="card-container">
		<div class="event-details">
			<h3> <?=$_EVENT_NAME_?> </h3>
			<p>  <?=$_EVENT_START_END_DATE_?> | <?=$_EVENT_ADDRESS_?> </p>
		</div>
		<div class="inner-img">
			<img src="<?=$_PARTICIPANT_PROFILE_?>">
		</div>
		<div class="reg-datails">
			<div class="names">
				<h4> <?=$_PARTICIPANT_FULL_NAME_?> </h4>
				<h5> <?=$_COMPANY_NAME_ ?></h5>
				<hr>
			</div>
		</div>
		<div class="qr-code">
			<img src="<?=$_PARTICIPANT_QR_IMAGE_?>">
		</div>
		<div class="p-category">
			<h4><?=$_PARTICIPATION_TYPE_NAME_?></h4>
		</div>

	</div>
    
</body>

</html>