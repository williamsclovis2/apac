$(document).ready(function(){
	showAdminTable();

	// add
	$("#addUserForm").unbind('submit').bind('submit', function() {
		$(".text-danger").remove();
		$('.form-group').removeClass('has-error').removeClass('has-success');
					
		var username   = $('#username').val();
		var firstname  = $('#firstname').val();
		var lastname   = $('#lastname').val();
		var password   = $('#password').val();
		var password_again   = $('#password_again').val();

		if(username == "") {
			$("#username").after('<p class="text-danger">Username is required</p>');
			$('#username').closest('.form-group').addClass('has-error');
		} else {
			$("#username").find('.text-danger').remove();
			$("#username").closest('.form-group').addClass('has-success');	  	
		}
		if(firstname == "") {
			$("#firstname").after('<p class="text-danger">Firstname is required</p>');
			$('#firstname').closest('.form-group').addClass('has-error');
		} else {
			$("#firstname").find('.text-danger').remove();
			$("#firstname").closest('.form-group').addClass('has-success');	  	
		}
		if(lastname == "") {
			$("#lastname").after('<p class="text-danger">Lastname is required</p>');
			$('#lastname').closest('.form-group').addClass('has-error');
		} else {
			$("#lastname").find('.text-danger').remove();
			$("#lastname").closest('.form-group').addClass('has-success');	  	
		}
		if(password == "") {
			$("#password").after('<p class="text-danger">Password is required</p>');
			$('#password').closest('.form-group').addClass('has-error');
		} else {
			$("#password").find('.text-danger').remove();
			$("#password").closest('.form-group').addClass('has-success');	  	
		}
		if(password_again == "") {
			$("#password_again").after('<p class="text-danger">Confirm password is required</p>');
			$('#password_again').closest('.form-group').addClass('has-error');
		} else if(password_again != password) {
			$("#password_again").after('<p class="text-danger">Confirm password doesnt match</p>');
			$('#password_again').closest('.form-group').addClass('has-error');
		} else {
			$("#password_again").find('.text-danger').remove();
			$("#password_again").closest('.form-group').addClass('has-success');	  	
		}

		if(username && firstname && lastname && password && password_again) {
			$("#addUserButton").button('loading');
			var addUserForm = $('#addUserForm').serialize();
			$.ajax({
				type: 'POST',
				url: 'accounts_action.php',
				data: addUserForm,
				dataType: 'json',
				success:function(response) {
					if(response.success == true) {
						$("#addUserButton").button('reset');
						$("#addUserForm")[0].reset();
						showAdminTable();
						$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
						$('#add-user-messages').html('<div class="alert alert-success">'+
				        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				        '</div>');
	          			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
								$('#addUserModal').modal('hide');
							});
						});
					} else {
						$("#addUserButton").button('reset');
						$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
						$('#add-user-messages').html('<div class="alert alert-danger">'+
				        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				        '<strong><i class="fa fa-times-circle icon"></i></strong> '+ response.messages +
				        '</div>');
				        $(".alert-danger").delay(500).show(10, function() {
							
						});
					}
				}
			}); 
		} 
		return false;
	});

	//edit
	$(document).on('click', '.edit_user', function() {
		var userId = $(this).data('id');
		var user   = $('#eUser'+userId).text();
		var first  = $('#eFirst'+userId).text();
		var last   = $('#eLast'+userId).text();
		$('#EditUserModal').modal('show');
		$('#eusername').val(user);
		$('#efirstname').val(first);
		$('#elastname').val(last);
		$('#editUserButton').val(userId);

		$(".editUserFooter").append('<input type="hidden" name="userId" id="userId" value="'+userId+'" />');

		$('#editUserForm').unbind('submit').bind('submit', function() {
			var username   = $('#eusername').val();
			var firstname  = $('#efirstname').val();
			var lastname   = $('#elastname').val();

			if(username == "") {
				$("#eusername").after('<p class="text-danger">Username is required</p>');
				$('#eusername').closest('.form-group').addClass('has-error');
			} else {
				$("#eusername").find('.text-danger').remove();
				$("#eusername").closest('.form-group').addClass('has-success');	  	
			}
			if(firstname == "") {
				$("#efirstname").after('<p class="text-danger">Firstname is required</p>');
				$('#efirstname').closest('.form-group').addClass('has-error');
			} else {
				$("#efirstname").find('.text-danger').remove();
				$("#efirstname").closest('.form-group').addClass('has-success');	  	
			}
			if(lastname == "") {
				$("#elastname").after('<p class="text-danger">Lastname is required</p>');
				$('#elastname').closest('.form-group').addClass('has-error');
			} else {
				$("#elastname").find('.text-danger').remove();
				$("#elastname").closest('.form-group').addClass('has-success');	  	
			}

			if(username && firstname && lastname) {
				$("#editUserButton").button('loading');
				var form     = $(this);
				var formData = new FormData(this);
				$.ajax({
					type: 'POST',
					url: 'accounts_action.php',
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {
						if(response.success == true) {
							$("#editUserButton").button('reset');
							$("#editUserForm")[0].reset();
							showAdminTable();
							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
							$('#edit-user-messages').html('<div class="alert alert-success">'+
					        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
					        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
					        '</div>');
		          			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
									$('#EditUserModal').modal('hide');
								});
							});
						} else {
							$("#editUserButton").button('reset');
							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
							$('#edit-user-messages').html('<div class="alert alert-danger">'+
					        '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
					        '<strong><i class="fa fa-times-circle icon"></i></strong> '+ response.messages +
					        '</div>');
					        $(".alert-danger").delay(500).show(10, function() {
								
							});
						}
					}
				});
			}
			return false;
		});
	});

	//status
	$(document).on('click', '.block_user', function() {
		var userid  = $(this).data('id');
		var request = $(this).data('request');
		$.ajax({
			type: 'POST',
			url: 'accounts_action.php',
			data: {userid: userid, request: request},
			dataType: 'json',
			success:function(response) {
				if(response.success == true) {
					showAdminTable();
				}
			}
		});
	});

});

function showAdminTable() {
	$.ajax({
		type: 'POST',
		url: 'accounts_action.php',
		data: {
			fetchAdmin: 1
		},
		success:function(data){
			$('#user-table').html(data);
		}
	});
}