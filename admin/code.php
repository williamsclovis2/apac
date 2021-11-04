<?php
require_once "core/init.php"; 

// $array1 = array(
//     'name' => 'Ezechiel',
//     'email'=> 'ezechi@gm.io'
// );

// $array1['telephone'] = '07876545678';


$var_path = '../../adminPortal/data_system/profile.png';

//echo "<img src='$var_path' />";

echo $_SERVER['DOCUMENT_ROOT'].'<hr>';

?>
<a href="<?=$_SERVER['DOCUMENT_ROOT'].'/../adminPortal'?>"> img PROFILE</a>
<?php


//echo Config::get('filepath/image').'/img/invoice/APAC_LOGO_PRESS_01.png';

// $_data_ = array(
//     'email' => 'ezechielkalengya@gmail.com',
//     'firstname' => 'Ezechiel'
// );

// EmailController::sendEmailToParticipantAfterMediaApplication($_data_);