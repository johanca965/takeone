<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Information</h3>
					<div class="pull-right">
						<a href="<?php echo RUTA_URL; ?>/Clubs/Member/" class="btn btn-primary">
							<i class="fa fa-list" style="margin-right: 5px;"></i> List
						</a>
					</div>
				</div>
				<div class="box-body" style="padding: 2rem;">
					<div class="col-md-5 text-center" style="margin-bottom: 25px;">
						<img src="<?php echo RUTA_IMG; ?>/users/<?php echo $params['member']['photo']; ?>" alt="" width="250px" style="display: block; margin-left: 50%; transform: translateX(-50%); margin-bottom: 25px;">
						<?php echo $this->validateMember($params['member']['member_id'], $params['member']['accepted'], $params['member']['active'] ); ?>
					</div>
					<div class="col-md-7">
						<table>
							<tr>
								<td>
									<h4><i class="fa fa-user-tie" style="margin-right: 5px;"></i> Name:</h4>
								</td>
								<td>
									<h4><?php echo ucwords( $params['member']['name'] ); ?></h4>
								</td>
							</tr>
							<tr>
								<td>
									<h4><i class="fa fa-calendar" style="margin-right: 5px;"></i> Member since:</h4>
								</td>
								<td>
									<h4><?php echo $this->convertDate( $params['member']['created_at'] ); ?></h4>
								</td>
							</tr>
							<tr>
								<td>
									<h4><i class="fa fa-envelope" style="margin-right: 5px;"></i> Email:</h4>
								</td>
								<td>
									<h4><?php echo $params['member']['username']; ?></h4>
								</td>
							</tr>
							<tr>
								<td>
									<h4><i class="fa fa-mobile" style="margin-right: 5px;"></i> Phone number:</h4>
								</td>
								<td>
									<h4><?php echo $params['member']['mobile']; ?></h4>
								</td>
							</tr>
							<tr>
								<td>
									<h4><i class="fa fa-globe-asia" style="margin-right: 5px;"></i> Location:</h4>
								</td>
								<td>
									<h4><?php echo ucwords(utf8_encode($params['member']['city'])).', '.ucwords($params['member']['country']); ?></h4>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h4><i class="fa fa-map-marker-alt" style="margin-right: 5px;"></i> Address:</h4>
								</td>
								<td>
									<h4><?php echo $params['member']['address']; ?></h4>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h4><i class="fa fa-id-card" style="margin-right: 5px;"></i> CPR:</h4>
								</td>
								<td>
									<h4><?php echo $params['member']['cpr']; ?></h4>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h4><i class="fa fa-credit-card" style="margin-right: 5px;"></i> RFID:</h4>
								</td>
								<td>
									<h4>
										<?php echo $params['member']['rfid']; ?>
										<a href="" class="btn-load-id-update-rfid btn btn-primary btn-sm pull-right" data-toggle='modal' data-target='#modalUpdateRfid' data-member-id="<?php echo $params['member']['member_id']; ?>">
											<i class='fa fa-edit'></i> Update
										</a>										
									</h4>
								</td>
							</tr>
							<tr>
								<td style="vertical-align: top;">
									<h4><i class="fa fa-id-card-alt" style="margin-right: 5px;"></i> Passport:</h4>
								</td>
								<td>
									<h4><?php echo $params['member']['passport']; ?></h4>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Package</h3>
					<div class="pull-right">
						<a href="<?php echo RUTA_URL; ?>/Clubs/Member/" class="btn btn-primary">
							<i class="fa fa-list" style="margin-right: 5px;"></i> List
						</a>
					</div>
				</div>
				<div class="box-body" style="padding: 2rem;">
					<table id="example" class="table table-bordered" style="width:100%">
						<thead>
							<tr>
								<th>State</th>
								<th>Packages</th>
								<th>Record date</th>
								<th>Transaction date</th>
								<th>Expire date</th>
								<th>Payment type</th>
								<th>Discount</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if( $params['suscriptions']->num_rows > 0  )
							{
								foreach ($params['suscriptions'] as $suscriptions) 
								{
									if( $suscriptions['state'] == "approval" )
									{
										$bg = "bg-info";
										$payment_date = "";
									}
									else if( $suscriptions['state'] == "expired" )
									{
										$bg = "bg-danger";
										$payment_date = "";
									}
									else if( $suscriptions['state'] == "paid" )
									{
										$bg = "bg-success";
										$payment_date = $this->convertDateAll( $suscriptions['updated_at'] );
									}
									else
									{
										$bg = "bg-warning";
										$payment_date = "";
									}
									echo '
										<tr class="'.$bg.'">
											<td style="vertical-align: middle;">'.ucfirst( $suscriptions['state'] ).'</td>
											<td style="vertical-align: middle;">'.$this->find_packages_by_suscription_id( $suscriptions['id'], $suscriptions['price'] ).'</td>
											<td style="vertical-align: middle;">'.$this->convertDateAll( $suscriptions['created_at'] ).'</td>
											<td style="vertical-align: middle;">'.$payment_date.'</td>
											<td style="vertical-align: middle;">'.$this->convertDate( $this->expire_date( $suscriptions['created_at'] ) ).'</td>
											<td style="vertical-align: middle;">'.ucfirst( $suscriptions['payment_method'] ).'</td>
											<td style="vertical-align: middle;">'.$suscriptions['total_discount'].' '.$params['club']['currency'].'</td>
											<td style="vertical-align: middle;">'.$suscriptions['price'].' '.$params['club']['currency'].'</td>
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
								<th>State</th>
								<th>Packages</th>
								<th>Record date</th>
								<th>Transaction date</th>
								<th>Expire date</th>
								<th>Payment type</th>
								<th>Discount</th>
								<th>Total</th>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="modal fade" id="modalUpdateRfid" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm modal-notify" role="document">
		<!--Content-->
		<div class="modal-content text-center">
			<form id="form-edit" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Member/Update_rfid" autcomplete="off">
				<?php echo $this->csrfToken(); ?>
				<!--Header-->
				<div class="modal-header bg-danger d-flex justify-content-center">
					<p class="heading">Are you sure to update the rfid number?</p>
				</div>

				<!--Body-->
				<div class="modal-body">
					<i class="fa fa-credit-card fa-4x animated rotateIn"></i>
					
					<div id="errors-edit" style="margin-top: 15px;"></div>

					<div class="form-group" style="margin-top: 15px;">
						<input type="text" id="rfid" name="rfid" class="form-control suscription_price" placeholder="Rfid number">
					</div>
				</div>

				<!--Footer-->
				<div class="modal-footer flex-center">
					<input type="hidden" id="member_id" name="member_id">
					<button type="submit" id="btn-update-rfid" class="btn btn-primary">Yes</button>
					<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
				</div>
			</form>
		</div>
		<!--/.Content-->
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script src="<?php echo RUTA_JS; ?>/clubs/members.js"></script>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/adminlte/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>/adminlte/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>