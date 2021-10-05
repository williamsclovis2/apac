$(document).ready(function () {
	showParticipantsList();
});

function showParticipantsList() {
	$.ajax({
		type: 'POST',
		url: linkto,
		// data: {
		// 	fetchParticitants: 1
		// },
		data: { eventId: eventId, participationTypeToken: participationTypeToken, request: "fetchParticitants" },
		success: function (data) {
			$('#participants-table').html(data);
		}
	});
}