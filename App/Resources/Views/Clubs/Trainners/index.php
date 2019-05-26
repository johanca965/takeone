<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Trainners</h3>
				</div>
				<div class="box-body">
					<table id="example" class="table table-striped table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>Photo</th>
								<th>Name</th>
								<th>Accepted</th>
								<th>Locked</th>
								<th>Member since</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if( $params['trainners']->num_rows > 0  )
							{
								foreach ($params['trainners'] as $member) 
								{
									if( $member['accepted'] == 1 )
									{
										$accepted = 'No';
									}
									else
									{
										$accepted = 'Yes';
									}

									if( $member['active'] == 2 )
									{
										$active = 'No';
									}
									else
									{
										$active = 'Yes';
									}

									echo '
										<tr>
											<td style="vertical-align: middle;"> <img src="'.RUTA_IMG.'/users/'.$member['photo'].'" width="50px" class="img-circle" /> </td>
											<td style="vertical-align: middle;">'.ucwords($member['member']).'</td>
											<td style="vertical-align: middle;">'.$accepted.'</td>
											<td style="vertical-align: middle;">'.$active.'</td>
											<td style="vertical-align: middle;">'.$this->convertDate( $member['created_at'] ).'</td>
											<td style="vertical-align: middle;">
												<a href="'.RUTA_URL.'/Clubs/Member/See/'.$member['member_slug'].'" title="See data">See data</a>
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
								<th>Photo</th>
								<th>Name</th>
								<th>Accepted</th>
								<th>Locked</th>
								<th>Member since</th>
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