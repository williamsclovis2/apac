<?php
/**
 * Email
 * @author Ezechiel Kalengya Ezpk [ezechielkalengya@gmail.com]
 * Software Developer
*/
class EmailController
{
  /** - 1 - Send Email - Participant - After CBO Application - NEED TO PAY -  */
  public static function sendEmailToParticipantAfterCBOApllication($_data_){
        $_data_       = (Object) $_data_;
        $email 		    = $_data_->email;
        $firstname    = $_data_->firstname;
        
		    $_Email_    = $email;
        $_Subject_  = 'IUCN Africa Protected Areas Congress (APAC) CBO Application';
        $_Message_  = self::emailSectionHeaderLayout()."
                  <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear <b>$firstname</b></td>
                        </tr>
                        <tr>
                          <td class='bodycopy' style='font-family: sans-serif;'>
                          Thank you for registering your interest to attend the <br><b>IUCN Africa Protected Areas Congress (APAC)</b> as a CBO.<br><br>
                          The APAC Event Secretariat will review your application and revert within the next <br>5 working days.
                          </td>
                        </tr>
                        
                      </table>
                    </td>
                  </tr>

        ".self::emailLayoutSectionFooter();

        Email::send($_Email_, $_Subject_, $_Message_);
  }


 /** - 2 - Send Email - Participant - After CBO Acceptance with Request for Payment - NEED TO PAY -  */
  public static function sendEmailToParticipantAfterCBOAcceptanceWithRequestForPayment($_data_){
        $_data_          = (Object) $_data_;
        $email 		       = $_data_->email;
        $firstname       = $_data_->firstname;
        $payment_link    = $_data_->payment_link;

		    $_Email_    = $email;
        $_Subject_  = 'Payment information - IUCN Africa Protected Areas Congress (APAC) CBO Application';
        $_Message_  = self::emailSectionHeaderLayout()."
                  <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear <b>$firstname</b></td>
                        </tr>
                        <tr>
                          <td class='bodycopy' style='font-family: sans-serif;'>
                          We are pleased to inform you that your CBO application to attend the <b>IUCN Africa Protected Areas Congress (APAC),</b> that will be held in Kigali from 7 – 12 March 2022, has been accepted. <br><br>
                          Please proceed to the following link to complete your payment <a href='$payment_link'> $payment_link </a>
                          </td>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Programme </b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li>You can view the congress programme at <a href='https://apacongress.africa/programme/'>apacongress.africa/programme</a></li>
                                </ul>
                            </td>
                          </tr>
                        </tr>
                        
                      </table>
                    </td>
                  </tr>

        ".self::emailLayoutSectionFooter();

        Email::send($_Email_, $_Subject_, $_Message_);
  }


 /** - 3 - Send Email - Participant - After Fully Completed Registration And Successful Payment - NEED TO PAY -  */
  public static function sendEmailToParticipantAfterFullyCompletedRegistrationAndSuccessfulPayment($_data_){
        $_data_                  = (Object) $_data_;
        $email 		               = $_data_->email;
        $firstname               = $_data_->firstname;
        $payment_receipt_link    = $_data_->payment_receipt_link;

		    $_Email_    = $email;
        $_Subject_  = 'Confirmation - IUCN Africa Protected Areas Congress (APAC) Registration';
        $_Message_  = self::emailSectionHeaderLayout()."
                 <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear <b>$firstname</b></td>
                        </tr>
                        <tr>
                          <td class='bodycopy' style='font-family: sans-serif;'>
                          Thank you for registering to attend the IUCN Africa Protected Areas Congress (APAC) that will be held in Kigali from 7 – 12 March 2022.</td>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'>Your receipt is attached to this email.</td></tr>
                          
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Badge collection</b> </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;'>You will receive information on how and when to collect your badge before the event. We kindly require that you bring the identification document you used in your registration process when collecting your badge.  </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Programme </b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li>You can view the congress programme at <a href='https://apacongress.africa/programme/'>apacongress.africa/programme</a></li>
                                </ul>
                            </td>
                          </tr>
                          
                          <tr><td class='h2' style='font-family: sans-serif;padding:0; color:#37af47;text-transform:uppercase'><b>Important information for international delegates </b> </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Accommodation</b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                              <ul>
                                <li><a href='https://www.travelzuri.com/B2C/Admin/GTC/EventInfoCart.aspx?Ref_Type=HTL&CID=87&CityCode=KGL&EventName=Africa%20Protected%20Area%20Congress%20&SSr=EVTHL#' target='_bank'>Click here</a> to book your accommodation for your stay in Kigali   </li>
                              </ul>
                              
                            </td>
                          </tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Visa information:</b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li>Visas are issued on arrival for all countries </li>
                                  <li>Visa fees for citizens of African Union, Commonwealth and La Francophonie member states are waived for a visit of up to 30 days</li>
                                  <li><a href='https://www.migration.gov.rw/anounce/anounce/online-visa/' target='_bank'>Click here</a> for more information on Rwanda’s open visa policy  </li>

                                </ul>
                            </td>
                          </tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Destination information</b> </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'>Rwanda’s stunning scenery and warm, friendly people offer unique experiences in one of the most remarkable countries in the world. It is blessed with extraordinary biodiversity, with incredible wildlife living throughout its volcanoes, montane rainforest and sweeping plains.</td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'>Go to <a href='https://www.visitrwanda.com/' target='_bank'>www.visitrwanda.com</a> for more information on activities and excursions you can experience during your time in Rwanda.</td></tr>

                        </tr>
                        
                      </table>
                    </td>
                  </tr>

        ".self::emailLayoutSectionFooter();

        Email::send($_Email_, $_Subject_, $_Message_);
  }


