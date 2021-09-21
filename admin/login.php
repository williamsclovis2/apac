<?php
require_once 'core/init.php';

if ($user->isLoggedIn()) {
    Redirect::to('admin/index');
}
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>The Future Summit</title>
    <link rel="icon" type="image/png" href="<?php linkto('img/favicon.png'); ?>">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="<?php linkto('css/custom.css'); ?>" rel="stylesheet">

</head>

<body class="gray-bg" style="background:#0d1418;">
    <div class="ms-content-wrapper ms-auth">
        <div class="ms-auth-container">
           <div class="ms-auth-col hidden-xs">
              <div class="ms-auth-bg"></div>
           </div>
           <div class="ms-auth-col">

              <div class="ms-auth-form">
                    <form action="<?php linkto("admin/pages/accounts/login_action.php"); ?>" class="m-t" id="loginForm" role="form" method="post">
                         <img src="<?php linkto('img/future-logo.png'); ?>" class="visible-xs img-responsive form-logo" alt="logo">
                        <div class="succes-div" id="success-div" hidden></div>
                        <div class="failed-div" id="failed-div" hidden></div>
                        <div class="wrong" id="log-div" hidden>
                            <span class="fo-login"><i class="fa fa-info-circle"></i> Authenticating</span>
                            <div class="dot">
                                <span class="l-1"></span>
                                <span class="l-2"></span>
                                <span class="l-3"></span>
                            </div>
                        </div>
                        <div class="login-img">
                           <h3>Sign in to your account</h3>
                        </div>
                        <div class="form-group">
                            <label for="username">Email address</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Email" data-rule="email" data-msg="Please enter your email"/>
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <label for="username">Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" data-rule="required" data-msg="Please enter your password"/>
                            <div class="validate"></div>
                            <label style=" margin-top: 5px;">*Password is case sensitive</label>
                        </div>
                        <div class="form-group">
                           <label class="ms-checkbox-wrap"> Remember password 
                                <input type="checkbox">
                                <span class="ms-checkbox-check"></span>
                            </label><br>
                            <label class="d-block"><a href="<?php linkto('admin/confirmemail');?>" class="btn-link forgot-pass">Forgot password?</a></label>
                        </div>
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-md-5 col-sm-12 col-xm-12">
                                <img src="<?=linkto('admin/get_captcha.php?rand='.rand())?>" id='captcha' class="img" style="width: 70%;">
                                <a href="javascript:void(0)" id="reloadCaptcha" title="Refresh" style="color: #f47821; font-size: 18px; margin-left: 10px;"><i class="fa fa-refresh"></i></a>
                             </div>
                             <div class="col-md-7 col-sm-12 col-xm-12">
                                <div class="form-group">
                                    <!-- <label>Type the characters you see</label> -->
                                    <input type="text" id="securityCode" placeholder="Type the captcha" name="securityCode" class="form-control" data-rule="required" data-msg="Enter security code"/>
                                    <div class="validate"></div>
                                    <small><span id="security_error" style="color: red;"></span></small>
                                    <small><span id="securityCode_error" style="color: red;"></span></small>
                                </div>  
                            </div>
                        </div>
                        <input type="hidden" name="request" value="login"/> 
                        <button type="submit" class="btn btn-primary block full-width m-b" id="loginButton" data-loading-text="Loading..." autocomplete="off">Login</button>
                    </form>
              </div>
           </div>
        </div>
    </div> 
    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="<?php linkto('admin/pages/accounts/login.js'); ?>"></script>

</body>

</html>
