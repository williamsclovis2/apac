<?php
require_once "core/init.php"; 


$_DATA_ = FutureEventController::getVisiblePacipationSubCategory(7, 'INPERSON');

// foreach($_DATA_ As $_data):
//     $_data = (Object) $_data;
    
//     echo '<pre>';
//     print_r($_data->participation_type_name);
//     echo '</pre>';

// endforeach;
// $ctx = 235;
// echo $ctx;
// echo '<hr>';

// $Hash = new Hash();

// $encToken = Hash::encryptToken($ctx);
// echo $encToken;
// echo '<hr>';

// echo $Hash->encryptAES($encToken);
// echo '<hr>';

// $enc = "4b335a2b51386a424d4278726f744b525a324b4837372b714f43484f696e542f6d55536b754d4f596a6149";
// echo $enc;


// echo '<hr>';

// $dec = Hash::decryptAuthToken($enc);
// echo $dec;

echo var_dump(FutureEventController::getParticipantDataByID(53));