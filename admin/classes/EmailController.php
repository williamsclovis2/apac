<?php
/**
 * Email
 * @author Ezechiel Kalengya Ezpk [ezechielkalengya@gmail.com]
 * Software Developer
*/
class EmailController
{
  /** Send Email - Participant - When register Participant  */
  public static function sendEmailToParticipantOnRegistrationPayable($_data_){
        $_data_            = (Object) $_data_;
        $email 		         = $_data_->email;
        $firstname         = $_data_->firstname;
        $fullname          = $_data_->fullname;
        
        $event		                = $_data_->event;
        $event_type               = $_data_->event_type;
        $participation_type       = $_data_->participation_type;
        $participation_subtype    = $_data_->participation_subtype;
        $price                    = $_data_->price;
        $currency                 = $_data_->currency;

		    $_Email_    = $email;
        $_Subject_  = 'Event Registration';
        $_Message_  = self::emailSectionHeaderLayout()."
                  <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear $fullname</td>
                        </tr>
                        <tr>
                          <td class='bodycopy' style='font-family: sans-serif;'>
                            Thank you for registering for our $event_type event:   $event.
                            Participation category: $participation_type,  $participation_subtype: $price $currency. <br><br>
                            Please find below the link to proceed to payment, your registration will be completed and activated after this step.
                          </td>
                        </tr>
                        <tr>
                          <td style='padding: 20px 0 0 0;' align='center'>
                          
                            <table class='buttonwrapper' bgcolor='#f47e20' border='0' cellspacing='0' cellpadding='0'>
                              <tr>
                                <td class='button' height='45'>
                                  <a href='http://torusguru.com/thefuture' target='_blank'>Click on this link to go to the payment step</a>
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                     
                      </table>
                    </td>
                  </tr>
                  
        ".self::emailLayoutSectionFooter();

        $User = new \User();
        $User->send_mail($_Email_, $_Message_, $_Subject_);
      
  }

