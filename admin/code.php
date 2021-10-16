<?php
//require_once "core/init.php"; 

// function regroupRecognizedWords($map_word){
// 	$array_rec = array(
// 		'Early bird' => 'early_bird',
		
// 	);
// 	foreach($array_rec As $recognized_key => $recognized_value)
// 		if(strpos($map_word, $recognized_key) !== false)
// 			$map_word = str_replace($recognized_key, $recognized_value, ($map_word));
	
// 	return $map_word;
// }

// echo regroupRecognizedWords('Early bird discounted rate Valid till 31st December 2021.
// $450 from 1st January 2021 _ 5th March 2022.');

// $REQ_DATA = array(
// 	'pay_amount'      	 => 230,
// 	'pay_currency'		 => 'USD',
// 	'pay_transactionID'	 => 'FS_800AP0023',

// 	'customer_token'	 => sha1('ezechielkalengya@gmail.com'),
// 	'customer_email'	 => 'ezechielkalengya@gmail.com',
// 	'customer_firstname' => 'Kalengya',
// 	'customer_lastname'  => 'Ezechiel',

// 	'service_description'=> 'Payment to participate to event.', # Ex. Pay My Event Entracy 
// 	'service_date'		 => '2021/12/27 08:23', #
// );
// try{
// 	$PaymentHandler = new \PaymentHandler; 
// 	$PAYMENT_REQ 	= $PaymentHandler->createToken($REQ_DATA);
// }catch(Exception $e){

// }


// 		echo '<pre>';
// 		print_r($PaymentHandler->_urlPayment);
// 		echo '</pre>';
		
// 		echo '<br><hr>';

// print('<script>window.location.href = "http://google.com";</script>');

//
// $_POST = array(
// 	'request' => 'submit-payment-request',
// 	'eventId' => Hash::encryptToken(8),
// 	'authtoken' => Hash::encryptAuthToken(28),
// 	'defaultMethod' => 'CC'
// );
//
// $_REQ_ = PaymentController::paymentTransactionRequest();
//
// 		echo '<pre>';
// 		print_r($_REQ_);
// 		echo '</pre>';
//		
// 		echo '<br><hr>';

//echo PaymentController::getIncrCountEntries(8);


/** Send Email */
//echo '__';
//
//$email = 'ezechielkalengya@gmail.com';
//$messa = 'This is the success test email';
//$subje = 'Email Test Server';
//
//$user = new \User;
//$user->send_mail($email,$messa,$subje);


echo $_SERVER['DOCUMENT_ROOT']."/apac/admin/config/json/properties.json";