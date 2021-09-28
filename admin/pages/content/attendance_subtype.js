$(document).ready(function () {
	showParticipationSubTypesContent();

	/** Add  */
	$('#addForm').submit(function () {
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
				}
				i.next('.validate').html((ierror ? (i.attr('data-msg') !== undefined ? i.attr('data-msg') : 'wrong Input') : '')).show('blind');
			}
		});

		if (ferror) return false;
		else var str = $(this).serialize();

		var this_form = $(this);
		var action = $(this).attr('action');

		$("#addButton").button('loading');

		$.ajax({
			type: "POST",
			url: action,
			data: str,
			cache: false,
			success: function (dataResponse) {

				var response = JSON.parse(dataResponse);
				if (response.success == true) {
					$("#addButton").button('reset');
					$("#addForm")[0].reset();
					showParticipationSubTypesContent();
					$('#add-messages').html('<div class="sent-message">' + response.messages + '</div>');
					this_form.find('.sent-message').slideDown().html(response.messages);
					$(".sent-message").delay(500).show(20, function () {
						$(this).delay(12000).hide(10, function () { });
						// $('#generateLinkModal .close').click();
					});

					setTimeout(function () {
						$('#addModal .close').delay(1200).click();
					}, 5000);
				} else {
					$("#addButton").button('reset');
					$('#add-messages').html('<div class="error-message">' + response.messages + '</div>');
					this_form.find('.error-message').slideDown().html(response.messages);
					$(".error-message").delay(500).show(10, function () { });
				}
			}
		});
		return false;
	});


});


function showParticipationSubTypesContent() {
	$.ajax({
		type: 'POST',
		url: linkto,
		data: { eventId: eventId, request: "fetchParticipationSubTypes" },
		success: function (data) {
			$('#list-participation-sub-types').html(data);
		}
	});
}