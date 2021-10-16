<?php
class PaymentController
{
	public static function paymentTransactionRequest(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'pay';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_PAY[end($ar)] = $val;
			}
		}
		
		$validation = $validate->check($_PAY, array(
			
		));
		
		if($validate->passed()){
			$PaymentTable = new \Payment();
			$str 		  = new \Str();

			/** Information */
			$eventtoken 	= $str->data_in($_PAY['eventId']);
			$authtoken 		= $str->data_in($_PAY['authtoken']);
			$DefaultPayment = strtoupper($str->data_in($_PAY['defaultMethod']));
            
			if($DefaultPayment != 'CC' && $DefaultPayment != 'BT'):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data 1",
					'ERRORS_STRING' => "Invalid Data 1"
				];
			endif;

			$participation_id   = Hash::decryptAuthToken($authtoken);
			$event_id 			= Hash::decryptToken($eventtoken);

			/** Check If Valid $participation_id And Exists In Participant Table */
			if(!is_integer($participation_id)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data 22",
					'ERRORS_STRING' => "Invalid Data 22"
				];
			endif;

			/** Get Participant Details */
			if(!($_participant_data_ = FutureEventController::getEventParticipantDataByID($participation_id))):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid data 333",
					'ERRORS_STRING' => "Invalid data 333"
				];
			endif;

			if(($event_id != $_participant_data_->event_id)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid data 4444",
					'ERRORS_STRING' => "Invalid data 4444"
				];
			endif;

			/** Get Participant Details */
			if(!(self::checkIfEventParticipantHasAlreadySuccessfullyPaid($event_id, $participation_id))):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "You have already paid",
					'ERRORS_STRING' => "You have already paid"
				];
			endif;

			$participant_token  		= Hash::encryptAuthToken($_participant_data_->participant_id);
			$participation_type_id 		= $_participant_data_->participation_type_id;
			$participation_sub_type_id  = $_participant_data_->participation_sub_type_id;
			
			$payment_method     = '';
			$payment_operator   = '';

			/** Payment Information */
			$amount 			= $_participant_data_->participation_subtype_price;
			$currency 			= $_participant_data_->participation_subtype_currency;

			$transaction_id 	= self::generateTransactionID($event_id, $participation_id, $participation_type_id, $participation_sub_type_id);
			$transaction_source = 'WEB';
			$transaction_type   = 'PAY_EVENT';
			$transaction_time   = time();
			$transaction_token  = self::generateTransationToken($transaction_id);
			$transaction_status = 'PENDING';

			if($diagnoArray[0] == 'NO_ERRORS'){

				/** Initiate Payment Request - Create Payment Token */
				$PAY_REQ_DATA = array(
					'pay_amount'      	 => $amount,
					'pay_currency'		 => $currency,
					'pay_transactionID'	 => $transaction_id,
							
					'customer_token'	 => $participant_token,

					'customer_token'	 => $participant_token,
					'customer_email'	 => $_participant_data_->participant_email,
					'customer_firstname' => $_participant_data_->participant_firstname,
					'customer_lastname'  => $_participant_data_->participant_lastname,
				
					'service_description'=> 'Payment to participate to IUCN Africa Protected Areas Congress (APAC) Event.',  
					'service_date'		 => date('Y/m/d h:i', time()), 
				);

				$PaymentHandler = new \PaymentHandler(); 
				$PAYMENT_REQ 	= $PaymentHandler->createToken($PAY_REQ_DATA, $DefaultPayment);

				if(!$PAYMENT_REQ):
					return (object)[
						'ERRORS'		=> true,
						'ERRORS_SCRIPT' => "Failed to initiate your payment request",
						'ERRORS_STRING' => "Failed to initiate your payment request"
					];
				endif;
				$PAYMENT_REQ 	= (Object) $PAYMENT_REQ;
                

				$external_transaction_id     = '';
				$external_transaction_token  = '';

				if($PAYMENT_REQ->Success):
					$external_transaction_id     = $PAYMENT_REQ->TransRef;
					$external_transaction_token  = $PAYMENT_REQ->TransToken;
				endif;

				$external_transaction_status = $PAYMENT_REQ->Result;

				$payment_request_cmd  		 = '';
				$payment_request_time        = time();

				$payment_id           = '';
				$callback_cmd  		  = '';
				$callback_time        = '';
				
				$_fields = array(
					'event_id'            		  => $event_id,
					'participation_id'     		  => $participation_id,
					'participant_token'  		  => $participant_token,
					'participation_type_id'       => $participation_type_id,
					'participation_sub_type_id'   => $participation_sub_type_id,

					'transaction_id'       		  => $transaction_id,
					'transaction_source'   		  => $transaction_source,
					'transaction_type'     		  => $transaction_type,
					'transaction_time'     		  => $transaction_time,
					'transaction_token'    		  => $transaction_token,
					'transaction_status'    	  => $transaction_status,

					'external_transaction_id'     => $external_transaction_id,
					'external_transaction_token'  => $external_transaction_token,
					'external_transaction_status' => $external_transaction_status,

					'payment_method'     		  => $payment_method,
					'payment_operator'     		  => $payment_operator,
					'amount'     				  => $amount,
					'currency'     				  => $currency, 

					'payment_id'     			  => $payment_id,
					'payment_request_cmd'     	  => $payment_request_cmd,
					'payment_request_time'        => $payment_request_time,
					'callback_cmd'                => $callback_cmd,
					'callback_time'               => $callback_time,

					'c_date'                      => time(),
				);
                
                 echo '<pre>';
 		print_r($PAYMENT_REQ);
 		echo '</pre>';
		
 		echo '<br><hr>';

				$_payURL_  = NULL;
				try{
					$PaymentTable->insert($_fields);
					
					if($PAYMENT_REQ->Success)
						$_payURL_  = $PaymentHandler->getInitiatedPaymentRequestUrl();

				}catch(Exeption $e){
					$diagnoArray[0] = "ERRORS_FOUND";
					$diagnoArray[]  = $e->getMessage();
				}
			}
		}else{
			$diagnoArray[0] = 'ERRORS_FOUND';
			$error_msg 	    = ul_array($validation->errors());
		}
		if($diagnoArray[0] == 'ERRORS_FOUND'){
			return (object)[
				'ERRORS'		=> true,
				'ERRORS_SCRIPT' => $validate->getErrorLocation(),
				'ERRORS_STRING' => ""
			];
		}else{
			return (object)[
				'ERRORS'	    => false,
				'SUCCESS'	    => true,
				'ERRORS_SCRIPT' => "",
				'AUTHTOKEN'     => $authtoken,
				'PAYURL'		=> $_payURL_,
				'ERRORS_STRING' => ""
			];
		}
	}



    public static function checkIfEventParticipantHasAlreadySuccessfullyPaid($eventID, $participantID){
        $PaymentTable = new Payment();
        $PaymentTable->selectQuery("SELECT * FROM future_payment_transaction_entry WHERE event_id = {$eventID} AND  participant_id = {$participantID} AND transaction_status = 'COMPLETED' ORDER BY id DESC ");
        if($PaymentTable->count())
          return  true;
        return  false;
    }

	public static function generateTransactionID($event_id, $participation_id, $participation_type_id, $participation_sub_type_id){
		return "FS".$event_id."00-".date("y").$participation_id.$participation_type_id.$participation_sub_type_id.self::getIncrCountEntries($event_id).date("m").date("d").date("H").date("i");
	}

	public static function generateTransationToken($transaction_id){
		return md5(sha1($transaction_id.date('yh')));
	}

	public static function getIncrCountEntries($eventID){
        $PaymentTable = new Payment();
        $PaymentTable->selectQuery("SELECT COUNT(id) As count_total FROM future_payment_transaction_entry WHERE event_id = {$eventID}  ORDER BY id DESC  ");
        if($PaymentTable->count())
          return $PaymentTable->first()->count_total + 1;
        return 1;
    }

}


?>