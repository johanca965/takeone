$(document).ready(function() {

	// obtenemos el click del boton de busqueda
	$("#btn-search").click(function(){
		// obtenemos el action del formulario de busqueda
		var action = $("#form-search").attr('action');
		// obtenemos el valor escrito en el campo de busqueda
		var search = $("#input-search").val();
		// redireccionamos a la pagina con el valor de 1 y el dato buscar
		window.location = action+'/1/'+search;
		// evitamos enviar el formulario
		return false;
	});

});