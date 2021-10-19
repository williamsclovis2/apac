<?php
    require_once "../../core/init.php"; 
    if(!$user->isLoggedIn()) {
        Redirect::to('admin/login');
    }

    $valid['success'] = array('success' => false, 'messages' => array());

    // Load admin table
	if(Input::get('fetchAdmin')){
	    $user->get('users', '*', NULL, "`permission` = 'Admin'", 'id ASC');
	    $i = 0;
	    if (!$user->count()) {
	        Danger("No user recorded");
	    } else {
	    ?>
	    <table class="table">
	        <thead>
	            <tr>
	                <th>#ID</th>
	                <th>Email</th>
	                <th>First Name</th>
	                <th>Last Name</th>
	                <th>Status</th>
	                <th>Action</th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php 
	            foreach($user->data() as $resUser){
	                $i++;
	            ?>
	            
	            <tr class="gradeX" <?php if($resUser->status =='Blocked'){?>style="color: #aaa; border-bottom:1px solid #f4f4f4;"<?php } else {?> style="border-bottom: 1px solid #f4f4f4;"<?php }?>>
	                <td><?php echo $i;?></td>
	                <td><span id="eUser<?=$resUser->id?>"><?php echo $resUser->username; ?></span></</td>
	                <td><span id="eFirst<?=$resUser->id?>"><?php echo $resUser->firstname; ?></span></td>
	                <td><span id="eLast<?=$resUser->id?>"><?php echo $resUser->lastname; ?></span></td>
	                <td><span class="label label-<?php echo $resUser->status == 'Activated'? 'success' : 'default'; ?>"><?php echo $resUser->status; ?></span></td>
	                <td>
	                    <div class="ibox-tools">
	                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #3c8dbc;">More</a>
	                        <ul class="dropdown-menu dropdown-user popover-menu-list">
                                <?php
                                $user = new User(); 
                                if($user->data()->id == $resUser->id){?>
                                    <li><a class="menu" href="<?php linkto('admin/changepassword'); ?>"><i class="fa fa-unlock-alt icon"></i> Change password</a></li>
                                <?php 
                            	}
                            	if($user->hasPermission('admin')) {
                                ?>
                                	<li><a class="menu edit_user" data-id="<?php echo $resUser->id;?>"><i class="fa fa-pencil icon"></i> Edit</a></li>
                                	<?php if($user->data()->id != $resUser->id){?>
                                		<?php if($resUser->status != 'Blocked'){?>
                                		<li><a class="menu block_user" data-id="<?php echo $resUser->id;?>" data-request="Blocked"><i class="fa fa-times-circle icon"></i> Block</a></li>
                                		<?php }?>
                                        <?php if($resUser->status != 'Activated'){?>
                                    	<li><a class="menu block_user" data-id="<?php echo $resUser->id;?>" data-request="Activated"><i class="fa fa-check-circle"></i> Activate</a></li>
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

		<?php
	}

	// Add admin
	if(Input::get('request') && Input::get('request') == 'addNewUser') {
		$validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'name' => 'Username',
                'required' => true,
                'unique' => 'users'
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            )
        ));

        if ($validate->passed()) {

			$salt = Hash::salt(32);

			try {
	            $user->create(array(
	                'username'   => Input::get('username'),
	                'firstname'  => escape(Input::get('firstname')),
	                'lastname'   => escape(Input::get('lastname')),
	                'password'   => Hash::make(Input::get('password'), $salt),
	                'salt'       => $salt,
	                'joined'     => date('Y-m-d H:i:s'),
	                'group'      => 2,
	                'token'      => "",
	                'permission' => "Admin",
	                'status'     => "Activated"
	            ));

	            $valid['success'] = true;
				$valid['messages'] = "Admin Successfully Created";	

	        } catch(Exception $error) {
	            $valid['success'] = false;
				$valid['messages'] = "Error while adding user";
	        }
	    } else {
            foreach ($validate->errors() as $error) {
                $errmsg .= $error . "<br>";
                $valid['success'] = false;
				$valid['messages'] = $errmsg;
            }
        }
		echo json_encode($valid);
	}

	// Edit admin
	if(Input::get('request') && Input::get('request') == 'editUser') {
		try {
            $user->update(array(
                'username'  => Input::get('eusername'),
                'firstname' => escape(Input::get('efirstname')),
                'lastname'  => escape(Input::get('elastname'))
            ), Input::get('userId'));

            $valid['success'] = true;
			$valid['messages'] = "Successfully Updated";	

        } catch(Exception $error) {
            $valid['success'] = false;
			$valid['messages'] = "Error while updating user";
        }
		echo json_encode($valid);
	}

	// Load clients table
	if(Input::get('fetchClient')) {
	    $controller->get('future_client', '*', NULL, "", 'id ASC');
	    $i = 0;
	    if (!$controller->count()) {
	        Danger("No client recorded");
	    } else {
	    ?>
	    <table class="table dataTables-example">
	        <thead>
	            <tr>
	                <th>#ID</th>
	                <th>Email</th>
	                <th>First name</th>
	                <th>Last name</th>
	                <th>Telephone</th>
	                <th>Organisation</th>
	                <th>Job title</th>
	                <th>City</th>
	                <th>Country</th>
	                <th>Status</th>
	                <th class="text-center">Action</th>
	            </tr>
	        </thead>
	        <tbody>
	            <?php 
	            foreach($controller->data() as $resClient) {
	                $i++;
	                $clientId = base64_encode($resClient->id);
	            ?>
	            
	            <tr class="gradeX" <?php if($resClient->status =='Blocked'){?>style="color: #aaa; border-bottom:1px solid #f4f4f4;"<?php } else {?> style="border-bottom: 1px solid #f4f4f4;"<?php }?>>
	            	<div style="display: none;">
		                <span id="eFirst<?=$resClient->id?>"><?php echo $resClient->firstname; ?></span>
		                <span id="eLast<?=$resClient->id?>"><?php echo $resClient->lastname; ?></span>
		                <span id="eEmail<?=$resClient->id?>"><?php echo $resClient->email; ?></span>
		                <span id="eTel<?=$resClient->id?>"><?php echo $resClient->telephone; ?></span>
		                <span id="eOrg<?=$resClient->id?>"><?php echo $resClient->organisation; ?></span>
		                <span id="eJob<?=$resClient->id?>"><?php echo $resClient->job_title; ?></span>
		                <span id="eCity<?=$resClient->id?>"><?php echo $resClient->city; ?></span>
		                <span id="eCountry<?=$resClient->id?>"><?php echo countryCodeToCountry($resClient->country); ?></span>
                		<span id="eEmp<?=$resClient->id?>"><?php echo $resClient->employees; ?></span>
                		<span id="eIndus<?=$resClient->id?>"><?php echo $resClient->industry; ?></span>
                		<span id="eWeb<?=$resClient->id?>"><?php echo $resClient->website; ?></span>
                		<span id="eFirst2<?=$resClient->id?>"><?php echo $resClient->firstname2; ?></span>
		                <span id="eLast2<?=$resClient->id?>"><?php echo $resClient->lastname2; ?></span>
		                <span id="eEmail2<?=$resClient->id?>"><?php echo $resClient->email2; ?></span>
		                <span id="eTel2<?=$resClient->id?>"><?php echo $resClient->telephone2; ?></span>
		                <span id="eOrg2<?=$resClient->id?>"><?php echo $resClient->organisation2; ?></span>
		                <span id="eJob2<?=$resClient->id?>"><?php echo $resClient->job_title2; ?></span>
		                <span id="eCity2<?=$resClient->id?>"><?php echo $resClient->city2; ?></span>
		                <span id="eCountry2<?=$resClient->id?>"><?php echo countryCodeToCountry($resClient->country2); ?></span>
                		<span id="eEmp2<?=$resClient->id?>"><?php echo $resClient->employees2; ?></span>
                		<span id="eIndus2<?=$resClient->id?>"><?php echo $resClient->industry2; ?></span>
                		<span id="eWeb2<?=$resClient->id?>"><?php echo $resClient->website2; ?></span>
                		<span id="eL1<?=$resClient->id?>"><?php echo $resClient->invoice_line_one; ?></span>
                		<span id="eL2<?=$resClient->id?>"><?php echo $resClient->invoice_line_two; ?></span>
                		<span id="eInvOrga<?=$resClient->id?>"><?php echo $resClient->invoice_organisation; ?></span>
                		<span id="eFirst3<?=$resClient->id?>"><?php echo $resClient->firstname3; ?></span>
		                <span id="eLast3<?=$resClient->id?>"><?php echo $resClient->lastname3; ?></span>
		                <span id="eEmail3<?=$resClient->id?>"><?php echo $resClient->email3; ?></span>
		                <span id="eTel3<?=$resClient->id?>"><?php echo $resClient->telephone3; ?></span>
                		<span id="eInvCity<?=$resClient->id?>"><?php echo $resClient->invoice_city; ?></span>
                		<span id="eInvCountry<?=$resClient->id?>"><?php echo countryCodeToCountry($resClient->invoice_country); ?></span>
                	</div>
	                <td><?php echo $i;?></td>
	                <td><?php echo $resClient->email; ?></</td>
	                <td><?php echo $resClient->firstname; ?></td>
	                <td><?php echo $resClient->lastname; ?></td>
	                <td><?php echo $resClient->telephone; ?></td>
	                <td><?php echo $resClient->organisation; ?></td>
	                <td><?php echo $resClient->job_title; ?></td>
	                <td><?php echo $resClient->city; ?></td>
	                <td><?php echo countryCodeToCountry($resClient->country); ?></td>
	                <td><span class="label label-<?php echo $resClient->status == 'Active'? 'success' : 'warning'; ?>" style="display: block;"><?php echo $resClient->status; ?></span></td>
	                <td>
	                    <div class="ibox-tools">
	                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #3c8dbc;">More</a>
	                        <ul class="dropdown-menu dropdown-user popover-menu-list">
                            	<li><a class="menu view_client" data-id="<?php echo $resClient->id;?>"><i class="fa fa-eye icon"></i> View</a></li>
                            	<li><a class="menu edit_client" data-id="<?php echo $resClient->id;?>"><i class="fa fa-pencil icon"></i> Edit</a></li>
                        		<?php if($resClient->status != 'Pending'){?>
                        		<li><a class="menu block_user" data-id="<?php echo $resClient->id;?>" data-action="Pending"><i class="fa fa-times-circle icon"></i> Desactivate</a></li>
                        		<?php }?>
                                <?php if($resClient->status != 'Active'){?>
                            	<li><a class="menu block_user" data-id="<?php echo $resClient->id;?>" data-action="Active"><i class="fa fa-check-circle"></i> Activate</a></li>
                            	<?php }?>
                            	<li><a href="<?php linkto("admin/pages/accounts/export_client/$clientId"); ?>" class="menu"><i class="fa fa-download icon"></i> Export</a></li>
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

	// Activate or block admin
	if(Input::get('request') && Input::get('request') == 'Activated' || Input::get('request') && Input::get('request') == 'Blocked') {
		try {
            $user->update(array('status' => Input::get('request')), Input::get('userid'));
            $valid['success'] = true;
			$valid['messages'] = "Successfully Updated";	
        } catch(Exception $error) {
            $valid['success'] = false;
			$valid['messages'] = "Error while updating user";
        }
		echo json_encode($valid);
	}

	// Add new client
	if(Input::get('request') && Input::get('request') == 'addNewClient') {
		// $validate = new Validate();
  //       $validation = $validate->check($_POST, array(
  //           'username' => array(
  //               'name' => 'Username',
  //               'required' => true,
  //               'unique' => 'users'
  //           ),
  //           'password' => array(
  //               'name' => 'Password',
  //               'required' => true,
  //               'min' => 6
  //           ),
  //           'password_again' => array(
  //               'required' => true,
  //               'matches' => 'password'
  //           )
  //       ));

  //       if ($validate->passed()) {
			// $salt = Hash::salt(32);
			try {
				if (Input::get('industry') == "Other") {
                    $industry = escape(Input::get('industry1'));
                } else { $industry = Input::get('industry'); }

                if (Input::get('industry2') == "Other") {
                    $industry2 = escape(Input::get('industry21'));
                } else { $industry2 = Input::get('industry2'); }

	            $controller->create("future_client", array(
	                'firstname'            => escape(Input::get('firstname')),
	                'lastname'             => escape(Input::get('lastname')),
	                'email'                => escape(Input::get('email')),
	                'telephone'            => escape(Input::get('telephone')),
	                'organisation'         => escape(Input::get('organisation')),
	                'employees'            => escape(Input::get('employees')),
	                'industry'             => $industry,
	                'job_title'            => escape(Input::get('job_title')),
	                'city'                 => escape(Input::get('city')),
	                'country'              => escape(Input::get('country')),
	                'website'              => escape(Input::get('website')),
	                'firstname2'           => escape(Input::get('firstname2')),
	                'lastname2'            => escape(Input::get('lastname2')),
	                'email2'               => escape(Input::get('email2')),
	                'telephone2'           => escape(Input::get('telephone2')),
	                'organisation2'        => escape(Input::get('organisation2')),
	                'employees2'           => escape(Input::get('employees2')),
	                'industry2'            => $industry2,
	                'job_title2'           => escape(Input::get('job_title2')),
	                'city2'                => escape(Input::get('city2')),
	                'country2'             => escape(Input::get('country2')),
	                'website2'             => escape(Input::get('website2')),
	                'invoice_line_one'     => escape(Input::get('invoice_line_one')),
	                'invoice_line_two'     => escape(Input::get('invoice_line_two')),
	                'invoice_organisation' => escape(Input::get('invoice_organisation')),
	                'firstname3'           => escape(Input::get('firstname3')),
	                'lastname3'            => escape(Input::get('lastname3')),
	                'email3'               => escape(Input::get('email3')),
	                'telephone3'           => escape(Input::get('telephone3')),
	                'invoice_city'         => escape(Input::get('invoice_city')),
	                'invoice_country'      => escape(Input::get('invoice_country')),
	                'status'               => "Pending",
	                'creation_date'        => date('Y-m-d')
	            ));

	            $valid['success'] = true;
				$valid['messages'] = "Client Successfully Created";	

	        } catch(Exception $error) {
	            $valid['success'] = false;
				$valid['messages'] = "Error while adding user";
	        }
	   //  } else {
    //         foreach ($validate->errors() as $error) {
    //             $errmsg .= $error . "<br>";
    //             $valid['success'] = false;
				// $valid['messages'] = $errmsg;
    //         }
    //     }
		echo json_encode($valid);
	}

	// Edit client
	if(Input::get('request') && Input::get('request') == 'editClient') {
		try {
			if (Input::get('industry') == "Other") {
                $industry = escape(Input::get('industry1'));
            } else { $industry = Input::get('industry'); }

            if (Input::get('industry2') == "Other") {
                $industry2 = escape(Input::get('industry21'));
            } else { $industry2 = Input::get('industry2'); }

            $controller->update("future_client", array(
                'firstname'            => escape(Input::get('firstname')),
                'lastname'             => escape(Input::get('lastname')),
                'email'                => escape(Input::get('email')),
                'telephone'            => escape(Input::get('telephone')),
                'organisation'         => escape(Input::get('organisation')),
                'employees'            => escape(Input::get('employees')),
                'industry'             => $industry,
                'job_title'            => escape(Input::get('job_title')),
                'city'                 => escape(Input::get('city')),
                'country'              => escape(Input::get('country')),
                'website'              => escape(Input::get('website')),
                'firstname2'           => escape(Input::get('firstname2')),
                'lastname2'            => escape(Input::get('lastname2')),
                'email2'               => escape(Input::get('email2')),
                'telephone2'           => escape(Input::get('telephone2')),
                'organisation2'        => escape(Input::get('organisation2')),
                'employees2'           => escape(Input::get('employees2')),
                'industry2'            => $industry2,
                'job_title2'           => escape(Input::get('job_title2')),
                'city2'                => escape(Input::get('city2')),
                'country2'             => escape(Input::get('country2')),
                'website2'             => escape(Input::get('website2')),
                'invoice_line_one'     => escape(Input::get('invoice_line_one')),
                'invoice_line_two'     => escape(Input::get('invoice_line_two')),
                'invoice_organisation' => escape(Input::get('invoice_organisation')),
                'firstname3'           => escape(Input::get('firstname3')),
                'lastname3'            => escape(Input::get('lastname3')),
                'email3'               => escape(Input::get('email3')),
                'telephone3'           => escape(Input::get('telephone3')),
                'invoice_city'         => escape(Input::get('invoice_city')),
                'invoice_country'      => escape(Input::get('invoice_country'))
            ), Input::get('clientId'));

            $valid['success'] = true;
			$valid['messages'] = "Client Successfully Updated";	

        } catch(Exception $error) {
            $valid['success'] = false;
			$valid['messages'] = "Error while updating client";
		}

		echo json_encode($valid);
	}

	// Activate or block client
	if(Input::get('request') && Input::get('request') == 'activateClient') {
		try {
            $controller->update("future_client", array('status' => Input::get('action')), Input::get('clientId'));
            $valid['success'] = true;
			$valid['messages'] = "Successfully Updated";	
        } catch(Exception $error) {
            $valid['success'] = false;
			$valid['messages'] = "Error while updating user";
        }
		echo json_encode($valid);
	}

	// Change password
    if(Input::get('request') && Input::get('request') == 'changePassword') {
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
        	'old_password' => array(
                'required' => true,
            ),
            'password' => array(
                'name' => 'Password',
                'required' => true,
                'min' => 6
            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            )
        ));
        if($validate->passed()) {
			if(Hash::make(Input::get('old_password'), $user->data()->salt) !== $user->data()->password) {
	            $valid['success']  = false;
                $valid['messages'] = "Your old password doesn't match";
	        } else {
	            $salt = Hash::salt(32);
	            $user->update(array(
	                'password' => Hash::make(Input::get('password'), $salt),
	                'salt' => $salt
	            ));
	            $valid['success']  = true;
                $valid['messages'] = "Your password has been changed!";
	        }
        } else {
            foreach($validate->errors() as $error) {
                $errmsg .= $error . "<br>";
                $valid['success']  = false;
                $valid['messages'] = $errmsg;
            }
        }
        echo json_encode($valid);
    }
?>


