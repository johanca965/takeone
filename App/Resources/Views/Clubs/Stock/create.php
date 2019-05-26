<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Stock</h3>
					<a href="<?php echo RUTA_URL; ?>/Clubs/Stock/" class="btn btn-sm btn-primary pull-right" title="View notifications list">
						<i class="fa fa-list" style="margin-right: 5px;"></i>
						List
					</a>
				</div>
				<div class="box-body" style="padding: 2rem;">
					<div id="errors-create">
						<?php echo $this->errors(); ?>
					</div>
					<form id="form-create" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Stock/store" autcomplete="off">
						<?php echo $this->csrfToken(); ?>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="name">Name (*)</label>
								<input type="text" class="form-control validate_crop_image" id="name" name="name" placeholder="Name">
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="price">Price (*)</label>
								<input type="number" class="form-control" id="price" name="price" placeholder="Price" step="0.01" min="0">
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="quantity">Quantity (*)</label>
								<input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" min="1">
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="code">Code (*)</label>
								<input type="text" class="form-control" id="code" name="code" placeholder="Code">
							</div>
						</div>
						<div class="col-12 col-md-6">
							<div class="form-group">
								<label for="upload_img_edit">Photo (*)</label>
								<input type="file" name="upload_image" id="upload_image">
								<input type="hidden" class="input_crop_image" name="logo" id="logo" value="">
							</div>
						</div>	
						<div class="col-md-12">
							<button type="submit" class="btn btn-danger">Create</button>
						</div>
					</form>
				</div>
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
						<button class="btn btn-success crop_button" data-action="<?php echo RUTA_URL; ?>/Clubs/Stock/uploadPhoto">Crop</button>
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