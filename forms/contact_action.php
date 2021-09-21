<?php
  require_once "../admin/core/init.php"; 

  $valid['success'] = array('success' => false, 'messages' => array());

  // Get captcha session
  if(Input::get('request') && Input::get('request') == 'captchaSession') {
    $valid['success']  = true;
    $valid['messages'] = $_SESSION['captcha'];
    echo json_encode($valid);
  }

  // Delegate register
  if(Input::get('request') && Input::get('request') == 'partnerWithUs') {
    try {
      $controller->create("future_contact", array(
        'event_id'          => Input::get('eventId'),
        'firstname'         => escape(Input::get('firstname')),
        'lastname'          => escape(Input::get('lastname')),
        'email'             => escape(Input::get('email')),
        'telephone'         => escape(Input::get('telephone')),
        'organisation_name' => escape(Input::get('organisation_name')),
        'website'           => escape(Input::get('website')),
        'message'           => escape(Input::get('message')),
        'category'          => "Partner",
        'status'            => "Pending",
        'send_date'         => date('Y-m-d H:i:s')
      ));

      $valid['success']  = true;
      $valid['messages'] = "Successfully sent"; 
    } catch(Exception $error) {
      $valid['success']  = false;
      $valid['messages'] = "Error while sending message";
    }
    echo json_encode($valid);
  }

?>


