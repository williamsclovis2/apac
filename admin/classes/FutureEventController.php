<?php
class FutureEventController  
{
	
	public static function registerEventParticipant(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = ' ';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		$_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		
		if($validate->passed()){
			$FutureEventParticipantTable = new \FutureEvent();
			
			$str = new \Str();


			/** Contact Information */
			$firstname 	= $str->sanAsName($_EDIT['firstname']);
			$lastname 	= $str->sanAsName($_EDIT['lastname']);
			$email	    = $str->data_in($_EDIT['email']);
			
			$telephone   = $str->data_in($_EDIT['telephone']);
			$telephone_2 = $str->data_in($_EDIT['telephone_2']);

			$gender 		   = $str->data_in($_EDIT['gender']);
			$birthday 		   = $str->data_in($_EDIT['birthday']);
			
			$job_title         = $str->data_in($_EDIT['job_title']);
			$job_category 	   = $str->data_in($_EDIT['job_category']);

			/**eventParticipation */
			$eventParticipationEncrypted = $str->data_in($_EDIT['eventParticipation']);
			$eventParticipationSubTypeID = Hash::decryptToken($eventParticipationEncrypted);

			/** Get Participation Type And Sub Type Event Details */
			$_participation_sub_type_data_ = self::getPacipationSubCategoryByID($eventParticipationSubTypeID);
			$eventParticipationTypeID	   = $_participation_sub_type_data_->id;

			/** Event */
			$eventID = $str->data_in(Hash::decryptToken($_EDIT['eventId']));


			/** Organization Information */
			$organisation_name 		 = !Input::checkInput('organisation_name', 'post', 1)?'':$str->data_in($_EDIT['organisation_name']);
			$organisation_type 		 = !Input::checkInput('organisation_type', 'post', 1)?'':$str->data_in($_EDIT['organisation_type']);
			$industry 	       		 = !Input::checkInput('industry', 'post', 1)?'':$str->data_in($_EDIT['industry']);

			$organisation_address    = !Input::checkInput('organisation_address', 'post', 1)?'':$str->data_in($_EDIT['organisation_address']);
			$line_one 	       		 = !Input::checkInput('line_one', 'post', 1)?'':$str->data_in($_EDIT['line_one']);
			$line_two         		 = !Input::checkInput('line_two', 'post', 1)?'':$str->data_in($_EDIT['line_two']);
			$organisation_country 	 = !Input::checkInput('organisation_country', 'post', 1)?'':$str->data_in($_EDIT['organisation_country']);
			$organisation_city       = !Input::checkInput('organisation_city', 'post', 1)?'':$str->data_in($_EDIT['organisation_city']);

			$postal_code 	 		 = !Input::checkInput('postal_code', 'post', 1)?'':$str->data_in($_EDIT['postal_code']);
			$website       	 		 = !Input::checkInput('website', 'post', 1)?'':$str->data_in($_EDIT['website']);


			/** Identification - When In Person Event */
			$residence_country = !Input::checkInput('residence_country', 'post', 1)?'':$str->data_in($_EDIT['residence_country']);
			$residence_city    = !Input::checkInput('residence_city', 'post', 1)?'':$str->data_in($_EDIT['residence_city']);
			$citizenship 	   = !Input::checkInput('citizenship', 'post', 1)?'':$str->data_in($_EDIT['citizenship']);
			$id_type           = !Input::checkInput('id_type', 'post', 1)?'':$str->data_in($_EDIT['id_type']);
			$id_number 		   = !Input::checkInput('id_number', 'post', 1)?'':$str->data_in($_EDIT['id_number']);

			
			/** Media Information */
			$media_card_number 	  	= !Input::checkInput('media_card_number', 'post', 1)?'':$str->data_in($_EDIT['media_card_number']);
			$media_card_authority 	= !Input::checkInput('media_card_authority', 'post', 1)?'':$str->data_in($_EDIT['media_card_authority']);
			$media_equipment        = !Input::checkInput('media_equipment', 'post', 1)?'':$str->data_in($_EDIT['media_equipment']);
			$special_request 		= !Input::checkInput('special_request', 'post', 1)?'':$str->data_in($_EDIT['special_request']);
			$delegate_type        	= !Input::checkInput('delegate_type', 'post', 1)?'':$str->data_in($_EDIT['delegate_type']);


			/** Media Information */
			$educacation_institute_name 	  	= !Input::checkInput('educacation_institute_name', 'post', 1)?'':$str->data_in($_EDIT['educacation_institute_name']);
			$educacation_institute_category 	= !Input::checkInput('educacation_institute_category', 'post', 1)?'':$str->data_in($_EDIT['educacation_institute_category']);
			$educacation_institute_industry     = !Input::checkInput('educacation_institute_industry', 'post', 1)?'':$str->data_in($_EDIT['educacation_institute_industry']);
			$educacation_institute_website 		= !Input::checkInput('educacation_institute_website', 'post', 1)?'':$str->data_in($_EDIT['educacation_institute_website']);
			$educacation_institute_country      = !Input::checkInput('educacation_institute_country', 'post', 1)?'':$str->data_in($_EDIT['educacation_institute_country']);
			$educacation_institute_city         = !Input::checkInput('educacation_institute_city', 'post', 1)?'':$str->data_in($_EDIT['educacation_institute_city']);

			if($diagnoArray[0] == 'NO_ERRORS'){
				
				$_fields = array(
					'event_id'             		=> $eventID,
					'participation_type_id'     => $eventParticipationTypeID,
					'participation_sub_type_id' => $eventParticipationSubTypeID,

					'firstname'            => $firstname,
					'lastname'             => $lastname,
					'email'                => $email,
					'password'             => "",
					'salt'             	   => "",

					'telephone'            => $telephone,
					'telephone_2'          => $telephone_2,

					'gender'               => $gender,
					'birthday'             => $birthday,
					'organisation_name'    => $organisation_name,
					'organisation_type'    => $organisation_type,
					'industry'             => $industry,
					'job_title'            => $job_title,
					'job_category'         => $job_category,
					'organisation_address' => $organisation_address,
					'line_one'             => $line_one,
					'line_two'             => $line_two,
					'organisation_country' => $organisation_country,
					'organisation_city'    => $organisation_city,

					'postal_code'          => $postal_code,
					'website'              => $website,

					'residence_country'    => $residence_country,
					'residence_city'       => $residence_city,
					'citizenship'          => $citizenship,
					'id_type'              => $id_type,
					'id_number'            => $id_number,

					'media_card_number'    => $media_card_number,
					'media_card_authority' => $media_card_authority,
					'media_equipment'      => $media_equipment,
					'special_request'      => $special_request,
					'delegate_type'        => "",

					'reg_date'             => date('Y-m-d H:i:s'),
					'status'               => "PENDING",
					
					'educacation_institute_name'      => $educacation_institute_name,
					'educacation_institute_category'  => $educacation_institute_category,
					'educacation_institute_industry'  => $educacation_institute_industry,
					'educacation_institute_website'   => $educacation_institute_website,
					'educacation_institute_country'   => $educacation_institute_country,
					'educacation_institute_city'      => $educacation_institute_city,
				);

            
				try{
					$FutureEventParticipantTable->insertParticipant($_fields);

					/** Send Email To Participant */

					
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
				'ERRORS_STRING' => ""
			];
		}
	}

    public static function getActivePacipationCategoryByEventID($eventID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT id,name, payment_state, virtual_price, inperson_price, sub_type_state, currency FROM future_participation_type WHERE event_id = {$eventID} AND status = 'ACTIVE' AND visibility_state = 1  ");
        if($FutureEventTable->count())
          return  $FutureEventTable->data();
        return  false;
    }

    public static function getPacipationCategoryByID($ID){ 
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT * FROM `future_participation_type` WHERE id = {$ID} ");
        if($FutureEventTable->count())
          return  $FutureEventTable->first();
        return  false;
    }
		
    public static function getActivePacipationSubCategoryByPartcipationTypeID($participation_type_Id, $eventType = 'INPERSON'){
		$FutureEventTable 		 = new FutureEvent();
		$FutureEventTable->selectQuery("SELECT * FROM future_participation_sub_type WHERE participation_type_id = {$participation_type_Id} AND category = '{$eventType}' AND status = 'ACTIVE'  ");
		if($FutureEventTable->count())
			return  $FutureEventTable->data();
        return  false;
    }
			
    public static function getVisiblePacipationSubCategory($eventID, $eventType = 'INPERSON'){
		if(($_participation_type_data_ = self::getActivePacipationCategoryByEventID($eventID))): 
			$_array_data_ = array();
			foreach($_participation_type_data_ As $_participation_type_):

				if(($_participation_sub_type_data_  = self::getActivePacipationSubCategoryByPartcipationTypeID($_participation_type_->id, $eventType))):
					foreach($_participation_sub_type_data_ As $sub_type_):
						$_array_data_[] = array(
							'participation_type_name' => $_participation_type_->name,
							'participation_type_payment_state' =>  $_participation_type_->payment_state,
							'participation_sub_type_id' => $sub_type_->id,
							'participation_sub_type_name' => $sub_type_->name, 
							'participation_sub_type_price' => $sub_type_->price,
							'participation_sub_type_currency' => $sub_type_->currency, 
						);
					endforeach;

				endif;
			endforeach;
			return $_array_data_;
		endif;
        return  false;
    }

    public static function getPacipationSubCategoryByID($ID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT future_participation_type.*, future_participation_sub_type.name As sub_type_name  FROM `future_participation_type`  INNER JOIN future_participation_sub_type ON future_participation_type.id = future_participation_sub_type.participation_type_id WHERE future_participation_sub_type.id = {$ID} ");
        if($FutureEventTable->count())
          return  $FutureEventTable->first();
        return  false;
    }
		

 
}