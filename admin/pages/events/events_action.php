<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }

    $valid['success'] = array('success' => false, 'messages' => array());

    //Load events
	if(Input::get('fetch')) {
		if ($user->hasPermission('admin')) {
		    $controller->get('future_event', '*', NULL, "", 'id DESC');
		} else {
			$clientId = $user->data()->id;
			$controller->get('future_event', '*', NULL, "`client_id` = '$clientId'", 'id DESC');
		}
	    $i = 0;
	    if (!$controller->count()) {
	        Danger("No event recorded");
	    } else {
	    	foreach($controller->data() as $resEvent) {
            	$i++;
            	if ($resEvent->banner != "") {
					$imageUrl = "img/banner/".$resEvent->banner;
				} else {
		            $imageUrl = "img/banner-placeholder.jpg";
		        }
				$eventId  = base64_encode($resEvent->id);
				$clientId = $resEvent->client_id;
				$getClientName = DB::getInstance()->get('future_client', array('id', '=', $clientId));
				$client_name   = $getClientName->first()->firstname ." ".$getClientName->first()->lastname
	    ?>
	    <div style="display: none;">
    		<span id="eName<?=$resEvent->id?>"><?php echo $resEvent->event_name; ?></span>
    		<span id="eType<?=$resEvent->id?>"><?php echo $resEvent->event_type; ?></span>
    		<span id="eTicket<?=$resEvent->id?>"><?php echo $resEvent->ticket_type; ?></span>
    		<span id="eClient<?=$resEvent->id?>"><?php echo $resEvent->client_id; ?></span>
    		<span id="eClientName<?=$resEvent->id?>"><?php echo $client_name; ?></span>
    		<span id="eCode<?=$resEvent->id?>"><?php echo $resEvent->event_code; ?></span>
    		<span id="eStart<?=$resEvent->id?>"><?php echo $resEvent->start_date; ?></span>
    		<span id="eEnd<?=$resEvent->id?>"><?php echo $resEvent->end_date; ?></span>
    		<span id="eVenue<?=$resEvent->id?>"><?php echo $resEvent->venue; ?></span>
    		<span id="eBanner<?=$resEvent->id?>"><?php linkto($imageUrl); ?></span>
    	</div>
	    <div class="col-lg-4" style="margin-bottom: 30px;">
            <div class="event-card">
                <img src="<?php linkto($imageUrl); ?>" class="img img-responsive">
                <div class="event-card-text">
                    <a href="#" class="btn btn-white btn-sm pull-right dropdown-toggle"
                    	data-placement="left" role="button" data-html="true" data-toggle="popover"
   						data-content='<ul id="popover-content" class="list-group">
					 	<a href="#" class="list-group-item view_event" data-id="<?php echo $resEvent->id;?>"><i class="fa fa-eye"></i> View</a>
					  	<a href="<?php linkto("admin/pages/participants/all/$eventId"); ?>" class="list-group-item"><i class="fa fa-users"></i> Participants</a>
					  	<a href="<?php linkto("admin/pages/content/banner/$eventId"); ?>" class="list-group-item"><i class="fa fa-pencil-square"></i> Website content</a>
					  	<a href="#" class="list-group-item edit_event" data-id="<?php echo $resEvent->id;?>"><i class="fa fa-pencil"></i> Edit</a>
					</ul>'><i class="fa fa-cog"></i></a>

              
                    <h4><?php echo $resEvent->event_name; ?></h4>
                    <small class="block text-muted"><i class="fa fa-calendar"></i> <?php echo $resEvent->start_date; ?> To <?php echo $resEvent->end_date; ?></small>
                </div>
            </div>
        </div>
	   	<?php } } ?>
	   	<script>
	  //  		$(function(){
			//     $("[data-toggle=popover]").popover();
			// });
			$(function() {
				$('[data-toggle="popover"]').popover({
				    html: true,
			        content: function() {
			            return $('#popover-content').html();
			        }
				});
				$(document).on('click', function(e) {
				    $('[data-toggle="popover"]').each(function() {
				     	if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
				        	$(this).popover('hide');
				      	}
				    });
				});
			});      
		</script>
	<?php
	}

	// Add event
	if(Input::get('request') && Input::get('request') == 'addNewEvent') {
		try {
            $controller->create("future_event", array(
                'event_name'    => escape(Input::get('event_name')),
                'event_type'    => escape(Input::get('event_type')),
                'client_id'     => escape(Input::get('client')),
                'venue'         => escape(Input::get('event_venue')),
                'ticket_type'   => escape(Input::get('ticket_type')),
                'start_date'    => escape(Input::get('start_date')),
                'end_date'      => escape(Input::get('end_date')),
                'status'        => "Active",
                'banner'        => "",
                'creation_date' => date('Y-m-d')
            ));
            $valid['success']  = true;
			$valid['messages'] = "Successfully created";	
        } catch(Exception $error) {
            $valid['success']  = false;
			$valid['messages'] = "Error while creating event";
        }
		echo json_encode($valid);
	}

	// Add event old
	// if(Input::get('request') && Input::get('request') == 'addNewEvent') {
	// 	$type     = explode('.', $_FILES['image']['name']);
	// 	$type     = $type[count($type)-1];	
	// 	$fileName = uniqid(rand()).'.'.$type;
	// 	$direct   = root("img/banner/"); 
	// 	$url      = $direct . $fileName; 

	// 	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
	// 		if(is_uploaded_file($_FILES['image']['tmp_name'])) {			
	// 			if(move_uploaded_file($_FILES['image']['tmp_name'], $url)) {
	// 				try {
	// 		            $controller->create("future_event", array(
	// 		                'event_name'    => escape(Input::get('event_name')),
	// 		                'event_code'    => escape(Input::get('event_code')),
	// 		                'event_type'    => escape(Input::get('event_type')),
	// 		                'client_id'     => escape(Input::get('client')),
	// 		                'venue'         => escape(Input::get('event_venue')),
	// 		                'ticket_type'   => escape(Input::get('ticket_type')),
	// 		                'start_date'    => escape(Input::get('start_date')),
	// 		                'end_date'      => escape(Input::get('end_date')),
	// 		                'banner'        => $fileName,
	// 		                'status'        => "Active",
	// 		                'creation_date' => date('Y-m-d')
	// 		            ));
	// 		            $valid['success']  = true;
	// 					$valid['messages'] = "Successfully created";	
	// 		        } catch(Exception $error) {
	// 		            $valid['success']  = false;
	// 					$valid['messages'] = "Error while creating event";
	// 		        }
	// 		    }
	// 		}
	// 	} else {
	// 		$valid['success']  = false;
	// 		$valid['messages'] = "Upload a valid image";
	// 	}
	// 	echo json_encode($valid);
	// }

	// Edit event details
	if(Input::get('request') && Input::get('request') == 'editEvent') {
		try {
            $controller->update("future_event", array(
                'event_name'  => escape(Input::get('event_name')),
                'event_type'  => escape(Input::get('event_type')),
                'client_id'   => escape(Input::get('client')),
                'venue'       => escape(Input::get('event_venue')),
                'ticket_type' => escape(Input::get('ticket_type')),
                'start_date'  => escape(Input::get('start_date')),
                'end_date'    => escape(Input::get('end_date')),
            ), Input::get('eventId'));
            $valid['success']  = true;
			$valid['messages'] = "Successfully Updated";	
        } catch(Exception $error) {
            $valid['success']  = false;
			$valid['messages'] = "Error while updating event";
        }
		echo json_encode($valid);
	}

	// Edit event banner
	// if(Input::get('request') && Input::get('request') == 'editEventImage') {
	// 	$type = explode('.', $_FILES['editEventImage']['name']);
	// 	$type = $type[count($type)-1];	
	// 	$fileName = uniqid(rand()).'.'.$type;
	// 	$direct = root("img/banner/"); 
	// 	$url = $direct . $fileName; 

	// 	if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
	// 		if(is_uploaded_file($_FILES['editEventImage']['tmp_name'])) {			
	// 			if(move_uploaded_file($_FILES['editEventImage']['tmp_name'], $url)) {
	// 				try {
	// 		            $controller->update("future_event", array('banner' => $fileName), Input::get('eventId'));
	// 		            $valid['success']  = true;
	// 					$valid['messages'] = "Successfully uploaded";	
	// 		        } catch(Exception $error) {
	// 		            $valid['success']  = false;
	// 					$valid['messages'] = "Error while updating banner";
	// 		        }
	// 		    }
	// 		}
	// 	} else {
	// 		$valid['success']  = false;
	// 		$valid['messages'] = "Invalid file";
	// 	}
	// 	echo json_encode($valid);
	// }
?>


