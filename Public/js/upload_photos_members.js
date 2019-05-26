$(document).ready(function(){
	
	$("#upload_img").change(function(){
		$("#errors-create").html('');
		if( $("#title").val() != "" )
		{
			var url = $(this).data('action');
			var formData = new FormData( $("#form-create")[0] );                         
			$.ajax({
	        	url: url,
		        dataType: 'text',
		        cache: false,
		        contentType: false,
		        processData: false,
		        data: formData,                         
		        type: 'post',
		        success: function( data ){
		        	data = data.split('|');
		        	data_img = data[0].split('/');
		        	if( data_img[0] != 'img' )
		        	{
		        		$("#upload_img").val('');
		        		toastr.error("An error has occurred.");
		        		$("#errors-create").append( data );
		        	}else
		        	{
		        		$("#logo").val( data[1] );
		        		toastr.success("Image upload successfully.");
		        	}
		        }
	    	});
		}
		else
		{
			toastr.error("Please enter the club title.");
			$(this).val('');
		}
		return false;
	});

	$("#upload_img_edit").change(function(){
		$("#errors-edit").html('');
		if( $("#title").val() != "" )
		{
			var url = $(this).data('action');
			var formData = new FormData( $("#form-edit")[0] );                      
			$.ajax({
	        	url: url,
		        dataType: 'text',
		        cache: false,
		        contentType: false,
		        processData: false,
		        data: formData,                         
		        type: 'post',
		        success: function( data ){
		        	data = data.split('|');
		        	data_img = data[0].split('/');
		        	if( data_img[0] != 'img' )
		        	{
		        		$("#upload_img").val('');
		        		toastr.error("An error has occurred.");
		        		$("#errors-edit").append( data );
		        	}else
		        	{
		        		$("#logo").val( data[1] );
		        		toastr.success("Image upload successfully.");
		        	}
		        }
	    	});
		}
		else
		{
			toastr.error("Please enter the club title.");
			$(this).val('');
		}
		return false;
	});

	$("#upload_photo").change(function(){
		$("#errors-edit").html('');
		if( $("#username").val() != "" )
		{
			var url = $(this).data('action');
			var formData = new FormData( $("#form-edit")[0] );                         
			$.ajax({
	        	url: url,
		        dataType: 'text',
		        cache: false,
		        contentType: false,
		        processData: false,
		        data: formData,                         
		        type: 'post',
		        success: function( data ){
		        	console.log(data);
		        	data = data.split('|');
		        	data_img = data[0].split('/');
		        	if( data_img[0] != 'img' )
		        	{
		        		$("#upload_photo").val('');
		        		toastr.error("An error has occurred.");
		        		$("#errors-update").append( data );
		        	}else
		        	{
		        		$("#photo").val( data[1] );
		        		toastr.success("Image upload successfully.");
		        	}
		        }
	    	});
		}
		else
		{
			toastr.error("Please enter the email.");
			$(this).val('');
		}
		return false;
	});

});