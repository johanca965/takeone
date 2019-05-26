<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="row">
	<div class="col-lg-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">List</h3>
				<div class="box-tools pull-right">
					<a href="<?php echo RUTA_URL; ?>/Clubs/Stock/Create" class="btn btn-primary btn-sm">New stock</a>
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- Validity Expire Warnning  -->
				<table class="table">
					<thead>
						<tr>
							<th>Code</th>
							<th>Name</th>
							<th>Price (<?php echo $params['club']['currency']; ?>)</th>
							<th>Quantity</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($params['stocks'] as $stocks) 
						{
							echo '
							<tr>
								<td style="vertical-align: middle;">'.$stocks['code'].'</td>
								<td style="vertical-align: middle;">'.ucwords( $stocks['name'] ).'</td>
								<td style="vertical-align: middle;">'.$stocks['price'].'</td>
								<td style="vertical-align: middle;">'.$stocks['cant'].'</td>
								<td style="vertical-align: middle;">
									<a href="'.RUTA_URL.'/Clubs/Stock/Edit/'.$stocks['slug'].'" title="See data">See data</a>
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
	<div class="col-lg-6">
		<div class="box box-danger">
			<div class="box-header with-border">
				<h3 class="box-title">Inventory empty</h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- Validity Expire Warnning  -->
				<table class="table">
					<thead>
						<tr>
							<th>Code</th>
							<th>Name</th>
							<th>Price (<?php echo $params['club']['currency']; ?>)</th>
							<th>Exhausted date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($params['stocks_exhausted'] as $stocks_exhausted) 
						{
							echo '
							<tr>
								<td style="vertical-align: middle;">'.$stocks_exhausted['code'].'</td>
								<td style="vertical-align: middle;">'.ucwords( $stocks_exhausted['name'] ).'</td>
								<td style="vertical-align: middle;">'.$stocks_exhausted['price'].'</td>
								<td style="vertical-align: middle;">'.$this->convertDate( $stocks_exhausted['updated_at'] ).'</td>
								<td style="vertical-align: middle;">
									<a href="'.RUTA_URL.'/Clubs/Stock/Edit/'.$stocks_exhausted['slug'].'" title="See data">Add</a>
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