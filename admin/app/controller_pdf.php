<?php
require '../core/init.php';
require '../config/FPDF/fpdf.php';
//require '../'.CTRL;

if(!Input::checkInput('request', 'get', 1) OR !Input::checkInput('authtoken_', 'get', 1))
  Redirect::to(404);

$_AUTH_TOKEN_ =   Input::get('authtoken_', 'get');

// echo Hash::encryptAuthToken(49);

if(!is_integer(($_PARTICIPANT_ID_   = Hash::decryptAuthToken($_AUTH_TOKEN_))))
    Redirect::to('');

if(!($_PARTICIPANT_DATA_ = FutureEventController::getEventParticipantDataByID($_PARTICIPANT_ID_)))
    Redirect::to('');

$mainPath_  = '../config/payment.pdf/invoice/';

echo '<pre>';
print_r($_PARTICIPANT_DATA_);
echo '</pre>';

if(Input::checkInput('request', 'get', 1)):
   switch(Input::get('request', 'get')):

     case 'print_payment_invoice':
       require $mainPath_.'payment.invoice'.PL;
       break;
   
     case 'print_payment_receipt':
       require $mainPath_.'payment.receipt'.PL;
       break;

     default:
       Redirect::to(404);
       break;
   endswitch;
endif;

