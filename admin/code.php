<?php
require_once "core/init.php"; 

// $_data_ = array(
//     'email'     => 'ezechielkalengya@gmail.com', //clovismul@gmail.com
//     'firstname' => 'Kambale',
//     'fullname'  => 'Kambale Clovis',

//     'event'                 => 'The Future Summit',
//     'event_type'            => 'In-person',
//     'participation_type'    => 'Media',
//     'participation_subtype' => 'Early Bird',
//     'price'                 => '300',
//     'currency'              => 'USD'
// );
// // EmailController::sendEmailToParticipant123OnRegistration($_data_);
// EmailController::sendEmailToParticipant4OnRegistration($_data_);
// echo '<br><br><hr><br>';

$ID = 35;
$_ARRAY_DATA_ = FutureEventController::checkValidityEventPrivateInvitationLink($ID);

echo '<pre>';
print_r($_ARRAY_DATA_);
echo '</pre>';