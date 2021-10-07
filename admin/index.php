<?php
require_once "core/init.php"; 

if(!$user->isLoggedIn()) {
    Redirect::to('admin/login');
}
if (!$user->hasPermission('admin')) {
    Redirect::to('admin/pages/events/events_list');
}

$page = "home";
?>
<!DOCTYPE html>
<html>

<head>
    <?php include  "includes/head-index.php"; ?>
</head>

<body>
    <div id="wrapper">
        
        <?php include "includes/nav.php"; ?>

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php linkto("admin/pages/events/events_list"); ?>" class="btn btn-xs btn-primary pull-right"><i class="fa fa-eye"></i> View</a>
                            <h5>Events</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">
                                <?php
                                    $controller->get('future_event', '*', NULL, "", '');
                                    echo $controller->count();
                                ?>
                                <span class="pull-right"><i class="fa fa-calendar"></i></span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php linkto("admin/pages/accounts/clients"); ?>" class="btn btn-xs btn-info pull-right"><i class="fa fa-eye"></i> View</a>
                            <h5>Clients</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">
                                <?php
                                    $controller->get('future_client', '*', NULL, "", '');
                                    echo $controller->count();
                                ?>
                                <span class="pull-right"><i class="fa fa-calendar"></i></span>
                            </h1>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
                
        <?php include $INC_DIR . "footer-index.php"; ?>

        </div>
    </div>
</body>
</html>