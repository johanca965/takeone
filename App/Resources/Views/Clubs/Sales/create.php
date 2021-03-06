<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Sale</h3>
					<a href="<?php echo RUTA_URL; ?>/Clubs/Sale/" class="btn btn-sm btn-primary pull-right" title="View notifications list">
						<i class="fa fa-list" style="margin-right: 5px;"></i>
						List
					</a>
				</div>
				<div class="box-body" style="padding: 2rem;">
					<div id="errors-create">
						<?php echo $this->errors(); ?>
					</div>
					<form id="form-create" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Sale/store" autcomplete="off">
						<?php echo $this->csrfToken(); ?>
						<div class="col-xs-12 col-lg-8">
							<div class="form-group">
								<label for="member_id">Member (*)</label>
								<select class="browser-default form-control js-example-basic-single" name="member_id" id="member_id">
									<option value="" selected="">-- Choose a member --</option>
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
						<div class="col-xs-6 col-lg-2">
							<div class="form-group">
								<label for="payment_method">Payment method (*)</label>
								<select class="browser-default form-control" name="payment_method" id="payment_method">
									<option value="" selected="">-- Choose a product --</option>
									<option value="cash">Cash</option>
								</select>
							</div>
						</div>
						<div class="col-xs-6 col-lg-2">
							<div class="form-group">
								<label for="state">State (*)</label>
								<select class="browser-default form-control" name="state" id="state">
									<option value="" selected="">-- Choose an option --</option>
									<option value="paid">Paid</option>
									<option value="to pay">to pay</option>
									<option value="canceled">Canceled</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-6 col-md-7">
									<div class="form-group">
										<label>Product</label>
										<select class="browser-default form-control js-example-basic-single" name="stock_id_add" id="stock_id_add">
											<option value="" selected="">-- Choose an option --</option>
											<?php 
											foreach ($params['products'] as $product) 
											{
												echo '
												<option value="'.$product['id'].'">'.ucwords($product['name']).' - '.$product['price'].' '.$params['club']['currency'].'</option>
												';
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="form-group">
										<label>Quantity</label>
										<input type="number" class="form-control" id="quantity_add" name="quantity_add" placeholder="Quantity">
									</div>
								</div>
								<div class="col-xs-2 col-md-1">
									<div class="form-group">
										<a href="#" data-url="<?php echo RUTA_URL; ?>/Clubs/Sale/showproduct" class="btn btn-primary add_product" style="margin-top: 25px;">Add</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12" style="padding-top: 15px;">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th class="text-center">Name</th>
										<th class="text-center">Price</th>
										<th class="text-center">Cant</th>
										<th class="text-center">Subt.</th>
										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody id="tbody_sales">

								</tbody>
								<tfoot>
									<tr>
										<th class="text-right" colspan="3">Total.</th>
										<td class="text-center">
											<input type="hidden" id="total_sale_input" name="total_sale_input" value="0">
											<span class="total_sale">
												0											
											</span>
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
						<div class="col-xs-12 text-right">
							<button type="submit" class="btn btn-danger">Sell</button>
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
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/clubs/sales.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>