  /** - 4 - Send Email - Participant - Email received for those who successfully complete registration and choose to pay by bank transfer or direct deposit - NEED TO PAY -  */
  public static function sendEmailToParticipantOnRequestToPayByBankTransferOrDirectDeposit($_data_){
        $_data_                  = (Object) $_data_;
        $email 		               = $_data_->email;
        $firstname               = $_data_->firstname;
        $payment_invoice_link    = $_data_->payment_invoice_link;

		    $_Email_    = $email;
        $_Subject_  = 'Confirmation - IUCN Africa Protected Areas Congress (APAC) Registration';
        $_Message_  = self::emailSectionHeaderLayout()."
                 <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear <b>$firstname</b></td>
                        </tr>
                        <tr>
                        <tr>
                          <tr><td class='h2' style='font-family: sans-serif;'>We have received your request to pay by bank transfer.<br><a href='$payment_invoice_link'>Click here</a> to download the payment details & invoice. </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;'>Please ensure that you follow the instructions to ensure your payment is tracked and credited to your registration.</td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;'>You will be notified when we receive your payment.</td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;color:#37af47;text-transform:uppercase'><b>Important information for international delegates </b> </td></tr>

                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li>You will receive travel and accommodation information with the official APAC hotels after confirmation of your registration & receipt of payment.  </li>
                                  <li>Please do not book your travel or accommodation until you have received our notification confirming receipt of payment.</li>

                                </ul>
                            </td>
                          </tr>
                        </tr>
                      </table>
                    </td>
                  </tr>

        ".self::emailLayoutSectionFooter();

        Email::send($_Email_, $_Subject_, $_Message_);
  }


