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

			/** Upload The ID Document Picture */
			$id_document_picture = '';
			// if($_FILES['id_document_picture']['name']  != "")
			// 	$id_document_picture = Functions::fileUpload(DN_IMG_ID_DOC, $_FILES['id_document_picture']);
		
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
					'id_document_picture'  => $id_document_picture,

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
					/** Get Last Participant ID  */
					$_PID_ 		 = self::getLastPacipatantID();
					/** Generate Auth Token */
					$_AUTH_TOKEN = Hash::encryptAuthToken($_PID_);

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
				'AUTHTOKEN'     => $_AUTH_TOKEN,
				'ERRORS_STRING' => ""
			];
		}
	}

	public static function createEventParticipantPassword(){
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
			$password 			= $str->data_in($_EDIT['password']);
			$confirm_password 	= $str->data_in($_EDIT['confirm_password']);

			$eventId 	= $str->data_in($_EDIT['eventId']);
			$authtoken 	= $str->data_in($_EDIT['authtoken']);

			$_PID_ = Hash::decryptAuthToken($authtoken);

			/** Check If Valid $_PID_ And Exists In Participant Table */
			if(!is_integer($_PID_)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;

			if(!($_participant_ = self::getParticipantDataByID($_PID_))):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;

			/** Check If Password Match */
			if(strlen($password) < 6 || strlen($confirm_password) < 6):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Password must have at least 6 characters",
					'ERRORS_STRING' => "Password must have at least 6 characters"
				];
			endif;

			if($password != $confirm_password):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "password don't match",
					'ERRORS_STRING' => "password don't match"
				];
			endif;


			if($diagnoArray[0] == 'NO_ERRORS'){
				
				$_fields = array(
					'password'             => "",
					'salt'             	   => "",
				);

				try{
					$FutureEventParticipantTable->updateParticipant($_fields, $_PID_);
					/** Get Last Participant ID  */
					$_PID_ 		 = self::getLastPacipatantID();
					/** Generate Auth Token */
					$_AUTH_TOKEN 				  = $authtoken;
					$_PARTICIPATION_PAYMENT_TYPE_ = $_participant_->payment_state;

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
				'AUTHTOKEN'     => $_AUTH_TOKEN,
				'PARTICIPATIONPAYMENTTYPE'=> $_PARTICIPATION_PAYMENT_TYPE_,
				'ERRORS_STRING' => ""
			];
		}
	}

	public static function createEventParticipantPrivateLink(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'private-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		// $_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		
		if($validate->passed()){
			$FutureEventParticipantTable = new \FutureEvent();
			
			$str = new \Str();

			/** Contact Information */
			$firstname 						= $str->data_in($_EDIT['firstname']);
			$lastname  						= $str->data_in($_EDIT['lastname']);
			$email 				            = $str->data_in($_EDIT['email']);
			$_participation_sub_type_token  = $str->data_in($_EDIT['paticipation_sub_type']);
			$_event_token 					= $str->data_in($_EDIT['eventId']);

			$participation_sub_type_id      = Hash::decryptAuthToken($_participation_sub_type_token);
			$event_id					    = Hash::decryptAuthToken($_event_token);


			/** Get Particiption Type Id  */
			if(!($participation_type_data_ = self::getPacipationSubCategoryByID($participation_sub_type_id))):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;
			$participation_type_id = $participation_type_data_->id;

			/** Generated Link */
			$generated_link = '';
			$access_token = '';
			$access_generated_time = time();
			$access_expiry_time    = time();

			/** Check If Valid $_PID_ And Exists In Participant Table */
			if(!is_integer($participation_sub_type_id) || !is_integer($event_id)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;

			/** Check If Email Event Exitst  */
			if(self::checkIfEventPrivateLinkExists($event_id, $participation_type_id, $participation_sub_type_id, $email)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "This Email was already registered",
					'ERRORS_STRING' => "This Email was already registered"
				];
			endif;


			if($diagnoArray[0] == 'NO_ERRORS'){
				
				$_fields = array(
					'event_id'             		=> $event_id,
					'participation_type_id'     => $participation_type_id,
					'participation_sub_type_id' => $participation_sub_type_id,
					'firstname'             	=> $firstname,
					'lastname'             		=> $lastname,
					'email'             	    => $email,

					'generated_link'            => $generated_link,
					'access_token'              => $access_token,
					'access_generated_time'     => $access_generated_time,
					'access_expiry_time'        => $access_expiry_time,
					'link_used_time'            => 0,
					'link_used_status'         	=> 0,
					
					'reusable_state'            => 0,
					'status'            		=> 'PENDING',
					'creation_date'             => time()
				);

				try{
					$FutureEventParticipantTable->insertPrivateLink($_fields);

					/** Get Last Private Link Generated ID */
					$_ID_ 			= self::getLastID('future_private_links');
					$access_token	= Hash::encryptAuthToken($_ID_);
					$generated_link = self::generatePrivateInvitationLink($event_id, $access_token);

					/** Update Entry */
					$_update_fields_ = array(
						'generated_link'            => $generated_link,
						'access_token'              => $access_token,
						'status'            		=> 'ACTIVE',
					);
					$FutureEventParticipantTable->updatePrivateLink($_update_fields_, $_ID_);

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
				'EMAIL'     	=> $email,
				// 'PARTICIPATIONPAYMENTTYPE'=> $_PARTICIPATION_PAYMENT_TYPE_,
				'ERRORS_STRING' => ""
			];
		}
	}

	public static function updateEventParticipantPrivateLink(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'private-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		// $_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		
		if($validate->passed()){
			$FutureEventParticipantTable = new \FutureEvent();
			
			$str = new \Str();

			/** Get Id */
			$_ID_ = Hash::decryptToken($str->data_in($_EDIT['Id']));

			/** Contact Information */
			$firstname 						= $str->data_in($_EDIT['firstname']);
			$lastname  						= $str->data_in($_EDIT['lastname']);
			$email 				            = $str->data_in($_EDIT['email']);
			$_participation_sub_type_token  = $str->data_in($_EDIT['paticipation_sub_type']);
			$_event_token 					= $str->data_in($_EDIT['eventId']);

			$participation_sub_type_id      = Hash::decryptAuthToken($_participation_sub_type_token);
			$event_id					    = Hash::decryptAuthToken($_event_token);


			/** Get Particiption Type Id  */
			if(!($participation_type_data_ = self::getPacipationSubCategoryByID($participation_sub_type_id))):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;
			$participation_type_id = $participation_type_data_->id;

			/** Generated Link */
			$generated_link = '';
			$access_token = '';
			$access_generated_time = time();
			$access_expiry_time    = time();

			/** Check If Valid $_PID_ And Exists In Participant Table */
			if(!is_integer($participation_sub_type_id) || !is_integer($event_id)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;

			/** Check If Email Event Exitst  */
			// if(self::checkIfEventPrivateLinkExists($event_id, $participation_type_id, $participation_sub_type_id, $email)):
			// 	return (object)[
			// 		'ERRORS'		=> true,
			// 		'ERRORS_SCRIPT' => "This Email was already registered",
			// 		'ERRORS_STRING' => "This Email was already registered"
			// 	];
			// endif;
					
					/** Get Last Private Link Generated ID */
					// $_ID_ 			= self::getLastID('future_private_links');
					$access_token	= Hash::encryptAuthToken($_ID_);
					$generated_link = self::generatePrivateInvitationLink($event_id, $access_token);



			if($diagnoArray[0] == 'NO_ERRORS'){
				
				$_fields = array(
					// 'event_id'             		=> $event_id,
					'participation_type_id'     => $participation_type_id,
					'participation_sub_type_id' => $participation_sub_type_id,
					'firstname'             	=> $firstname,
					'lastname'             		=> $lastname,
					'email'             	    => $email,

					'generated_link'            => $generated_link,
					'access_token'              => $access_token,
					'access_generated_time'     => $access_generated_time,
					'access_expiry_time'        => $access_expiry_time,
					'link_used_time'            => 0,
					'link_used_status'         	=> 0,
					'status'            		=> 'ACTIVE',
					
				);

				try{
					$FutureEventParticipantTable->updatePrivateLink($_fields, $_ID_);


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
				'EMAIL'     	=> $email,
				// 'PARTICIPATIONPAYMENTTYPE'=> $_PARTICIPATION_PAYMENT_TYPE_,
				'ERRORS_STRING' => ""
			];
		}
	}

	public static function changeStatusParticipantPrivateLink($status = 'ACTIVE'){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'private-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		// $_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		
		if($validate->passed()){
			$FutureEventParticipantTable = new \FutureEvent();
			
			$str = new \Str();

			/** Get Id */
			$_ID_ = Hash::decryptToken($str->data_in($_EDIT['Id']));

			/** Check If Valid $_PID_ And Exists In Participant Table */
			if(!is_integer($_ID_)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;

			if($diagnoArray[0] == 'NO_ERRORS'){
				
				$_fields = array(
					'status'    => $status,
					
				);

				try{
					$FutureEventParticipantTable->updatePrivateLink($_fields, $_ID_);


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
				// 'EMAIL'     	=> $email,
				// 'PARTICIPATIONPAYMENTTYPE'=> $_PARTICIPATION_PAYMENT_TYPE_,
				'ERRORS_STRING' => ""
			];
		}
	}


	public static function createEventParticipationType(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'participation-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		// $_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		
		if($validate->passed()){
			$FutureEventParticipantTable = new \FutureEvent();
			
			$str = new \Str();

			/** Contact Information */
			$name 				= $str->data_in($_EDIT['name']);
			$payment_state  	= $str->data_in($_EDIT['payment_state']);
			$visibility_state 	= $str->data_in($_EDIT['visibility_state']);
			$form_order  		= $str->data_in($_EDIT['form_order']);
			$event_id			= Hash::decryptAuthToken($str->data_in($_EDIT['event_id']));

	
			/** Check If Valid $_PID_ And Exists In Participant Table */
			if(!is_integer($event_id)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;

			/** Check If Email Event Exitst  */
			if(self::checkIfEventParticipationTypeExists($event_id, $name)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "This Type was already registered",
					'ERRORS_STRING' => "This Type was already registered"
				];
			endif;


			if($diagnoArray[0] == 'NO_ERRORS'){
				$created_by = Session::get(Config::get('sessions/session_name'));
				
				$_fields = array(
					'name'              => $name,
					'payment_state'     => $payment_state,
					'event_level' 		=> 'SPECIFIC',
					'event_id'          => $event_id,
					'sub_type_state'    => 0,
					'visibility_state'  => $visibility_state,

					'form_order'        => $form_order,
					'status'            => 'ACTIVE',
					'created_by'     	=> $created_by,
					'creation_date'     => time()
				);

				try{
					$FutureEventParticipantTable->insertParticipationType($_fields);

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

	public static function updateEventParticipationType(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'participation-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		// $_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		if($validate->passed()){
			$FutureEventParticipantTable = new \FutureEvent();
			
			$str = new \Str();

			/** Get Id */
			$_ID_ = Hash::decryptToken($str->data_in($_EDIT['Id']));

			/** Particiaption Type Information */
			$name 				= $str->data_in($_EDIT['name']);
			$payment_state  	= $str->data_in($_EDIT['payment_state']);
			$visibility_state 	= $str->data_in($_EDIT['visibility_state']);
			$form_order  		= $str->data_in($_EDIT['form_order']);
			$event_id			= Hash::decryptAuthToken($str->data_in($_EDIT['event_id']));

			/** Check If Email Event Exitst  */
			if(self::checkIfEventParticipationTypeExists($event_id, $name, $Id)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "This Type was already registered",
					'ERRORS_STRING' => "This Type was already registered"
				];
			endif;


			if($diagnoArray[0] == 'NO_ERRORS'){
				$created_by = Session::get(Config::get('sessions/session_name'));
				
				$_fields = array(
					'name'              => $name,
					'payment_state'     => $payment_state,
					'event_id'          => $event_id,
					'visibility_state'  => $visibility_state,
					'form_order'        => $form_order,
				);

				try{
					$FutureEventParticipantTable->updateParticipationType($_fields, $_ID_);

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

	public static function changeStatusParticipationType($status = 'ACTIVE'){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'participation-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		// $_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		
		if($validate->passed()){
			$FutureEventParticipantTable = new \FutureEvent();
			
			$str = new \Str();

			/** Get Id */
			$_ID_ = Hash::decryptToken($str->data_in($_EDIT['Id']));

			/** Check If Valid $_PID_ And Exists In Participant Table */
			if(!is_integer($_ID_)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;

			if($diagnoArray[0] == 'NO_ERRORS'){
				
				$_fields = array(
					'status'    => $status,
				);

				try{
					$FutureEventParticipantTable->updateParticipationType($_fields, $_ID_);

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











	

	public static function createEventParticipationSubType(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'participation-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		// $_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		
		if($validate->passed()){
			$FutureEventTable = new \FutureEvent();
			
			$str = new \Str();

			/** Information */
			$name 					= $str->data_in($_EDIT['name']);
			$payment_state  		= $str->data_in($_EDIT['payment_state']);
			$price 			    	= $str->data_in($_EDIT['price']);
			$currency 				= $str->data_in($_EDIT['currency']);
			$category  				= $str->data_in($_EDIT['category']);
			$participation_type_id  = Hash::decryptAuthToken($str->data_in($_EDIT['participation_type']));

	
			/** Check If Valid $_PID_ And Exists In Participant Table */
			if(!is_integer($participation_type_id)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;

			/** Check If Email Event Exitst  */
			if(self::checkIfEventParticipationSubTypeExists($participation_type_id, $name)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "This Sub Type was already registered",
					'ERRORS_STRING' => "This Sub Type was already registered"
				];
			endif;


			if($diagnoArray[0] == 'NO_ERRORS'){
				$created_by = Session::get(Config::get('sessions/session_name'));
				
				$_fields = array(
					'participation_type_id' => $participation_type_id,
					'payment_state'     	=> $payment_state,
					'name'             		=> $name,
					'price' 				=> $price,
					'category'    			=> $category,
					'currency' 			 	=> $currency,
					'status'            	=> 'ACTIVE',
					'creation_date'    	 	=> time()
				);

				try{
					$FutureEventParticipantTable->insertParticipationSubType($_fields);

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

	public static function updateEventParticipationSubType(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'participation-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		// $_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		if($validate->passed()){
			$FutureEventParticipantTable = new \FutureEvent();
			
			$str = new \Str();

			/** Get Id */
			$_ID_ = Hash::decryptToken($str->data_in($_EDIT['Id']));

			/** Particiaption Type Information */
			$name 					= $str->data_in($_EDIT['name']);
			$payment_state  		= $str->data_in($_EDIT['payment_state']);
			$price 			    	= $str->data_in($_EDIT['price']);
			$currency 				= $str->data_in($_EDIT['currency']);
			$category  				= $str->data_in($_EDIT['category']);
			$participation_type_id  = Hash::decryptAuthToken($str->data_in($_EDIT['participation_type']));

			/** Check If Email Event Exitst  */
			if(self::checkIfEventParticipationSubTypeExists($participation_type_id, $name, $Id)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "This Sub Type was already registered",
					'ERRORS_STRING' => "This Sub Type was already registered"
				];
			endif;


			if($diagnoArray[0] == 'NO_ERRORS'){
				$created_by = Session::get(Config::get('sessions/session_name'));
				
				$_fields = array(
					'participation_type_id' => $participation_type_id,
					'payment_state'     	=> $payment_state,
					'name'             		=> $name,
					'price' 				=> $price,
					'category'    			=> $category,
					'currency' 			 	=> $currency,
				);

				try{
					$FutureEventParticipantTable->updateParticipationSubType($_fields, $_ID_);

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

	public static function changeStatusParticipationSubType($status = 'ACTIVE'){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'participation-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		// $_EDIT = $_POST;
		
		$validation = $validate->check($_EDIT, array(
			
		));
		
		if($validate->passed()){
			$FutureEventParticipantTable = new \FutureEvent();
			
			$str = new \Str();

			/** Get Id */
			$_ID_ = Hash::decryptToken($str->data_in($_EDIT['Id']));

			/** Check If Valid $_PID_ And Exists In Participant Table */
			if(!is_integer($_ID_)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid Data",
					'ERRORS_STRING' => "Invalid Data"
				];
			endif;

			if($diagnoArray[0] == 'NO_ERRORS'){
				
				$_fields = array(
					'status'    => $status,
				);

				try{
					$FutureEventParticipantTable->updateParticipationSubType($_fields, $_ID_);

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
							'participation_type_name' 			=> $_participation_type_->name,
							'participation_type_payment_state'  =>  $_participation_type_->payment_state,
							'participation_sub_type_id' 		=> $sub_type_->id,
							'participation_sub_type_name' 		=> $sub_type_->name, 
							'participation_sub_type_price' 		=> $sub_type_->price,
							'participation_sub_type_currency' 	=> $sub_type_->currency, 
						);
					endforeach;

				endif;
			endforeach;
			return $_array_data_;
		endif;
        return  false;
    }

	public static function getPrivatePacipationSubCategory($eventID, $eventType = 'INPERSON'){
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT future_participation_type.*, future_participation_sub_type.name As sub_type_name , future_participation_sub_type.id As sub_type_id, future_participation_sub_type.category As sub_type_category   FROM `future_participation_type`  INNER JOIN future_participation_sub_type ON future_participation_type.id = future_participation_sub_type.participation_type_id WHERE future_participation_type.event_id = {$eventID} AND future_participation_type.visibility_state =  0 ");
        if($FutureEventTable->count())
          return  $FutureEventTable->data();
        return  false;
    }

	public static function getGeneratedPrivateLinks($eventID){
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT future_private_links.* FROM future_private_links WHERE event_id = {$eventID} ORDER BY id DESC");
        if($FutureEventTable->count())
          return  $FutureEventTable->data();
        return  false;
    }

    public static function getPacipationSubCategoryByID($ID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT future_participation_type.*, future_participation_sub_type.name As sub_type_name  FROM `future_participation_type`  INNER JOIN future_participation_sub_type ON future_participation_type.id = future_participation_sub_type.participation_type_id WHERE future_participation_sub_type.id = {$ID} ");
        if($FutureEventTable->count())
          return  $FutureEventTable->first();
        return  false;
    }

	public static function getLastPacipatantID(){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT id FROM `future_participants` ORDER BY id DESC LIMIT 1 ");
        if($FutureEventTable->count())
          return  $FutureEventTable->first()->id;
        return  false;
    }

	public static function getLastID($_table_, $key = 'id'){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT $key FROM {$_table_} ORDER BY $key DESC LIMIT 1 ");
        if($FutureEventTable->count())
          return  $FutureEventTable->first()->id;
        return  false;
    }

	public static function getParticipantDataByID($ID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT future_participants.id, future_participation_type.name as participation_type_name, future_participation_sub_type.payment_state FROM `future_participants` INNER JOIN future_participation_type ON future_participants.participation_type_id = future_participation_type.id INNER JOIN future_participation_sub_type ON future_participants.participation_sub_type_id = future_participation_sub_type.id WHERE future_participants.id = {$ID} ORDER BY future_participants.id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  $FutureEventTable->first();
        return  false;
    }

	public static function getEventEndPointUrlRegistation($eventID ){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT url_registration from future_event WHERE id = $eventID ORDER BY id DESC LIMIT 1 ");
        if($FutureEventTable->count())
          return  $FutureEventTable->first()->url_registration;
        return  false;
    }

	public static function generatePrivateInvitationLink($event_id, $access_token){
		return self::getEventEndPointUrlRegistation($event_id).'/private/invitation/'.$access_token;
	}

	public static function checkIfEventPrivateLinkExists($event_id, $participation_type_id, $participation_sub_type_id, $email){
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT id from future_private_links WHERE event_id =? AND participation_type_id =? AND participation_sub_type_id =?  AND email =?  ORDER BY id DESC LIMIT 1 ", array($event_id, $participation_type_id, $participation_sub_type_id, $email));
        if($FutureEventTable->count())
          return  true;
        return  false;
	}
 
	public static function checkIfEventParticipationTypeExists($event_id, $name, $ID = null){
		$SQL_Condition_   = ($ID == null)?'':" AND id != {$ID} ";
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT id from future_participation_type WHERE event_id =? AND name =?  $SQL_Condition_ ORDER BY id DESC LIMIT 1 ", array($event_id, $name));
        if($FutureEventTable->count())
          return  true;
        return  false;
	}

	public static function checkIfEventParticipationSubTypeExists($participation_type_id, $name, $ID = null){
		$SQL_Condition_   = ($ID == null)?'':" AND id != {$ID} ";
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT id from future_participation_sub_type WHERE participation_type_id =? AND name =?  $SQL_Condition_ ORDER BY id DESC LIMIT 1 ", array($participation_type_id, $name));
        if($FutureEventTable->count())
          return  true;
        return  false;
	}
}