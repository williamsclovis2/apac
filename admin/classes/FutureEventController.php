<?php
class FutureEventController  
{
	
	public static function registerEventParticipant($_REGISTRATION_STATE_ = 'PUBLIC'){
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

			
			/**eventParticipation */
			$eventParticipationEncrypted   = $str->data_in($_EDIT['eventParticipation']);
			$eventParticipationSubTypeID   = Hash::decryptToken($eventParticipationEncrypted);

			/** Get Participation Type And Sub Type Event Details */
			$_participation_sub_type_data_ = self::getPacipationSubCategoryByID($eventParticipationSubTypeID);
			$eventParticipationTypeID	   = $_participation_sub_type_data_->id;
			$_PARTICIPATION_PAYMENT_TYPE_  = $_participation_sub_type_data_->sub_type_payment_state;
			$_PARTICIPATION_TYPE_CODE_     = $_participation_sub_type_data_->code;

			$_MEDIA_CODE_  = 'C004';
			$_CBO_CODE_    = 'C0015';

			$_PARTICIPATION_TYPE_CODEANAME_ = $_PARTICIPATION_TYPE_CODE_ == $_CBO_CODE_?'CBO':'';

			/** Event */
			$eventID = $str->data_in(Hash::decryptToken($_EDIT['eventId']));


			/** PRIVATE REGISTRATION */
			$_REGISTRATION_PRIVATE_ACCESS_TOKEN_ = NULL;
			$_private_link_ID 					 = NULL;
			if($_REGISTRATION_STATE_ == 'PRIVATE'):
				$_REGISTRATION_PRIVATE_ACCESS_TOKEN_ = $str->data_in($_EDIT['eventInvitation']);
				$_private_link_ID 					 = Hash::decryptAuthToken($_REGISTRATION_PRIVATE_ACCESS_TOKEN_);

				/** Check If Private Link Exists And still valid */
				if(!self::checkValidityEventPrivateInvitationLink($_private_link_ID)):
					return (object)[
						'ERRORS'		=> true,
						'ERRORS_SCRIPT' => "Your invitation token is no longer valid",
						'ERRORS_STRING' => "Your invitation token is no longer valid"
					];
				endif;

				$_private_link_data_ = self::getEventPrivateInvitationLinkDataByID($_private_link_ID);

				/** Compare Private Data With Form Data */
				if($_private_link_data_->event_ID != $eventID || 
					$_private_link_data_->participation_type_ID != $eventParticipationTypeID ||
					$_private_link_data_->participation_sub_type_ID != $eventParticipationSubTypeID ):
					return (object)[
						'ERRORS'		=> true,
						'ERRORS_SCRIPT' => "Invalid data",
						'ERRORS_STRING' => "Invalid data"
					];
				endif;


			endif;

			/** Contact Information */
			$firstname         = $str->sanAsName($_EDIT['firstname']);
			$lastname 		   = $str->sanAsName($_EDIT['lastname']);
			$email	           = $str->data_in($_EDIT['email']);
			
			$telephone         = $str->data_in($_EDIT['telephone']);
			$telephone_2	   = $str->data_in($_EDIT['telephone_2']);

			$gender 		   = $str->data_in($_EDIT['gender']);
			$birthday 		   = $str->data_in($_EDIT['birthday']);
			
			$job_title         = $str->data_in($_EDIT['job_title']);
			$job_category 	   = $str->data_in($_EDIT['job_category']);
			$language	 	   =!Input::checkInput('language', 'post', 1)?'': $str->data_in($_EDIT['language']);

			/** Participant Password */
			$password 			= $str->data_in($_EDIT['password']);
			$confirm_password 	= $str->data_in($_EDIT['confirm_password']);

			/** Attending Objective Information */
			$firt_objective 		 = !Input::checkInput('firt_objective', 'post', 1)?'':$str->data_in($_EDIT['firt_objective']);
			$second_objective 		 = !Input::checkInput('second_objective', 'post', 1)?'':$str->data_in($_EDIT['second_objective']);
			$third_objective 	     = !Input::checkInput('third_objective', 'post', 1)?'':$str->data_in($_EDIT['third_objective']);

			/** Source Information */
			$info_source 		 	 = !Input::checkInput('info_source', 'post', 1)?'':$str->data_in($_EDIT['info_source']);

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
			$residence_country 		 = !Input::checkInput('residence_country', 'post', 1)?'':$str->data_in($_EDIT['residence_country']);
			$residence_city    		 = !Input::checkInput('residence_city', 'post', 1)?'':$str->data_in($_EDIT['residence_city']);
			$citizenship 	  		 = !Input::checkInput('citizenship', 'post', 1)?'':$str->data_in($_EDIT['citizenship']);
			$id_type          		 = !Input::checkInput('id_type', 'post', 1)?'':$str->data_in($_EDIT['id_type']);
			$id_number 		  		 = !Input::checkInput('id_number', 'post', 1)?'':$str->data_in($_EDIT['id_number']);

			/** Media Information */
			$media_card_number 	  	= !Input::checkInput('media_card_number', 'post', 1)?'':$str->data_in($_EDIT['media_card_number']);
			$media_card_authority 	= !Input::checkInput('media_card_authority', 'post', 1)?'':$str->data_in($_EDIT['media_card_authority']);
			$media_equipment        = !Input::checkInput('media_equipment', 'post', 1)?'':$str->data_in($_EDIT['media_equipment']);
			$special_request 		= !Input::checkInput('special_request', 'post', 1)?'':$str->data_in($_EDIT['special_request']);
			$delegate_type        	= !Input::checkInput('delegate_type', 'post', 1)?'':$str->data_in($_EDIT['delegate_type']);

			/** Media Information */
			$educacation_institute_name 	  	= !Input::checkInput('institute_name', 'post', 1)?'':$str->data_in($_EDIT['institute_name']);
			$educacation_institute_category 	= !Input::checkInput('institute_category', 'post', 1)?'':$str->data_in($_EDIT['institute_category']);
			$educacation_institute_industry     = !Input::checkInput('institute_industry', 'post', 1)?'':$str->data_in($_EDIT['institute_industry']);
			$educacation_institute_website 		= !Input::checkInput('institute_website', 'post', 1)?'':$str->data_in($_EDIT['institute_website']);
			$educacation_institute_country      = !Input::checkInput('institute_country', 'post', 1)?'':$str->data_in($_EDIT['institute_country']);
			$educacation_institute_city         = !Input::checkInput('institute_city', 'post', 1)?'':$str->data_in($_EDIT['institute_city']);

			/** Student State - When An Youth Or Student regsiters - */
			$student_state = 0;
			if($educacation_institute_name != '' && $educacation_institute_category != '' )
				$student_state = 1;

			/** Upload The ID Document Picture */
			$id_document_picture = '';
			if(isset($_FILES['id_document_picture']))
				if($_FILES['id_document_picture']['name']  != "")
					$id_document_picture = Functions::fileUpload(DN_IMG_ID_DOC, $_FILES['id_document_picture']);

			
			/** Upload The ID Document Picture */
			$profile = '';
			if(isset($_FILES['image']))
				if($_FILES['image']['name']  != "")
					$profile = Functions::fileUpload(DN_IMG_PROFILE, $_FILES['image']);

			/** Check If Email Address not yet used */
			if(self::checkEmailAlreadyUsed($eventID, $email)):
				// return (object)[
				// 	'ERRORS'		=> true,
				// 	'ERRORS_SCRIPT' => "This email address has already been used!",
				// 	'ERRORS_STRING' => "This email address has already been used!"
				// ];
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

			/** Need Accommodation */
			$needAccommodation = !Input::checkInput('needAccommodation', 'post', 1)?0:$str->data_in($_EDIT['needAccommodation']);


			/** Check Age - [ 10 - ] */
			if($diagnoArray[0] == 'NO_ERRORS'){

				/** Auto Generate QR For Participant */
				$participantID = self::getLastPacipatantID() + 1;
				$Qr_ 		   = FutureEventController::generateQrID($eventID, $participantID);
				
				$_fields = array(
					'event_id'             		=> $eventID,
					'participation_type_id'     => $eventParticipationTypeID,
					'participation_sub_type_id' => $eventParticipationSubTypeID,
					'private_link_id'			=> $_private_link_ID,

					'firstname'            => $firstname,
					'lastname'             => $lastname,
					'email'                => $email,
					'password'             => md5($password),
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
					
					'student_state'					  => $student_state,
					'educacation_institute_name'      => $educacation_institute_name,
					'educacation_institute_category'  => $educacation_institute_category,
					'educacation_institute_industry'  => $educacation_institute_industry,
					'educacation_institute_website'   => $educacation_institute_website,
					'educacation_institute_country'   => $educacation_institute_country,
					'educacation_institute_city'      => $educacation_institute_city,

					'attending_objective_1'   => $firt_objective,
					'attending_objective_2'   => $second_objective,
					'attending_objective_3'   => $third_objective,
					'info_source'   		  => $info_source,
					
					'profile'   => $profile,

					'qrID'   	=> $Qr_->ID,
					'qrCode'    => $Qr_->STRING,

					'need_accommodation_state' => $needAccommodation
				);

            
				try{
					$FutureEventParticipantTable->insertParticipant($_fields);
					/** Get Last Participant ID - Generate Auth Token */
					$_PID_ 		 = self::getLastPacipatantID();
					$_AUTH_TOKEN = Hash::encryptAuthToken($_PID_);

					/** Update Private Link Data After Registration */
					if($_REGISTRATION_STATE_ == 'PRIVATE' && $_private_link_ID != ''):
						self::updatePrivateLinkDataAfterRegistration($_private_link_ID);
					endif;

					/** Send Email To Participant */
					$_data_ = array(
						'email' 	=> $email,
						'firstname' => $firstname,
					);
					self::autoSentEmailOnAction($_data_, $_PARTICIPATION_PAYMENT_TYPE_, $_PARTICIPATION_TYPE_CODE_, $_CBO_CODE_, $_MEDIA_CODE_);
					

					
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
				'PARTICIPATIONTYPE' => $_PARTICIPATION_TYPE_CODEANAME_,
				'ERRORS_STRING' => ""
			];
		}
	}