  /** - 5 - Send Email - Participant - Email received after bank transfer or direct deposit is received - NEED TO PAY -  */
  public static function sendEmailToParticipantAfterBankTransferOrDirectDepositReceived($_data_){
        $_data_                  = (Object) $_data_;
        $email 		               = $_data_->email;
        $firstname               = $_data_->firstname;
        $payment_receipt_link    = $_data_->payment_receipt_link;

		    $_Email_    = $email;
        $_Subject_  = 'Payment confirmation - IUCN Africa Protected Areas Congress (APAC) Registration';
        $_Message_  = self::emailSectionHeaderLayout()."
                 <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear <b>$firstname</b></td>
                        </tr>
                        <tr>
                        <tr>
                          <tr><td class='h2' style='font-family: sans-serif;'>Thank you for registering to attend the <b>IUCN Africa Protected Areas Congress (APAC)</b>  that will be held in Kigali from 7 – 12 March 2022. </tr>
                          <tr><td class='h2' style='font-family: sans-serif;'>We have received your payment by bank transfer.<br>Your receipt is attached to this email. </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li><a href='$payment_receipt_link' target='_bank'>Click here</a> to download your receipt.  </li>
                                </ul>
                              </td>
                            </tr>
                          </tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Badge collection</b> </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;'>You will receive information on how and when to collect your badge before the event. We kindly require that you bring the identification document you used in your registration process when collecting your badge. </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Programme </b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li>You can view the congress programme at <a href='https://apacongress.africa/programme/'>apacongress.africa/programme</a></li>
                                </ul>
                            </td>
                          </tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0; color:#37af47;text-transform:uppercase'><b>Important information for international delegates </b> </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Accommodation</b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                              <ul>
                                <li><a href='https://www.travelzuri.com/B2C/Admin/GTC/EventInfoCart.aspx?Ref_Type=HTL&CID=87&CityCode=KGL&EventName=Africa%20Protected%20Area%20Congress%20&SSr=EVTHL#' target='_bank'>Click here</a> to book your accommodation for your stay in Kigali   </li>
                              </ul>
                              
                            </td>
                          </tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Visa information:</b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li>Visas are issued on arrival for all countries </li>
                                  <li>Visa fees for citizens of African Union, Commonwealth and La Francophonie member states are waived for a visit of up to 30 days</li>
                                  <li><a href='https://www.migration.gov.rw/anounce/anounce/online-visa/' target='_bank'>Click here</a> for more information on Rwanda’s open visa policy  </li>

                                </ul>
                            </td>
                          </tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Destination information</b> </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'>Rwanda’s stunning scenery and warm, friendly people offer unique experiences in one of the most remarkable countries in the world. It is blessed with extraordinary biodiversity, with incredible wildlife living throughout its volcanoes, montane rainforest and sweeping plains.</td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'>Go to <a href='https://www.visitrwanda.com/' target='_bank'>www.visitrwanda.com</a> for more information on activities and excursions you can experience during your time in Rwanda.</td></tr>


                        </tr>
                      </table>
                    </td>
                  </tr>

        ".self::emailLayoutSectionFooter();

        Email::send($_Email_, $_Subject_, $_Message_);
  }


  /** - 6 - Send Email - Participant - Email received when credit card payment fails  - NEED TO PAY -  */
  public static function sendEmailToParticipantWhenCreditCardPaymentFails($_data_){
    $_data_                  = (Object) $_data_;
    $email 		               = $_data_->email;
    $firstname               = $_data_->firstname;
    $payment_link            = $_data_->payment_link;

    $_Email_    = $email;
    $_Subject_  = 'Payment error - IUCN Africa Protected Areas Congress (APAC) Registration';
    $_Message_  = self::emailSectionHeaderLayout()."
                  <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear <b>$firstname</b></td>
                        </tr>
                        
                        <tr><td class='h2' style='font-family: sans-serif;padding:0;'>It appears that your card payment has not gone through. Kindly follow this link to go through the payment process again <a href='$payment_link'> $payment_link </a></td></tr>
                        <tr><td class='h2' style='font-family: sans-serif;padding:0;'>If you are still experiencing challenges, please email <a href='mailto:ianangwe@awf.org'>IAnangwe@awf.org</a> with your name & telephone number and our team will get back to you to assist.</td></tr>
                      </table>
                    </td>
                  </tr>

    ".self::emailLayoutSectionFooter2();

    Email::send($_Email_, $_Subject_, $_Message_);
}


  /** - 7 - Send Email - Participant - Email received when bank transfer has not appeared in the IUCN account 7 days after registration -  */
  public static function sendEmailToParticipantWhenBankTransafertNotAppearedInIUCNAccount7DaysAfterRegistration($_data_){
      $_data_                  = (Object) $_data_;
      $email 		               = $_data_->email;
      $firstname               = $_data_->firstname;
      $payment_receipt_link    = $_data_->payment_receipt_link;

      $_Email_    = $email;
      $_Subject_  = 'Payment query - IUCN Africa Protected Areas Congress (APAC) Registration';
      $_Message_  = self::emailSectionHeaderLayout()."
                    <tr>
                      <td class='innerpadding borderbottom'>
                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>Dear <b>$firstname</b></td>
                          </tr>
                          
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'>It appears that your bank transfer payment has not been received to date. 
                            Please send us the proof of transfer to help us trace it if you have already made the payment. 
                            If you have not made the transfer yet, please let us know when you intend to so we may trace the payment & confirmation your attendance to the congress. <br>
                            Please contact us using the details below if you have any queries on your payment process. 
                          </td></tr>
                        
                        </table>
                      </td>
                    </tr>

      ".self::emailLayoutSectionFooter2();

      Email::send($_Email_, $_Subject_, $_Message_);
  }



