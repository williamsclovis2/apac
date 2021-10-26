<?php
require_once "core/init.php"; 

// echo 'ok';

// echo Hash::encryptAuthToken(19);

$_data_ = array(
    'email' => 'ezechielkalengya@gmail.com',
    'firstname' => 'Ezechiel'
);

EmailController::sendEmailToParticipantAfterMediaApplication($_data_);