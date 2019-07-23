<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="container-fluid container-form">
	<div id="errors-create-2">
		<?php echo $this->errors(); ?>
	</div>
	<form id="form-create-2" method="post" action="<?php echo RUTA_URL; ?>/Members/User/Store_kid" enctype="multipart/form-data" autcomplete="off">
		<?php echo $this->csrfToken(); ?>
		<div class="row">
			<div class="col-md-12">
				<h3 style="margin: 0; font-weight: bold;" class="text-danger">
					Access information
					<span class="pull-right h5">Important: Fields with (*) are required</span>
				</h3>
				<hr>
			</div>
			<input type="hidden" class="validate_crop_image" id="username" name="username" onlyread value="<?php echo $this->Auth()->user()->username(); ?>">
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="name">Name (*)</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="">
				</div>
			</div>				
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="upload_photo">Photo</label>
					<input type="file" name="upload_image" id="upload_image">
					<input type="hidden" class="input_crop_image" name="photo" id="photo">
				</div>
			</div>
			<div class="col-md-12">
				<h3 style="font-weight: bold;" class="text-danger">
					General information
					<span class="pull-right h5">Important: Fields with (*) are required</span>
				</h3>
				<hr>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="country_id">Country (*)</label>
					<select id="country_id" name="country_id" class="browser-default form-control">
						<option disabled selected="">-- Choose an option --</option>
						<?php foreach ($params['countries'] as $country) {
							echo "
							<option value='".$country['id']."'>".utf8_encode( ucfirst( $country['name'] ) )."</option>
							";
						} ?>
					</select>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="city_id">City (*)</label>
					<input type="text" class="form-control" name="city" id="city" value="" placeholder="City">
				</div>
			</div>		
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="">
				</div>
			</div>	
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="rfid">RFID</label>
					<input type="text" class="form-control" id="rfid" name="rfid" placeholder="RFID" value="">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="cpr">CPR</label>
					<input type="text" class="form-control" id="cpr" name="cpr" placeholder="CPR" value="">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="passport">Passport</label>
					<input type="text" class="form-control" id="passport" name="passport" placeholder="Passport" value="">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="gender">Gender</label>
					<select id="gender" name="gender" class="browser-default form-control" >
						<option value="">-- Select a gender --</option>
						<option value="male">Male</option>
						<option value="female">Female</option>
						<option value="other">Other</option>
					</select>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="bloodtype">Blood type</label>
					<select id="bloodtype" name="bloodtype" class="browser-default form-control" >
						<option value="">-- Select a blood type --</option>
						<option value="i don't know">I Don't Know</option>
						<option value="A+">A+</option>
						<option value="B+">B+</option>
						<option value="AB+">AB+</option>
						<option value="O+">O+</option>
						<option value="A-">A-</option>
						<option value="B-">B-</option>
						<option value="AB-">AB-</option>
						<option value="O-">O-</option>
					</select>
				</div>
			</div>
			<div class="col-12 col-md-12">
				<div class="form-group">
					<label for="helth_issues">Health issues</label>
					<textarea class="form-control" id="helth_issues" name="helth_issues" placeholder="Health issues"></textarea>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="birthday">Birthday</label>
					<input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" value="">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="mobile">Mobile</label>
					<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="">
				</div>
			</div>
			<div class="col-12 col-md-12">
				<div class="form-group">
					<label for="social_link">Social link</label>
					<input type="text" class="form-control" id="social_link" name="social_link" placeholder="Social link" value="">
				</div>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-danger">Create</button>
			</div>
		</div>
	</form>
</div>


<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Upload and crop photo</h4>
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
						<button class="btn btn-success crop_button" data-action="<?php echo RUTA_URL; ?>/Members/User/uploadPhoto">Crop</button>
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
<script src="<?php echo RUTA_JS; ?>/crop_image.js" type="text/javascript"></script>