$(document).ready(function () {
	//Login
	var count = 3;
	$('#loginForm').submit(function () {
		var f = $(this).find('.form-group'),
			ferror = false,
			emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

<<<<<<< HEAD
	    f.children('input').each(function() { // run all inputs
	      	var i = $(this); // current input
	      	var rule = i.attr('data-rule');
	      	if (rule !== undefined) {
	        	var ierror = false; // error flag for current input
	        	var pos = rule.indexOf(':', 0);
	        	if (pos >= 0) {
	          	var exp = rule.substr(pos + 1, rule.length);
	          	rule = rule.substr(0, pos);
	        } else {
	          	rule = rule.substr(pos + 1, rule.length);
	        }
	        switch (rule) {
	          	case 'required':
		            if (i.val() === '') {
		              ferror = ierror = true;
		            }
		            break;
		        case 'email':
		            if (!emailExp.test(i.val())) {
		              ferror = ierror = true;
		            }
		            break;
	        }
	        i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
	    }
	    });
		
	    // if (ferror) return false;
	    // else
		 var str = $(this).serialize();
		
	    var this_form     = $(this);
	    var action        = $(this).attr('action');
	    var inputCaptcha  =document.getElementById("securityCode").value.trim();

	    $("#loginButton").button('loading');
	    $('#success-div').attr('hidden', '');
	    $('#failed-div').attr('hidden', '');  
	    $('#log-div').removeAttr('hidden');
	    
	    // $.ajax({
            // type: "POST",
	      	// url: action,
	      	// data: {request: "captchaSession"},
	      	// dataType: 'json',
	      	// success:function(response) {
	      		// if (response.messages == inputCaptcha) {
					alert("pass");
				    $.ajax({
				      	type: "POST",
				      	url: action,
				      	data: str,
				      	dataType: 'json',
				      	success:function(response) {
							if(response.success == true) {
								$("#loginButton").button('reset');
								$("#loginForm")[0].reset();
								window.setTimeout(function(){
			                        $('#log-div').attr('hidden','hidden');
			                    }, 500);
			                    window.setTimeout(function(){
			                        $('#success-div').removeAttr('hidden');
			                        $('#success-div').html('<span class="fo-login">'+
			                    	'<i class="fa fa-check-circle"></i> '+ response.messages +
			                    	'</span>');
			                    }, 500);
			                    window.setTimeout(function(){
			                        window.location.replace("index");
			                    }, 1100);
					        } else {
					        	$("#loginButton").button('reset');
					        	// $("#loginForm")[0].reset();
					          	window.setTimeout(function(){
			                        $('#log-div').attr('hidden','hidden');
			                    }, 1000);

			                    count--;
					            if(count > 0){
					                window.setTimeout(function(){
			                        $('#failed-div').removeAttr('hidden');
			                        $('#failed-div').html('<span class="fo-login">'+
			                    	'<i class="fa fa-times-circle"></i> <strong>'+ response.messages +'</strong>'+
			                    	'<br> Only '+ count + ' attempts remaining'+
			                    	'</span>');
			                    	}, 1100);
					            }
					            else {
						            window.setTimeout(function(){
				                        $('#failed-div').removeAttr('hidden');
				                        $('#failed-div').html('<span class="fo-login">'+
				                    	'<i class="fa fa-times-circle"></i> <a href="confirmemail" style="color: white;">Click here to reset your username or password</a></span>');
				                    }, 1100);
				                    $("#loginButton").button('loading');
					            }
					        }
				      	}
				    });
				// } else {
				// 	$('#log-div').attr('hidden','hidden');
				// 	$("#loginButton").button('reset');
				// 	document.getElementById("securityCode_error").innerHTML="Invalid security code";
				// }
			// }
		// });
	    return false;
=======
		// f.children('input').each(function () { // run all inputs
		// 	var i = $(this); // current input
		// 	var rule = i.attr('data-rule');
		// 	if (rule !== undefined) {
		// 		var ierror = false; // error flag for current input
		// 		var pos = rule.indexOf(':', 0);
		// 		if (pos >= 0) {
		// 			var exp = rule.substr(pos + 1, rule.length);
		// 			rule = rule.substr(0, pos);
		// 		} else {
		// 			rule = rule.substr(pos + 1, rule.length);
		// 		}
		// 		switch (rule) {
		// 			case 'required':
		// 				if (i.val() === '') {
		// 					ferror = ierror = true;
		// 				}
		// 				break;
		// 			case 'email':
		// 				if (!emailExp.test(i.val())) {
		// 					ferror = ierror = true;
		// 				}
		// 				break;
		// 		}
		// 		i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
		// 	}
		// });
		// if (ferror) return false;
		// else 
		var str = $(this).serialize();

		alert("Data :: - " + str);

		// var this_form = $(this);
		// var action = $(this).attr('action');
		// var inputCaptcha = document.getElementById("securityCode").value.trim();

		// $("#loginButton").button('loading');
		// $('#success-div').attr('hidden', '');
		// $('#failed-div').attr('hidden', '');
		// $('#log-div').removeAttr('hidden');

		// $.ajax({
		//     type: "POST",
		//   	url: action,
		//   	data: {request: "captchaSession"},
		//   	dataType: 'json',
		//   	success:function(response) {
		//   		if (response.messages == inputCaptcha) {
		// $.ajax({
		// 	type: "POST",
		// 	url: action,
		// 	data: str,
		// 	dataType: 'json',
		// 	success: function (response) {
		// 		if (response.success == true) {
		// 			$("#loginButton").button('reset');
		// 			$("#loginForm")[0].reset();
		// 			window.setTimeout(function () {
		// 				$('#log-div').attr('hidden', 'hidden');
		// 			}, 500);
		// 			window.setTimeout(function () {
		// 				$('#success-div').removeAttr('hidden');
		// 				$('#success-div').html('<span class="fo-login">' +
		// 					'<i class="fa fa-check-circle"></i> ' + response.messages +
		// 					'</span>');
		// 			}, 500);
		// 			window.setTimeout(function () {
		// 				window.location.replace("index");
		// 			}, 1100);
		// 		} else {
		// 			$("#loginButton").button('reset');
		// 			// $("#loginForm")[0].reset();
		// 			window.setTimeout(function () {
		// 				$('#log-div').attr('hidden', 'hidden');
		// 			}, 1000);

		// 			count--;
		// 			if (count > 0) {
		// 				window.setTimeout(function () {
		// 					$('#failed-div').removeAttr('hidden');
		// 					$('#failed-div').html('<span class="fo-login">' +
		// 						'<i class="fa fa-times-circle"></i> <strong>' + response.messages + '</strong>' +
		// 						'<br> Only ' + count + ' attempts remaining' +
		// 						'</span>');
		// 				}, 1100);
		// 			}
		// 			else {
		// 				window.setTimeout(function () {
		// 					$('#failed-div').removeAttr('hidden');
		// 					$('#failed-div').html('<span class="fo-login">' +
		// 						'<i class="fa fa-times-circle"></i> <a href="confirmemail" style="color: white;">Click here to reset your username or password</a></span>');
		// 				}, 1100);
		// 				$("#loginButton").button('loading');
		// 			}
		// 		}
		// 	}
		// });
		// 		} else {
		// 			$('#log-div').attr('hidden','hidden');
		// 			$("#loginButton").button('reset');
		// 			document.getElementById("securityCode_error").innerHTML="Invalid security code";
		// 		}
		// 	}
		// });
		// return false;
>>>>>>> 75ab05ce8fe3c632e9dda8585518d96a444c9251
	});


	// Change password
	$('#passwordForm').submit(function () {
		var f = $(this).find('.form-group'),
			ferror = false,
			emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

		f.children('input').each(function () { // run all inputs
			var i = $(this); // current input
			var rule = i.attr('data-rule');
			if (rule !== undefined) {
				var ierror = false; // error flag for current input
				var pos = rule.indexOf(':', 0);
				if (pos >= 0) {
					var exp = rule.substr(pos + 1, rule.length);
					rule = rule.substr(0, pos);
				} else {
					rule = rule.substr(pos + 1, rule.length);
				}
				switch (rule) {
					case 'required':
						if (i.val() === '') {
							ferror = ierror = true;
						}
						break;
					case 'minlen':
						if (i.val().length < parseInt(exp)) {
							ferror = ierror = true;
						}
						break;
					case 'matches':
						if (i.val() !== $("#password").val()) {
							ferror = ierror = true;
						}
						break;
				}
				i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
			}
		});
		if (ferror) return false;
		else var str = $(this).serialize();

		var this_form = $(this);
		var action = $(this).attr('action');

		$("#passwordButton").button('loading');

		$.ajax({
			type: "POST",
			url: action,
			data: str,
			dataType: 'json',
			success: function (response) {
				if (response.success == true) {
					$("#passwordButton").button('reset');
					$("#passwordForm")[0].reset();
					$('#change-password-messages').html('<div class="sent-message">' + response.messages + '</div>');
					this_form.find('.sent-message').slideDown().html(response.messages);
					$(".sent-message").delay(500).show(10, function () {
						$(this).delay(3000).hide(10, function () {
							// $(this).remove();
							// $('#addClientModal').modal('hide');
						});
					});
				} else {
					$("#passwordButton").button('reset');
					$('#change-password-messages').html('<div class="error-message">' + response.messages + '</div>');
					this_form.find('.error-message').slideDown().html(response.messages);
					$(".error-message").delay(500).show(10, function () {

					});
				}
			}
		});
		return false;
	});

	// Forget password
	$('#confirmForm').submit(function () {
		var f = $(this).find('.form-group'),
			ferror = false,
			emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

		f.children('input').each(function () { // run all inputs
			var i = $(this); // current input
			var rule = i.attr('data-rule');
			if (rule !== undefined) {
				var ierror = false; // error flag for current input
				var pos = rule.indexOf(':', 0);
				if (pos >= 0) {
					var exp = rule.substr(pos + 1, rule.length);
					rule = rule.substr(0, pos);
				} else {
					rule = rule.substr(pos + 1, rule.length);
				}
				switch (rule) {
					case 'email':
						if (!emailExp.test(i.val())) {
							ferror = ierror = true;
						}
						break;
				}
				i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
			}
		});
		if (ferror) return false;
		else var str = $(this).serialize();

		var this_form = $(this);
		var action = $(this).attr('action');

		$("#confirmButton").button('loading');
		$('#success-div').attr('hidden', '');
		$('#failed-div').attr('hidden', '');

		$.ajax({
			type: "POST",
			url: action,
			data: str,
			dataType: 'json',
			success: function (response) {
				if (response.success == true) {
					$("#confirmButton").button('reset');
					$("#confirmForm")[0].reset();
					window.setTimeout(function () {
						$('#log-div').attr('hidden', 'hidden');
					}, 500);
					window.setTimeout(function () {
						$('#success-div').removeAttr('hidden');
						$('#success-div').html('<span class="fo-login">' +
							'<i class="fa fa-check-circle"></i> ' + response.messages +
							'</span>');
						$('#hideForm').attr('hidden', 'hidden');
					}, 500);

				} else {
					$("#confirmButton").button('reset');
					window.setTimeout(function () {
						$('#failed-div').removeAttr('hidden');
						$('#failed-div').html('<span class="fo-login">' +
							'<i class="fa fa-check-circle"></i> ' + response.messages +
							'</span>');
					}, 500);
				}
			}
		});
		return false;
	});

	// Reset password
	$('#resetForm').submit(function () {
		var f = $(this).find('.form-group'),
			ferror = false,
			emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

		f.children('input').each(function () { // run all inputs
			var i = $(this); // current input
			var rule = i.attr('data-rule');
			if (rule !== undefined) {
				var ierror = false; // error flag for current input
				var pos = rule.indexOf(':', 0);
				if (pos >= 0) {
					var exp = rule.substr(pos + 1, rule.length);
					rule = rule.substr(0, pos);
				} else {
					rule = rule.substr(pos + 1, rule.length);
				}
				switch (rule) {
					case 'minlen':
						if (i.val().length < parseInt(exp)) {
							ferror = ierror = true;
						}
						break;
					case 'matches':
						if (i.val() !== $("#password").val()) {
							ferror = ierror = true;
						}
						break;
				}
				i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
			}
		});
		if (ferror) return false;
		else var str = $(this).serialize();

		var this_form = $(this);
		var action = $(this).attr('action');

		$("#resetButton").button('loading');
		$('#success-div').attr('hidden', '');
		$('#failed-div').attr('hidden', '');

		$.ajax({
			type: "POST",
			url: action,
			data: str,
			dataType: 'json',
			success: function (response) {
				if (response.success == true) {
					$("#resetButton").button('reset');
					$("#resetForm")[0].reset();
					window.setTimeout(function () {
						$('#log-div').attr('hidden', 'hidden');
					}, 500);
					window.setTimeout(function () {
						$('#success-div').removeAttr('hidden');
						$('#success-div').html('<span class="fo-login">' +
							'<i class="fa fa-check-circle"></i> ' + response.messages +
							'</span>');
					}, 500);
					window.setTimeout(function () {
						window.location.replace("login");
					}, 1100);

				} else {
					$("#resetButton").button('reset');
					window.setTimeout(function () {
						$('#failed-div').removeAttr('hidden');
						$('#failed-div').html('<span class="fo-login">' +
							'<i class="fa fa-check-circle"></i> ' + response.messages +
							'</span>');
					}, 500);
				}
			}
		});
		return false;
	});

	// Load captcha
	$("#reloadCaptcha").click(function () {
		var captchaImage = $('#captcha').attr('src');
		captchaImage = captchaImage.substring(0, captchaImage.lastIndexOf("?"));
		captchaImage = captchaImage + "?rand=" + Math.random() * 1000;
		$('#captcha').attr('src', captchaImage);
	});
});