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
									<h4><?php echo $params['member']['rfid']; ?></h4>
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
					<ul class="users-list clearfix">
							<?php 
							foreach ($params['packages'] as $package) 
							{
								echo "
								<li>
								<img src='".RUTA_IMG."/schedule/".$package['slug']."/".$package['picture']."' style='width: 128px; height: 100px;' alt='Package Image'>
								<a class='users-list-name' href='".RUTA_URL."/Clubs/Schedule/list/".$package['id']."'>".ucwords($package['title'])."</a>
								<span class='users-list-date'>Gender: ".ucwords($package['gender'])."</span>
								<span class='users-list-date'>Capacity: ".ucwords($package['capacity'])."</span>
								</li>
								";
							}
							?>
						</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script src="<?php echo RUTA_JS; ?>/clubs/members.js"></script>