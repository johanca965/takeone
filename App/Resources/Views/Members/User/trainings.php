<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Training history</h3>
				</div>
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Club</th>
								<th>Package</th>
								<th>Visited</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if( $params['trainings']->num_rows > 0  )
							{
								foreach ($params['trainings'] as $training) 
								{
									echo '
										<tr>
											<td style="vertical-align: middle;"> <img src="'.RUTA_IMG.'/clubs/'.$training['slug'].'/'.$training['logo'].'" width="50px" class="img-circle" /> '.ucwords($training['title']).' </td>
											<td style="vertical-align: middle;">'.ucwords($training['package']).'</td>
											<td style="vertical-align: middle;">'.$this->convertDate( $training['created_at'] ).'</td>
										</tr>
									';
								}
							}
							else
							{
								echo "
								<tr>
									<td colspan='6' class='text-center'>No results found</td>
								</tr>
								";
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<th>Club</th>
								<th>Package</th>
								<th>Visited</th>
							</tr>
						</tfoot>
					</table>
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