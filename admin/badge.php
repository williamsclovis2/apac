<?php
require_once 'core/init.php';
require_once 'config/phpqrcode/qrlib.php';
// if(!isset($_SESSION['username'])) {
//     Redirect::to('login');
// }
if(!Input::checkInput('authtoken_', 'get', 1))
	Redirect::to('dashboarrd');


$_QR_CODE_ = Input::get('authtoken_', 'get');
$_QR_ID_   = FutureEventController::decodeQrString($_QR_CODE_);

/** Find Participant By Qr ID */
if(!($_participant_data_ = FutureEventController::getParticipantByQrID($_QR_ID_)))
	Redirect::to('404');


$_EVENT_NAME_ = $_participant_data_->event_name;

/** Handle Qr COde */
$_qrID_		= $_participant_data_->qrID;
$_qrEncoded_= "http://apacongress.torusguru.com/participant/ebadge/$_participant_data_->qrCode";
$_DR_		= DN_IMG_QR;
$_qrFilename_= $_qrID_.".png";
$_qrFile_ 	= $_DR_.$_qrFilename_;
QRcode::png($_qrEncoded_, $_qrFile_);

?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <?php include 'includes/head.php';?>
</head>

<body>
    <?php
        $getContent = DB::getInstance()->get('future_event', array('id', '=', $activeEventId));
        $banner     = $getContent->first()->banner;
        $event_name = $getContent->first()->event_name;
        $start_date = date('j', strtotime(dateFormat($getContent->first()->start_date)));
        $end_date   = date("j F Y", strtotime(dateFormat($getContent->first()->end_date)));
        $event_date = $start_date." - ".$end_date;
    ?>
    <div class="card-container">
		<div class="event-details">
			<h3> <?=$_EVENT_NAME_?> </h3>
			<p><?=$start_date?> - <?=$end_date?> | Kigali Rwanda</p>
		</div>
		<div class="inner-img">
			<img src="../../img/profile.jpg">
		</div>
		<div class="reg-datails">
			<div class="names">
				<h4>Kambale Mulwahali Clovis</h4>
				<h5> Cube communication Ltd</h5>
				<hr>
			</div>
		</div>
		<div class="qr-code">
			<img src="<?=VIEW_QR.$_qrFilename_?>">
		</div>
		<div class="p-category">
			<h4><?=$_participant_data_->participation_type_name?></h4>
		</div>

	</div>
    
</body>

</html>