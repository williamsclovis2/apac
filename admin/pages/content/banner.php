<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }
    if (!$user->hasPermission('admin')) {
        Redirect::to('admin/index');
    }

    $page = "content";
    $link = "banner";
    $eventId = base64_decode(Input::get('eventId'));
?>

<!DOCTYPE html>
<html>

<head>
    <?php include $INC_DIR . "head.php"; ?>
</head>

<body>
    <div id="wrapper">

        <?php include $INC_DIR . "nav.php"; ?>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Events</h2>
                <ol class="breadcrumb">
                    <li><a href="<?php linkto('admin/'); ?>">Home</a></li>
                    <li><a href="<?php linkto('admin/pages/events/events_list'); ?>">Events</a></li>
                    <li><a>Website content</a></li>
                    <li class="active"><strong>Website banner</strong></li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="ibox float-e-margins" id="eventBanner">
                        
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>

            <div class="modal inmodal fade" id="editBannerModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Edit website banner</h4>
                        </div>     
                        <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="editEventImageForm" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div id="edit-eventImage-messages"></div>
                                <p>All <small class="red-color">*</small> fields are mandatory</p>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="editEventImage" class="col-sm-3 control-label">Upload website banner<small class="red-color">*</small></label>
                                        <label class="col-sm-1 control-label">: </label>
                                        <div class="col-sm-8">
                                            <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>
                                            <div class="kv-avatar center-block">                            
                                                <input type="file" class="form-control" id="editEventImage" placeholder="Upload website banner" name="editEventImage" class="file-loading" style="width:auto;"/>
                                            </div>
                                            <p style="color: red; margin-top: 10px;">Image size: 1080 × 516<br>
                                            Format: jpg or png file</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer editEventImageFooter">
                                <input type="hidden" name="request" value="editEventImage" />
                                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                <!-- <button type="submit" id="editEventImageButton" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

         <script type="text/javascript">
            var eventId = '<?php echo $eventId; ?>';
            var linkto  = '<?php linkto("admin/pages/content/content_action.php"); ?>';
        </script>
        <script src="<?php linkto('admin/pages/content/banner.js'); ?>"></script>
        
        <?php include $INC_DIR . "footer.php"; ?>
        
        </div>
        </div>
</body>

</html>
