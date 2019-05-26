$(document).ready(function(){

	// funcion para que el usuario se registre
	$("#register-form").submit(function(){
		$("#errors-register").html('');
		var form = $(this);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Registered...");
			},
			success: function(data) {
				data = data.split('|');
				if( data[0] === 'true' )
				{
					toastr.success("Session started successfully.");
					window.location = data[1];
				}else
				{
					toastr.error("An error has occurred.");
					$("#errors-register").append( data[0] );
				}
			},
			error: function(xhr) { // if error occured
			   	toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});


	// funcion para que el usuario inicie sesion
	$("#login-form").submit(function(){
		$("#errors-login").html('');
		var form = $(this);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Logging in...");
			},
			success: function(data) {
				data = data.split('|');
				if( data[0] === 'true' )
				{
					toastr.success("Session started successfully.");
					window.location = data[1];
				}else
				{
					toastr.error("An error has occurred.");
					$("#errors-login").append( data[0] );
				}
			},
			error: function(xhr) { // if error occured
			   	toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

	// funcion para que el usuario inicie sesion
	$("#recover-form").submit(function(){
		$("#errors-recover").html('');
		var form = $(this);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Validating data...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Password sent successfully.");
				}else
				{
					toastr.error("An error has occurred.");
					$("#errors-recover").append( data );
				}
			},
			error: function(xhr) { // if error occured
			   	toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

});