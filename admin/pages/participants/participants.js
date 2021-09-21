$(document).ready(function(){
	showParticipantsList();
});

function showParticipantsList(){
	$.ajax({
		type: 'POST',
		url: linkto,
		data: {
			fetchParticitants: 1
		},
		success:function(data){
			$('#participants-table').html(data);
		}
	});
}