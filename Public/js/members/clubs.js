$(document).ready(function(){

	// función para seguir o no a un club
	$(".btn_follower").on('click', function(){
		var obj = $(this);
		var club_id = obj.data('club-id');
		var following = obj.attr('data-following');
		var _token = $("#_token").val();
		var url = obj.data('url');
		$.ajax({
			url: url,
			type: 'POST',
			data: { 'club_id' : club_id, 'following' : following, '_token' : _token },
			beforeSend: function() {
				toastr.info("Requesting follow-up...");
			},
			success: function(data) {
				console.log(data);
				if( data == 'true' )
				{
					if( following == 1 )
					{
						obj.attr('data-following', '2');
						obj.removeClass('btn-outline-danger following_club').addClass('btn-danger follow_club');
						obj.html('Follow');
						toastr.success("Do not follow the club.");
					}
					else
					{
						obj.attr('data-following', '1');
						obj.removeClass('btn-danger follow_club').addClass('btn-outline-danger following_club');
						obj.html('Following');
						toastr.success("Following club.");
					}
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