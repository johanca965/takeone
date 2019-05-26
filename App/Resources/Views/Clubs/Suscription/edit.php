<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Suscription</h3>
					<a href="<?php echo RUTA_URL; ?>/Clubs/Suscription/" class="btn btn-sm btn-primary pull-right" title="View notifications list">
						<i class="fa fa-list" style="margin-right: 5px;"></i>
						List
					</a>
				</div>
				<div class="box-body" style="padding: 2rem;">
					<div id="errors-edit">
						<?php echo $this->errors(); ?>
					</div>
					<form id="form-edit" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Suscription/update" autcomplete="off">
						<?php echo $this->csrfToken(); ?>
						<input type="hidden" name="id" value="<?php echo $params['suscription']['id']; ?>">
						<div class="col-xs-12 col-lg-6">
							<div class="form-group">
								<label for="member_id">Member (*)</label>
								<select class="browser-default form-control js-example-basic-single" name="member_id" disabled id="member_id">
									<option value="" selected="">-- Choose an option --</option>
									<?php 
									foreach ($params['members'] as $member) 
									{
										$selected;
										if ( $member['id'] == $params['suscription']['member_id'] )
											$selected = 'selected';
										echo '
										<option '.$selected.' value="'.$member['id'].'">'.$member['member'].'</option>
										';
									}
									?>
								</select>
							</div>
						</div>
						<div class="col-xs-6 col-lg-6">
							<div class="form-group">
								<label for="payment_method">Price (*)</label>
								<input type="text" class="form-control" name="price" id="price" value="<?php echo $params['suscription']['price']; ?>" step="0.01" min="0">
							</div>
						</div>
						<div class="col-xs-6 col-lg-6">
							<div class="form-group">
								<label for="payment_method">Payment method (*)</label>
								<select class="browser-default form-control" name="payment_method" id="payment_method">
									<option value="" selected="">-- Choose an option --</option>
									<option <?php if( $params['suscription']['payment_method'] == 'cash' ){ echo 'selected'; } ?> value="cash">Cash</option>
								</select>
							</div>
						</div>
						<div class="col-xs-6 col-lg-6">
							<div class="form-group">
								<label for="state">State (*)</label>
								<select class="browser-default form-control" name="state" id="state">
									<option value="" selected="">-- Choose an option --</option>
									<option <?php if( $params['suscription']['state'] == 'paid' ){ echo 'selected'; } ?> value="paid">Paid</option>
									<option <?php if( $params['suscription']['state'] == 'to pay' ){ echo 'selected'; } ?> value="to pay">to pay</option>
									<option <?php if( $params['suscription']['state'] == 'canceled' ){ echo 'selected'; } ?> value="canceled">Canceled</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 text-right">
							<button type="submit" class="btn btn-danger">Update</button>
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
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/clubs/suscriptions.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();	
	});
</script>