<?php
require_once 'admin/core/init.php';
// if(!isset($_SESSION['username'])) {
//     Redirect::to('login');
// }
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
			<h3>Africa Protected Areas Congress (APAC)</h3>
			<p>13-15 February 2022 | Kigali Rwanda</p>
		</div>
		<div class="inner-img">
			<img src="img/profile.jpg">
		</div>
		<div class="reg-datails">
			<div class="names">
				<h4>Kambale Mulwahali Clovis</h4>
				<h5> Cube communication Ltd</h5>
				<hr>
			</div>
		</div>
		<div class="qr-code">
			<img src="img/qr.png">
		</div>
		<div class="p-category">
			<h4>Production</h4>
		</div>

	</div>
    
</body>

</html>