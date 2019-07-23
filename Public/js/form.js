$(document).ready(function() {
	
	$("#form-create").submit(function(){
		$("#errors-create").html('');
		var form = $("#form-create");
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Creating record...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Successful registration.");
					location.reload();
				}else
				{
					toastr.error("An error has occurred.");
					$("#errors-create").append( data );
				}
			},
			error: function(xhr) {
			   	toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});


	$("#form-create-2").submit(function(){
		$("#errors-create-2").html('');
		var form = $("#form-create-2");
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Creating record...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Successful registration.");
					location.reload();
				}else
				{
					toastr.error("An error has occurred.");
					$("#errors-create-2").append( data );
				}
			},
			error: function(xhr) {
			   	toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});



	$(".open-confirm-delete").click(function()
	{
		$("#id-form-delete").val( $(this).data('id') );
		$(".form-delete").data( "id", $(this).data('id') );
	});


	$(".form-delete").click(function(){
		$("#errors-delete").html('');
		var id = $(this).data('id');
		var form = $("#form-delete-"+id);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Eliminando registro...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Registro eliminado con exito.");
					location.reload();
				}else
				{
					toastr.error("Ha ocurrido un error.");
					$("#errors-delete").append( data );
				}
			},
			error: function(xhr) {
			   	toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});


	$(".open-confirm-delete2").click(function()
	{
		$("#id-form-delete2").val( $(this).data('id') );
		$(".form-delete2").data( "id", $(this).data('id') );
	});


	$(".form-delete2").click(function(){
		$("#errors-delete2").html('');
		var id = $(this).data('id');
		var form = $("#form-delete2-"+id);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Eliminando registro...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Registro eliminado con exito.");
					location.reload();
				}else
				{
					toastr.error("Ha ocurrido un error.");
					$("#errors-delete2").append( data );
				}
			},
			error: function(xhr) {
			   	toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});



	$(".form-find").click(function(){
		$("#errors-delete").html('');
		var id = $(this).data('id');
		var url = $(this).data('url');
		$.ajax({
			url: url,
			type: 'POST',
			data: {'id': id},
			dataType: 'json',
			beforeSend: function() {
				toastr.info("Searching for registration...");
			},
			success: function(data) {
				console.log(data);
				if( data['status'] === 'true' )
				{
					toastr.success("Register found successfully.");
					$("#edit").modal('show');

					$.each( data['datos'], function(key, value){
						$("#edit #"+key).val(value);
					});

				}else
				{
					toastr.error("An error has occurred.");
					$("#errors-delete").append( data );
				}
			},
			error: function(xhr) {
			   	toastr.error("An error has occurred.");
			    console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});

	$("#form-edit").submit(function(){
		$("#errors-edit").html('');
		var form = $("#form-edit");
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Updating record...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Successfully updated registration.");
					location.reload();
				}else
				{
					toastr.error("An error has occurred.");
					$("#errors-edit").append( data );
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