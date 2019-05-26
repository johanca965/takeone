$(document).ready(function(){
	// funcion para cargar los departamentos acordes al pais
	$(".activity_select").change(function(){
		var url = $(this).data('url');
		var activity = $(this).val();
		var _token = $("#_token").val();
		$("#trainner_id").html('');
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'activity' : activity, '_token' : _token },
			beforeSend: function() {
				toastr.info("Looking for records...");
			},
			success: function(data) {
				data = data.split('|');
				if( data[0] == 'true' )
				{
					toastr.success("Records found successfully.");
					$("#trainner_id").append(data[1]);
				}
				else
				{
					toastr.error("An error has occurred.");
					toastr.error(data[0]);
					$("#trainner_id").append(data[1]);
				}
			},
			error: function(e) {
				toastr.error("An error has occurred.");
			},
		});
		return false;
	});

});