  /** Send Email - Participant - When register Participant  */
  public static function sendEmailToParticipantOnRegistrationFree($_data_){
      $_data_            = (Object) $_data_;
      $email 		         = $_data_->email;
      $firstname         = $_data_->firstname;
      $fullname          = $_data_->fullname;
      
      $event		                = $_data_->event;
      $event_type               = $_data_->event_type;
      $participation_type       = $_data_->participation_type;
      $participation_subtype    = $_data_->participation_subtype;
      $price                    = $_data_->price;
      $currency                 = $_data_->currency;

      $_Email_    = $email;
      $_Subject_  = 'Event Registration';
      $_Message_  = self::emailSectionHeaderLayout()."
                <tr>
                  <td class='innerpadding borderbottom'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td class='h2' style='font-family: sans-serif;'>Dear $fullname</td>
                      </tr>
                      <tr>
                        <td class='bodycopy' style='font-family: sans-serif;'>
                          Thank you for registering for our $event_type event: $event. We will process your application and get back to you very soon.<br><br>
                        </td>
                      </tr>
                      <tr>
                        <td class='bodycopy' style='font-family: sans-serif;'>
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
                
      ".self::emailLayoutSectionFooter();

      $User = new \User();
      $User->send_mail($_Email_, $_Message_, $_Subject_);
    
  }

  
  /** Send Email - Participant - When register Participant Registration Link  */
  public static function sendEmailToParticipantOnLinkGenerated($_data_){
      $_data_            = (Object) $_data_;
      $email 		         = $_data_->email;
      $firstname         = $_data_->firstname;
      $fullname          = $_data_->fullname;
      
      $event		                = $_data_->event;
      $event_type               = $_data_->event_type;
      $participation_type       = $_data_->participation_type;
      $participation_subtype    = $_data_->participation_subtype;
      $price                    = $_data_->price;
      $currency                 = $_data_->currency;
      $generated_link           = $_data_->generated_link;

      $_Email_    = $email;
      $_Subject_  = 'Event Registration';
      $_Message_  = self::emailSectionHeaderLayout()."
                <tr>
                  <td class='innerpadding borderbottom'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td class='h2' style='font-family: sans-serif;'>Dear $fullname</td>
                      </tr>
                      <tr>
                        <td class='bodycopy' style='font-family: sans-serif;'>
                        Hope this email finds you well, here is your invitation link to register for our  $event_type event: $event. <br><br>
                        </td>
                      </tr>
                      <tr>
                        <td style='padding: 20px 0 0 0;' align='center'>
                          <table class='buttonwrapper' bgcolor='#f47e20' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                              <td class='button' height='45'>
                                <a href='$generated_link' target='_blank'>Click on this invitation link to proceed to registration</a>
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
      ".self::emailLayoutSectionFooter();

      $User = new \User();
      $User->send_mail($_Email_, $_Message_, $_Subject_);
    
  }

   
  /** Send Email - Participant - When register Participant  */
  public static function sendEmailToParticipantOnLinkStatusChanged($_data_){
    $_data_            = (Object) $_data_;
    $email 		         = $_data_->email;
    $firstname         = $_data_->firstname;
    $fullname          = $_data_->fullname;
    
    $event		                = $_data_->event;
    $event_type               = $_data_->event_type;
    $participation_type       = $_data_->participation_type;
    $participation_subtype    = $_data_->participation_subtype;
    $price                    = $_data_->price;
    $currency                 = $_data_->currency;

    $status                   = $_data_->status;

    $_Email_    = $email;
    $_Subject_  = 'Event Invitation Link '.$status;
    $_Message_  = self::emailSectionHeaderLayout()."
              <tr>
                <td class='innerpadding borderbottom'>
                  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                    <tr>
                      <td class='h2' style='font-family: sans-serif;'>Dear $fullname</td>
                    </tr>
                    <tr>
                      <td class='bodycopy' style='font-family: sans-serif;'>
                      Hope this email finds you well, this is to inform you that your invitation link to register for our  $event_type event: $event, has  been $status.<br><br>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              
    ".self::emailLayoutSectionFooter();

    $User = new \User();
    $User->send_mail($_Email_, $_Message_, $_Subject_);
  
  }

 
  /** Send Email - Payment success -  */
  public static function sendEmailToParticipantOnPaymentSuccess($_data_){
      $_data_            = (Object) $_data_;
      $email 		         = $_data_->email;
      $firstname         = $_data_->firstname;
      $fullname          = $_data_->fullname;
      
      $event		                = $_data_->event;
      $event_type               = $_data_->event_type;
      $participation_type       = $_data_->participation_type;
      $participation_subtype    = $_data_->participation_subtype;
      $price                    = $_data_->price;
      $currency                 = $_data_->currency;

      $_Email_    = $email;
      $_Subject_  = 'Event Registration';
      $_Message_  = self::emailSectionHeaderLayout()."
                <tr>
                  <td class='innerpadding borderbottom'>
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                      <tr>
                        <td class='h2' style='font-family: sans-serif;'>Dear $fullname</td>
                      </tr>
                      <tr>
                        <td class='bodycopy' style='font-family: sans-serif;'>
                          Thank you for registering to our $event_type event: $event. We will process your application and get back to you very soon.<br><br>
                        </td>
                      </tr>
                      <tr>
                        <td class='bodycopy' style='font-family: sans-serif;'>
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
                
      ".self::emailLayoutSectionFooter();

      $User = new \User();
      $User->send_mail($_Email_, $_Message_, $_Subject_);
    
  }


  public static function emailSectionHeaderLayout(){
      $_HeaderLayout_ = "
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
        .h1 {color: #1e3e27; font-family: sans-serif;}
        .h2, .bodycopy {color: #7A838B; font-family: sans-serif;}
        .h1 {font-size: 18px; line-height: 38px; font-weight: bold;}
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
                  <td bgcolor='#e6e6e6' class='header'>
                    <table width='60' align='left' border='0' cellpadding='0' cellspacing='0'>  
                      <tr>
                        <td height='60' style='padding: 10px 10px 10px 0;'>
                          <img class='fix' src='http://apacongress.torusguru.com/img/apac-web-logo.png' width='90' height='60' border='0' alt='' />
                        </td>
                      </tr>
                    </table>
                    
                    <table class='col425' align='left' border='0' cellpadding='0' cellspacing='0' style='width: auto; max-width: 425px;'>
                      <tr>
                        <td height='70'>
                          <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                            <tr>
                              <td class='h1' style='padding: 5px 0 0 0;'>Africa Protected Areas Congress (APAC)</td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
      ";
      return $_HeaderLayout_;
    }

    
    public static function emailLayoutSectionFooter(){
      $_FooterLayout_ = "
                  <tr>
                    <td class='footer' bgcolor='#1e3e27'>
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
        </html>
      ";
      return $_FooterLayout_;
    }

  
  }



?>