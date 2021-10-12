<?php
require_once 'admin/core/init.php';
if(Session::exists('username') AND Session::exists('userToken'))
    Redirect::to('live');
?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <?php include 'includes/head.php';?> 
</head>

<body>

   <?php include 'includes/nav-session.php';?>
   <?php
        $getContent = DB::getInstance()->get('future_event', array('id', '=', $activeEventId));
        $banner     = $getContent->first()->banner;
        $event_name = $getContent->first()->event_name;
        $start_date = date('j', strtotime(dateFormat($getContent->first()->start_date)));
        $end_date   = date("j F Y", strtotime(dateFormat($getContent->first()->end_date)));
        $event_date = $start_date." - ".$end_date;
    ?>

    <div class="slider_area">
        <div class="single_slider single_slider_reg d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-12">
                        <div class="slider_text slider_text_register">
                            <h3 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s"><?=$_Dictionary->translate('Login to join the event')?></h3>
                            <span class="separator-line wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="service_area about_event" style="margin-top: -3%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form  class="login-form bg-gray mt-5" id="loginForm" method="post">
                        <div id="login-messages" style="margin-bottom: 10px;"></div>
                        <h4><?=$_Dictionary->translate('Login to join the event')?></h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group field-validate">
                                    <input class="form-control" id="username" name="username" type="text" placeholder="<?=$_Dictionary->translate('Username')?>" data-rule="required" data-msg="<?=$_Dictionary->translate('Please enter username')?>"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group field-validate">
                                    <input class="form-control" id="password" name="password" type="password" placeholder="<?=$_Dictionary->translate('Password')?>" data-rule="required" data-msg="<?=$_Dictionary->translate('Please enter password')?>"/>
                                    <div class="validate"></div>
                                </div>
                            </div>
                        </div>
                        <div class="check-div">
                            <label>
                                <input type="checkbox" name="remember" id="remember"><span> <?=$_Dictionary->translate('Remember me')?></span> 
                            </label>
                            <a href="<?php linkto('confirmemail'); ?>" class="forgot pull-right"><?=$_Dictionary->translate('Forgot password?')?></a>
                        </div>
                        <div class="form-group mt-3">
                            <input type="hidden" name="request" value="login">
                            <button type="submit" id="loginButton" class="btn btn-primary py-1 text-white"><?=$_Dictionary->translate('Submit')?></button>
                        </div>
                        <div class="check-div reg-here">
                            <label><?=$_Dictionary->translate('Not registered yet?')?></label>
                            <a href="<?php linkto("index")?>" class="forgot pull-right"><?=$_Dictionary->translate('Register here')?></a>
                        </div>  
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php';?>
    <script src="<?php linkto('forms/register-form.js'); ?>"></script>
</body>

</html>