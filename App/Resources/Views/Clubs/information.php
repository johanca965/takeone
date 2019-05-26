<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
require_once RUTA_RESOURCES."/Views/Geolocation/ad.php";
?>

<div class="container-fluid container-form">
	<div id="errors-edit">
		<?php echo $this->errors(); ?>
	</div>
	<form id="form-edit" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Information/update" enctype="multipart/form-data">
		<?php echo $this->csrfToken(); ?>
		<div class="row">
			<div class="col-md-12">
				<h3 style="margin: 0; font-weight: bold;" class="text-danger">
					Club information
					<span class="pull-right h5">Important: Fields with (*) are required</span>
				</h3>
				<hr>
			</div>
			<input type="hidden" class="form-control" id="id" name="id" value="<?php echo ucwords( $params['club']['id'] ); ?>">
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="title">Title (*)</label>
					<input type="text" class="form-control validate_crop_image" id="title" name="title" placeholder="Title" readonly value="<?php echo ucwords( $params['club']['title'] ); ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="established">Established (*)</label>
					<input type="datetime" class="form-control" id="established" name="established" placeholder="Established" value="<?php echo $params['club']['established']; ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="country_id">Country (*)</label>
					<select id="country_id" name="country_id" class="browser-default form-control" data-url="<?php echo RUTA_URL; ?>/Location/states/">
						<option disabled selected="">-- Choose an option --</option>
						<?php foreach ($params['countries'] as $country) {
							// dejamos la variable de selección vacia
							$selected = '';
									// preguntamos si el id de la ciudad es la misma del usuario
							if( $country['id'] == $params['club']['country_id'] )	
								$selected = 'selected';
							echo "
							<option ".$selected." value='".$country['id']."'>".utf8_encode( ucfirst( $country['name'] ) )."</option>
							";
						} ?>
					</select>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="city_id">City (*)</label>
					<input type="text" name="city" id="city" class="form-control" value="<?php echo $params['club']['city']; ?>">
				</div>
			</div>		
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="address_line1">Address line 1</label>
					<input type="text" class="form-control" id="address_line1" name="address_line1" placeholder="Address line 1" value="<?php echo ucwords( $params['club']['address_line1'] ); ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="address_line2">Address line 2</label>
					<input type="text" class="form-control" id="address_line2" name="address_line2" placeholder="Address line 2" value="<?php echo ucwords( $params['club']['address_line2'] ); ?>">
				</div>
			</div>
			<div class="col-12 col-md-6" style="display: none;">
				<div class="form-group">
					<label for="lat">Latitude</label>
					<input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude" value="<?php echo $params['club']['lat']; ?>">
				</div>
			</div>
			<div class="col-12 col-md-6" style="display: none;">
				<div class="form-group">
					<label for="lon">Longitude</label>
					<input type="text" class="form-control" id="lon" name="lon" placeholder="Longitude" value="<?php echo $params['club']['lon']; ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="phone">Phone (*)</label>
					<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="<?php echo $params['club']['phone']; ?>">
				</div>
			</div>	
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="email">Email (*)</label>
					<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $params['club']['email']; ?>">
				</div>
			</div>	
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="uniqe_id">Unique ID (*)</label>
					<input type="text" class="form-control" id="uniqe_id" name="uniqe_id" placeholder="Unique ID" value="<?php echo $params['club']['uniqe_id']; ?>" disabled>
				</div>
			</div>	
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="uniqe_id">Currency (*)</label>
					<select name="currency" id="currency" class="browser-default form-control">
						<option value="" selected="">-- Choose an option --</option>
						<option <?php if( $params['club']['currency'] == 'BHD' ){ echo 'selected'; } ?> value="BHD">BHD</option>
						<option <?php if( $params['club']['currency'] == 'USD' ){ echo 'selected'; } ?> value="USD">USD</option>
						<option <?php if( $params['club']['currency'] == 'COP' ){ echo 'selected'; } ?> value="COP">COP</option>
						<option <?php if( $params['club']['currency'] == 'EUR' ){ echo 'selected'; } ?> value="EUR">EUR</option>
					</select>
				</div>
			</div>	
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="upload_img_edit">Logo (*)</label>
					<input type="file" name="upload_image" id="upload_image">
					<input type="hidden" class="input_crop_image" name="logo" id="logo" value="<?php echo $params['club']['logo']; ?>">
				</div>
			</div>		
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="administration_fee">Administration fee</label>
					<input type="number" class="form-control" id="administration_fee" name="administration_fee" placeholder="Administration fee" value="<?php echo $params['club']['administration_fee']; ?>" step="0.01" min="0">
				</div>
			</div>
			<div class="col-12 col-md-6" style="margin-bottom: 10px;">
				<a href="#" class="btn-geolocation btn btn-primary">Select your location</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button type="submit" class="btn btn-danger">Update</button>
			</div>
		</div>
	</form>
</div>


<div class="modalgeolocation" style="background-color: rgba(0,0,0,0.4); top: 0; left: 0; position: fixed; z-index: 99999999999; display: none; height: 100vh; width: 100%;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close close-modalgeolocation" data-dismiss="modal">&times;</button>
				<h4>Select your position</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 col-sm-12" id="map-canvas" style="height:400px;"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn-primary btn close-modalgeolocation" data-dismiss="modal">Save</button>
			</div>
		</div>
	</div>
</div>


<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Upload and crop logo</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8 text-center">
						<div id="image_crop" style="width: 350px; height: 350px; margin-top: 30px;"></div>
					</div>
					<div class="col-md-4">
						<br>
						<br>
						<br>
						<button class="btn btn-success crop_button" data-action="<?php echo RUTA_URL; ?>/Clubs/Information/uploadLogo">Crop</button>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="close" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script src="<?php echo RUTA_JS; ?>/crop_image_club.js" type="text/javascript"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlAsbgXVF49TGsKOdjlSyZRWB8n_w6I-0"></script>

<script type="text/javascript">
	var map;
	function initialize() 
	{
		$(".modal-geolocation").css('display', 'flex');
		navigator.geolocation.getCurrentPosition(function(position){ 
	    	var latitude = position.coords.latitude;
	    	var longitude = position.coords.longitude;
			map = new google.maps.Map(document.getElementById('map-canvas'), {
				zoom: 16,
				center: {lat: latitude, lng: longitude}
			});

			var marker=new google.maps.Marker({
				position:map.getCenter(), 
				map:map, 
				draggable:true
			});

			google.maps.event.addListener(marker,'dragend',function(event) {
				var position = this.getPosition().toString();
				var coords = position.split('(');
				coords = coords[1].split(',');
				latitude = coords[0];
				coords = coords[1].split(')');
				longitude = coords[0];
				$("#lat").val(latitude);
				$("#lon").val(longitude);
			});

			$("#lat").val(latitude);
			$("#lon").val(longitude);

        });
	}
	google.maps.event.addDomListener(window, 'load', initialize);


	$(".btn-geolocation").click(function(event) {
		$(".modalgeolocation").fadeIn('show');
		return;
	});

	$(".close-modalgeolocation").click(function(event) {
		$(".modalgeolocation").fadeOut('slow');
		return;
	});

	$(".button-geolocation").click(function(){
		$(".modal-geolocation").css('display', 'none');
	});
</script>