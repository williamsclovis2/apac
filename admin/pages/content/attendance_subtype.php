<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }

    $page = "content";
    $link = "attendance_subtype";
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
                    <li class="active"><strong>participation subtype</strong></li>
                </ol>
            </div>
            <div class="col-lg-2">
                <!-- <button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#addPartnerModal" id="addClient" style="margin-top: 50px;"><i class="fa fa fa-external-link"></i> Generate pivite link</button> -->
                <!-- type  modal -->
                
                <div class="modal inmodal fade" id="attedence_subtype" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Add participation subtype</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body">
                                    <div id="add-partner-messages"></div>
                                    <p>All <small class="red-color">*</small> fields are mandatory</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group col-md-6">
                                                <label>Participation type<small class="red-color">*</small></label>
                                                <select class="form-control" name="participation_type" id="participation_type" data-rule="required" data-msg="Please select  participation type"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <div class="validate"></div>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Participation subtype  name<small class="red-color">*</small></label>
                                                <input type="text" name="subtype_name" id="subtype_name" placeholder="subtype name" class="form-control" data-rule="required" data-msg="Please enter subtype name"/>
                                                <div class="validate"></div>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Category<small class="red-color">*</small></label>
                                                <select class="form-control" name="category" id="category" data-rule="required" data-msg="Please select  category"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="IN_PERSON">In-person</option>
                                                    <option value="VIRTUAL">Virtual</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Payment  state<small class="red-color">*</small></label>
                                                <select class="form-control" name="payment_state" id="payment_state" data-rule="required" data-msg="Please select  payment state"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Price<small class="red-color">*</small></label>
                                                <input type="text" name="price" id="price" placeholder="Price" class="form-control" data-rule="required" data-msg="Please enter  price"/>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Currency<small class="red-color">*</small></label>
                                                <select class="form-control" name="carrency" id="carrency" data-rule="required" data-msg="Please select  carrency"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="USD">USD</option>
                                                    <option value="RWF">RWF</option>
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
                <!-- Edit subtype Modal  -->
                <div class="modal inmodal fade" id="edit_subtype" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Edit subtype</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body">
                                    <div id="add-partner-messages"></div>
                                    <p>All <small class="red-color">*</small> fields are mandatory</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group col-md-6">
                                                <label>Participation type<small class="red-color">*</small></label>
                                                <select class="form-control" name="participation_type" id="participation_type" data-rule="required" data-msg="Please select  participation type"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <div class="validate"></div>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Participation subtype  name<small class="red-color">*</small></label>
                                                <input type="text" name="subtype_name" id="subtype_name" placeholder="subtype name" class="form-control" data-rule="required" data-msg="Please enter subtype name"/>
                                                <div class="validate"></div>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label>Category<small class="red-color">*</small></label>
                                                <select class="form-control" name="category" id="category" data-rule="required" data-msg="Please select  category"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="IN_PERSON">In-person</option>
                                                    <option value="VIRTUAL">Virtual</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Payment  state<small class="red-color">*</small></label>
                                                <select class="form-control" name="payment_state" id="payment_state" data-rule="required" data-msg="Please select  payment state"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Price<small class="red-color">*</small></label>
                                                <input type="text" name="price" id="price" placeholder="Price" class="form-control" data-rule="required" data-msg="Please enter  price"/>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Currency<small class="red-color">*</small></label>
                                                <select class="form-control" name="carrency" id="carrency" data-rule="required" data-msg="Please select  carrency"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="USD">USD</option>
                                                    <option value="RWF">RWF</option>
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

                <!-- Delete Modal  -->
                <div class="modal inmodal fade" id="delete_subtype" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Delete  participation type</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body text-center">
                                    <h3>Do you really want to delete this participation subtype </h3>
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
                <div class="modal inmodal fade" id="activate_subtype" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Activate  participation subtype</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body text-center">
                                    <h3>Do you really want to activate this participation subtype </h3>
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
                                <h4 class="modal-title">Desactivate  participation subtype</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addLink">
                                <div class="modal-body text-center">
                                    <h3>Do you really want to desactivate this participation subgtype </h3>
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
            <div class="col-lg-4" style="margin-bottom: 10px;">
                <div class="event-card event-card-add">
                    <div class="event-card-text event-card-speaker">
                    <a href="" data-toggle="modal" data-target="#attedence_subtype" id="addClient" style="margin-top: 50px;"><i class="fa fa-external-link"></i> Add participation subtype</a>
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
                                                <li><a class="menu edit_client" data-toggle="modal" data-target="#delete_subtype" id="delete"><i class="fa fa-trash icon"></i> Delete</a></li>
                                                <li><a class="menu edit_client" data-toggle="modal" data-target="#edit_subtype" id="editsubtype"><i class="fa fa-pencil icon"></i> Edit</a></li>
                                                <li><a class="menu edit_client" data-toggle="modal" data-target="#activate_subtype" id="delete"><i class="fa fa-check-circle icon"></i> activate</a></li>
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
