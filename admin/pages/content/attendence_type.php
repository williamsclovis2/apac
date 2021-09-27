<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }

    $page = "content";
    $link = "attedence_type";
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
                    <li class="active"><strong>participation type</strong></li>
                </ol>
            </div>
            <div class="col-lg-2">
                <!-- <button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#addPartnerModal" id="addClient" style="margin-top: 50px;"><i class="fa fa fa-external-link"></i> Generate pivite link</button> -->
                <!-- Generate Link modal -->
                
                <div class="modal inmodal fade" id="attedence_type" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Add participation type</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body">
                                    <div id="add-partner-messages"></div>
                                    <p>All <small class="red-color">*</small> fields are mandatory</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group col-md-12">
                                                <label>Name<small class="red-color">*</small></label>
                                                <input type="text" name="name" id="name" placeholder="Attendence name" class="form-control" data-rule="required" data-msg="Please enter  name"/>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Payment  state<small class="red-color">*</small></label>
                                                <select class="form-control" name="payment_state" id="payment_state" data-rule="required" data-msg="Please select  payment state"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="payable">Payable</option>
                                                    <option value="free">Free</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Visibility<small class="red-color">*</small></label>
                                                <select class="form-control" name="visibility" id="visibility" data-rule="required" data-msg="Please select  visibility"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="Public">Public</option>
                                                    <option value="Privite">Privite</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="request" value="sendLink"/> 
                                    <input type="hidden" name="eventId" value="<?php echo $eventId; ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="submit" id="addPartnerButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa fa-external-link"></i> Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Link Modal  -->
                <div class="modal inmodal fade" id="edit_type" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Edit  participation type</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body">
                                    <div id="add-partner-messages"></div>
                                    <p>All <small class="red-color">*</small> fields are mandatory</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group col-md-12">
                                                <label>Name<small class="red-color">*</small></label>
                                                <input type="text" name="name" id="name" placeholder="Attendence name" class="form-control" data-rule="required" data-msg="Please enter  name"/>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Payment  state<small class="red-color">*</small></label>
                                                <select class="form-control" name="payment_state" id="payment_state" data-rule="required" data-msg="Please select  payment state"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="payable">Payable</option>
                                                    <option value="free">Free</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Visibility<small class="red-color">*</small></label>
                                                <select class="form-control" name="visibility" id="visibility" data-rule="required" data-msg="Please select  visibility"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="Public">Public</option>
                                                    <option value="Privite">Privite</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="request" value="sendLink"/> 
                                    <input type="hidden" name="eventId" value="<?php echo $eventId; ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="submit" id="addPartnerButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa fa-external-link"></i> Send link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Modal  -->
                <div class="modal inmodal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Delete  participation type</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body text-center">
                                    <h3>Do you really want to delete this participation type </h3>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="request" value="sendLink"/> 
                                    <input type="hidden" name="eventId" value="<?php echo $eventId; ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="submit" id="addPartnerButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa fa-trash"></i> Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Activate Modal  -->
                <div class="modal inmodal fade" id="activate" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Activate  participation type</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body text-center">
                                    <h3>Do you really want to activate this participation type </h3>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="request" value="sendLink"/> 
                                    <input type="hidden" name="eventId" value="<?php echo $eventId; ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="submit" id="addPartnerButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa fa-check"></i> Activate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                 <!-- desactivate Modal  -->
                 <div class="modal inmodal fade" id="desactivate" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Desactivate  participation type</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body text-center">
                                    <h3>Do you really want to desactivate this participation type </h3>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="request" value="sendLink"/> 
                                    <input type="hidden" name="eventId" value="<?php echo $eventId; ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="submit" id="addPartnerButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa fa-times"></i> Desactivate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row-flex" id="partners-list"></div>
            <div class="col-lg-3" style="margin-bottom: 30px;">
                <div class="event-card event-card-add">
                    <div class="event-card-text event-card-speaker">
                    <a href="" data-toggle="modal" data-target="#attedence_type" id="addClient" style="margin-top: 50px;"><i class="fa fa-external-link"></i> Add participation type</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title" style="height: auto;"></div>
                    <div class="ibox-content" id="">
                        <table class="table dataTables-example">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Type name</th>
                                    <th>Payment status</th>
                                    <th>Visibility</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="gradeX" style="background: #f8f8f8; border-bottom: 2px solid #fff;">
                                    <td>
                                        <span style="color: #3c8dbc; border-left: 2px solid #3c8dbc; padding: 3px; font-size: 12px;">
                                            <?php echo "FSUM-". $i;?>
                                        </span>
                                    </td>
                                    <td>African</td>
                                    <td>payable</td>
                                    <td>Private</td>
                                    <td><span class="label label-warning" style="display: block;">Pending</span></td>
                                    <td>
                                        <div class="ibox-tools">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #3c8dbc;">More</a>
                                            <ul class="dropdown-menu dropdown-user popover-menu-list">
                                            <li><a class="menu edit_client" data-toggle="modal" data-target="#delete" id="delete"><i class="fa fa-trash icon"></i> Delete</a></li>
                                                <li><a class="menu edit_client" data-toggle="modal" data-target="#edit_type" id="editLink"><i class="fa fa-pencil icon"></i> Edit</a></li>
                                                <li><a class="menu edit_client" data-toggle="modal" data-target="#activate" id="activate"><i class="fa fa-check-circle icon"></i> Activate</a></li>
                                                <li><a class="menu edit_client" data-toggle="modal" data-target="#desactivate" id="activate"><i class="fa fa-times-circle icon"></i> Desactivate</a></li>
                                                   
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
        
        <script type="text/javascript">
            var eventId = '<?php echo $eventId; ?>';
            var linkto  = '<?php linkto("admin/pages/content/content_action.php"); ?>';
        </script>
        <!-- <script src="<?php linkto('admin/pages/content/link.js'); ?>"></script> -->
        
        <?php include $INC_DIR . "footer.php"; ?>
        
        </div>
        </div>
</body>

</html>