	public static function autoSentEmailOnAction($_data_, $_PARTICIPATION_PAYMENT_TYPE_ = 'FREE', $_PARTICIPATION_TYPE_CODE_ = 'C004', $_CBO_CODE_ = 'C004', $_MEDIA_CODE_ = 'C004'){
		/** FREE Application */
		if($_PARTICIPATION_PAYMENT_TYPE_ == 'FREE'):
			/** Check If It Media */
			if($_PARTICIPATION_TYPE_CODE_ == $_MEDIA_CODE_)
				EmailController::sendEmailToParticipantAfterMediaApplication($_data_);

			/** Free Application */
			else
				EmailController::sendEmailToParticipantAfterSuccessfulRegistrationFree($_data_);

		/** Paybale Registration */
		elseif($_PARTICIPATION_PAYMENT_TYPE_ == 'PAYABLE'):
			/** Local CBO  */
			if($_PARTICIPATION_TYPE_CODE_ == $_CBO_CODE_)
				EmailController::sendEmailToParticipantAfterCBOApllication($_data_);

		endif;
	}

	public static function updatePrivateLinkDataAfterRegistration($_private_link_ID){
		$_data_fields_ = array(
			'link_used_time' 	=> time(),
			'link_used_status'  => 1,
			'status' 			=> 'USED'
		);	
		self::updatePrivateLinkData($_data_fields_, $_private_link_ID);
	}

	
	public static function changeStatusParticipantRegistration($status = 'APPROVED'){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'participant-';
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
					$FutureEventParticipantTable->updateParticipant($_fields, $_ID_);

					/** Get Event Private Invitation Link  By ID */
					$_participant_data_ = self::getEventParticipantDataByID($_ID_);

					/** Send Email To Participant */
					$status = $status == 'APPROVED'?'Approved':'Denied';
					$_data_ = array(
						'email'     => $_participant_data_->participant_email, 
						'firstname' => $_participant_data_->participant_firstname,
						'fullname'  => $_participant_data_->participant_lastname,
					
						'event'                 => $_participant_data_->event_name,
						'event_type'            => $_participant_data_->event_category,
						'participation_type'    => $_participant_data_->participation_type_name,
						'participation_subtype' => $_participant_data_->participation_subtype_name,
						'price'                 => $_participant_data_->participation_subtype_price,
						'currency'              => $_participant_data_->participation_subtype_currency,
						'status'                => $status,
					);

					EmailController::sendEmailToParticipantOnStatusChanged($_data_);
					
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

			/** Get Participant Details */
			if(!($_participant_data_ = self::getEventParticipantDataByID($_PID_))):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "Invalid data",
					'ERRORS_STRING' => "Invalid data"
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
					'password'             => md5($password),
					'salt'             	   => "",
				);