  /** - 8 - Send Email - Participant - Email received after successful registration for those that do not pay (Speakers, Invited guests, Secratariat, Staff etc) -  */
  public static function sendEmailToParticipantAfterSuccessfulRegistrationFree($_data_){
      $_data_                  = (Object) $_data_;
      $email 		               = $_data_->email;
      $firstname               = $_data_->firstname;

      $_Email_    = $email;
      $_Subject_  = 'Confirmation - IUCN Africa Protected Areas Congress (APAC) Registration';
      $_Message_  = self::emailSectionHeaderLayout()."
                  <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear <b>$firstname</b></td>
                        </tr>
                        <tr>
                        <tr>
                          <tr><td class='h2' style='font-family: sans-serif;'>Thank you for registering to attend the <b>IUCN Africa Protected Areas Congress (APAC)</b>  that will be held in Kigali, Rwanda, from 7 – 12 March 2022.  </tr>
                         
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Badge collection</b> </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;'>You will receive information on how and when to collect your badge before the event. We kindly require that you bring the identification document you used in your registration process when collecting your badge. </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Programme </b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li>You can view the congress programme at <a href='https://apacongress.africa/programme/'>apacongress.africa/programme</a></li>
                                </ul>
                            </td>
                          </tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0; color:#37af47;text-transform:uppercase'><b>Important information for international delegates </b> </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Accommodation</b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                              <ul>
                                <li><a href='https://www.travelzuri.com/B2C/Admin/GTC/EventInfoCart.aspx?Ref_Type=HTL&CID=87&CityCode=KGL&EventName=Africa%20Protected%20Area%20Congress%20&SSr=EVTHL#' target='_bank'>Click here</a> to book your accommodation for your stay in Kigali   </li>
                              </ul>
                              
                            </td>
                          </tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Visa information:</b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li>Visas are issued on arrival for all countries </li>
                                  <li>Visa fees for citizens of African Union, Commonwealth and La Francophonie member states are waived for a visit of up to 30 days</li>
                                  <li><a href='https://www.migration.gov.rw/anounce/anounce/online-visa/' target='_bank'>Click here</a> for more information on Rwanda’s open visa policy  </li>

                                </ul>
                            </td>
                          </tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Destination information</b> </td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'>Rwanda’s stunning scenery and warm, friendly people offer unique experiences in one of the most remarkable countries in the world. It is blessed with extraordinary biodiversity, with incredible wildlife living throughout its volcanoes, montane rainforest and sweeping plains.</td></tr>
                          <tr><td class='h2' style='font-family: sans-serif;padding:0;'>Go to <a href='https://www.visitrwanda.com/' target='_bank'>www.visitrwanda.com</a> for more information on activities and excursions you can experience during your time in Rwanda.</td></tr>


                        </tr>
                      </table>
                    </td>
                  </tr>

      ".self::emailLayoutSectionFooter();

      Email::send($_Email_, $_Subject_, $_Message_);
  }



