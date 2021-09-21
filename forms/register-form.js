$(document).ready(function(){
	// Delegate registration
	$('#registerButton').prop('disabled', true);
	$('#registerForm').submit(function() {
	    var f = $(this).find('.field-validate'),
	     	ferror = false,
	      	emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

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
	    f.children('select').each(function() { // run all inputs
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
	        }
	        i.next('.validate').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
	      	}
	    });
	    f.children('textarea').each(function() { // run all inputs
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
		        }
		        i.next('.validate').html((ierror ? (i.attr('data-msg') != undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
			}
	    });

	    if($('#telephone').val().length === 0) {
	    	ferror = ierror = true;
	        $('#telephone_error').text("Please enter telephone");
	    }
	    if($('#organisation_country').val().length === 0) {
	    	ferror = ierror = true;
	        $('#organisation_country_error').text("Please select country");
	    }
	    if($('#residence_country').val().length === 0) {
	    	ferror = ierror = true;
	        $('#residence_country_error').text("Please select country");
	    }
	    if($('#citizenship').val().length === 0) {
	    	ferror = ierror = true;
	        $('#citizenship_error').text("Please select country");
	    }
	    if (ferror) return false;
	    else var str = $(this).serialize();

	    var this_form     = $(this);
	    var action        = $(this).attr('action');
	    var inputCaptcha  = document.getElementById("securityCode").value.trim();

	    $('#registerButton').prop('disabled', true);
	    
	    $.ajax({
            type: "POST",
	      	url: action,
	      	data: {request: "captchaSession"},
	      	dataType: 'json',
	      	success:function(response) {
	      		if (response.messages == inputCaptcha) {
				    $.ajax({
				      	type: "POST",
				      	url: action,
				      	data: str,
				      	dataType: 'json',
				      	success:function(response) {
							if(response.success == true) {
								// $('#registerButton').prop('disabled', true);
								// $("#registerForm")[0].reset();
								// $("html, body, div#register_area, div#registerForm").animate({scrollTop: '0'}, 100);
								// $('#register-messages').html('<div class="sent-message">'+ response.messages + '</div>');
					   			// this_form.find('.sent-message').slideDown().html(response.messages);
			     				// $(".sent-message").delay(500).show(10, function() {
									
								// });
								$("#register_area").css("display", "none");
								$("#account_area").css("display", "block");
								$('#username').val(response.messages);
					        } else {
					        	$('#registerButton').prop('disabled', false);
					          	$("html, body, div#register_area, div#registerForm").animate({scrollTop: '0'}, 100);
								$('#register-messages').html('<div class="error-message">'+ response.messages + '</div>');
					          	this_form.find('.error-message').slideDown().html(response.messages);
			          			$(".error-message").delay(500).show(10, function() {
									
								});
					        }
				      	}
				    });
				} else {
					$('#registerButton').prop('disabled', false);
					$('#securityCode_error').text("Invalid security code");
				}
			}
		});
	    return false;
	});

	// Delegate account
	$('#accountForm').submit(function() {
	    var f = $(this).find('.field-validate'),
	     	ferror = false,
	      	emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

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

	    $("#accountButton").prop('disabled', true);
	    
	    $.ajax({
	      	type: "POST",
	      	url: action,
	      	data: str,
	      	dataType: 'json',
	      	success:function(response) {
				if(response.success == true) {
					// $("#accountButton").prop('disabled', false);
					// $("#accountForm")[0].reset();
					// $('#account-messages').html('<div class="sent-message">'+ response.messages + '</div>');
		   			// this_form.find('.sent-message').slideDown().html(response.messages);
     				// $(".sent-message").delay(500).show(10, function() {
						
					// });
					window.location.replace("notification");
		        } else {
		        	$("#accountButton").prop('disabled', false);
					$('#account-messages').html('<div class="error-message">'+ response.messages + '</div>');
		          	this_form.find('.error-message').slideDown().html(response.messages);
          			$(".error-message").delay(500).show(10, function() {
						
					});
		        }
	      	}
	    });
	    return false;
	});

	// login delegate
	$('#loginForm').submit(function() {
	    var f = $(this).find('.field-validate'),
	     	ferror = false,
	      	emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

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
	        }
	        i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
	    }
	    });
	    if (ferror) return false;
	    else var str = $(this).serialize();

	    var this_form = $(this);
	    var action = $(this).attr('action');

	    $("#loginButton").prop('disabled', true);
	    
	    $.ajax({
	      	type: "POST",
	      	url: action,
	      	data: str,
	      	dataType: 'json',
	      	success:function(response) {
				if(response.success == true) {
					// $("#loginButton").prop('disabled', false);
					// $("#loginForm")[0].reset();
					// $('#login-messages').html('<div class="sent-message">'+ response.messages + '</div>');
		   // 			this_form.find('.sent-message').slideDown().html(response.messages);
     // 				$(".sent-message").delay(500).show(10, function() {
						
					// });
					window.location.replace("live");
		        } else {
		        	$("#loginButton").prop('disabled', false);
					$('#login-messages').html('<div class="error-message">'+ response.messages + '</div>');
		          	this_form.find('.error-message').slideDown().html(response.messages);
          			$(".error-message").delay(500).show(10, function() {
						
					});
		        }
	      	}
	    });
	    return false;
	});

	// Load captcha
	$("#reloadCaptcha").click(function(){
		var captchaImage = $('#captcha').attr('src');	
		captchaImage = captchaImage.substring(0,captchaImage.lastIndexOf("?"));
		captchaImage = captchaImage+"?rand="+Math.random()*1000;
		$('#captcha').attr('src', captchaImage);
	});

	// Accept terms
	$("#privacy").change(function() {
	    if(this.checked) {
	        $('#registerButton').prop('disabled', false);
	    } else {
	    	$('#registerButton').prop('disabled', true);
	    }
	});
});

function Other(field,field1) {
  	var value = $(field).val();
    var name = $(field).attr('name');
    var name1 = $(field1).attr('name');
    if(value == "Other"){
        if(!$(field).hasClass('swapped')) {
            $(field).addClass('swapped');
            $(field1).prop('disabled', false);
            var input = $(field1);
            input[0].selectionStart = input[0].selectionEnd = input.val().length;
        }
    } else {
        if($(field).hasClass('swapped')) {
            $(field1).val("");
            $(field).removeClass('swapped');
            $(field1).prop('disabled', true);
        } else{
            $(field1).val("");
            $(field1).prop('disabled', true);
        }
    }
}