$(document).ready(function() {
	$(".iti__country").click(function(){
		var code = $(this).children(".iti__dial-code").html();
		$("#telephone").val(code+"-");
	});

	/*iti.setCountry("co");	
	$("#telephone").val(ruta_url);*/
});