  /** - 9 - Send Email - Participant - Email received after media application -  */
  public static function sendEmailToParticipantAfterMediaApplication($_data_){
    $_data_                  = (Object) $_data_;
    $email 		               = $_data_->email;
    $firstname               = $_data_->firstname;

    $_Email_    = $email;
    $_Subject_  = 'Confirmation - IUCN Africa Protected Areas Congress (APAC) Registrations';
    $_Message_  = self::emailSectionHeaderLayout()."
                  <tr>
                    <td class='innerpadding borderbottom'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>Dear <b>$firstname</b></td>
                        </tr>
                        
                        <tr><td class='h2' style='font-family: sans-serif;padding:0;'>Thank you for applying for media accreditation to attend the IUCN Africa Protected Areas Congress (APAC) that will be held in Kigali, Rwanda, from 7 – 12 March 2022. 
                        </td></tr>

                        <tr><td class='h2' style='font-family: sans-serif;padding:0;'>The APAC Event Secretariat will review your application and revert within the next 5 working days. 
                        </td></tr>

                        <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>International media</b> </td></tr>
                          <tr>
                            <td class='h2' style='font-family: sans-serif;'>
                                <ul>
                                  <li>Please do not book travel or accommodation until you have received confirmation to attend as accredited media. </li>
                                </ul>
                            </td>
                          </tr>
                       
                      </table>
                    </td>
                  </tr>

    ".self::emailLayoutSectionFooter2();
    
    Email::send($_Email_, $_Subject_, $_Message_);
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
          .content {width: 100%; max-width: 600px;border:1px solid #f2f2f2;}
          .header {padding: 15px 30px 15px 30px;}
          .innerpadding {padding: 30px 30px 10px 30px;}
          .borderbottom { background-color:#f6f6f6;}
          .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
          .h1 {color: #ffffff; font-family: sans-serif;}
          .h2, .bodycopy {color: #000; font-family: sans-serif;}
          .h1 {font-size: 30px; line-height: 38px; font-weight: bold;}
          .h2 {padding: 0 0 15px 0; font-size: 14px; line-height: 24px;}
          .h3 {padding: 0 0 5px 0; font-size: 14px; line-height: 28px; text-transform:uppercase}
          .bodycopy {font-size: 14px; line-height: 22px;}
          .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
          .button a {color: #ffffff; text-decoration: none;}
          .footer {padding: 10px 30px 10px 30px; border-bottom:10px solid #37af47;background: #fff;}
          .footer td a {color: #2a98c7; text-decoration:none}
          .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
          .footercopy a {color: #ffffff; text-decoration: none;}
          ul{margin:0;}
          a {color: #2a98c7 !important;}
          .alignment{display: inline-block;background: #37af47;width: 100px;height: 2px;-webkit-border-radius: 2px;-moz-border-radius: 2px;border-radius: 2px;margin-bottom: 4px;}

          @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
          body[yahoo] .hide {display: none!important;}
          body[yahoo] .buttonwrapper {background-color: transparent!important;}
          body[yahoo] .button {padding: 0px!important;}
          body[yahoo] .button a {background-color: #f47e20; padding: 15px 15px 13px!important;}

         }
          </style>
        </head>

        <body yahoo bgcolor='#fff'>
        
          <table width='100%' bgcolor='#fff' border='0' cellpadding='0' cellspacing='0'>
            <tr>
              <td>
                <table bgcolor='#ffffff' class='content' align='center' cellpadding='0' cellspacing='0' border='0'>
                  <tr>
                    <td bgcolor='#fff' class='header'>
                      <table width='60' align='left' border='0' cellpadding='0' cellspacing='0'>  
                        <tr>
                          <td>
                            <img class='fix' src='http://apacongress.torusguru.com/img/apac-web-logo.png' width='120' height='60' border='0' alt='' />
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
                    <td class='footer' bgcolor='#f6f6f6'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                               <td class='h3' style='font-family: sans-serif;'>Stay connected </td>
                            </table>
                            <span class='alignment'></span>
                            <table border='0' cellspacing='0' cellpadding='0'>
                               <tr><td class='h2' style='font-family: sans-serif; padding:0;'><b>Twitter:</b> <a href='https://twitter.com/APA_Congress?s=20' target='_blank'>@APA_Congress</a></td></tr>
                               <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Connect with our official tag: </b><a href='#'>#APAC2022 </a></td></tr>
                               <tr><td class='h2' style='font-family: sans-serif;'>We look forward to meeting you in Kigali, Rwanda. </td></tr>
                               <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Yours Faithfully,</b> </td></tr>
                               <tr><td class='h2' style='font-family: sans-serif;'> The APAC Secretariat </td></tr>
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



    
    
    public static function emailLayoutSectionFooter2(){
      $_FooterLayout_ = "
                 <tr>
                    <td class='footer' bgcolor='#f6f6f6'>
                      <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tr>
                          <td'>
                            <table border='0' cellspacing='0' cellpadding='0'>
                               <tr><td class='h2' style='font-family: sans-serif;padding:15px 0 0 0;'><b>Yours Faithfully,</b> </td></tr>
                               <tr><td class='h2' style='font-family: sans-serif;'> The APAC Secretariat </td></tr>
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