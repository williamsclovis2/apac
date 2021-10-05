<?php
require_once "../../core/init.php"; 
if(!$user->isLoggedIn()) {
    Redirect::to('admin/login');
}

$page = "participants";
$link = "all";
$eventId = base64_decode(Input::get('eventId'));

/** Filter By Participation Type */
$_PARTICIPATION_TYPE_TOKEN_ = Input::get('participationTypeToken', 'get');


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

                        <div class="modal inmodal fade" id="editClientModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h4 class="modal-title">Edit client</h4>
                                    </div>
                                    <form action="<?php linkto("admin/pages/accounts/accounts_action.php"); ?>" method="post" class="formCustom modal-form" id="editClientForm">
                                        <div class="modal-body">
                                            <div id="edit-client-messages"></div>
                                            <p>All <small class="red-color">*</small> fields are mandatory</p>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>First name<small class="red-color">*</small></label>
                                                        <input type="text" name="efirstname" id="efirstname" placeholder="First name" class="form-control" data-rule="required" data-msg="Please enter your first name"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email<small class="red-color">*</small></label>
                                                        <input type="email" name="eusername" id="eusername" placeholder="Email" class="form-control" data-rule="email" data-msg="Please enter a valid email"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Organisation<small class="red-color">*</small></label>
                                                        <input type="text" name="eorganisation" id="eorganisation" placeholder="Organisation" class="form-control" data-rule="required" data-msg="Please enter organisation"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Industry<small class="red-color">*</small></label>
                                                        <select class="form-control" name="eindustry" id="eindustry" data-rule="required" data-msg="Please select industry">
                                                            <option value="" selected="">[--Select industry--]</option>
                                                            <?php $controller->industry();?>
                                                        </select>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City<small class="red-color">*</small></label>
                                                        <input type="text" name="ecity" id="ecity" placeholder="City" class="form-control" data-rule="required" data-msg="Please enter city">
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Last name<small class="red-color">*</small></label>
                                                        <input type="text" name="elastname" id="elastname" placeholder="Last name" class="form-control" data-rule="required" data-msg="Please enter your last name"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Telephone<small class="red-color">*</small></label>
                                                        <input type="text" name="etelephone" id="etelephone" placeholder="Telephone" class="form-control" data-rule="required" data-msg="Please enter telephone number"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Number of Employees<small class="red-color">*</small></label>
                                                        <select class="form-control" name="eemployees" id="eemployees" data-msg="Please select number of employees">
                                                            <option value="" selected="">[--Number of Employees--]</option>
                                                            <option value="1 - 20">1 - 20</option>
                                                            <option value="20 - 50">20 - 50</option>
                                                            <option value="50 - 100">50 - 100</option>
                                                            <option value="100+">100+</option>
                                                        </select>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Job title<small class="red-color">*</small></label>
                                                        <input type="text" name="ejob_title" id="ejob_title" placeholder="Job title" class="form-control" data-rule="required" data-msg="Please enter job title"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country<small class="red-color">*</small></label>
                                                        <select class="form-control" name="ecountry" id="ecountry" data-rule="required" data-msg="Please select country">
                                                            <option value="" selected="">[--Select country--]</option>
                                                            <?php $controller->country();?>
                                                        </select>
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Name to invoice<small class="red-color">*</small></label>
                                                        <input type="text" name="einvoice_name" id="einvoice_name" placeholder="Name to invoice" class="form-control"data-msg="Please enter name to invoice"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label>Website</label>
                                                        <input type="text" name="ewebsite" id="ewebsite" placeholder="Website" class="form-control" data-rule="required" data-msg="Please enter website"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Address line 1<small class="red-color">*</small></label>
                                                        <input type="text" name="eline_one" id="eline_one" placeholder="Address line 1" class="form-control" data-rule="required" data-msg="Please enter address line 1"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>City<small class="red-color">*</small></label>
                                                        <input type="text" name="einvoice_city" id="einvoice_city" placeholder="City" class="form-control" data-rule="required" data-msg="Please enter city"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Address line 2<small class="red-color">*</small></label>
                                                        <input type="text" name="eline_two" id="eline_two" placeholder="Address line 2" class="form-control" data-rule="required" data-msg="Please enter address line 2"/>
                                                        <div class="validate"></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Country<small class="red-color">*</small></label>
                                                        <select class="form-control" name="einvoice_country" id="einvoice_country" data-rule="required" data-msg="Please select country">
                                                            <option value="" selected="">[--Select country--]</option>
                                                            <?php $controller->country();?>
                                                        </select>
                                                        <div class="validate"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer editClientFooter">
                                            <input type="hidden" name="request" value="editClient" /> 
                                            <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                            <button type="submit" id="editClientButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa-check-circle"></i> Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- <div class="col-lg-2"></div> -->
            </div>
        </div>



        
<?php
$_LIST_DATA_ = FutureEventController::getParticipantsByEventID($eventId);
if($_LIST_DATA_): $count_ = 0;
    foreach($_LIST_DATA_  As $_data_): $count_++;
?>
                 
                <!-- Edit Link Modal  -->
                <div class="modal inmodal fade" id="activateModal<?=Hash::encryptToken($_data_->id)?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title">Approve Participant Registration</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="activateForm">
                                <div class="modal-body">
                                    <div id="activate-messages"></div>
                                    <p class="text-center">Do you really want to Approve the registration of this participant:  <strong> <?=$_data_->firstname ?> </strong> ?</p>
                                    <div class="row">
                                        
                                    </div>
                                </div>
                                <div class="modal-footer"> 
                                    <input type="hidden" name="request" value="approveParticipantRegistration"/> 
                                    <input type="hidden" name="eventId" value="<?=Hash::encryptAuthToken($eventId) ?>"/>
                                    <input type="hidden" name="Id" value="<?=Hash::encryptToken($_data_->id) ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="button" id="activateButton" class="btn btn-primary activateButtonDynamic" data-loading-text="Loading..." data-key = "<?=Hash::encryptToken($_data_->id)?>" autocomplete="off"><i class="fa fa fa-external-link"></i> Approve Registration</button>
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
                                <h4 class="modal-title">Deny Participant Registration</h4>
                            </div>
                            <form action="<?php linkto("admin/pages/content/content_action.php"); ?>" method="post" class="formCustom modal-form" id="deactivateForm">
                                <div class="modal-body">
                                    <div id="deactivate-messages"></div>
                                    <p class="text-center">Do you really want to Deny the registration of this participant:  <strong> <?=$_data_->firstname ?> </strong> ?</p>
                                    <div class="row">
                                        
                                    </div>
                                </div>
                                <div class="modal-footer"> 
                                    <input type="hidden" name="request" value="denyParticipantRegistration"/> 
                                    <input type="hidden" name="eventId" value="<?=Hash::encryptAuthToken($eventId) ?>"/>
                                    <input type="hidden" name="Id" value="<?=Hash::encryptToken($_data_->id) ?>"/>
                                    <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                    <button type="button" id="deactivateButton" class="btn btn-primary deactivateButtonDynamic" data-loading-text="Loading..." data-key = "<?=Hash::encryptToken($_data_->id)?>" autocomplete="off"><i class="fa fa fa-external-link"></i> Deny Registration</button>
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
            var participationTypeToken = '<?php echo $_PARTICIPATION_TYPE_TOKEN_; ?>';
            var linkto  = '<?php linkto("admin/pages/participants/participants_action.php"); ?>';
        </script>
        <script src="<?php linkto('admin/pages/participants/participants.js'); ?>"></script>
        
        <?php include $INC_DIR . "footer.php"; ?>

        </div>
        </div>
</body>

</html>
