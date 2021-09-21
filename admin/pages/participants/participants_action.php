<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }

    $valid['success'] = array('success' => false, 'messages' => array());

	// Load all participants table
	if(Input::get('fetchParticitants')) {
	    $controller->get('future_participants', '*', NULL, "", 'id ASC LIMIT 15');
	    $i = 0;
	    if (!$controller->count()) {
	        Danger("No user recorded");
	    } else {
	    ?>
	    <table class="table dataTables-example">
	        <thead>
	            <tr>
	                <th>#ID</th>
	                <th>Full name</th>
	                <th>Category</th>
	                <th>Telephone</th>
	                <th>Job Title</th>
	                <th>Organisation</th>
	                <th>City</th>
	                <th>Country</th>
	                <th>Status</th>
	                <th class="text-center">Action</th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php 
	            foreach($controller->data() as $resPart) {
	                $i++;
	            ?>
	            
	            <tr class="gradeX" style="background: #f8f8f8; border-bottom: 2px solid #fff;">
	                <td>
	                	<span style="color: #3c8dbc; border-left: 2px solid #3c8dbc; padding: 3px; font-size: 12px;">
                            <?php echo "FSUM-". $i;?>
                        </span>
	                </td>
	                <td><span id="eUser<?=$resPart->id?>"><?php echo $resPart->firstname. " ".$resPart->lastname; ?></span></</td>
	                <td><span id="eFirst<?=$resPart->id?>">Delegate</span></td>
	                <td><span id="eLast<?=$resPart->id?>"><?php echo $resPart->telephone; ?></span></td>
	                <td><span id="eOrg<?=$resPart->id?>"><?php echo $resPart->job_title; ?></span></td>
	                <td><span id="eJob<?=$resPart->id?>"><?php echo $resPart->organisation_name; ?></span></td>
	                <td><span id="eCity<?=$resPart->id?>"><?php echo $resPart->organisation_city; ?></span></td>
	                <td><span id="eCountry<?=$resPart->id?>"><?php echo countryCodeToCountry($resPart->organisation_country); ?></span></td>
	                <td><span class="label label-<?php echo $resPart->status == 'Confirm'? 'success' : 'warning'; ?>" style="display: block;"><?php echo $resPart->status; ?></span></td>
	                <td>
	                    <div class="ibox-tools">
	                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #3c8dbc;">More</a>
	                        <ul class="dropdown-menu dropdown-user popover-menu-list">
                                <?php
                                $user = new User(); 
                                if($user->data()->id == $resPart->id){?>
                                    <li><a class="menu" href="<?php linkto('admin/changepassword'); ?>"><i class="fa fa-unlock-alt icon"></i> Change password</a></li>
                                <?php 
                            	}
                            	if($user->hasPermission('admin')) {
                                ?>
                                	<li><a class="menu edit_client" data-id="<?php echo $resPart->id;?>"><i class="fa fa-pencil icon"></i> Edit</a></li>
                                	<?php if($user->data()->id != $resPart->id){?>
                                		<?php if($resPart->status != 'Deny'){?>
                                		<li><a class="menu block_user" data-id="<?php echo $resPart->id;?>" data-request="Deny"><i class="fa fa-times-circle icon"></i> Deny</a></li>
                                		<?php }?>
                                        <?php if($resPart->status != 'Confirm'){?>
                                    	<li><a class="menu block_user" data-id="<?php echo $resPart->id;?>" data-request="Confirm"><i class="fa fa-check-circle"></i> Confirm</a></li>
                                    	<?php }?>
                                    <?php }?>
                                <?php 
                            	}
                                ?>
	                        </ul>
	                    </div>
	                </td>
	            </tr>
	            <?php } } ?>
	        </tbody>
	    </table>
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
	}
?>


