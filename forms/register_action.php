<?php
  require_once "../admin/core/init.php"; 

  $valid['success'] = array('success' => false, 'messages' => array());

    // $_POST = array(
    // 'username'             		=> 'ezechiel@gmail.com',
    // 'password'     => "111111",
    // 'request' => 'login',
    // );

  // $_POST = array(
  //   'eventId'             		=> '33323039393636333339',
  //   'eventParticipation'     => "31363138313336393237",
  //   // 'eventInvitation' => '58717853393147496f69304c634f2f454a6f5a4b4c367a5135335a4a4c7548667654704c55642f49373049',
  //   // 'participation_type_id'     => 0,
  //   // 'eventParticipation' => '383232323232323231',

  //   'firstname'            => 'firstname',
  //   'lastname'             => 'lastname',
  //   'email'                => 'email',
  //   'password'             => "",
  //   'salt'             	   => "",

  //   'telephone'            => "",
  //   'telephone_2'          => "",

  //   'gender'               => "",
  //   'birthday'             => "",
  //   'organisation_name'    => "",
  //   'organisation_type'    => "",
  //   'industry'             => "",
  //   'job_title'            => "",
  //   'job_category'         => "",
  //   'organisation_address' => "",
  //   'line_one'             => "",
  //   'line_two'             => "",
  //   'organisation_country' => "",
  //   'organisation_city'    => "",

  //   'postal_code'          => "",
  //   'website'              => "",

  //   'residence_country'    => "",
  //   'residence_city'       => "",
  //   'citizenship'          => "",
  //   'id_type'              => "",
  //   'id_number'            => "",

  //   'media_card_number'    => "",
  //   'media_card_authority' => "",
  //   'media_equipment'      => "",
  //   'special_request'      => "",
  //   'delegate_type'        => "",

  //   'reg_date'             => date('Y-m-d H:i:s'),
  //   'status'               => "PENDING",
    
  //   'educacation_institute_name'      => "",
  //   'educacation_institute_category'  => "",
  //   'educacation_institute_industry'  => "",
  //   'educacation_institute_website'   => "",
  //   'educacation_institute_country'   => "",
  //   'educacation_institute_city'      => "",

  //   'request' => 'registration',
  // );

// $_POST['request'] = 'captchaSession';

