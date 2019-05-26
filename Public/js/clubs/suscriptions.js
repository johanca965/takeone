$(document).ready(function() {
	$(".open-confirm-payment").click(function()
	{
		$("#id-form-payment").val( $(this).data('id') );
		$(".form-payment").data( "id", $(this).data('id') );
	});


	$(".form-payment").click(function(){
		$("#errors-payment").html('');
		var id = $(this).data('id');
		var form = $("#form-payment-"+id);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Paying subscription...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Paid subscription.");
					location.reload();
				}else
				{
					toastr.error("Ha ocurrido un error.");
					$("#errors-payment").append( data );
				}
			},
			error: function(xhr) {
				toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});


	$(".open-confirm-cancel").click(function()
	{
		$("#id-form-cancel").val( $(this).data('id') );
		$(".form-cancel").data( "id", $(this).data('id') );
	});


	$(".form-cancel").click(function(){
		$("#errors-cancel").html('');
		var id = $(this).data('id');
		var form = $("#form-cancel-"+id);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			beforeSend: function() {
				toastr.info("Paying subscription...");
			},
			success: function(data) {
				if( data === 'true' )
				{
					toastr.success("Paid subscription.");
					location.reload();
				}else
				{
					toastr.error("Ha ocurrido un error.");
					$("#errors-cancel").append( data );
				}
			},
			error: function(xhr) {
				toastr.error("Ha ocurrido un error.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});
} );