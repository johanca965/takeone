<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="row">

	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Sales done</h3>
						<div class="box-tools pull-right">
							<a href="<?php echo RUTA_URL; ?>/Clubs/Sale/Create" class="btn btn-primary btn-sm">New sale</a>
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<table class="table">
							<thead>
								<tr>
									<th>Member</th>
									<th>Total (<?php echo $params['club']['currency']; ?>)</th>
									<th>State</th>
									<th>Payment method</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach ($params['sales_done'] as $sales_done) 
								{
									echo '
									<tr>
									<td style="vertical-align: middle;">'.ucfirst($sales_done['member']).'</td>
									<td style="vertical-align: middle;">'.$sales_done['total'].'</td>
									<td style="vertical-align: middle;">'.ucfirst($sales_done['payment_method']).'</td>
									<td style="vertical-align: middle;">'.$this->convertDate( $sales_done['updated_at'] ).'</td>
									<td style="vertical-align: middle;">
									<a href="'.RUTA_URL.'/Clubs/Sale/Edit/'.$sales_done['id'].'" title="See data">See data</a>
									</td>
									</tr>
									';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="row">
			<div class="col-lg-12" style="display: none;">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Sales to pay</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<table class="table">
							<thead>
								<tr>
									<th>Member</th>
									<th>Total (<?php echo $params['club']['currency']; ?>)</th>
									<th>State</th>
									<th>Payment method</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach ($params['sales_expired'] as $sales_expired) 
								{
									echo '
									<tr>
									<td style="vertical-align: middle;">'.ucfirst($sales_expired['member']).'</td>
									<td style="vertical-align: middle;">'.$sales_expired['total'].'</td>
									<td style="vertical-align: middle;">'.ucfirst($sales_expired['payment_method']).'</td>
									<td style="vertical-align: middle;">'.$this->convertDate( $sales_expired['updated_at'] ).'</td>
									<td style="vertical-align: middle;">
									<a href="'.RUTA_URL.'/Clubs/Sale/Edit/'.$sales_expired['id'].'" title="See data">See data</a>
									</td>
									</tr>
									';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Sales canceled</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<table class="table">
							<thead>
								<tr>
									<th>Member</th>
									<th>Total (<?php echo $params['club']['currency']; ?>)</th>
									<th>State</th>
									<th>Payment method</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								foreach ($params['sales_canceled'] as $sales_canceled) 
								{
									echo '
									<tr>
									<td style="vertical-align: middle;">'.ucfirst($sales_canceled['member']).'</td>
									<td style="vertical-align: middle;">$'.$sales_canceled['total'].'</td>
									<td style="vertical-align: middle;">'.ucfirst($sales_canceled['payment_method']).'</td>
									<td style="vertical-align: middle;">'.$this->convertDate( $sales_canceled['updated_at'] ).'</td>
									<td style="vertical-align: middle;">
									<a href="'.RUTA_URL.'/Clubs/Sale/Edit/'.$sales_canceled['id'].'" title="See data">See data</a>
									</td>
									</tr>
									';
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>


</div>


<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/adminlte/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/adminlte/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>