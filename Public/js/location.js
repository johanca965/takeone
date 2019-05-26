$(document).ready(function(){
	
	// funcion para cargar los departamentos acordes al pais
	$("#country_id").change(function(){
		var url = $(this).data('url');
		var country_id = $(this).val();
		$("#state_id").html('');
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'country_id' : country_id },
			beforeSend: function() {
				toastr.info("Searching records...");
			},
			success: function(data) {
				toastr.success("Register found successfully.");
				$("#state_id").append(data);
			},
			error: function(e) {
				toastr.error("An error has occurred.");
			},
		});
		return false;
	});

	// funcion para cargar los departamentos acordes al pais
	$("#state_id").change(function(){
		var url = $(this).data('url');
		var state_id = $(this).val();
		$("#city_id").html('');
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'state_id' : state_id },
			beforeSend: function() {
				toastr.info("Searching records...");
			},
			success: function(data) {
				toastr.success("Register found successfully.");
				$("#city_id").append(data);
			},
			error: function(e) {
				toastr.error("An error has occurred.");
			},
		});
		return false;
	});


});