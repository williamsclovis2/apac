<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }

    $page = "events";
    $link = "list";
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
                    <li>
                        <a href="<?php linkto('admin/'); ?>">Home</a>
                    </li>
                    <li>
                        <a>Events</a>
                    </li>
                    <li class="active">
                        <strong>List</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row-flex" id="events-list"></div>

            <div class="modal inmodal fade" id="editEventModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Edit event</h4>
                        </div>
                        <form action="<?php linkto("admin/pages/events/events_action.php"); ?>" method="post" class="formCustom modal-form" id="editEventForm">
                            <div class="modal-body">
                                <div id="edit-event-messages"></div>
                                <p>All <small class="red-color">*</small> fields are mandatory</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Event name<small class="red-color">*</small></label>
                                            <input type="text" name="event_name" id="event_name" placeholder="Event name" class="form-control" data-rule="required" data-msg="Please enter event name"/>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Client<small class="red-color">*</small></label>
                                            <select class="form-control" name="client" id="client" data-rule="required" data-msg="Please select client">
                                                <option value="" selected="">[--Select client--]</option>
                                                <?php 
                                                    $controller->get('future_client', 'id,firstname,lastname', NULL, "", '');
                                                    foreach ($controller->data() as $resClient) { 
                                                        echo "<option value='".$resClient->id."'>".$resClient->firstname." ".$resClient->lastname."</option>";
                                                    }
                                                ?>
                                            </select>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group" id="data_1">
                                            <label>Start date<small class="red-color">*</small></label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="start_date" id="start_date" class="form-control" data-rule="required" data-msg="Please select start date"/>
                                            <div class="validate"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Event type<small class="red-color">*</small></label>
                                            <select class="form-control" name="event_type" id="event_type" data-rule="required" data-msg="Please select event type">
                                                <option value="" selected="">[--Select event type--]</option>
                                                <option value="In-person">In-person event</option>
                                                <option value="Virtual">Virtual event</option>
                                                <option value="Hybrid">Hybrid Event</option>
                                            </select>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group">
                                            <label>Ticket type<small class="red-color">*</small></label>
                                            <select class="form-control" name="ticket_type" id="ticket_type" data-rule="required" data-msg="Please select ticket type">
                                                <option value="" selected="">[--Select ticket type--]</option>
                                                <option value="Free attendance">Free attendance</option>
                                                <option value="Paid attendance">Paid attendance</option>
                                                <option value="Free & paid attendance">Free & paid attendance</option>
                                            </select>
                                            <div class="validate"></div>
                                        </div>
                                        <div class="form-group" id="data_1">
                                            <label>End date<small class="red-color">*</small></label>
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="end_date" id="end_date" class="form-control" data-rule="required" data-msg="Please select end date"/>
                                            <div class="validate"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Event venue<small class="red-color">*</small></label>
                                            <input type="text" name="event_venue" id="event_venue" placeholder="Event venue" class="form-control" data-rule="required" data-msg="Please enter venue"/>
                                            <div class="validate"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer editEventFooter">
                                <input type="hidden" name="request" value="editEvent" /> 
                                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-times-circle"></i> Close</button>
                                <button type="submit" id="editEventButton" class="btn btn-primary" data-loading-text="Loading..." autocomplete="off"><i class="fa fa-check-circle"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal inmodal fade" id="viewEventModal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title">Event details</h4>
                        </div>
                        <div class="modal-body" style="background: #eee;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="dealer-widget">
                                        <div class="dealer-content">
                                            <div class="inner-wrapper">
                                                <div class="dealer-section-space" style="margin-bottom: 0;">
                                                    <span id="vevent_name">Invoicing details</span>
                                                </div>
                                                <div class="clear">
                                                    <div class="section additional-details">
                                                        <img src="<?php linkto('img/photo_default.png'); ?>" class="img img-responsive" id="vbanner">
                                                        <ul class="additional-details-list clearfix">
                                                            <li>
                                                                <span class="col-lg-6 add-d-title">Event type</span>
                                                                <span class="col-lg-6 add-d-entry" id="vevent_type">Lorem Ipsum</span>
                                                            </li>
                                                            <li>
                                                                <span class="col-lg-6 add-d-title">Client</span>
                                                                <span class="col-lg-6 add-d-entry" id="vclient">Lorem Ipsum</span>
                                                            </li>
                                                            <li>
                                                                <span class="col-lg-6 add-d-title">Ticket type</span>
                                                                <span class="col-lg-6 add-d-entry" id="vticket_type">Lorem Ipsum</span>
                                                            </li>
                                                            <li>
                                                                <span class="col-lg-6 add-d-title">Start date</span>
                                                                <span class="col-lg-6 add-d-entry" id="vstart_date">Lorem Ipsum</span>
                                                            </li>
                                                            <li>
                                                                <span class="col-lg-6 add-d-title">End date</span>
                                                                <span class="col-lg-6 add-d-entry" id="vend_date">Lorem Ipsum</span>
                                                            </li>
                                                            <li>
                                                                <span class="col-lg-6 add-d-title">Event venue</span>
                                                                <span class="col-lg-6 add-d-entry" id="vevent_venue">Lorem Ipsum</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="events.js"></script>
        
        <?php include $INC_DIR . "footer.php"; ?>
        
        </div>
        </div>
</body>

</html>
