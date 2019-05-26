$(document).ready(function() {

	// función para cerrar la ventana de verificación
	$(".close-verify-account").click(function(){
		$(".verify-account").fadeOut();
		return false;
	});

	// función para solicitar un nuevo correo de verificación
	$(".new-verify-account").click(function(){
		var url = $(this).attr('href');
		$.ajax({
			url: url,
			type: 'POST',
			beforeSend: function() {
				toastr.info("sending new mail...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("email sent.");
				}else
				{
					toastr.error("An error has occurred.");
					toastr.error(data);
				}
			},
			error: function(xhr) {
			   	toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

});