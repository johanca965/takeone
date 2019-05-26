<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Notification</h3>
					<a href="<?php echo RUTA_URL; ?>/Clubs/Notification/" class="btn btn-sm btn-primary pull-right" title="View notifications list">
						<i class="fa fa-list" style="margin-right: 5px;"></i>
						List
					</a>
				</div>
				<div class="box-body" style="padding: 2rem;">
					<div id="errors-create">
						<?php echo $this->errors(); ?>
					</div>
					<form id="form-create" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Notification/store" autcomplete="off">
						<?php echo $this->csrfToken(); ?>
						<div class="col-md-12">
							<div class="form-group">
								<label for="message">Members</label>
								<select class="js-example-basic-multiple" name="members[]" multiple="multiple" style="width: 100%;">
									<?php 
										foreach ($params['members'] as $member) 
										{
											echo '
												<option value="'.$member['id'].'">'.$member['member'].'</option>
											';
										}
									?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="message">Message</label>
								<textarea class="form-control" id="message" name="message" placeholder="Message" rows="7"></textarea>
							</div>
						</div>
						<div class="col-md-12">
							<button type="submit" class="btn btn-danger">Send</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-multiple').select2();
	});
</script>