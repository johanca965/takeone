$(document).ready(function(){
	// función para seguir o no a un club
	$(".add_product").on('click', function(){
		var obj = $(this);
		var stock_id_add = $("#stock_id_add").val();
		var quantity_add = $("#quantity_add").val();
		var total_sale_input = $("#total_sale_input").val();
		var _token = $("#_token").val();
		var url = obj.data('url');
		if( stock_id_add == "" || stock_id_add == null )
		{
			toastr.error("Select a product.");
			return;
		}
		if( quantity_add < 1 || quantity_add == null )
		{
			toastr.error("Enter a valid amount.");
			return;
		}
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'stock_id_add' : stock_id_add, 'quantity_add' : quantity_add, 'total_sale_input': total_sale_input, '_token' : _token },
			beforeSend: function() {
				toastr.info("Processing petition...");
			},
			success: function(data) {
				data = data.split('|');
				if( data[0] == 'true' )
				{
					$("#tbody_sales").append(data[1]);
					$("#quantity_add").val('');
					$(".total_sale").html( data[2] );
					$("#total_sale_input").val( data[3] );
					toastr.success("Petition processed.");
				}else if( data[0] == 'error' )
				{
					toastr.error(data[1]);
				}else
				{
					toastr.error("An error has occurred. Try again later.");
				}
			},
			error: function(e) {
				toastr.error("An error has occurred.");
			},
		});
		
		return false;
	});



	$(".delete_product").click(function(){
		var obj = $(this);
		var total_sale_input = $("#total_sale_input").val();
		var _token = $("#_token").val();
		var url = obj.data('url');
		var subtotal = obj.data('subtotal');
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'total_sale_input' : total_sale_input, 'subtotal' : subtotal, 'total_sale_input': total_sale_input, '_token' : _token },
			beforeSend: function() {
				toastr.info("Processing petition...");
			},
			success: function(data) {
				data = data.split('-');
				if( data[0] === 'true' )
				{
					$(".total_sale").html( data[1] );
					$("#total_sale_input").val( data[2] );
					obj.parent("td").parent("tr").remove();
					toastr.success("Petition processed.");
				}else
				{
					toastr.error("An error has occurred. Try again later.");
				}
			},
			error: function(e) {
				toastr.error("An error has occurred.");
			},
		});
		
		return false;
	});

});