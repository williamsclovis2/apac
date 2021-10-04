<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }

    $page = "participants";
    $link = "all";
    $eventId = base64_decode(Input::get('eventId'));

?>

<!DOCTYPE html>
<html>

<head>
    <?php include $INC_DIR . "head.php"; ?>
    <script src="<?php linkto('admin/js/jquery-2.1.1.js'); ?>"></script>
</head>

<body>
    <div id="wrapper">

        <?php include $INC_DIR . "nav.php"; ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Participants</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php linkto('admin/'); ?>">Home</a>
                    </li>
                    <li>
                        <a>Participants</a>
                    </li>
                    <li class="active">
                        <strong>All participants</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <!-- <div class="col-lg-2"></div> -->
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="type_subtype">
                            <a href="#" class="btn btn-primary" style="display: inline-block;">In-person</a>
                            <a href="#" class="btn btn-primary" style="display: inline-block;">Virtual</a>
                            <a href="#" class="btn btn-primary" style="display: inline-block;">Early Bird / In-person </a>
                            <a href="#" class="btn btn-primary" style="display: inline-block;">Early Bird / Virtual</a>
                            <a href="#" class="btn btn-primary" style="display: inline-block;">Standard / In-person</a>
                            <a href="#" class="btn btn-primary" style="display: inline-block;">Standard / Virtual</a>
                        </div>
                        <div class="ibox-title" style="height: auto;">
                          
                        </div>

                        <div class="ibox-content" id="participants-table"></div>
                    </div>
                </div>
                <!-- <div class="col-lg-2"></div> -->
            </div>
        </div>

        <script type="text/javascript">
            var eventId = '<?php echo $eventId; ?>';
            var linkto  = '<?php linkto("admin/pages/participants/participants_action.php"); ?>';
        </script>
        <script src="<?php linkto('admin/pages/participants/participants.js'); ?>"></script>
        
        <?php include $INC_DIR . "footer.php"; ?>

        </div>
        </div>
</body>

</html>
