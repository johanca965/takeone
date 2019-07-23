$(document).ready(function() {
	
	// función para búscar datos por fecha y paquete
	$(".btn-find").click(function(event) {
		if( $("#date").val() == '' )
		{
			$("#date").focus();
			toastr.error("Please fill in the indicated field.");
			return;
		}

		if( $("#package_id").val() == '' )
		{
			$("#package_id").focus();
			toastr.error("Please fill in the indicated field.");
			return;
		}
		
		window.location = $(this).data('url')+'/'+$("#date").val()+'/'+$("#package_id").val();
	});


	// funcion para cargar el id del miembro en la ventana
	$(".open-confirm-attended").on('click', function(){
		var obj = $(this);
		var member_id = obj.data('member-id');
		var date = obj.data('date');
		$("#member_id_attended").val( member_id );
		$("#date_attended").val( date );
	});


	// funcion para cargar el id del miembro en la ventana
	$(".open-confirm-notattended").on('click', function(){
		var obj = $(this);
		var id = obj.data('id');
		$("#id_attended").val( id );
	});

	// función para eliminar un registro
	$("#form-delete-attendence").submit(function(){
		$("#errors-delete").html('');
		var form = $(this);
		var url = form.attr('action');
		$.ajax({
			url: url,
			type: 'POST',
			data: form.serialize(),
			success: function(data) {
				if( data === 'true' )
				{
					location.reload();
				}else
				{
					toastr.error("An error has occurred.");
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


});