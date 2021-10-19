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
                    <li class="active"><strong>Participation Type</strong></li>
                </ol>
            </div>
            <div class="col-lg-2">
                <!-- <button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#addPartnerModal" id="addClient" style="margin-top: 50px;"><i class="fa fa fa-external-link"></i> Generate pivite link</button> -->
                <!-- Generate Link modal -->
                
                <div class="modal inmodal fade" id="addParticipationTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Register Participation Type</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="addParticipationTypeForm">
                                <div class="modal-body">
                                    <div id="add-messages"></div>
                                    <p>All <small class="red-color">*</small> fields are mandatory</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group col-md-12">
                                                <label>Name<small class="red-color">*</small></label>
                                                <input type="text" name="name" id="name" placeholder="Attendence name" class="form-control" data-rule="required" data-msg="Please enter name"/>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Payment  state<small class="red-color">*</small></label>
                                                <select class="form-control" name="payment_state" id="payment_state" data-rule="required" data-msg="Please select  payment state"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="PAYABLE">Payable</option>
                                                    <option value="FREE">Free</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Visibility<small class="red-color">*</small></label>
                                                <select class="form-control" name="visibility_state" id="visibility_state" data-rule="required" data-msg="Please select  visibility"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="1">PUBLIC</option>
                                                    <option value="0">PRIVATE</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Registration Form Layout Number<small class="red-color">*</small></label>
                                                <input type="number" name="form_order" id="form_order" placeholder="Registration Form Layout Number" class="form-control" data-rule="required" data-msg="Please enter form layout number"/>
                                                <div class="validate"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="request" value="registerParticipationType"/> 
                                    <input type="hidden" name="eventId" value="<?=Hash::encryptAuthToken($eventId) ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="submit" id="addParticipationTypeButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa fa-external-link"></i> Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <!-- <div class="row-flex" id="partners-list"></div> -->
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <button class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#addParticipationTypeModal" ><i class="fa fa-plus-circle"></i> Register New Participation Type</button>
                            <h5>Participation  Type List</h5>
                        </div>
                    <div class="ibox-content" id="list-participation-types">
                        
                    </div>
                </div>
            </div>
        </div>


        
<?php
$_LIST_DATA_ = FutureEventController::getPacipationTypeyByEventID($eventId);
if($_LIST_DATA_): $count_ = 0;
    foreach($_LIST_DATA_  As $_data_): $count_++;
?>
                  <!-- Edit Link Modal  -->
                  <div class="modal inmodal fade" id="editModal<?=Hash::encryptToken($_data_->id)?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Edit Participation Subtype</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="editForm">
                                <div class="modal-body">
                                    <div id="edit-messages"></div>
                                    <p>All <small class="red-color">*</small> fields are mandatory</p>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group col-md-12">
                                                <label>Name<small class="red-color">*</small></label>
                                                <input type="text" name="name" value="<?=$_data_->name?>" id="name" placeholder="Participation Name" class="form-control" data-rule="required" data-msg="Please enter name"/>
                                                <div class="validate"></div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label>Payment  state<small class="red-color">*</small></label>
                                                <select class="form-control" name="payment_state" id="payment_state" data-rule="required" data-msg="Please select  payment state"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="PAYABLE"  <?=$_data_->payment_state == 'PAYABLE'?'selected':''?> >Payable</option>
                                                    <option value="FREE"  <?=$_data_->payment_state == 'FREE'?'selected':''?>>Free</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>
                                            
                                            <div class="form-group col-md-12">
                                                <label>Visibility<small class="red-color">*</small></label>
                                                <select class="form-control" name="visibility_state" id="visibility_state" data-rule="required" data-msg="Please select  visibility"> 
                                                    <option value="" selected="">[--Select--]</option>
                                                    <option value="1" <?=$_data_->visibility_state == 1?'selected':''?> >PUBLIC</option>
                                                    <option value="0"  <?=$_data_->visibility_state == 0?'selected':''?> >PRIVATE</option>
                                                </select>
                                                <div class="validate"></div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>Registration Form Layout Number<small class="red-color">*</small></label>
                                                <input type="number" name="form_order" value="<?=$_data_->form_order?>"  id="form_order" placeholder="Registration Form Layout Number" class="form-control" data-rule="required" data-msg="Please enter form layout number"/>
                                                <div class="validate"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer"> 
                                    <input type="hidden" name="request" value="editParticipationType"/> 
                                    <input type="hidden" name="eventId" value="<?=Hash::encryptAuthToken($eventId) ?>"/>
                                    <input type="hidden" name="Id" value="<?=Hash::encryptToken($_data_->id) ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="button" id="editButton" class="btn btn-primary editButtonDynamic" data-loading-text="Loading..." data-key = "<?=Hash::encryptToken($_data_->id)?>" autocomplete="off"><i class="fa fa fa-external-link"></i> Save Modifications</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Link Modal  -->
                <div class="modal inmodal fade" id="activateModal<?=Hash::encryptToken($_data_->id)?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Activate  Participation Type</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="activateForm">
                                <div class="modal-body">
                                    <div id="activate-messages"></div>
                                    <p class="text-center">Do you really want to Activate this Event Participation Type:  <strong> <?=$_data_->name?> </strong> ?</p>
                                    <div class="row">
                                        
                                    </div>
                                </div>
                                <div class="modal-footer"> 
                                    <input type="hidden" name="request" value="activateParticipationType"/> 
                                    <input type="hidden" name="eventId" value="<?=Hash::encryptAuthToken($eventId) ?>"/>
                                    <input type="hidden" name="Id" value="<?=Hash::encryptToken($_data_->id) ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="button" id="activateButton" class="btn btn-primary activateButtonDynamic" data-loading-text="Loading..." data-key = "<?=Hash::encryptToken($_data_->id)?>" autocomplete="off"><i class="fa fa fa-external-link"></i> Activate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Edit Link Modal  -->
                <div class="modal inmodal fade" id="deactivateModal<?=Hash::encryptToken($_data_->id)?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Deactivate  Participation Type</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="deactivateForm">
                                <div class="modal-body">
                                    <div id="deactivate-messages"></div>
                                    <p class="text-center">Do you really want to Deactivate this Event Participation Type: <strong> <?=$_data_->name?> </strong> ?</p>
                                    <div class="row">
                                        
                                    </div>
                                </div>
                                <div class="modal-footer"> 
                                    <input type="hidden" name="request" value="deactivateParticipationType"/> 
                                    <input type="hidden" name="eventId" value="<?=Hash::encryptAuthToken($eventId) ?>"/>
                                    <input type="hidden" name="Id" value="<?=Hash::encryptToken($_data_->id) ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="button" id="deactivateButton" class="btn btn-primary deactivateButtonDynamic" data-loading-text="Loading..." data-key = "<?=Hash::encryptToken($_data_->id)?>" autocomplete="off"><i class="fa fa fa-external-link"></i> Deactivate</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<?php
    endforeach;
endif;
?>
        
        <script type="text/javascript">
            var eventId = '<?php echo $eventId; ?>';
            var linkto  = '<?php linkto("admin/pages/content/content_action.php"); ?>';
        </script>
        <script src="<?php linkto('admin/pages/content/attendence_type.js'); ?>"></script>
        
        <?php include $INC_DIR . "footer.php"; ?>
        
        </div>
        </div>
</body>

</html>
