$(document).ready(function() {
	
	$("#btn-form-change-to-father-account").click(function(){
		var url = $(this).data('url');
		$("#errors-change-to-father-account").html( "" );
		$.ajax({
			url: url,
			type: 'POST',
			beforeSend: function() {
				toastr.info("Requesting change...");
			},
			success: function(data) {
				if( data == 'true' )
				{
					toastr.success("Successful change.");
					setTimeout(function(){
						location.reload();
					}, 1000);
				}
				else
				{
					toastr.error("An error has occurred. Try again later.");
					$("#errors-change-to-father-account").html( data );
				}
			},
			error: function(e) {
			   	toastr.error("An error has occurred.");
			},
		});
		
		return false;
	});

});