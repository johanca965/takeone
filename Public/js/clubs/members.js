$(document).ready(function(){

	// función para seguir o no a un club
	$(".accepted_member").on('click', function(){
		var obj = $(this);
		var member_id = obj.data('member-id');
		var accepted = obj.data('accepted');
		var _token = $("#_token").val();
		var url = obj.data('url');
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'member_id' : member_id,  'accepted' : accepted, '_token' : _token },
			beforeSend: function() {
				toastr.info("Processing petition...");
			},
			success: function(data) {
				if( data == 'true' )
				{
					toastr.success("Petition processed.");
					location.reload();
				}else
				{
					toastr.error("An error has occurred. Try again later.");
				}
			},
			error: function(e) {
			   	toastr.error("An error has occurred.");
			},
		});
		
		return false;
	});

	// función para seguir o no a un club
	$(".active_member").on('click', function(){
		var obj = $(this);
		var member_id = obj.data('member-id');
		var active = obj.data('active');
		var _token = $("#_token").val();
		var url = obj.data('url');
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'member_id' : member_id,  'active' : active, '_token' : _token },
			beforeSend: function() {
				toastr.info("Processing petition...");
			},
			success: function(data) {
				if( data == 'true' )
				{
					toastr.success("Petition processed.");
					location.reload();
				}else
				{
					toastr.error("An error has occurred. Try again later.");
				}
			},
			error: function(e) {
			   	toastr.error("An error has occurred.");
			},
		});
		
		return false;
	});


	// funcion para cargar el id del miembro en la ventana
	$(".btn-load-id-update-rfid").on('click', function(){
		var obj = $(this);
		var member_id = obj.data('member-id');
		$("#member_id").val( member_id );
	});

});