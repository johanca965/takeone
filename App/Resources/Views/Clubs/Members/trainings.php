<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Search details</h3>
				</div>
				<div class="box-body">
					<div class="row">
						<div class="col-lg-6">
							<div class="form-group">
								<label>Date</label>
								<input class="form-control" type="date" name="date" id="date" value="<?php if( !empty( $params['date'] ) ) { echo $params['date']; }else{ echo date('Y-m-d'); } ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="package_id">Select Package</label>
								<select class="form-control select2" id="package_id" name="package_id">
									<option value="" selected>Belongs To ...</option>
									<?php 
									foreach ($params['packages'] as $package) 
									{
										$select = '';
										if( $params['package_id'] == $package['id'] )
											$select = 'selected';
										echo "
										<option ".$select." value=".$package['id'].">".ucfirst( $package['title'] )."</option>
										";
									}
									?>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="box-footer">
					<button type="button" data-url="<?php echo RUTA_URL; ?>/Clubs/Training/List" class="btn-find btn btn-primary pull-right">Find</button>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div id="errors-delete2">
				<?php 
				if( isset($params['notattended']['message']) )
				{
					echo '
					<div class="col-10 alert alert-danger pb-0" >
						<ul class="pb-0">
							<li>'.$params['notattended']['message'].'</li>
						</ul>
					</div>
					';
				}
				?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Attended</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div id="errors-delete2"></div>
					<!-- Validity Expire Warnning  -->
					<ul class="users-list clearfix">
						<?php 
						foreach ($params['attended'] as $attended) 
						{
							echo "
							<li>
								<img src='".RUTA_IMG."/users/".$attended['photo']."' style='width: 128px; height: 100px;' alt='".ucwords($attended['name'])."'>
								<span class='users-list-name' href='".RUTA_URL."/Clubs/Schedule/list/".$package['id']."' style='margin-top: 5px;'>".ucwords($attended['name'])."</span>
								<a href='#' data-toggle='modal' data-target='#modalHappenToNotAttended' class='open-confirm-notattended ml-auto btn btn-danger btn-sm' data-id='".$attended['id']."' style='margin-top: 5px;' title='Not attended'>
										<i class='fas fa-times'></i> Not attended
									</a>
							</li>
							";
						}
						?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Not attended</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					</div>
				</div>
				<div class="box-body">
					<!-- Validity Expire Warnning  -->
					<ul class="users-list clearfix">
						<?php 
						if( !isset($params['notattended']['message']) )
						{
							foreach ($params['notattended'] as $notattended) 
							{
								// obtenemos la fecha del día
								if( !empty( $params['date'] ) ) { $date = $params['date']; }else{ $date = date('Y-m-d'); }
								echo "
								<li>
									<img src='".RUTA_IMG."/users/".$notattended['photo']."' style='width: 128px; height: 100px;' alt='".ucwords($notattended['name'])."'>
									<span class='users-list-name' href='".RUTA_URL."/Clubs/Schedule/list/".$package['id']."' style='margin-top: 5px;'>".ucwords($notattended['name'])."</span>
									<a href='#' data-toggle='modal' data-target='#modalHappenToAttended' class='open-confirm-attended ml-auto btn btn-success btn-sm' data-date='".$date."' data-member-id='".$notattended['id']."' style='margin-top: 5px;' title='Attended'>
										<i class='fas fa-check'></i> Attended
									</a>
								</li>
								";
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="modalHappenToAttended" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm modal-notify" role="document">
		<!--Content-->
		<div class="modal-content text-center">
			<form id="form-create" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Training/Store" autcomplete="off">
				<?php echo $this->csrfToken(); ?>
				<!--Header-->
				<div class="modal-header bg-danger d-flex justify-content-center">
					<p class="heading">Are you sure the member attended?</p>
				</div>

				<!--Body-->
				<div class="modal-body">
					<i class="fa fa-check fa-4x animated rotateIn"></i>
					
					<div id="errors-create" style="margin-top: 15px;"></div>

					<div class="form-group" style="margin-top: 15px; display: none;">
						<label for="package_id">Select Package</label>
						<select class="form-control select2" id="package_id" name="package_id">
							<option value="" selected>Belongs To ...</option>
							<?php 
							foreach ($params['packages'] as $package) 
							{
								$select = '';
								if( $params['package_id'] == $package['id'] )
									$select = 'selected';
								echo "
								<option ".$select." value=".$package['id'].">".ucfirst( $package['title'] )."</option>
								";
							}
							?>
						</select>
					</div>
				</div>

				<!--Footer-->
				<div class="modal-footer flex-center">
					<input type="hidden" id="member_id_attended" name="member_id">
					<input type="hidden" id="date_attended" name="date">
					<button type="submit" id="btn-happen-to-attended" class="btn btn-primary">Yes</button>
					<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
				</div>
			</form>
		</div>
		<!--/.Content-->
	</div>
</div>



<div class="modal fade" id="modalHappenToNotAttended" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm modal-notify" role="document">
		<!--Content-->
		<div class="modal-content text-center">
			<form id="form-delete-attendence" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Training/Delete" autcomplete="off">
				<?php echo $this->csrfToken(); ?>
				<!--Header-->
				<div class="modal-header bg-danger d-flex justify-content-center">
					<p class="heading">Are you sure the member not attended?</p>
				</div>

				<!--Body-->
				<div class="modal-body">
					<i class="fa fa-times fa-4x animated rotateIn"></i>
					
					<div id="errors-delete" style="margin-top: 15px;"></div>

				</div>

				<!--Footer-->
				<div class="modal-footer flex-center">
					<input type="hidden" id="id_attended" name="id">
					<button type="submit" id="btn-happen-to-not-attended" class="btn btn-primary">Yes</button>
					<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
				</div>
			</form>
		</div>
		<!--/.Content-->
	</div>
</div>

<?php require_once RUTA_RESOURCES."/Templates/adminlte/footer.php"; ?>

<script src="<?php echo RUTA_JS; ?>/clubs/attendence.js"></script>