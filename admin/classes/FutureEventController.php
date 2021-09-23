<?php
class FutureEventController  
{
	public static function edit(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate(); 
		$prfx = 'company-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		$validation = $validate->check($_EDIT, array(
			'company' => array(
				'name' => 'Comany name',
				'string' => true,
				'required' => true
			),
			'motto' => array(
				'name' => 'Motto',
				'string' => true
			),
			'email' => array(
				'name' => 'Address Email',
				'email' => true,
				'required' => true
			),
			'telephone' => array(
				'name' => 'Phone Number'
			),
			'country_ID' => array(
				'name' => 'Country'
			),
			'details' => array(
				'name' => 'Details'
			)
		));
		
		if($validation->passed()){
			$companyTable = new \Company();
			
			$str = new \Str();
			$ID = $str->sanAsName($_EDIT['id']);
			$company = $str->sanAsName($_EDIT['company']);
			$motto = $str->data_in($_EDIT['motto']);
			$email = $str->data_in($_EDIT['email']);
			$telephone = $str->data_in($_EDIT['telephone']);
			$details = $str->data_in($_EDIT['details']);
			$country = $str->sanAsID($_EDIT['country_ID']);
			
			$seconds = \Config::get('time/seconds');
			if($diagnoArray[0] == 'NO_ERRORS'){
				try{
					$companyTable->update(array(
						'company' => $company,
						'motto' => $motto,
						'email' => $email,
						'telephone' => $telephone,
						'details' => $details,
						'country_ID' => $country
					),$ID);
					
				}catch(Exeption $e){
					$diagnoArray[0] = "ERRORS_FOUND";
					$diagnoArray[] = $e->getMessage();
				}
			}
		}else{
			$diagnoArray[0] = 'ERRORS_FOUND';
			$error_msg = ul_array($validation->errors());
		}
		if($diagnoArray[0] == 'ERRORS_FOUND'){
			return (object)[
				'ERRORS'=>true,
				'ERRORS_SCRIPT' => $validate->getErrorLocation()
			];
		}else{
			return (object)[
				'ERRORS'=>false,
				'SUCCESS'=>true,
				'ERRORS_SCRIPT' => ""
			];
		}
	}
    
	public static function registerEvent(){
		$diagnoArray[0] = 'NO_ERRORS';
		$validate = new \Validate();
		$prfx = 'company-';
		foreach($_POST as $index=>$val){
			$ar = explode($prfx,$index);
			if(count($ar)){
				$_EDIT[end($ar)] = $val;
			}
		}
		$validation = $validate->check($_EDIT, array(
			'company' => array(
				'name' => 'Comany name',
				'string' => true,
				'required' => true
			),
			'email' => array(
				'name' => 'Address Email',
				'email' => true,
				'required' => true
			),
			'country_ID' => array(
				'name' => 'Country',
				'required' => true
			)
		));
		
		if($validation->passed()){
			$companyTable = new \Company();
			
			$str = new \Str();
			$company = $str->sanAsName($_EDIT['company']);
			$email = $str->data_in($_EDIT['email']);
			$country = $str->sanAsID($_EDIT['country_ID']);
			
		   $user_ID = Session::get(Config::get('session/session_name'));
            
			if($diagnoArray[0] == 'NO_ERRORS'){
				try{
					$companyTable->insert(array(
						'user_ID' => $user_ID,
						'company' => $company,
						'email' => $email,
						'country_ID' => $country
					));
					
				}catch(Exeption $e){
					$diagnoArray[0] = "ERRORS_FOUND";
					$diagnoArray[] = $e->getMessage();
				}
			}
		}else{
			$diagnoArray[0] = 'ERRORS_FOUND';
			$error_msg = ul_array($validation->errors());
		}
		if($diagnoArray[0] == 'ERRORS_FOUND'){
			return (object)[
				'ERRORS'=>true,
				'ERRORS_SCRIPT' => $validate->getErrorLocation()
			];
		}else{
			return (object)[
				'ERRORS'=>false,
				'SUCCESS'=>true,
				'ERRORS_SCRIPT' => ""
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