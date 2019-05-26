<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<div id="errors-create">
				<?php echo $this->errors(); ?>
			</div>
			<form id="form-create" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Schedule/updatepackage" autcomplete="off">
				<?php echo $this->csrfToken(); ?>
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"> Edit Package</h3>
						<a href="<?php echo RUTA_URL; ?>/Clubs/Schedule/List" class="pull-right btn btn-primary btn-sm">
							<i class="fa fa-list" style="margin-right: 5px;"></i> List
						</a>
					</div>
					<div class="box-body">
						<!-- Activity Information Panel -->
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<input id="id" name="id"  type="hidden" value="<?php echo $params['package']['id']; ?>">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Package Title</label>
											<input class="form-control validate_crop_image" type="text" name="title"  value="<?php echo $params['package']['title']; ?>" placeholder="Ex Kids Trainning Package" autocomplete="off" readonly>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">Package Capacity</label>
											<input class="form-control" type="text" name="capacity" value="<?php echo $params['package']['capacity']; ?>" placeholder="Ex 50 (participants)" autocomplete="off">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Gender</label>
											<select class="form-control select2" id="gender" name="gender">
												<option <?php if( $params['package']['gender'] == 'ALL' ){ echo "selected"; } ?> value="ALL">MALE & FEMALE</option>
												<option <?php if( $params['package']['gender'] == 'MALE' ){ echo "selected"; } ?> value="MALE">MALE</option>
												<option <?php if( $params['package']['gender'] == 'FEMALE' ){ echo "selected"; } ?> value="FEMALE">FEMALE</option>
											</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label>Min Age</label>
											<input type="number" class="form-control" name="min_age" placeholder="Min Age" value="<?php echo $params['package']['min_age']; ?>" min="5" autocomplete="off">
										</div>
									</div>
									<div class="col-lg-3">
										<div class="form-group">
											<label>Max Age</label>
											<input type="number" class="form-control" name="max_age" placeholder="Max Age" value="<?php echo $params['package']['max_age']; ?>" autocomplete="off" min="5">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">Package Price / Month</label>
											<input class="form-control" type="text" name="price" value="<?php echo $params['package']['price']; ?>" placeholder="Ex 25">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">Discount Margin</label>
											<input class="form-control" type="text" name="discount" value="<?php echo $params['package']['discount']; ?>" placeholder="Ex 10%">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">Package Display Picture</label>
											<input type="file" name="upload_image" id="upload_image">
											<input type="hidden" class="input_crop_image" name="picture" id="picture" value="<?php echo $params['package']['picture']; ?>">
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="">Package Status</label>
											<select class="form-control select2" name="status">
												<option <?php if( $params['package']['status'] == 'Enabled' ){ echo "selected"; } ?> value="Enabled" selected>Enabled</option>
												<option <?php if( $params['package']['status'] == 'Disabled' ){ echo "selected"; } ?> value="Disabled">Disabled</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="submit" name="submit" class="btn btn-primary pull-right" value="Update">
					</div>
				</div>
			</form>
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
						<button class="btn btn-success crop_button" data-action="<?php echo RUTA_URL; ?>/Clubs/Schedule/uploadPhoto">Crop</button>
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