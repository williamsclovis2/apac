<?php
  require_once "../admin/core/init.php"; 

  $valid['success'] = array('success' => false, 'messages' => array());

  // Get captcha session
  if(Input::get('request') && Input::get('request') == 'captchaSession') {
    $valid['success']  = true;
    $valid['messages'] = $_SESSION['captcha'];
    echo json_encode($valid);
  }

  // Login delegate
  if(Input::get('request') && Input::get('request') == 'login') {
    $email    = escape(Input::get('username'));
    $password = md5(escape(Input::get('password')));
    $findDel  = DB::getInstance()->query("SELECT * FROM `future_participants` WHERE `email` = '$email' AND `password` = '$password'");
    if ($findDel->count()) {
      $_SESSION['username']    = $email;
      $_SESSION['name']        = $findDel->first()->firstname." ".$findDel->first()->lastname;
      $_SESSION['userToken']   = Hash::encryptAuthToken($findDel->first()->id);

      $valid['success']  = true;
      $valid['messages'] = "Login successfully";
    } else {
      $valid['success']  = false;
      $valid['messages'] = "Wrong username or password";
    }
    echo json_encode($valid);
  }


  /** Event Participant Registration */
  if(Input::checkInput('request', 'post', 1)):
    $_REQUEST_ = Input::get('request', 'post');
    switch($_REQUEST_):
      
      /** Submission Of The Participant Registration */
      case 'registration':
        $_form_ = FutureEventController::registerEventParticipant();
        if($_form_->ERRORS == false):

            $_PARTICIPATION_PAYMENT_TYPE_ = $_form_->PARTICIPATIONPAYMENTTYPE;
            $_PARTICIPATION_TYPE_CODE_    = $_form_->PARTICIPATIONTYPE;

            if($_PARTICIPATION_PAYMENT_TYPE_ == 'PAYABLE'):
              if($_PARTICIPATION_TYPE_CODE_  != 'CBO'):
                $response['status']    = 100;
                $response['message']   = 'REDIRECT_TO_PAYMENT_CHANNEL';
                $response['authToken'] = $_form_->AUTHTOKEN;

              else:
                $response['status']    = 101;
                $response['message']   = 'REDIRECT_TO_NOTIFICATION_'.$_PARTICIPATION_TYPE_CODE_;
                $response['authToken'] = $_form_->AUTHTOKEN;
              endif;
            
            elseif($_PARTICIPATION_PAYMENT_TYPE_ == 'FREE'):
              $response['status']    = 101;
              $response['message']   = 'REDIRECT_TO_NOTIFICATION';
              $response['authToken'] = $_form_->AUTHTOKEN;

            else:
              $response['status'] = 200;
              $response['message']= 'REDIRECT_TO_NOTIFICATION';
            endif;

        else:
          $response['status'] = 400;
          $response['message']= $_form_->ERRORS_STRING;
        endif;
        echo json_encode($response);
      break;

      /** Submission Of The Participant Registration - update profile */
      case 'registrationUpdate':
        $_form_ = FutureEventController::updateEventParticipantProfile();
        if($_form_->ERRORS == false):
           $response['status']    = 315;
           $response['message']   = 'Your registration details have been updated successfully';
        else:
          $response['status'] = 400;
          $response['message']= $_form_->ERRORS_STRING;
        endif;
        echo json_encode($response);
      break;

      /** After Registration - Create Account Password  - Form Submission */
      case 'account-password-creation':
        $_form_ = FutureEventController::createEventParticipantPassword();
        if($_form_->ERRORS == false):
            $_PARTICIPATION_PAYMENT_TYPE_ = $_form_->PARTICIPATIONPAYMENTTYPE;

            if($_PARTICIPATION_PAYMENT_TYPE_ == 'PAYABLE'):
              $response['status']    = 100;
              $response['message']   = 'REDIRECT_TO_PAYMENT_CHANNEL';
              $response['authToken'] = $_form_->AUTHTOKEN;
            
            elseif($_PARTICIPATION_PAYMENT_TYPE_ == 'FREE'):
              $response['status']    = 101;
              $response['message']   = 'REDIRECT_TO_NOTIFICATION';
              $response['authToken'] = $_form_->AUTHTOKEN;

            else:
              $response['status'] = 200;
              $response['message']= 'REDIRECT_TO_NOTIFICATION';
            endif;

        else:
          $response['status'] = 400;
          $response['message']= $_form_->ERRORS_STRING;
        endif;
        echo json_encode($response);
      break;

        
      /** Submission Of The Participant Registration - Using Private Invitation Link - */
      case 'invitationRegister':
        $_form_ = FutureEventController::registerEventParticipant('PRIVATE');
        if($_form_->ERRORS == false):
            $response['status']    = 101;
            $response['message']   = 'REDIRECT_TO_NOTIFICATION';
            $response['authToken'] = $_form_->AUTHTOKEN;
        else:
          $response['status'] = 400;
          $response['message']= $_form_->ERRORS_STRING;
        endif;
        echo json_encode($response);
      break;

     
      /** Submission Of The Participant Registration Payment */
      case 'submit-payment-request':
        $_form_ = PaymentController::paymentTransactionRequest();
        if($_form_->ERRORS == false):
          if($_form_->PAYURL != NULL):
            $response['status']    = 100;
            $response['message']   = 'SUCCESS';
            $response['authToken'] = $_form_->AUTHTOKEN;
            $response['payURL']    = $_form_->PAYURL;
          else:
            if($_form_->PAYMENTMETHOD == 'BT'):
              $response['status']    = 200;
              $response['message']   = 'SUCCESS';
              $response['authToken'] = $_form_->AUTHTOKEN; 
            else:
              $response['status']    = 300;
              $response['message']   = 'Faild to request for payment. Please try again later';
            endif;
          endif;
        else:
          $response['status'] = 400;
          $response['message']= $_form_->ERRORS_STRING;
        endif;
        echo json_encode($response);
      break;

      /** Submission Of The Participant Registration - Set Language - */
      case 'selectLanguage':
        $_current_lang_    = Input::checkInput('lang', 'post', 1)?Input::get('lang', 'post'):'en-lang';
        Session::put('lang', $_current_lang_);

        $response['status']  = 100;
        $response['message'] = 'SUCCESS';
        echo json_encode($response);
      break;

    endswitch;
    
  endif;

  
?>


