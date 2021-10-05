<?php
require_once "../../core/init.php"; 
if(!$user->isLoggedIn()) 
    Redirect::to('admin/login');
  
$valid['success'] = array('success' => false, 'messages' => array());


    // $_POST = array(
    //     'Id'              => "383232323232323231",
    //     'eventId'    => "386452724a46643151372f64686f714e5a4a496d6454644f5231566e6376455446732f724c424363563741",

    //     'request' => 'denyParticipantRegistration',
    // );


/** Load all participants table */ 
if(Input::checkInput('request', 'post', 1)):
	$_post_request_ = Input::get('request', 'post');
	switch($_post_request_):

		/** Action - Approve the participant Registration */
		case 'approveParticipantRegistration':
			$_form_ = FutureEventController::changeStatusParticipantRegistration('APPROVED');
            if($_form_->ERRORS == false):
                $valid['success']  = true;
                $valid['messages'] = "Successfully, participant's registration approved";    
            else:
                $valid['success']  = false;
                $valid['messages'] = "Error {$_form_->ERRORS_STRING}";
            endif;
            echo json_encode($valid);
		break;
		
		/** Action - Deny the participant Registration */
		case 'denyParticipantRegistration':
			$_form_ = FutureEventController::changeStatusParticipantRegistration('DENIED');
            if($_form_->ERRORS == false):
                $valid['success']  = true;
                $valid['messages'] = "Successfully, participant's registration denied";    
            else:
                $valid['success']  = false;
                $valid['messages'] = "Error {$_form_->ERRORS_STRING}";
            endif;
            echo json_encode($valid);
		break;

		/** Table - Display the list of Participant Registered */
		case 'fetchParticitants':
			/** Filter Condition */
			$_filter_condition_ = "";

			/** Filter By Participation Type */
			$_EVENT_ID_ 				= Input::get('eventId', 'post');
			$_PARTICIPATION_TYPE_TOKEN_ = Input::get('participationTypeToken', 'post');

			/** Display All Participants  */
			if($_PARTICIPATION_TYPE_TOKEN_ == 'all'):
				
			/** Filter By Type ID */
			else:
				$_PARTICIPATION_TYPE_ID_ = Hash::decryptToken($_PARTICIPATION_TYPE_TOKEN_);
				$_filter_condition_ 	 = " AND participation_type_id = {$_PARTICIPATION_TYPE_ID_} ";
			endif;

			// echo '---'.$_filter_condition_.' *----';

			$_LIST_DATA_ = FutureEventController::getParticipantsByEventID($_EVENT_ID_);

			// echo '<pre>';
			// print_r($_LIST_DATA_);
			// echo '</pre>';

			if (!$_LIST_DATA_):
				Danger("No participant recorded");
			else: 
	?>
				<table class="table dataTables-example">
					<thead>
						<tr>
							<th>#ID</th>
							<th>Full name -- <?=$_PARTICIPATION_TYPE_TOKEN_ ?> #</th>
							<th>Type</th>
							<th>Subtype</th>
							<th>Category</th>
							<th>Payment State</th>
							<th>Price</th>
							<th>Gender</th>
							<th>Job Type</th>
							<th>Country</th>
							<th>Status</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
<?php 
				$count_ = 0;
				foreach( $_LIST_DATA_ as $participant_): $count_++;
				
					$_status_ = $participant_->status;
					$_status_label_ = 'label-warning';
			
					if($_status_ == 'COMPLETED' || $_status_ == 'USED')
						$_status_label_ = 'label-success';
					if($_status_ == 'ACTIVE')
						$_status_label_ = 'label-info';
					if($_status_ == 'DEACTIVE')
						$_status_label_ = 'label-danger';
					if($_status_ == 'EXPIRED')
						$_status_label_ = 'label-default';
		

	?>
						
						<tr class="gradeX" style="background: #f8f8f8; border-bottom: 2px solid #fff;">
							<td>
								<span style="color: #3c8dbc; border-left: 2px solid #3c8dbc; padding: 3px; font-size: 12px;"> <?= "FSUM-". $count_;?> </span>
							</td>
							<td><?= $participant_->firstname .' '. $participant_->lastname   ?> </td>
							<td><?= $participant_->participation_type_name ?> 		</td>
							<td><?= $participant_->participation_subtype_name ?> 		</td>
							<td><?= $participant_->participation_subtype_category ?> 		</td>
							<td><?= $participant_->payment_state ?> 		</td>
							<td><?= $participant_->participation_subtype_price ?> <small><?=$participant_->participation_subtype_currency?></small> </td>
							<td><?= $participant_->gender ?> </td>
							<td><?= $participant_->job_title ?> </td>
							<td><?= countryCodeToCountry($participant_->organisation_country) ?> </td>
							<td><span class="label <?= $_status_label_ ?>" style="display: block;"><?=$_status_ ?></span></td>
							<td>
								<div class="ibox-tools">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #3c8dbc;">More</a>
									<ul class="dropdown-menu dropdown-user popover-menu-list">
											<li><a class="menu edit_client" href="<?php linkto('admin/pages/participants/profile/'.Hash::encryptToken($participant_->id)); ?>" ><i class="fa fa-eye icon"></i> Profile </a></li>
<?php
					$user = new User(); 
					if($user->data()->id == $participant_->id):
	?>
											<li><a class="menu" href="<?php linkto('admin/changepassword'); ?>"><i class="fa fa-unlock-alt icon"></i> Change password</a></li>
<?php 
					endif;
					if($user->hasPermission('admin')):
	?>
											<!-- <li><a class="menu edit_client" data-id="<?php echo $participant_->id;?>"><i class="fa fa-pencil icon"></i> Edit</a></li> -->
<?php 	
						if($user->data()->id != $participant_->id):

							if($participant_->status != 'APPROVED'):
	?>
												<li><a class="menu block_user" data-toggle="modal" data-target="#activateModal<?=Hash::encryptToken($participant_->id)?>" ><i class="fa fa-check icon"></i> Approve</a></li>
<?php 
							endif;
	
							if($participant_->status != 'DENIED'):?>
												<li><a class="menu block_user"  data-toggle="modal" data-target="#deactivateModal<?=Hash::encryptToken($participant_->id)?>" ><i class="fa fa-remove icon"></i> Deny</a></li>
<?php 
							endif;

						endif;
					endif;
	?>

									</ul>
								</div>
							</td>
						</tr>
<?php 
				endforeach;
	?>
					</tbody>
				</table>
<?php 
			endif;
	?>
				
				<script>
					$(document).ready(function() {
						$('.dataTables-example').dataTable({
							responsive: true,
							"dom": 'T<"clear">lfrtip',
							"tableTools": {
								"sSwfPath": "js/plugins/dataTables/swf/copy_csv_xls_pdf.swf"
							}
						});
					});
				</script>
				<?php
		break;
	endswitch;
endif;		
	
?>


