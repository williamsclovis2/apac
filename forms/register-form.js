$(document).ready(function () {
	// Delegate registration
	$('#registerButton').prop('disabled', true);
	$('#registerForm1').submit(function () {
		var f = $(this).find('.field-validate'),
			ferror = false,
			emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;
		var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

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
					case 'email':
						if (!emailExp.test(i.val())) {
							ferror = ierror = true;
						}
						break;
				}
				i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
			}
		});
		f.children('select').each(function () { // run all inputs
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
		f.children('textarea').each(function () { // run all inputs
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

		if ($('#telephone').val().length === 0) {
			ferror = ierror = true;
			$('#telephone_error').text("Please enter telephone");
		}
		if ($('#organisation_country').val().length === 0) {
			ferror = ierror = true;
			$('#organisation_country_error').text("Please select country");
		}
		if ($('#residence_country').val().length === 0) {
			ferror = ierror = true;
			$('#residence_country_error').text("Please select country");
		}
		if ($('#citizenship').val().length === 0) {
			ferror = ierror = true;
			$('#citizenship_error').text("Please select country");
		}
		if (ferror) return false;
		else var str = $(this).serialize();

		var this_form = $(this);
		var action = $(this).attr('action');
		var inputCaptcha = document.getElementById("securityCode").value.trim();

		$('#registerButton').prop('disabled', true);

		$.ajax({
			type: "POST",
			url: action,
			data: { request: "captchaSession" },
			dataType: 'json',
			success: function (response) {
				if (response.messages == inputCaptcha) {
					$.ajax({
						type: "POST",
						url: action,
						data: str,
						dataType: 'json',
						success: function (response) {
							if (response.success == true) {
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
								$("html, body, div#register_area, div#registerForm").animate({ scrollTop: '0' }, 100);
								$('#register-messages').html('<div class="error-message">' + response.messages + '</div>');
								this_form.find('.error-message').slideDown().html(response.messages);
								$(".error-message").delay(500).show(10, function () {

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
	$('#accountForm').submit(function () {
		var f = $(this).find('.field-validate'),
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

		$("#accountButton").prop('disabled', true);

		$.ajax({
			type: "POST",
			url: action,
			data: str,
			dataType: 'json',
			success: function (response) {
				if (response.success == true) {
					// $("#accountButton").prop('disabled', false);
					// $("#accountForm")[0].reset();
					// $('#account-messages').html('<div class="sent-message">'+ response.messages + '</div>');
					// this_form.find('.sent-message').slideDown().html(response.messages);
					// $(".sent-message").delay(500).show(10, function() {

					// });
					window.location.replace("notification");
				} else {
					$("#accountButton").prop('disabled', false);
					$('#account-messages').html('<div class="error-message">' + response.messages + '</div>');
					this_form.find('.error-message').slideDown().html(response.messages);
					$(".error-message").delay(500).show(10, function () {

					});
				}
			}
		});
		return false;
	});

	// login delegate
	$('#loginForm').submit(function () {
		var f = $(this).find('.field-validate'),
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
			success: function (response) {
				if (response.success == true) {
					// $("#loginButton").prop('disabled', false);
					// $("#loginForm")[0].reset();
					// $('#login-messages').html('<div class="sent-message">'+ response.messages + '</div>');
					// 			this_form.find('.sent-message').slideDown().html(response.messages);
					// 				$(".sent-message").delay(500).show(10, function() {

					// });
					window.location.replace("live");
				} else {
					$("#loginButton").prop('disabled', false);
					$('#login-messages').html('<div class="error-message">' + response.messages + '</div>');
					this_form.find('.error-message').slideDown().html(response.messages);
					$(".error-message").delay(500).show(10, function () {

					});
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

	// Accept terms
	$("#privacy").change(function () {
		if (this.checked) {
			$('#registerButton').prop('disabled', false);
		} else {
			$('#registerButton').prop('disabled', true);
		}
	});
});

function Other(field, field1) {
	var value = $(field).val();
	var name = $(field).attr('name');
	var name1 = $(field1).attr('name');
	if (value == "Other") {
		if (!$(field).hasClass('swapped')) {
			$(field).addClass('swapped');
			$(field1).prop('disabled', false);
			var input = $(field1);
			input[0].selectionStart = input[0].selectionEnd = input.val().length;
		}
	} else {
		if ($(field).hasClass('swapped')) {
			$(field1).val("");
			$(field).removeClass('swapped');
			$(field1).prop('disabled', true);
		} else {
			$(field1).val("");
			$(field1).prop('disabled', true);
		}
	}
	$('#' + name + '_error').text("");
}








function validateEmail(email) {
	var re = /\S+@\S+\.\S+/;
	return re.test(email);
}


$('.registerFormSubmit').on('click', function () {
	location.href = "#" + "registerForm";
	$('.field-validate .validate').text('');

	var f = $("#registerForm").find('.field-validate'),
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
				case 'email':
					if (!emailExp.test(i.val())) {
						ferror = ierror = true;
					}
					break;
			}
			i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
		}
	});
	f.children('select').each(function () { // run all inputs
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
	f.children('textarea').each(function () { // run all inputs
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

	var eventCode_ = $('#_EvCode_').val();
	var eventParticiaptionCode_ = $('#_EvPCode_').val();

	resgistrationFormValidation(eventCode_, eventParticiaptionCode_);

	var str = "";
	if (ferror) {
		location.href = "#" + "registerForm";
		return false;
	}
	str = $('#registerForm').serialize();

	var this_form = $('#registerForm');
	var action = $('.host').attr('link') + "registration";
	// var inputCaptcha = document.getElementById("securityCode").value.trim();


	$('#registerButton').prop('disabled', true);

	// $.ajax({
	// 	type: "POST",
	// 	url: action,
	// 	data: { request: "captchaSession" },
	// 	dataType: 'json',
	// 	success: function (response) {

	// 		if (!response.messages == inputCaptcha) {

	// alert("DATA - " + action);

	$.ajax({
		type: "POST",
		url: action,
		data: str,
		cache: false,
		success: function (dataResponse) {

			var response = JSON.parse(dataResponse);


			// alert("DATA - " + response.status);

			if (response.status == 100) {
				$("#register_area").css("display", "none");
				$("#account_area").css("display", "block");
				// $("#register_area").addClass("hidden", "hidden");
				// $("#account_area").show();
				// $('#register-messages').val(response.message);
				$("#accountForm #accountButton").attr("authtoken", response.authToken);
				$("#accountForm #authtoken").val(response.authToken);

			}
			else if (response.status == 201) {
				$('#registerButton').prop('disabled', false);
				$("html, body, div#register_area, div#registerForm").animate({ scrollTop: '0' }, 100);
				$('#register-messages').html('<div class="error-message">' + response.message + '</div>');
				this_form.find('.error-message').slideDown().html(response.message);
				$(".error-message").delay(500).show(10, function () {

				});
			}
			else {
				$('#registerButton').prop('disabled', false);
				$("html, body, div#register_area, div#registerForm").animate({ scrollTop: '0' }, 100);
				$('#register-messages').html('<div class="error-message">' + response.message + '</div>');
				this_form.find('.error-message').slideDown().html(response.message);
				$(".error-message").delay(500).show(10, function () {

				});
			}
		}
	});
	// } else {
	// 	$('#registerButton').prop('disabled', false);
	// 	$('#securityCode_error').text("Invalid security code");
	// }
	// 		}
	// 	});
	// return false;

});
















$('.registerACPFormSubmit').on('click', function () {
	var f = $(this).find('.field-validate'),
		ferror = false,
		emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

	$('#password_error').text("");
	$('#confirm_password_error').text("");

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

	if ($('#password').val().length === 0) {
		ferror = ierror = true;
		$('#password_error').text("Please enter password");
	}
	if ($('#password').val().length < 6) {
		ferror = ierror = true;
		$('#password_error').text("Please enter password");
	}
	if ($('#confirm_password').val().length === 0) {
		ferror = ierror = true;
		$('#confirm_password_error').text("Please confirm password");
	}
	if ($('#password').val() != $('#confirm_password').val()) {
		ferror = ierror = true;
		$('#confirm_password_error').text("password don't match!");
	}

	var str = "";
	if (ferror) return false;
	str = $('#accountForm').serialize();

	var this_form = $('#accountForm');
	var action = $('.host').attr('link') + "registration";
	// var inputCaptcha = document.getElementById("securityCode").value.trim();


	$("#loginButton").prop('disabled', true);

	$.ajax({
		type: "POST",
		url: action,
		data: str,
		cache: false,
		success: function (dataResponse) {

			var response = JSON.parse(dataResponse);

			if (response.status == 100) {
				window.location.href = $('.host').attr('link') + "payment/" + response.authToken;
			}
			else if (response.status == 101) {
				window.location.href = $('.host').attr('link') + "notification";
			}
			else if (response.status == 200) {
				window.location.href = $('.host').attr('link') + "notification";
			}
			else {
				$("#loginButton").prop('disabled', false);
				$('#login-messages').html('<div class="error-message">' + response.messages + '</div>');
				this_form.find('.error-message').slideDown().html(response.messages);
				$(".error-message").delay(500).show(10, function () {

				});
			}
		}
	});
	// return false;

});

function resgistrationFormValidation(eventCode, eventParticiaptionCode) {

	/** Validation General - INPERSON - VIRTUAL - */

	if ($('#firstname').val().length === 0) {
		ferror = ierror = true;
		$('#firstname_error').text("Please enter first name");
	}
	if ($('#lastname').val().length === 0) {
		ferror = ierror = true;
		$('#lastname_error').text("Please enter last name");
	}
	if ($('#email').val().length === 0 || !validateEmail($('#email').val())) {
		ferror = ierror = true;
		$('#email_error').text("Please enter valid email");
	}
	if ($('#confirm_email').val().length === 0 || !validateEmail($('#confirm_email').val())) {
		ferror = ierror = true;
		$('#confirm_email_error').text("Please  confirm email");
	}
	if ($('#confirm_email').val() != $('#email').val()) {
		ferror = ierror = true;
		$('#confirm_email_error').text("Email does not match");
	}
	if ($('#telephone').val().length === 0) {
		ferror = ierror = true;
		$('#telephone_error').text("Please enter telephone");
	}
	if ($('#job_title').val().length === 0) {
		ferror = ierror = true;
		$('#job_title_error').text("Please enter job title");
	}
	if ($('#job_category').val().length === 0) {
		ferror = ierror = true;
		$('#jobcategory_error').text("Please select job category");
	}
	if ($('#language').val().length === 0) {
		ferror = ierror = true;
		$('#language_error').text("Please select  language");
	}
	if ($('#gender').val().length === 0) {
		ferror = ierror = true;
		$('#gender_error').text("Please select  your gender");
	}

	if ($('#firt_objective').val().length === 0) {
		ferror = ierror = true;
		$('#firt_objective_error').text("Please type your first objective");
	}
	if ($('#second_objective').val().length === 0) {
		ferror = ierror = true;
		$('#second_objective_error').text("Please type your second objective");
	}
	if ($('#third_objective').val().length === 0) {
		ferror = ierror = true;
		$('#third_objective_error').text("Please type your third objective");
	}

	if ($('#info_source').val().length === 0) {
		ferror = ierror = true;
		$('#info_source_error').text("Please select  source ");
	}



	/** Validation For - All - Except Students And Youth Section -  */
	if (eventParticiaptionCode != 'STYR003') {
		if ($('#organisation_name').val().length === 0) {
			ferror = ierror = true;
			$('#organisationname_error').text("Please enter  the organization name");
		}
		if ($('#organisation_type').val().length === 0) {
			ferror = ierror = true;
			$('#organisationtype_error').text("Please select  the organization type");
		}

		if ($('#organisation_city').val().length === 0) {
			ferror = ierror = true;
			$('#city_error').text("Please enter city");
		}
	}

	/** Validation For African Based - Organization Section -  */
	if (eventParticiaptionCode == 'AFBR004') {
		if ($('#african_country').val().length === 0) {
			ferror = ierror = true;
			$('#organisation_country_error').text("Please select country");
		}
	}

	/** Validation For Non African Based - Organization Section -  */
	if (eventParticiaptionCode == 'AFBR004') {
		if ($('#non_african_country').val().length === 0) {
			ferror = ierror = true;
			$('#organisation_country_error').text("Please select country");
		}
	}


	/** Validation For In-person  - Identification Section - */
	if (eventCode == 'INP001') {
		if ($('#id_type').val().length === 0) {
			ferror = ierror = true;
			$('#id_type_error').text("Please select  type of ID ");
		}
		if ($('#id_number').val().length === 0) {
			ferror = ierror = true;
			$('#id_number_error').text("Please enter  ID number ");
		}
		if ($('#residence_country').val().length === 0) {
			ferror = ierror = true;
			$('#residence_country_error').text("Please select country");
		}
		// if ($('#citizenship').val().length === 0) {
		// 	ferror = ierror = true;
		// 	$('#citizenship_error').text("Please select country");
		// }
		// if ($('#citizenship').val().length === 0) {
		// 	ferror = ierror = true;
		// 	$('#citizenship_error').text("Please select country");
		// }
		if ($('#image').val().length === 0) {
			ferror = ierror = true;
			$('#image_error').text("Please upload your ID or passport  picture");
		}

		/** Validation For Media In-person - Media Tools Section - */
		if (eventParticiaptionCode == 'MDR004') {
			if ($('#media_equipment').val().length === 0) {
				ferror = ierror = true;
				$('#media_equipment_error').text("Please enter media equipment");
			}
			if ($('#special_request').val().length === 0) {
				ferror = ierror = true;
				$('#special_request_error').text("Please enter media special request");
			}
		}
	}



	/** Validation For Student And Youth  */
	if (eventParticiaptionCode == 'STYR003') {

	}




	/** Validation For Virtual  */

}

function validate(input) {
	var input_value = $(input).val();
	var input_id = $(input).attr('id');
	var error_validate_id = '#' + $(input).attr('id') + '_error';
	var error_validate_msg = '';

	if (input_value.length <= 1)
		error_validate_msg = 'Please fill this field';

	if (input_id == 'email')
		if (!validateEmail(input_value) || input_value.length <= 5)
			error_validate_msg = 'Please fill this field with valid email';

	if (input_id == 'confirm_email')
		if (!validateEmail(input_value) || input_value.length <= 5)
			error_validate_msg = 'Please fill this field with valid email';

	// if (input_id == 'birthday')
	// if (!checkAgeAtDateOfEvent(input_value, 10, 35))
	// 	error_validate_msg = 'Only people with age between 10 and 35 can register to this event';

	$(error_validate_id).text(error_validate_msg);
}

function convertToDate(str) {
	var arr = str.split("-"); // split string at slashes to make an array
	var yyyy = arr[0] - 0; // subtraction converts a string to a number
	var jsmm = arr[1] - 1; // subtract 1 because stupid JavaScript month numbering
	var dd = arr[2] - 0; // subtraction converts a string to a number 
	return new Date(yyyy, jsmm, dd); // this gets you your date
}

function getDateTime(str_date) {
	return convertToDate(str_date).getTime();
}

function getAgeAtDateOfEvent(inputDate) {
	var str = inputDate.split('-');
	var dateTo = getDateTime('2021-12-04'); // Date Of Participant
	var dateFrom = getDateTime(inputDate); // Date Of Event

	var dayDiff = Math.trunc(Math.ceil(dateTo - dateFrom) / (1000 * 60 * 60 * 24 * 365)); // Age At The Date Of The Event
	return dayDiff;
}

function checkAgeAtDateOfEvent(inputDate, ageLimitAuthorizedFrom, ageLimitAuthorizedTo) {
	var ageInput = getAgeAtDateOfEvent(inputDate);
	return (ageInput >= ageLimitAuthorizedFrom && ageInput <= ageLimitAuthorizedTo) ? true : false;
}
