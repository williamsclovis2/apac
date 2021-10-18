<?php
require_once '../../core/init.php';
//echo '<pre>';
//print_r($_GET);
//echo '</pre>';

if(Input::checkInput('state', 'get', 1)):
    switch(Input::get('state', 'get')):
        case 'ON_CALLED':
            Redirect::to('payment/called/notification/'.sha1(time()));
        break;
        case 'ON_RESPONSE':
            Redirect::to('payment/success/notification/'.sha1(time()));
        break;
    endswitch;
    
else:
    Redirect::to('index');
endif;

?>