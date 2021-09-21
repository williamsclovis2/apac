<?php
require_once 'core/init.php';

if ($user->isLoggedIn()) {
    Redirect::to('admin/index');
}
if(empty(Input::get('id')) && empty(Input::get('code'))) {
    Redirect::to('admin/login');
}
if(Input::get('id') && Input::get('code')) {
    $id = base64_decode(Input::get('id'));
    $code = Input::get('code');
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
           <div class="ms-auth-col">
              <div class="ms-auth-bg"></div>
           </div>
           <div class="ms-auth-col">
              <div class="ms-auth-form">
                    <form action="<?php linkto("admin/pages/accounts/login_action.php"); ?>" class="m-t" id="resetForm" method="post">
                        <div class="succes-div" id="success-div" hidden></div>
                        <div class="failed-div" id="failed-div" hidden></div>
                        <div class="login-img">
                           <h3>Reset password</h3>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom08">New password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="New Password" data-rule="minlen:6" data-msg="Please enter at least 6 chars"/>
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <label for="validationCustom08">Confirm New Password</label>
                            <input type="password" class="form-control" name="password_again" id="password_again" placeholder="Confirm New Password" data-rule="matches" data-msg="Password doesn't match"/>
                            <div class="validate"></div>
                        </div>
                        <input type="hidden" name="request" value="reset" />
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <input type="hidden" name="code" value="<?php echo $code; ?>" /> 
                        <button type="submit" class="btn btn-primary block full-width m-b" id="resetButton">Reset now</button>
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
