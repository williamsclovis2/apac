$(document).ready(function(){
	showAboutContent();

	//Add about section
	$('#addOutcomeForm').submit(function() {
	    var f = $(this).find('.form-group'),
	     	ferror = false,
	      	emailExp = /^[^\s()<>@,;:\/]+@\w[\w\.-]+\.[a-z]{2,}$/i;

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
	    if (ferror) return false;
	    else var str = $(this).serialize();

	    var this_form = $(this);
	    var action = $(this).attr('action');

	    $("#addOutcomeButton").button('loading');
	    
	    $.ajax({
	      	type: "POST",
	      	url: action,
	      	data: str,
	      	dataType: 'json',
	      	success:function(response) {
				if(response.success == true) {
					$("#addOutcomeButton").button('reset');
					$("#addOutcomeForm")[0].reset();
					showAboutContent();
					$('#add-outcome-messages').html('<div class="sent-message">'+ response.messages + '</div>');
		          	this_form.find('.sent-message').slideDown().html(response.messages);
          			$(".sent-message").delay(500).show(10, function() {
						$(this).delay(3000).hide(10, function() {});
					});
		        } else {
		        	$("#addOutcomeButton").button('reset');
					$('#add-outcome-messages').html('<div class="error-message">'+ response.messages + '</div>');
		          	this_form.find('.error-message').slideDown().html(response.messages);
          			$(".error-message").delay(500).show(10, function() {});
		        }
	      	}
	    });
	    return false;
	});	

});

function showAboutContent() {
	$.ajax({
		type: 'POST',
		url: linkto,
		data: {eventId: eventId, request: "fetchOutcomes"},
		success:function(data){
			$('#addOutcomeForm').html(data);
		}
	});
}