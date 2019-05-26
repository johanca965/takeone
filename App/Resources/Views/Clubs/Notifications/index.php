<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Message history</h3>
					<a href="<?php echo RUTA_URL; ?>/Clubs/Notification/Create" class="btn btn-sm btn-primary pull-right" title="New notification">
						<i class="fa fa-bell" style="margin-right: 5px;"></i>
						New
					</a>
				</div>
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Code</th>
								<th width="50%">Message</th>
								<th>Sended at</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if( $params['notifications']->num_rows > 0  )
							{
								foreach ($params['notifications'] as $notifications) 
								{
									echo '
										<tr>
											<td style="vertical-align: middle;"> '.$notifications['id'].' </td>
											<td style="vertical-align: middle;">'.substr(ucfirst($notifications['message']), 0, 150).'...</td>
											<td style="vertical-align: middle;">'.$this->convertDate( $notifications['created_at'] ).'</td>
											<td style="vertical-align: middle;">
												<a href="'.RUTA_URL.'/Clubs/Notification/Edit/'.$notifications['id'].'" title="See data">See data</a>
											</td>
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
								<th>Code</th>
								<th>Message</th>
								<th>Sended at</th>
								<th>Actions</th>
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