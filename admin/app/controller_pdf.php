<?php
require '../core/init.php';
require '../config/FPDF/fpdf.php';
//require '../'.CTRL;

//if($session_user->isLoggedIn()):
  $mainPath_  = '../config/payment.pdf/invoice/';

echo $mainPath_;

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
//else:
//  Redirect::to(404);
//endif;