// echo $_SESSION['captcha'];

  // Get captcha session
  if(Input::get('request') && Input::get('request') == 'captchaSession') {
    $valid['success']  = true;
    $valid['messages'] = $_SESSION['captcha'];
    echo json_encode($valid);
  }

  // Delegate register
  if(Input::get('request') && Input::get('request') == 'register') {
    $validate   = new Validate();
    $validation = $validate->check($_POST, array('email' => array('unique' => 'future_participants')));
    if($validate->passed()) {
      if (Input::get('del_type') == 'Media') {
        $media_card_number    = escape(Input::get('media_card_number'));
        $media_card_authority = escape(Input::get('media_card_authority'));
        $media_equipment      = escape(Input::get('media_equipment'));
        $special_request      = escape(Input::get('special_request'));
      } else {
        $media_card_number =  $media_card_authority = $media_equipment = $special_request = "";
      }
      try {
        if (Input::get('organisation_type') == "Other") {
          $organisation_type = escape(Input::get('organisation_type1'));
        } else { $organisation_type = Input::get('organisation_type'); }

        if (Input::get('job_category') == "Other") {
          $job_category = escape(Input::get('job_category1'));
        } else { $job_category = Input::get('job_category'); }

        if (Input::get('industry') == "Other") {
          $industry = escape(Input::get('industry1'));
        } else { $industry = Input::get('industry'); }

        $controller->create("future_participants", array(
          'event_id'             => Input::get('eventId'),
          'firstname'            => escape(Input::get('firstname')),
          'lastname'             => escape(Input::get('lastname')),
          'email'                => escape(Input::get('email')),
          'password'             => "",
          'telephone'            => escape(Input::get('telephone')),
          'gender'               => escape(Input::get('gender')),
          'birthday'             => escape(Input::get('birthday')),
          'organisation_name'    => escape(Input::get('organisation_name')),
          'organisation_type'    => $organisation_type,
          'industry'             => $industry,
          'job_title'            => escape(Input::get('job_title')),
          'job_category'         => $job_category,
          'organisation_address' => escape(Input::get('organisation_address')),
          'line_one'             => escape(Input::get('line_one')),
          'line_two'             => escape(Input::get('line_two')),
          'organisation_country' => escape(Input::get('organisation_country')),
          'organisation_city'    => escape(Input::get('organisation_city')),
          'postal_code'          => escape(Input::get('postal_code')),
          'website'              => escape(Input::get('website')),
          'residence_country'    => escape(Input::get('residence_country')),
          'residence_city'       => escape(Input::get('residence_city')),
          'citizenship'          => escape(Input::get('citizenship')),
          'id_type'              => escape(Input::get('id_type')),
          'id_number'            => escape(Input::get('id_number')),
          'media_card_number'    => $media_card_number,
          'media_card_authority' => $media_card_authority,
          'media_equipment'      => $media_equipment,
          'special_request'      => $special_request,
          'delegate_type'        => Input::get('del_type'),
          'status'               => "Pending",
          'reg_date'             => date('Y-m-d H:i:s')
        ));

        $firstname = escape(Input::get('firstname'));
        $message   = "
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml'>
        <head>
          <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
          <title>The Future Summit</title>
          <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Ubuntu' />
          <style type='text/css'>
          body {margin: 0; padding: 0; min-width: 100%!important; font-family: sans-serif;}
          img {height: auto;}
          .content {width: 100%; max-width: 600px;}
          .header {padding: 20px 30px 20px 30px;}
          .innerpadding {padding: 30px 30px 30px 30px;}
          .borderbottom {border-bottom: 1px solid #f2eeed;}
          .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
          .h1 {color: #ffffff; font-family: sans-serif;}
          .h2, .bodycopy {color: #7A838B; font-family: sans-serif;}
          .h1 {font-size: 30px; line-height: 38px; font-weight: bold;}
          .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
          .bodycopy {font-size: 16px; line-height: 22px;}
          .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
          .button a {color: #ffffff; text-decoration: none;}
          .footer {padding: 20px 30px 15px 30px;}
          .footer td a {color: #f37e22;}
          .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
          .footercopy a {color: #ffffff; text-decoration: none;}

          @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
          body[yahoo] .hide {display: none!important;}
          body[yahoo] .buttonwrapper {background-color: transparent!important;}
          body[yahoo] .button {padding: 0px!important;}
          body[yahoo] .button a {background-color: #f47e20; padding: 15px 15px 13px!important;}
         }
          </style>
        </head>
        <body yahoo bgcolor='#f4f4f4'>
          <table width='100%' bgcolor='#f4f4f4' border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td>
                <table bgcolor='#ffffff' class='content' align='center' cellpadding='0' cellspacing='0' border='0'>
                  <tr>
                    <td bgcolor='#f47e20' class='header'>
                      <table width='60' align='left' border='0' cellpadding='0' cellspacing='0'>  
                        <tr>
                          <td height='60' style='padding: 10px 10px 10px 0;'>
                            <img class='fix' src='http://torusguru.com/thefuture/img/logo.png' width='60' height='60' border='0' alt='' />
                          </td>
                        </tr>
                      </table>
                      
                      <table class='col425' align='left' border='0' cellpadding='0' cellspacing='0' style='width: auto; max-width: 425px;'>
                        <tr>
                          <td height='70'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                              <tr>
                                <td class='h1' style='padding: 5px 0 0 0;'>The Future Summit</td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear $firstname</td>
                        </tr>
                        <tr>
                          <td class='bodycopy' style='font-family: sans-serif;'>
                            Thank you for registering to our event. We will process your application and get back to you very soon.<br><br>
                             Also, kindly take a minute to browse our website for latest updates and follow us on our social media accounts.
                          </td>
                        </tr>
                        <tr>
                          <td style='padding: 20px 0 0 0;' align='center'>
                            <table class='buttonwrapper' bgcolor='#f47e20' border='0' cellspacing='0' cellpadding='0'>
                              <tr>
                                <td class='button' height='45'>
                                  <a href='http://torusguru.com/thefuture' target='_blank'>Visit our website</a>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td class='footer' bgcolor='#000000'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td align='center' class='footercopy' style='font-family: sans-serif;'> 
                          &copy; <?php echo date('Y'); ?>
                            <a href='http://torusguru.com/thefuture' target='_blank' class='unsubscribe'><font color='#ffffff'><strong>The Future Summit</strong></font></a>
                          </td>
                        </tr>
                        <tr>
                          <td align='center' style='padding: 20px 0 0 0;'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                              <tr>
                                <td width='37' style='text-align: center; padding: 0 10px 0 10px;'>
                                  <a href='http://www.facebook.com/' target='_blank'>
                                    <img src='http://torusguru.com/thefuture/img/facebook.png' width='37' height='37' alt='Facebook' border='0'/>
                                  </a>
                                </td>
                                <td width='37' style='text-align: center; padding: 0 10px 0 10px;'>
                                  <a href='http://www.twitter.com/' target='_blank'>
                                    <img src='http://torusguru.com/thefuture/img/twitter.png' width='37' height='37' alt='Twitter' border='0'/>
                                  </a>
                                </td>
                                <td width='37' style='text-align: center; padding: 0 10px 0 10px; font-family: sans-serif;'>
                                  <a href='http://www.instagram.com/' target='_blank'>
                                    <img src='http://torusguru.com/thefuture/img/instagram.png' width='37' height='37' alt='Instagram' border='0'/>
                                  </a>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
        </body>
        </html>";
        $email   = escape(Input::get('email'));
        $subject = "Event Registration";
        $user->send_mail($email,$message,$subject);

        $valid['success']  = true;
        $valid['messages'] = $email; 
      } catch(Exception $error) {
        $valid['success']  = false;
        $valid['messages'] = "Error while registering delegate";
      }
    } else {
      $valid['success']  = false;
      $valid['messages'] = "Account already exist";
    }
    echo json_encode($valid);
  }

  // Delegate account
  if(Input::get('request') && Input::get('request') == 'account') {
    $email    = escape(Input::get('username'));
    $password = md5(escape(Input::get('password')));
    $setAccount = DB::getInstance()->query("UPDATE `future_participants` SET `password` = '$password' WHERE `email` = '$email'");
    if ($setAccount) {
      $valid['success']  = true;
      $valid['messages'] = "Account created successfully";
    } else {
      $valid['success']  = false;
      $valid['messages'] = "Error while creating account";
    }
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

            // $response['status']    = 100;
            // $response['message']   = 'REDIRECT_TO_PASSWORD_SETTINGS';
            // $response['authToken'] = $_form_->AUTHTOKEN;

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

            $response['status']    = 100;
            $response['message']   = 'REDIRECT_TO_PASSWORD_SETTINGS';
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
            $response['status']    = 200;
            $response['message']   = 'Faild to request for payment. Please try again later';
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
        $response['message'] = 'SUCCESS - '.Session::get('lang');
        echo json_encode($response);
      break;

    endswitch;
    
  endif;

  
?>