				try{
					$FutureEventParticipantTable->updateParticipant($_fields, $_PID_);
			
					/** Generate Auth Token */
					$_AUTH_TOKEN 				  = $authtoken;
					$_PARTICIPATION_PAYMENT_TYPE_ = $_participant_data_->payment_state;

					/** Send Email To Participant */
					$_data_ = array(
						'email'     => $_participant_data_->participant_email, 
						'firstname' => $_participant_data_->participant_firstname,
						'fullname'  => $_participant_data_->participant_lastname,
					
						'event'                 => $_participant_data_->event_name,
						'event_type'            => $_participant_data_->event_category,
						'participation_type'    => $_participant_data_->participation_type_name,
						'participation_subtype' => $_participant_data_->participation_subtype_name,
						'price'                 => $_participant_data_->participation_subtype_price,
						'currency'              => $_participant_data_->participation_subtype_currency,
					);

					switch($_participant_data_->payment_state):
						case 'PAYABLE':
							EmailController::sendEmailToParticipantOnRegistrationPayable($_data_);
							break;
						case 'FREE':
							EmailController::sendEmailToParticipantOnRegistrationFree($_data_);
							break;
					endswitch;
					
					
					
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
		$validate 		= new \Validate();
		$prfx 			= 'private-';
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

			/** Check If Participant Email Not yet Used */
			if(self::checkIfPrivateLinkEmailAlreadyUsed($event_id, $participation_sub_type_id, $email)):
				return (object)[
					'ERRORS'		=> true,
					'ERRORS_SCRIPT' => "This E-mail address has been used",
					'ERRORS_STRING' => "This E-mail address has been used"
				];
			endif;

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
			$access_token   = '';
			$access_generated_time = time();
			$access_expiry_time    = self::getEventPrivateLinkAccessExpirationTime($event_id);

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

					/** Get Event Private Invitation Link  By ID */
					$_participant_data_ = self::getEventPrivateLinkDataByID($_ID_);

					/** Send Email To Participant */
					$_data_ = array(
						'email'     => $_participant_data_->participant_email, 
						'firstname' => $_participant_data_->participant_firstname,
						'fullname'  => $_participant_data_->participant_lastname,
					
						'event'                 => $_participant_data_->event_name,
						'event_type'            => $_participant_data_->event_category,
						'participation_type'    => $_participant_data_->participation_type_name,
						'participation_subtype' => $_participant_data_->participation_subtype_name,
						'price'                 => $_participant_data_->participation_subtype_price,
						'currency'              => $_participant_data_->participation_subtype_currency,
						'generated_link'        => $_participant_data_->generated_link,
					);

					EmailController::sendEmailToParticipantOnLinkGenerated($_data_);
					
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

					/** Get Event Private Invitation Link  By ID */
					$_participant_data_ = self::getEventPrivateLinkDataByID($_ID_);

					/** Send Email To Participant */
					$status = $status == 'ACTIVE'?'Activated':'Deactivated';
					$_data_ = array(
						'email'     => $_participant_data_->participant_email, 
						'firstname' => $_participant_data_->participant_firstname,
						'fullname'  => $_participant_data_->participant_lastname,
					
						'event'                 => $_participant_data_->event_name,
						'event_type'            => $_participant_data_->event_category,
						'participation_type'    => $_participant_data_->participation_type_name,
						'participation_subtype' => $_participant_data_->participation_subtype_name,
						'price'                 => $_participant_data_->participation_subtype_price,
						'currency'              => $_participant_data_->participation_subtype_currency,
						'status'                => $status,
					);

					EmailController::sendEmailToParticipantOnLinkStatusChanged($_data_);
					
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
			$event_id			= Hash::decryptAuthToken($str->data_in($_EDIT['eventId']));

	
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
			$event_id			= Hash::decryptAuthToken($str->data_in($_EDIT['eventId']));

			/** Check If Email Event Exitst  */
			if(self::checkIfEventParticipationTypeExists($event_id, $name, $_ID_)):
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
			if(self::checkIfEventParticipationSubTypeExists($participation_type_id, $category, $name)):
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
					$FutureEventTable->insertParticipationSubType($_fields);

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

			/** Price is 0 For Free Event */
			if($payment_state == 'FREE')
				$price = 0;

			/** Check If Email Event Exitst  */
			if(self::checkIfEventParticipationSubTypeExists($participation_type_id, $category, $name, $_ID_)):
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


    public static function getPacipationTypeyByEventID($eventID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT * FROM future_participation_type WHERE event_id = {$eventID} ORDER BY name ASC ");
        if($FutureEventTable->count())
          return  $FutureEventTable->data();
        return  false;
    }

    public static function getPacipationSubType($eventID, $TypeID = null){
		$SQL_Condition_	  = ($TypeID == null)?'':" AND future_participation_sub_type.participation_type_id = {$TypeID}";
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT future_participation_type.id as type_ID, future_participation_type.name as type_name, future_participation_type.visibility_state as type_visibility,  future_participation_sub_type.* FROM future_participation_sub_type INNER JOIN future_participation_type ON future_participation_type.id = future_participation_sub_type.participation_type_id WHERE event_id = {$eventID} $SQL_Condition_ ORDER BY future_participation_sub_type.id ASC ");
        if($FutureEventTable->count())
          return  $FutureEventTable->data();
        return  false;
    }
	
	public static function getActivePacipationCategoryByEventID($eventID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT * FROM future_participation_type WHERE event_id = {$eventID} AND status = 'ACTIVE' AND visibility_state = 1  ");
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
							'participation_type_payment_state'  => $_participation_type_->payment_state,
							'participation_sub_type_id' 		=> $sub_type_->id,
							'participation_sub_type_name' 		=> $sub_type_->name, 
							'participation_sub_type_price' 		=> $sub_type_->price,
							'participation_sub_type_currency' 	=> $sub_type_->currency, 
							'participation_type_form_order' 	=> $_participation_type_->form_order, 
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
        $FutureEventTable->selectQuery("SELECT future_participation_type.*, future_participation_sub_type.name As sub_type_name, future_participation_sub_type.price as sub_type_price, future_participation_sub_type.currency As sub_type_currency, future_participation_sub_type.payment_state AS sub_type_payment_state  FROM `future_participation_type`  INNER JOIN future_participation_sub_type ON future_participation_type.id = future_participation_sub_type.participation_type_id WHERE future_participation_sub_type.id = {$ID} ");
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

	public static function getParticipantByID($ID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT future_participants.*,  future_event.event_name as event_name,  future_participants.id as participant_ID, future_participation_type.name as participation_type_name,  future_participation_sub_type.name as participation_subtype_name , future_participation_sub_type.payment_state, future_participation_sub_type.category as participation_subtype_category, future_participation_sub_type.price as participation_subtype_price, future_participation_sub_type.currency as participation_subtype_currency FROM `future_participants` INNER JOIN future_event ON future_event.id = future_participants.event_id INNER JOIN future_participation_type ON future_participants.participation_type_id = future_participation_type.id INNER JOIN future_participation_sub_type ON future_participants.participation_sub_type_id = future_participation_sub_type.id WHERE future_participants.id = {$ID} ORDER BY future_participants.id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  $FutureEventTable->first();
        return  false;
    }
	
	public static function getParticipantByQrID($QrID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT future_participants.*,  future_event.event_name as event_name,  future_participants.id as participant_ID, future_participation_type.name as participation_type_name,  future_participation_sub_type.name as participation_subtype_name , future_participation_sub_type.payment_state, future_participation_sub_type.category as participation_subtype_category, future_participation_sub_type.price as participation_subtype_price, future_participation_sub_type.currency as participation_subtype_currency FROM `future_participants` INNER JOIN future_event ON future_event.id = future_participants.event_id INNER JOIN future_participation_type ON future_participants.participation_type_id = future_participation_type.id INNER JOIN future_participation_sub_type ON future_participants.participation_sub_type_id = future_participation_sub_type.id WHERE future_participants.qrID = '{$QrID}' ORDER BY future_participants.id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  $FutureEventTable->first();
        return  false;
    }

	public static function getParticipantsByEventID($eventID, $condition = ""){
		$_SQL_Condition_  = $condition == ""?"":" $condition ";
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT future_participants.*, future_participants.id as participant_ID, future_participation_type.name as participation_type_name,  future_participation_sub_type.name as participation_subtype_name , future_participation_sub_type.payment_state, future_participation_sub_type.category as participation_subtype_category, future_participation_sub_type.price as participation_subtype_price, future_participation_sub_type.currency as participation_subtype_currency FROM `future_participants` INNER JOIN future_participation_type ON future_participants.participation_type_id = future_participation_type.id INNER JOIN future_participation_sub_type ON future_participants.participation_sub_type_id = future_participation_sub_type.id WHERE future_participants.event_id = {$eventID} $_SQL_Condition_  ORDER BY future_participants.id DESC ");
        if($FutureEventTable->count())
          return  $FutureEventTable->data();
        return  false;
    }

	
	public static function getEventParticipantPaymentDataByID($ID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT
		future_payment_transaction_entry.id As payment_id, 
		future_payment_transaction_entry.transaction_id As payment_transaction_id, 
		future_payment_transaction_entry.transaction_time As payment_transaction_date, 
		future_payment_transaction_entry.receipt_id As payment_receipt_id, 
		future_participants.id As participant_id, 
		future_participants.qrID As participant_code, 
		future_participants.firstname As participant_firstname, 
		future_participants.lastname As participant_lastname, 
		future_participants.email As participant_email, 
		future_participants.telephone As participant_telephone, 
		future_participants.organisation_city As participant_city, 
		future_participants.organisation_country As participant_country, 
		future_participation_type.name as participation_type_name, 
		future_participation_sub_type.name As participation_subtype_name,
		future_participation_sub_type.payment_state,
		future_participation_sub_type.category As event_category,
		future_participation_sub_type.price As participation_subtype_price,
		future_participation_sub_type.currency As participation_subtype_currency,
		future_participants.participation_type_id As participation_type_id, 
		future_participants.participation_sub_type_id As participation_sub_type_id,
		future_event.id As event_id, 
		future_event.event_name As event_name
		FROM future_payment_transaction_entry INNER JOIN  future_participants ON future_payment_transaction_entry.participant_id = future_participants.id INNER JOIN future_participation_type ON future_participants.participation_type_id = future_participation_type.id 
		INNER JOIN future_participation_sub_type ON future_participants.participation_sub_type_id = future_participation_sub_type.id 
		INNER JOIN future_event ON future_participants.event_id = future_event.id 
		WHERE future_payment_transaction_entry.id = {$ID} ORDER BY future_payment_transaction_entry.id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  $FutureEventTable->first();
        return  false;
    }

	public static function getEventParticipantDataByID($ID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT 
		future_participants.id As participant_id, 
		future_participants.qrID As participant_code, 
		future_participants.firstname As participant_firstname, 
		future_participants.lastname As participant_lastname, 
		future_participants.email As participant_email, 
		future_participants.telephone As participant_telephone, 
		future_participants.organisation_city As participant_city, 
		future_participants.organisation_country As participant_country, 
		future_participation_type.name as participation_type_name, 
		future_participation_sub_type.name As participation_subtype_name,
		future_participation_sub_type.payment_state,
		future_participation_sub_type.category As event_category,
		future_participation_sub_type.price As participation_subtype_price,
		future_participation_sub_type.currency As participation_subtype_currency,
		future_participants.participation_type_id As participation_type_id, 
		future_participants.participation_sub_type_id As participation_sub_type_id,
		future_event.id As event_id, 
		future_event.event_name As event_name
		FROM `future_participants` INNER JOIN future_participation_type ON future_participants.participation_type_id = future_participation_type.id 
		INNER JOIN future_participation_sub_type ON future_participants.participation_sub_type_id = future_participation_sub_type.id 
		INNER JOIN future_event ON future_participants.event_id = future_event.id 
		WHERE future_participants.id = {$ID} ORDER BY future_participants.id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  $FutureEventTable->first();
        return  false;
    }

	public static function getEventPrivateLinkDataByID($ID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT 
		future_private_links.id As participant_id, 
		future_private_links.firstname As participant_firstname, 
		future_private_links.lastname As participant_lastname, 
		future_private_links.email As participant_email, 
		future_private_links.generated_link As generated_link, 
		future_participation_type.name as participation_type_name, 
		future_participation_sub_type.name As participation_subtype_name,
		future_participation_sub_type.payment_state,
		future_participation_sub_type.category As event_category,
		future_participation_sub_type.price As participation_subtype_price,
		future_participation_sub_type.currency As participation_subtype_currency,
		future_event.id As event_id, 
		future_event.event_name As event_name
		FROM `future_private_links` INNER JOIN future_participation_type ON future_private_links.participation_type_id = future_participation_type.id 
		INNER JOIN future_participation_sub_type ON future_private_links.participation_sub_type_id = future_participation_sub_type.id 
		INNER JOIN future_event ON future_private_links.event_id = future_event.id 
		WHERE future_private_links.id = {$ID} ORDER BY future_private_links.id DESC LIMIT 1");
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
		return self::getEventEndPointUrlRegistation($event_id).'/register/invitation/'.$access_token;
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

	public static function checkIfEventParticipationSubTypeExists($participation_type_id, $category, $name, $ID = null){
		$SQL_Condition_   = ($ID == null)?'':" AND id != {$ID} ";
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT id from future_participation_sub_type WHERE participation_type_id =? AND name =? AND category =?  $SQL_Condition_ ORDER BY id DESC LIMIT 1 ", array($participation_type_id, $name, $category));
        if($FutureEventTable->count())
          return  true;
        return  false;
	}

	public static function getEventPrivateInvitationLinkDataByID($ID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT  future_private_links.event_id As event_ID, future_private_links.participation_type_id as participation_type_ID, future_private_links.participation_sub_type_id as participation_sub_type_ID, future_private_links.firstname as participant_firstname, future_private_links.lastname as participant_lastname, future_private_links.email as participant_email, future_private_links.status, future_private_links.link_used_status, future_participation_type.name as participation_type_name, future_participation_sub_type.name as participation_sub_type_name, future_participation_sub_type.category as event_type_name FROM `future_private_links` INNER JOIN future_participation_type ON future_private_links.participation_type_id = future_participation_type.id INNER JOIN future_participation_sub_type ON future_private_links.participation_sub_type_id = future_participation_sub_type.id WHERE future_private_links.id = {$ID} ORDER BY future_private_links.id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  $FutureEventTable->first();
        return  false;
    }

	public static function checkValidityEventPrivateInvitationLink($ID){
        $FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT  id  FROM future_private_links  WHERE future_private_links.id = {$ID} AND status = 'ACTIVE' AND link_used_status = 0 ORDER BY future_private_links.id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  true;
        return  false;
    }

	public static function updatePrivateLinkData($Data, $ID){
        try{
			$FutureEventTable = new FutureEvent();
			$FutureEventTable->updatePrivateLink($Data, $ID);
			return true;
		}catch(Exeption $e){
			return false;
		}
    }

	public static function getEventEndDate($eventID){
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT  end_date  FROM future_event  WHERE id = {$eventID} ORDER BY id DESC LIMIT 1");
        if($FutureEventTable->count())
          return $FutureEventTable->first()->end_date;
        return  false;
	}

	public static function checkEmailAlreadyUsed($eventID, $email){
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT  id  FROM future_participants  WHERE future_participants.event_id = {$eventID} AND future_participants.email = '{$email}' ORDER BY future_participants.id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  true;
        return  false;
	}
	
	public static function checkIfPrivateLinkEmailAlreadyUsed($eventID, $participation_sub_type_id, $email){
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT  id  FROM future_private_links  WHERE future_private_links.event_id = {$eventID} AND future_private_links.participation_sub_type_id = {$participation_sub_type_id} AND future_private_links.email = '{$email}' ORDER BY future_private_links.id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  true;
        return  false;
	}

	public static function checkIfProvateLinkHasExpired($eventID, $private_link_ID){
		$FutureEventTable = new FutureEvent();
        $FutureEventTable->selectQuery("SELECT  id  FROM future_private_links  WHERE id = {$private_link_ID} AND event_id = {$eventID} AND link_used_status = 0 AND access_expiry_time < ". time()." AND status != 'USED' ORDER BY  id DESC LIMIT 1");
        if($FutureEventTable->count())
          return  true;
        return  false;
	}

	public static function autoExpirationStatusEventPrivateInvitationLink($eventID){
		if(($_event_private_links_ = self::getGeneratedPrivateLinks($eventID)))
			foreach($_event_private_links_ As $_private_link_)
				if( self::checkIfProvateLinkHasExpired($eventID, $_private_link_->id ))
					self::updatePrivateLinkStatusToExpired($_private_link_->id);
	}

	public static function updatePrivateLinkStatusToExpired($private_link_ID){
		$_expiry_data_  = array(
			'status' => 'EXPIRED'
		);
		echo '-'.self::updatePrivateLinkData($_expiry_data_, $private_link_ID);
	}
	
	public static function getEventPrivateLinkAccessExpirationTime($eventID){
		return strtotime(self::cleanDateFormat(self::getEventEndDate($eventID)).' -12 hours '); # Access Private Link Token Will Expire 12 hours before the event end date
	}

	public static function cleanDateFormat($str_date){
		list($day, $month, $year) = explode('/', $str_date);
		$foramted_date = "$day-$month-$year";
		return (String)$foramted_date;
	}

	public static function generateQrID($eventID, $participantID){
		$_Qr_ID_     =  "FTS".date('m').date('y').$eventID."00".$participantID;
		$_Qr_string_ =  Hash::encryptSecToken($_Qr_ID_);
		return (Object) [
			'ID' 	 => $_Qr_ID_,
			'STRING' => $_Qr_string_
		];
	}

	public static function decodeQrString($QrString){
		return Hash::decryptSecToken($QrString);
	}

	public static function participationTypeDiscountDescription($type_, $sub_type_){
		$description = "";
		$_id_ 		 = 1;
		if($type_ == 'Africa based participants'):
			$_id_        = 1;
			$description = "Early bird discounted rate
			Valid till 31st December 2021 <br>
			$450 from 1st January 2021 - 5th March 2022";

		elseif($type_ == 'Non-Africa based participants'):
			$_id_        = 2;
			$description = "Early bird discounted rate
			Valid till 31st December 2021
			$600 from 1st January 2021 - 5th March 2022";

		elseif($type_ == 'Students / Youth participants'):
			$_id_        = 3;
			$description = "Early bird discounted rate
			Valid till 31st December 2021 <br>
			$200 from 1st January 2021 - 5th March 2022";

		elseif($type_ == 'Media'):
			$_id_        = 4;
			$description = "Local & international meda are invited to attend the congress. <br>
			Apply for media accreditation here.";
		endif;
	}

}