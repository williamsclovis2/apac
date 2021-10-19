<?php
    require_once "../../core/init.php"; 

    $valid['success'] = array('success' => false, 'messages' => array());

    // Get captcha session
    if(Input::get('request') && Input::get('request') == 'captchaSession') {
        $valid['success']  = true;
        $valid['messages'] = $_SESSION['captcha'];
        echo json_encode($valid);
    }

    // Login
    if(Input::get('request') && Input::get('request') == 'login') {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true),
            'password' => array('required' => true)
        ));
        if($validate->passed()) {
            $user = new User();
            $remember = (Input::get('remember') === 'on') ? true : false;
            $login = $user->login(Input::get('username'), Input::get('password'), $remember);
            if($login) {
                $valid['success']  = true;
                $valid['messages'] = "Login Successfully";
            } else {
                $valid['success']  = false;
                $valid['messages'] = "Incorrect username or password";
            }
        } else {
            foreach($validate->errors() as $error) {
                $errmsg .= $error . "<br>";
                $valid['success']  = false;
                $valid['messages'] = $errmsg;
            }
        }
        echo json_encode($valid);
    }

    // Confirm email
    if(Input::get('request') && Input::get('request') == 'confirm') {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array('required' => true)
        ));
        $email = Input::get('username');
        if($validate->passed()) {
            $user = DB::getInstance()->get('users', array('username', '=', $email));
            if(!$user->count()) {
                $valid['success']  = false;
                $valid['messages'] = "Sorry! this email is not found";
            } else {
                $userId = $user->first()->id;
                $id     = base64_encode($userId);
                $code   = md5(uniqid(rand()));
                $user = new User();
                $user->update(array('token' => $code), $userId);
                $message= "
                <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                <html xmlns='http://www.w3.org/1999/xhtml'>
                <head>
                  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                  <title>The Future Summit</title>
                  <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Ubuntu' />
                  <style type='text/css'>
                  body {margin: 0; padding: 0; min-width: 100%!important; font-family: sans-serif;}
                  img {height: auto;}
                  .content {width: 100%; max-width: 600px;}
                  .header {padding: 20px 30px 20px 30px;}
                  .innerpadding {padding: 30px 30px 30px 30px;}
                  .borderbottom {border-bottom: 1px solid #f2eeed;}
                  .subhead {font-size: 15px; color: #ffffff; font-family: sans-serif; letter-spacing: 10px;}
                  .h1 {color: #ffffff; font-family: sans-serif;}
                  .h2, .bodycopy {color: #7A838B; font-family: sans-serif;}
                  .h1 {font-size: 30px; line-height: 38px; font-weight: bold;}
                  .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
                  .bodycopy {font-size: 16px; line-height: 22px;}
                  .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold; padding: 0 30px 0 30px;}
                  .button a {color: #ffffff; text-decoration: none;}
                  .footer {padding: 20px 30px 15px 30px;}
                  .footer td a {color: #f37e22;}
                  .footercopy {font-family: sans-serif; font-size: 14px; color: #ffffff;}
                  .footercopy a {color: #ffffff; text-decoration: none;}

                  @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
                  body[yahoo] .hide {display: none!important;}
                  body[yahoo] .buttonwrapper {background-color: transparent!important;}
                  body[yahoo] .button {padding: 0px!important;}
                  body[yahoo] .button a {background-color: #f47e20; padding: 15px 15px 13px!important;}
                 }
                  </style>
                </head>

                <body yahoo bgcolor='#f4f4f4'>
                  <table width='100%' bgcolor='#f4f4f4' border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td>
                        <table bgcolor='#ffffff' class='content' align='center' cellpadding='0' cellspacing='0' border='0'>
                          <tr>
                            <td bgcolor='#f47e20' class='header'>
                              <table width='60' align='left' border='0' cellpadding='0' cellspacing='0'>  
                                <tr>
                                  <td height='60' style='padding: 10px 10px 10px 0;'>
                                    <img class='fix' src='http://torusguru.com/thefuture/img/logo.png' width='60' height='60' border='0' alt='' />
                                  </td>
                                </tr>
                              </table>
                              
                              <table class='col425' align='left' border='0' cellpadding='0' cellspacing='0' style='width: auto; max-width: 425px;'>
                                <tr>
                                  <td height='70'>
                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                      <tr>
                                        <td class='h1' style='padding: 5px 0 0 0; font-family: sans-serif;'>The Future Summit</td>
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
                                  <td class='h2' style='font-family: sans-serif;'>Hello,</td>
                                </tr>
                                <tr>
                                  <td class='bodycopy' style='font-family: sans-serif;'>
                                    You recently requested a password reset for [system name which we will decide later]. To update your login information, click on the link below. <br><br>
                                    <a href='http://www.torusguru.com/thefuture/admin/resetpassword.php?id=$id&code=$code'  style='color:#fff; background-color:#f47e20; text-decoration:none; padding: 10px; width:150px;'>Reset password</a><br><br> 
                                     PLEASE NOTE: If you do not want to update your login, you may ignore this email and nothing will be changed. If you believe you received this email in error,<a href='http://torusguru.com/thefuture' style='text-decoration: none; color:#f47e20;' target='_blank'> contact us.</a>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          <tr>
                            <td class='footer' bgcolor='#000000'>
                              <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                  <td align='center' class='footercopy' style='font-family: sans-serif;'>
                                  &copy; <?php echo date('Y'); ?>
                                    <a href='http://torusguru.com/thefuture' class='unsubscribe' target='_blank'><font color='#ffffff'><strong>The Future Summit</strong></font></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td align='center' style='padding: 20px 0 0 0;'>
                                    <table border='0' cellspacing='0' cellpadding='0'>
                                      <tr>
                                        <td width='37' style='text-align: center; padding: 0 10px 0 10px;'>
                                          <a href='http://www.facebook.com/' target='_blank'>
                                            <img src='http://torusguru.com/thefuture/img/facebook.png' width='37' height='37' alt='Facebook' border='0'/>
                                          </a>
                                        </td>
                                        <td width='37' style='text-align: center; padding: 0 10px 0 10px;'>
                                          <a href='http://www.twitter.com/' target='_blank'>
                                            <img src='http://torusguru.com/thefuture/img/twitter.png' width='37' height='37' alt='Twitter' border='0'/>
                                          </a>
                                        </td>
                                        <td width='37' style='text-align: center; padding: 0 10px 0 10px;'>
                                          <a href='http://www.instagram.com/' target='_blank'>
                                            <img src='http://torusguru.com/thefuture/img/instagram.png' width='37' height='37' alt='Instagram' border='0'/>
                                          </a>
                                        </td>
                                      </tr>
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
                </html>";
                $subject = "Password Reset";
        
                $user->send_mail($email,$message,$subject);

                $valid['success']  = true;
                $valid['messages'] = "We've sent an email to <strong>$email</strong>. Please click on the password reset link in the email to generate a new password";
            }
        } else {
            foreach($validate->errors() as $error) {
                $errmsg .= $error . "<br>";
                $valid['success']  = false;
                $valid['messages'] = $errmsg;
            }
        }
        echo json_encode($valid);
    }

    // Reset password
    if(Input::get('request') && Input::get('request') == 'reset') {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            )
        ));
        if($validate->passed()) {
            $id   = escape(Input::get('id'));
            $code = escape(Input::get('code'));
            $findUser = DB::getInstance()->query("SELECT * FROM `users` WHERE `id` = $id AND `token` = '$code'");
            if ($findUser->count()) {
                $salt = Hash::salt(32);
                $user->update(array('password' => Hash::make(Input::get('password'), $salt),'salt' => $salt), $id);
                $valid['success']  = true;
                $valid['messages'] = "Your password has been changed!";
            } else {
                $valid['success']  = false;
                $valid['messages'] = "No account found, try again";
            }
        } else {
            foreach($validate->errors() as $error) {
                $errmsg .= $error . "<br>";
                $valid['success']  = false;
                $valid['messages'] = $errmsg;
            }
        }
        echo json_encode($valid);
    }
?>


