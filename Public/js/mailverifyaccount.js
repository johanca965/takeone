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

	// función para solicitar un nuevo sms de verificación
	$(".new-verify-account-mobile").click(function(){
		$(".new-verify-account-mobile.try-again").fadeOut('slow');
		var telephone = $(this).data('telephone');
		var url = $(this).data('url');
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'telephone': telephone, },
			beforeSend: function() {
				toastr.info("sending new code...");
			},
			success: function( data ) {
				if( data == "The message was sent successfully" )
				{
					// mostramos la ventana de validación
					$("#modalAccountVerifyMobile").modal('show');
					setTimeout( function(){
						$(".new-verify-account-mobile.try-again").fadeIn('slow');
					}, 1000*6 );
				}
				else
				{
					toastr.error( data );
				}
			},
			error: function(xhr) {
			   	toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

	// función para redireccionar para validar el código ingresado
	$("#form-verify-account-mobile").submit(function(){
		var action = $(this).attr('action');
		var url = $(this).data('url-validate');
		var code = $("#code_verification_mobile_sms").val();
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'code': code, },
			beforeSend: function() {
				toastr.info("Validating code...");
			},
			success: function( data ) {
				if( data == "true" )
				{
					window.location = action+"/"+code;
				}
				else
				{
					toastr.error( data );
				}
			},
			error: function(xhr) {
			   	toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

	// función para evitar que escriban letras en el campo de código del mensaje
	$("#code_verification_mobile_sms").inputFilter(function(value) {
		return /^\d*$/.test(value);
	});

});


// Restricts input for each element in the set of matched elements to the given inputFilter.
(function($) {
	$.fn.inputFilter = function(inputFilter) {
		return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
			if (inputFilter(this.value)) {
				this.oldValue = this.value;
				this.oldSelectionStart = this.selectionStart;
				this.oldSelectionEnd = this.selectionEnd;
			} else if (this.hasOwnProperty("oldValue")) {
				this.value = this.oldValue;
				this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
			}
		});
	};
}(jQuery));