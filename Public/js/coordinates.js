$(document).ready(function(){

	// función para obtener la posición del usuario
	coordinates();

	$(".button-geolocation").click(function(){
		$(".modal-geolocation").css('display', 'none');
	});


});

function coordinates()
{
	// validamos si se puede usar geolocalización
	if (navigator.geolocation)
	{ 
		$(".modal-geolocation").css('display', 'flex');
	    navigator.geolocation.getCurrentPosition(function(position){ 
	    	$("#lat").val( position.coords.latitude );
	    	$("#lon").val( position.coords.longitude );
        });
	}else{
		console.log("Geolocation not available!");
	}
}