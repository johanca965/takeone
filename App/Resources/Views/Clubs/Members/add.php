<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="row" style="justify-content: center; display: flex; margin-top: 2rem;">
	<div class="col-12 col-lg-11">
		<!-- Card -->
		<div class="card promoting-card">

			<!-- Card content -->
			<div class="card-body">
				<div id="errors-create-invitation">
					<?php echo $this->errors(); ?>
				</div>
				<form id="form-create-invitation" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Member/Registermember" autcomplete="off">
					<?php echo $this->csrfToken(); ?>
					<div class="row">
						<div class="col-xs-12">
							<h3 style="color: red;">Account information</h3>
							<hr>
						</div>
						<div class="col-xs-12 col-md-6">
							<input type="hidden" class="form-control" name="club_id" id="club_id" value="<?php echo $params['club']['id']; ?>">
							<div class="form-group">
								<label for="Name">Name (*)</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
							</div>
						</div>
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="username">Email (*)</label>
								<input type="text" class="form-control validate_crop_image" id="username" name="username" placeholder="Email" value="" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="password">Password (*)</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							</div>
						</div>					
						<div class="col-xs-12 col-md-6">
							<div class="form-group">
								<label for="upload_photo">Photo(*)</label>
								<input type="file" name="upload_image" id="upload_image">
								<input type="hidden" class="input_crop_image" name="photo" id="photo" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<h3 style="color: red;">Personal information</h3>
							<hr>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="country">Country (*)</label>
								<select id="country" name="country" class="browser-default form-control" required>
									<option value="" selected="">-- Choose an option --</option>
									<?php foreach ($params['country'] as $country) {
										echo "
										<option value='".$country['id']."'>".ucfirst( $country['name'] )."</option>
										";
									} ?>
								</select>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="city">City (*)</label>
								<input type="text" class="form-control validate_crop_image" id="city" name="city" placeholder="City" value="" required>
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="mobile">Mobile</label>
								<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="">
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="cpr">Cpr</label>
								<input type="text" class="form-control" id="cpr" name="cpr" placeholder="Cpr" value="">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<h3 style="color: red;">Package selection</h3>
							<hr>
						</div>
						<?php
						$i = 1; 
						foreach ($params['clubpackages'] as $clubpackage) 
						{
							echo '
							<div class="col-xs-6 col-md-4 col-lg-3">
							<div class="form-group">
							<label for="packages_'.$i.'" style="text-align: center; width: 100%; padding:5px; padding-top: 70px; position: relative;">
							<input data-price="'.$clubpackage['price'].'" type="checkbox" id="packages_'.$i.'" name="packages[]" value="'.$clubpackage['id'].'" placeholder="packages" class="item_package" style="display: none;"> 
							<img src="'.RUTA_IMG.'/schedule/'.$clubpackage['slug'].'/'.$clubpackage['picture'].'" width="50" height="50" style="border-radius: 50%; margin-right: 5px; top: 10px; display: block; position: absolute; left: 50%; transform: translate(-50%);">
							<span style="">'.$clubpackage['title'].'</span>
							<p style="font-weight: normal; font-size: 12px; margin: 0;">'.$clubpackage['min_age'].' - '.$clubpackage['max_age'].' years</p>
							<p style="font-weight: normal; font-size: 12px; margin: 0;">'.$clubpackage['price'].' '.$params['club']['currency'].'</p>
							</label>
							</div>
							</div>
							';
							$i++;
						}
						?>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<input type="hidden" name="total" id="total" value="<?php echo $params['club']['administration_fee']; ?>">
							<h4>Total: <span class="total_show"><?php echo $params['club']['administration_fee']; ?></span> <?php echo $params['club']['currency']; ?></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<a href="<?php echo RUTA_URL; ?>" style="width: 200px;" class="btn btn-danger">Cancel</a>
							<button type="submit" style="width: 200px;" class="btn btn-primary">Register</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
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
						<button class="btn btn-success crop_button" data-action="<?php echo RUTA_URL; ?>/Invitation/uploadPhoto">Crop</button>
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

<script type="text/javascript" src="<?php echo RUTA_JS; ?>/crop_image.js"></script>

<script type="text/javascript">
	$(".item_package").change(function(){
		var total = $("#total").val();
		if( $(this).prop('checked') ) 
		{
			total = parseFloat( $(this).data('price') ) + parseFloat( total );
			$(this).parent('label').css('background-color', '#DFD8D8');
		}else
		{
			total = parseFloat( total ) - parseFloat( $(this).data('price') );
			$(this).parent('label').css('background-color', 'transparent');
		}
		$("#total").val( total );
		$(".total_show").html( total );
	});

	$(document).ready(function() {
		$("#form-create-invitation").submit(function(){
			$("#errors-create-invitation").html('');
			var form = $("#form-create-invitation");
			var url = form.attr('action');
			$.ajax({
				url: url,
				type: 'POST',
				data: form.serialize(),
				beforeSend: function() {
					toastr.info("Creating record...");
				},
				success: function(data) {
					data = data.split("|");
					if( data[0] === 'true' )
					{
						toastr.success("Successful registration.");
						window.reload;
					}else
					{
						toastr.error("An error has occurred.");
						$("#errors-create-invitation").append( data[0] );
					}
				},
				error: function(xhr) {
					toastr.error("An error has occurred.");
					    // console.log(xhr.statusText + xhr.responseText);
					},
				});
			return false;
		});
	});
</script>