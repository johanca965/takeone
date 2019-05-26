<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body" style="padding-top: 0 !important;">
					<div class="row" style="padding: 0 5px; margin-bottom: 15px;">
						<div class="col-12 bg-danger">
							<h2 style="padding: 15px 20px; padding-bottom: 0px; margin-top: 0;">
								<?php echo ucfirst( $params['club']['title'] ); ?>
							</h2>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 container-club-images">
							<img src="<?php echo RUTA_IMG; ?>/clubs/<?php echo $params['club']['slug'].'/'.$params['club']['logo']; ?>" alt="" class="img-responsive">
							<img src="<?php echo RUTA_IMG; ?>/users/<?php echo $params['club']['photo']; ?>" alt="" class="img-responsive">
						</div>
						<div class="col-md-6">
							<table>
								<tr>
									<td>
										<h4><i class="fa fa-user-tie" style="margin-right: 5px;"></i> Owner:</h4>
									</td>
									<td>
										<h4><?php echo ucwords( $params['club']['owner'] ); ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h4><i class="fa fa-calendar" style="margin-right: 5px;"></i> Estableshied:</h4>
									</td>
									<td>
										<h4><?php echo $this->convertDate( $params['club']['established'] ); ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h4><i class="fa fa-envelope" style="margin-right: 5px;"></i> Email:</h4>
									</td>
									<td>
										<h4><?php echo $params['club']['email']; ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h4><i class="fa fa-mobile" style="margin-right: 5px;"></i> Phone number:</h4>
									</td>
									<td>
										<h4><?php echo $params['club']['phone']; ?></h4>
									</td>
								</tr>
								<tr>
									<td>
										<h4><i class="fa fa-globe-asia" style="margin-right: 5px;"></i> Location:</h4>
									</td>
									<td>
										<h4><?php echo ucwords(utf8_encode($params['club']['city'])).', '.ucwords($params['club']['country']); ?></h4>
									</td>
								</tr>
								<tr>
									<td style="vertical-align: top;">
										<h4><i class="fa fa-map-marker-alt" style="margin-right: 5px;"></i> Address:</h4>
									</td>
									<td>
										<h4><?php echo $params['club']['address_line1']; ?></h4>
										<h4><?php echo $params['club']['address_line2']; ?></h4>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row" style="margin-top: 25px; padding: 0 5px;">
						<div class="col-12 bg-danger">
							<h2 style="-ms-align-items: center; align-items: center; display: -webkit-flex; display: -moz-flex; display: -ms-flex; display: -o-flex; display: flex; justify-content: space-between; padding: 15px 20px; padding-bottom: 0px; margin-top: 0;">
								Members								
								<?php 
								echo '
									<span class="links" style="width: 40% !important;">
										'.$this->validateFollow( $params['club']['id'] ).'
										'.$this->validateMember( $params['club']['id'] ).'
									</span>
								'; 
								?>
							</h2>
							<hr>
						</div>
					</div>
					<div class="row">
						<?php
						if( $params['members']->num_rows > 0 )
						{
							foreach ($params['members'] as $club) 
							{
								echo '
									<div class="col-12 col-sm-6 col-lg-4">
										<a href="" title="View profile of member">
											<div class="card">
												<div class="card-header">
													<img src="'.RUTA_IMG.'/users/'.$club['photo'].'" class="img-responsive">
												</div>
												<div class="card-body">
													<h4 style="margin: 25px 0;">'.ucwords( $club['member'] ).'</h4>
												</div>
											</div>
										</a>
									</div>
								';
							}
						}
						else
						{
							echo '
									<div style="width: 80% !important; margin: 0 auto;">
										<div class="card-body text-center">
											<h1 class="text-danger"><i class="fa fa-users fa-4x"></i></h1>
											<h3 class="mt-4">UPS! We have not found registered members in the club, try it later.</h3>
										</div>
									</div>
							';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script src="<?php echo RUTA_JS; ?>/members/clubs.js"></script>