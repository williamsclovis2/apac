<?php


//$email1      = "ekalengya@valwallet.com";
//$email2      = "colombe@cube.rw";
$email      = "ezechielkalengya@gmail.com";
$subject    = "Registration confirmation for Hanga Pitchfest 2021";
$message    = dynamicMailMessage();

echo $message;
/**
 * This example shows making an SMTP connection with authentication.
 */

//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

require '../src/PHPMailer.php';
require '../src/SMTP.php';


//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Set the hostname of the mail server
$mail->Host = 'n3plcpnl0129.prod.ams3.secureserver.net';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
// $mail->SMTPSecure = "";
//Username to use for SMTP authentication
$mail->Username = 'admin@torusguru.com';
//Password to use for SMTP authentication
$mail->Password = 'EakSFV&qiwVP';
//Set who the message is to be sent from
$mail->setFrom('info@apacongress.torusguru.com', 'APAC Congress');
//Set an alternative reply-to address
$mail->addReplyTo('info@apacongress.torusguru.com', 'APAC Congress');
//Set who the message is to be sent to
$mail->addAddress($email, '');
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
     echo 'Mailer Error: ' . $mail->ErrorInfo;
    return false;
} else {
     echo 'Message sent!';
    return true;
}



function dynamicMailMessage(){
    $_Message_ = "
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
          .footer {padding: 22px 30px 10px 30px; border-bottom:10px solid #e85d27; background: #fff;}
          .footer td a {color: #2a98c7; text-decoration:none}
          .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
          .footercopy a {color: #ffffff; text-decoration: none;}
          ul{margin:0;}
          a {color: #000000 !important;}
          .alignment{display: inline-block; background: #e85d27; width: 100px;height: 2px;-webkit-border-radius: 2px;-moz-border-radius: 2px;border-radius: 2px;margin-bottom: 4px;}

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
                    <td bgcolor='#e85d27' class='header'>
                      <table width='60' align='left' border='0' cellpadding='0' cellspacing='0'>  
                        <tr>
                          <td height='60' style='padding: 10px 10px 10px 0;'>
                            <img class='fix' src='https://www.hangapitchfest.rw/img/logo-white.png' width='60' height='60' border='0' alt='' />
                          </td>
                        </tr>
                      </table>
                      
                      <table class='col425' align='left' border='0' cellpadding='0' cellspacing='0' style='width: auto; max-width: 425px;'>
                        <tr>
                          <td height='70'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                              <tr>
                                <!-- <td class='h1' style='padding: 5px 0 0 0; '>Hanga Pitchfest</td> -->
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
                          <td class='bodycopy' style='font-family: sans-serif; text-align: justify;'>
                            Your registration to attend Hanga Pitchfest 2021 has been confirmed.  <br> <br>
                          </td>
                        </tr>

                        <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Vaccination status requirements </b> </td></tr>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>
                              <ul>
                                <li> All guests attending Hanga Pitchfest ’21 must have received at least two doses of either Pfizer-BioNTech, AstraZeneca, Moderna, Sinopharm or Sputnik V vaccine or a single dose of Johnson & Johnson. </li>
                              </ul>
                          </td>
                        </tr>
                        
                        <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Advance Covid-19 PCR test  </b> </td></tr>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>
                              <ul>
                                <li>
                                  Guests will be required to go to the Covid-19 testing site for a PCR test. Details as follows: 

                                      <table style='margin-top: 13px;'>
                                        <tbody style='vertical-align: top;'>
                                          <tr>
                                            <th style='width: 120px;'> <ul> <li> Location: </li> </ul> </th>
                                            <th> Kigali Conference & Exhibition Village KN3 Ave, <br> Kigali – formerly known as Camp Kigali)</th>
                                          </tr>
                                          <tr>
                                            <th style='width: 120px;'> <ul> <li> Date:</li> </ul> </th>
                                            <th>9 December 2021 </th>
                                          </tr>
                                          <tr>
                                            <th style='width: 120px;'> <ul> <li> Time:</li> </ul> </th>
                                            <th>7am – 7pm   </th>
                                          </tr>
                                        </tbody>
                                      </table>  
                                    </li>
                                </li>
                              </ul>
                          </td>
                        </tr>

                        <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Arrival Antigen Rapid test  </b> </td></tr>
                        <tr>
                          <td class='h2' style='font-family: sans-serif;'>
                              <ul>
                                <li style='margin-bottom: 7px;'> An additional rapid test will be carried out on arrival at the Kigali Arena on 11 December 2021.  </li>
                                <li> Guests are requested to arrive at 12pm.   </li>
                              </ul>
                          </td>
                        </tr>

                        <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Costs for all tests will be covered by the organizer. <br>  </b> </td></tr>
                        <tr>
                          <td class='h2' style='font-family: sans-serif; padding-top: 15px; padding-bottom: 19px;'>
                            Please visit <a href='www.hangapitchfest.rw' style='color: #e85d27;' >www.hangapitchfest.rw</a> for the program.  <br> 
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
          





                  <tr>
                      <td class='footer' bgcolor='#fff'>
                        <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                          <tr>
                            <td'>
                              <table border='0' cellspacing='0' cellpadding='0'>
                                <td class='h2' style='font-family: sans-serif; padding:0; color: #e85d27; text-transform:uppercase;'><b>Stay connected</b</td>
                              </table>
                              <span class='alignment'></span>
                              <table border='0' cellspacing='0' cellpadding='0'>
                                <tr><td class='h2' style='font-family: sans-serif; padding:0;'><b>Twitter:</b> <a href='https://twitter.com/hangapitchfest' target='_blank'>@hangapitchfest </a></td></tr>
                                <tr><td class='h2' style='font-family: sans-serif;padding:0;'><b>Hashtag: </b><a href='#'>#HangaPitchFest  </a></td></tr>

                                <tr><td class='h2' style='font-family: sans-serif;padding:15px 0;'>Regards, </td></tr>

                                <tr><td class='h2' style='font-family: sans-serif;padding:0;'><bb>Hanga Pitchfest 2021 Secretariat</bb> </td></tr>
                                <tr><td class='h2' style='font-family: sans-serif;'> <a href='mailto:info@hangapitchfest.rw'>info@hangapitchfest.rw</a>  </td></tr>
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
    
    return $_Message_;
}