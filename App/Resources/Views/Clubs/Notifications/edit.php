<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h3 class="box-title">Notification</h3>
					<a href="<?php echo RUTA_URL; ?>/Clubs/Notification/" class="btn btn-sm btn-primary pull-right" title="View notifications list">
						<i class="fa fa-list" style="margin-right: 5px;"></i>
						List
					</a>
				</div>
				<div class="box-body" style="padding: 2rem;">
					<h3 class="h4">Message:</h3>
					<p><?php echo $params['notification']['message']; ?></p>
					<h3 class="h4" style="margin-top: 30px; margin-bottom: 15px;">Members:</h3>
					<div class="row">
						<?php 
							foreach ($params['members'] as $member) 
							{
								if( $member['readed'] == '1' )
									$readed = 'No leido';
								else
									$readed = 'Leido';
								echo '
									<div class="col-xs-6 col-md-4 col-lg-3">
										<div class="row" style="align-items: center !important;">
											<div class="col-xs-3">
												<img src="'.RUTA_IMG.'/users/'.$member['photo'].'" width="50px" class="img-circle" style="margin-right: 10px;" />
											</div>
											<div class="col-xs-9">
												<p style="margin: 0px !important;">'.ucwords($member['name']).'</p>
												<p class="text-red">'.$readed.'</p>
											</div>
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