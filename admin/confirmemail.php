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
                    <form action="<?php linkto("admin/pages/accounts/login_action.php"); ?>" class="m-t" id="confirmForm" method="post">
                        <div class="succes-div" id="success-div" hidden></div>
                        <div class="failed-div" id="failed-div" hidden></div>
                        <div id="hideForm">
                            <div class="login-img">
                               <h3 style="font-size: 15px;">Enter your email address to receive your reset link</h3>
                            </div>
                            <div class="form-group">
                                <!-- <label for="validationCustom08">Enter your email address to receive your reset link</label> -->
                                <input type="text" class="form-control" name="username" id="username" placeholder="Email" data-rule="email" data-msg="Please enter your email"/>
                                <div class="validate"></div>
                            </div>
                            <input type="hidden" name="request" value="confirm" /> 
                            <button type="submit" class="btn btn-primary block full-width m-b" id="confirmButton">Reset now</button>
                        </div>
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
