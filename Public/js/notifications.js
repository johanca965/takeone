$(document).ready(function() {
	// ruta de la plataforma
	var ruta = 'http://localhost/proyectos/takeone/';
	// buscar notificaciones del miembro
	findNotifications_user( ruta );
	// buscar notificaciones del club
	findNotifications_club( ruta );

});


function findNotifications_user( ruta )
{
	$.ajax({
		url: ruta+'/General/Notification/usernotification',
		type: 'POST',
		success: function(data) {
			data = data.split('|');
			if( data[0] != 'errors' )
			{
				// mostramos la cantidad de notificaciones que tiene el usuario
				$(".cant-notifications").html(data[0]);
				// cargamos las notificaciones del usuario
				$(".container-notifications").append(data[1]);
			}else
			{
				toastr.error("An error has occurred.");
			}
		},
		error: function(xhr) {
			toastr.error("An error has occurred.");
			// console.log(xhr.statusText + xhr.responseText);
		},
	});
}


function findNotifications_club( ruta )
{
	$.ajax({
		url: ruta+'/General/Notification/clubnotification',
		type: 'POST',
		success: function(data) {
			data = data.split('|');
			if( data[0] != 'errors' )
			{
				// mostramos la cantidad de notificaciones que tiene el usuario
				$(".cant-notifications-club").html(data[0]);
				// cargamos las notificaciones del usuario
				$(".container-notifications-club").append(data[1]);
			}else
			{
				toastr.error("An error has occurred.");
			}
		},
		error: function(xhr) {
			toastr.error("An error has occurred.");
			// console.log(xhr.statusText + xhr.responseText);
		},
	});
}