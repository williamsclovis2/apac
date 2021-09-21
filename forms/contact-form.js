$(document).ready(function(){
	// Delegate registration
	$('#contactForm').submit(function() {
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
	    if (ferror) return false;
	    else var str = $(this).serialize();

	    var this_form     = $(this);
	    var action        = $(this).attr('action');
	    var inputCaptcha  = document.getElementById("securityCode").value.trim();

	    $('#contactButton').prop('disabled', true);
	    
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
								$('#contactButton').prop('disabled', true);
								$("#contactForm")[0].reset();
								$("html, body").animate({scrollTop: $("#why_attend_area").offset().top}, 1000);
								$('#contact-messages').html('<div class="sent-message">'+ response.messages + '</div>');
					   			this_form.find('.sent-message').slideDown().html(response.messages);
			     				$(".sent-message").delay(500).show(10, function() {
									
								});
					        } else {
					        	$('#contactButton').prop('disabled', false);
					          	$("html, body").animate({scrollTop: $("#why_attend_area").offset().top}, 1000);
								$('#contact-messages').html('<div class="error-message">'+ response.messages + '</div>');
					          	this_form.find('.error-message').slideDown().html(response.messages);
			          			$(".error-message").delay(500).show(10, function() {
									
								});
					        }
				      	}
				    });
				} else {
					$('#contactButton').prop('disabled', false);
					$('#securityCode_error').text("Invalid security code");
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
});
