$(document).ready(function() {
	$(".open-confirm-payment").click(function()
	{
		$("#id-form-payment").val( $(this).data('id') );
		$(".form-payment").data( "id", $(this).data('id') );
		var url = $(this).data('url');
		var member_id = $(this).data('member-id');
		var _token = $("#_token").val();
		var total = $(this).data('total');
		var currency = $(this).data('currency');
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'member_id': member_id, 'total': total, 'currency': currency, '_token': _token },
			beforeSend: function() {
				toastr.info("Searching user packages...");
			},
			success: function(data) {
				data = data.split('|');
				if( data[0] === 'true' )
				{
					toastr.success("Packages found....");
					$("#list-package").html( data[1] );
				}else
				{
					toastr.error("An error has occurred.");
					$("#errors-payment").append( data[0] );
				}
			},
			error: function(xhr) {
				toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
	});


	$(".form-payment").click(function(){
		$("#errors-payment").html('');
		var form = $("#form-create");
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
					toastr.error("An error has occurred.");
					$("#errors-payment").append( data );
				}
			},
			error: function(xhr) {
				toastr.error("An error has occurred.");
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
					toastr.error("An error has occurred.");
					$("#errors-cancel").append( data );
				}
			},
			error: function(xhr) {
				toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});
} );