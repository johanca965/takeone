<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="container-fluid container-form">
	<div id="errors-edit">
		<?php echo $this->errors(); ?>
	</div>
	<form id="form-edit" method="post" action="<?php echo RUTA_URL; ?>/Members/User/update" enctype="multipart/form-data" autcomplete="off">
		<?php echo $this->csrfToken(); ?>
		<div class="row">
			<div class="col-md-12">
				<h3 style="margin: 0; font-weight: bold;" class="text-danger">
					Access information
					<span class="pull-right h5">Important: Fields with (*) are required</span>
				</h3>
				<hr>
			</div>
			<input type="hidden" class="form-control" id="id" name="id" placeholder="id" value="<?php echo ucwords( $params['user']['id'] ); ?>">
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="name">Name (*)</label>
					<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo ucwords( $params['user']['name'] ); ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="username">Email (*)</label>
					<input type="text" class="form-control validate_crop_image" id="username" name="username" placeholder="Email" onlyread value="<?php echo $params['user']['username']; ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="password">Password <span class="text-grey">(Enter the password only when it must be updated)</span></label>
					<input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
							// dejamos la variable de selección vacia
							$selected = '';
							// preguntamos si el id de la ciudad es la misma del usuario
							if( $country['id'] == $params['userdata']['country_id'] )	
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
					<input type="text" class="form-control" name="city" id="city" value="<?php echo $params['userdata']['city']; ?>" placeholder="City">
				</div>
			</div>		
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="address">Address</label>
					<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo $params['userdata']['address']; ?>">
				</div>
			</div>	
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="rfid">RFID</label>
					<input type="text" class="form-control" id="rfid" name="rfid" placeholder="RFID" value="<?php echo $params['userdata']['rfid']; ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="cpr">CPR</label>
					<input type="text" class="form-control" id="cpr" name="cpr" placeholder="CPR" value="<?php echo $params['userdata']['cpr']; ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="passport">Passport</label>
					<input type="text" class="form-control" id="passport" name="passport" placeholder="Passport" value="<?php echo $params['userdata']['passport']; ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="gender">Gender</label>
					<select id="gender" name="gender" class="browser-default form-control" >
						<option value="" <?php if( $params['userdata']['gender'] == NULL ){ echo 'selected';} ?>>-- Select a gender --</option>
						<option <?php if( $params['userdata']['gender'] == 'male' ){ echo 'selected';} ?> value="male">Male</option>
						<option <?php if( $params['userdata']['gender'] == 'female' ){ echo 'selected';} ?> value="female">Female</option>
						<option <?php if( $params['userdata']['gender'] == 'other' ){ echo 'selected';} ?> value="other">Other</option>
					</select>
				</div>
			</div>
			<div class="col-12 col-md-12">
				<div class="form-group">
					<label for="helth_issues">Health issues</label>
					<textarea class="form-control" id="helth_issues" name="helth_issues" placeholder="Health issues"><?php echo $params['userdata']['helth_issues']; ?></textarea>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="marital">Marital status</label>
					<select id="marital" name="marital" class="browser-default form-control" >
						<option value="" <?php if( $params['userdata']['marital'] == NULL ){ echo 'selected';} ?> >-- Select a marital status --</option>
						<option <?php if( $params['userdata']['marital'] == 'single' ){ echo 'selected';} ?> value="single">Single</option>
						<option <?php if( $params['userdata']['marital'] == 'married' ){ echo 'selected';} ?> value="married">Married</option>
						<option <?php if( $params['userdata']['marital'] == 'seperated' ){ echo 'selected';} ?> value="seperated">Seperated</option>
						<option <?php if( $params['userdata']['marital'] == 'divorced' ){ echo 'selected';} ?> value="divorced">Divorced</option>
						<option <?php if( $params['userdata']['marital'] == 'widowed' ){ echo 'selected';} ?> value="widowed">Widowed</option>
						<option <?php if( $params['userdata']['marital'] == 'other' ){ echo 'selected';} ?> value="other">Other</option>
					</select>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="bloodtype">Blood type</label>
					<select id="bloodtype" name="bloodtype" class="browser-default form-control" >
						<option value="" <?php if( $params['userdata']['bloodtype'] == NULL ){ echo 'selected';} ?> >-- Select a blood type --</option>
						<option <?php if( $params['userdata']['bloodtype'] == "i don't know" ){ echo 'selected';} ?> value="i don't know">I Don't Know</option>
						<option <?php if( $params['userdata']['bloodtype'] == 'A+' ){ echo 'selected';} ?> value="A+">A+</option>
						<option <?php if( $params['userdata']['bloodtype'] == 'B+' ){ echo 'selected';} ?> value="B+">B+</option>
						<option <?php if( $params['userdata']['bloodtype'] == 'AB+' ){ echo 'selected';} ?> value="AB+">AB+</option>
						<option <?php if( $params['userdata']['bloodtype'] == 'O+' ){ echo 'selected';} ?> value="O+">O+</option>
						<option <?php if( $params['userdata']['bloodtype'] == 'A-' ){ echo 'selected';} ?> value="A-">A-</option>
						<option <?php if( $params['userdata']['bloodtype'] == 'B-' ){ echo 'selected';} ?> value="B-">B-</option>
						<option <?php if( $params['userdata']['bloodtype'] == 'AB-' ){ echo 'selected';} ?> value="AB-">AB-</option>
						<option <?php if( $params['userdata']['bloodtype'] == 'O-' ){ echo 'selected';} ?> value="O-">O-</option>
					</select>
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="birthday">Birthday</label>
					<input type="date" class="form-control" id="birthday" name="birthday" placeholder="Birthday" value="<?php echo $params['userdata']['birthday']; ?>">
				</div>
			</div>
			<div class="col-12 col-md-6">
				<div class="form-group">
					<label for="mobile">Mobile</label>
					<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo $params['userdata']['mobile']; ?>">
				</div>
			</div>
			<div class="col-12 col-md-12">
				<div class="form-group">
					<label for="social_link">Social link</label>
					<input type="text" class="form-control" id="social_link" name="social_link" placeholder="Social link" value="<?php echo $params['userdata']['social_link']; ?>">
				</div>
			</div>
			<div class="col-md-12">
				<button type="submit" class="btn btn-danger">Update</button>
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