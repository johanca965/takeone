<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="row">

	<!-- Create Schedule -->
	<section class="col-lg-6">
		<div class="row">
			<div class="col-lg-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">List packages</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div id="errors-delete2"></div>
						<!-- Validity Expire Warnning  -->
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
								<span class='users-list-date' style='font-size: 16px; margin-top: 5px;'>
									<a href='".RUTA_URL."/Clubs/Schedule/Editpackage/".$package['id']."' title='Update' style='margin-right: 5px;'>
										<i class='fa fa-edit'></i>
									</a>
									<a href='#' data-toggle='modal' data-target='#modalConfirmDelete2' class='open-confirm-delete2 ml-auto' data-id='".$package['id']."' title='Delete'>
										<i class='fas fa-trash'></i>
									</a>
									<form id='form-delete2-".$package['id']."' action='".RUTA_URL."/Clubs/Schedule/deletepackage' method='POST' style='display: none;'>
										".$this->csrfToken()."
										<input type='hidden' name='id' value='".$package['id']."'>
									</form>
								</span>
								</li>
								";
							}
							?>
						</ul>
					</div>
					<div class="box-footer">
						<button type="button" class="btn btn-primary pull-right">Create</button>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">List schedule - <?php if( !empty($params['package_selected']['title']) ){ echo ucwords( $params['package_selected']['title'] ); } ?></h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<div id="errors-delete"></div>
						<table class="table">
							<thead>
								<tr>
									<th>Activity</th>
									<th>Days</th>
									<th>Start</th>
									<th colspan="2">Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									foreach ($params['schedules'] as $schedule) 
									{
										echo '
											<tr>
												<td>'.$schedule['activity'].'</td>
												<td>'.$schedule['days'].'</td>
												<td>'.$schedule['start_time'].'</td>
												<td style="vertical-align: middle;">
													<a href="'.RUTA_URL.'/Clubs/Schedule/Edit/'.$schedule['id'].'" title="Update">
														<i class="fa fa-edit"></i>
													</a>
												</td>
												<td style="vertical-align: middle;">
													<a href="#" data-toggle="modal" data-target="#modalConfirmDelete" class="open-confirm-delete ml-auto" data-id="'.$schedule['id'].'" title="Delete">
														<i class="fas fa-trash"></i>
													</a>
													<form id="form-delete-'.$schedule['id'].'" action="'.RUTA_URL.'/Clubs/Schedule/delete" method="POST" style="display: none;">
													'.$this->csrfToken().'
													<input type="hidden" name="id" value="'.$schedule['id'].'">
													</form>
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
	</section>

	<!-- Create Package -->
	<section class="col-lg-6">
		<div class="row">

			<div class="col-lg-12">
				<form id="form-create" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Schedule/storepackage" autcomplete="off">
					<?php echo $this->csrfToken(); ?>
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"> Create Package</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<!-- Activity Information Panel -->
							<div class="row">
								<div class="col-lg-12">
									<div id="errors-create">
										<?php echo $this->errors(); ?>
									</div>
								</div>
								<div class="col-lg-12">

									<!-- Title / Activity -->
									<div class="row">

										<!-- Class package -->
										<div class="col-lg-6">
											<div class="form-group">
												<label>Package Title</label>
												<input class="form-control validate_crop_image" type="text" name="title" value="" placeholder="Ex Kids Trainning Package" autocomplete="off">
											</div>
										</div>

										<!-- Activate Class -->
										<div class="col-lg-6">
											<div class="form-group">
												<label for="">Package Capacity</label>
												<input class="form-control" type="text" name="capacity" value="" placeholder="Ex 50 (participants)" autocomplete="off">
											</div>
										</div>

									</div>


									<!-- Trainner / Class Gender -->
									<div class="row">

										<!-- Class Gender Selection -->
										<div class="col-lg-6">
											<div class="form-group">
												<label>Gender</label>
												<select class="form-control select2" id="gender" name="gender">
													<option value="ALL" selected>MALE & FEMALE</option>
													<option value="MALE">MALE</option>
													<option value="FEMALE">FEMALE</option>
												</select>
											</div>
										</div>

										<!-- MinAge -->
										<div class="col-lg-3">
											<div class="form-group">
												<label>Min Age</label>
												<input type="number" class="form-control" name="min_age" placeholder="Min Age" min="5" autocomplete="off">
											</div>
										</div>

										<!-- MaxAge -->
										<div class="col-lg-3">
											<div class="form-group">
												<label>Max Age</label>
												<input type="number" class="form-control" name="max_age" placeholder="Max Age" autocomplete="off" min="5">
											</div>
										</div>
									</div>

									<!-- Cost / Activation -->
									<div class="row">

										<!-- Cost Information -->
										<div class="col-lg-6">
											<div class="form-group">
												<label for="">Package Price / Month</label>
												<input class="form-control" type="text" name="price" value="" placeholder="Ex 25">
											</div>
										</div>

										<!-- Activate Class -->
										<div class="col-lg-6">
											<div class="form-group">
												<label for="">Discount Margin</label>
												<input class="form-control" type="text" name="discount" value="" placeholder="Ex 10%">
											</div>
										</div>

									</div>

									<!--  -->
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="">Package Display Picture</label>
												<input type="file" name="upload_image" id="upload_image">
												<input type="hidden" class="input_crop_image" name="picture" id="picture">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="">Package Status</label>
												<select class="form-control select2" name="status">
													<option value="Enabled" selected>Enabled</option>
													<option value="Disabled">Disabled</option>
												</select>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="box-footer">
							<input type="submit" name="submit" class="btn btn-primary pull-right" value="Create">
						</div>
					</div>
				</form>
			</div>

			<div class="col-lg-12">
				<form id="form-create-2" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Schedule/store" autcomplete="off">
					<?php echo $this->csrfToken(); ?>
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"> Create Schedule</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-lg-12">
									<div id="errors-create-2">
										<?php echo $this->errors(); ?>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="package_id">Select Package</label>
												<select class="form-control select2" id="package_id" name="package_id">
													<option value="" selected>Belongs To ...</option>
													<?php 
													foreach ($params['packages'] as $package) 
													{
														echo "
														<option value=".ucfirst( $package['id'] ).">".ucfirst( $package['title'] )."</option>
														";
													}
													?>
												</select>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<label for="activity">Activity</label>
												<select class="form-control select2 activity_select" id="activity" name="activity" data-url="<?php echo RUTA_URL; ?>/Clubs/Schedule/findtrainner">
													<option value="" selected disabled="">Select Your Activity</option>
													<option value="TaeKwonDo">TaeKwonDo</option>
													<option value="Karate">Karate</option>
													<option value="Muai Thai">Muai Thai</option>
													<option value="Mix Martial Arts">Mix Martial Arts</option>
													<option value="Swimming">Swimming</option>
													<option value="Soccer (Football)">Soccer (Football)</option>
													<option value="Horse Riding">Horse Riding</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="form-group">
												<label for="trainner_id">Trainner</label>
												<select class="form-control select2" id="trainner_id" name="trainner_id">
													<option value="NULL" selected disabled>Select Your Trainner</option>
													<option value="NULL">Unidentified</option>
												</select>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="bootstrap-timepicker">
												<div class="form-group">
													<label for="start_time">Start Time</label>
													<div class="input-group">
														<input id="start_time" name="start_time"  type="text" class="form-control timepicker" placeholder="Set Class Start Time">
														<div class="input-group-addon">
															<i class="fa fa-clock"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3">
											<div class="bootstrap-timepicker">
												<div class="form-group">
													<label for="end_time">End Time</label>
													<div class="input-group">
														<input id="end_time" name="end_time"  type="text" class="form-control timepicker" placeholder="Set Class Start Time">
														<div class="input-group-addon">
															<i class="fa fa-clock"></i>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="class_timing">Class Timing</label>
												<select class="form-control select2" name="class_timing" id="class_timing">
													<option value="Single Class" selected>Single Class</option>
													<option value="Parallel Classes">Parallel Classes</option>
												</select>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-lg-12">
											<label for="days">Select Days</label>
											<div name="days" class="form-group">
												<div class="col-lg-3">
													<label><input id="days" name="days[]" type="checkbox" value="Saturday" class="minimal-red"> Saturday</label>
												</div>
												<div class="col-lg-3">
													<label><input id="days" name="days[]" type="checkbox" value="Sunday" class="minimal-red"> Sunday</label>
												</div>
												<div class="col-lg-3">
													<label><input id="days" name="days[]" type="checkbox" value="Monday" class="minimal-red"> Monday</label>
												</div>
												<div class="col-lg-3">
													<label><input id="days" name="days[]" type="checkbox" value="Tuesday" class="minimal-red"> Tuesday</label>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-12">
												<div class="col-lg-3">
													<label><input id="days" name="days[]" type="checkbox" value="Wednesday" class="minimal-red"> Wednesday</label>
												</div>
												<div class="col-lg-3">
													<label><input id="days" name="days[]" type="checkbox" value="Thursday" class="minimal-red"> Thursday</label>
												</div>
												<div class="col-lg-3">
													<label><input id="days" name="days[]" type="checkbox" value="Friday" class="minimal-red"> Friday</label>
												</div>
											</div>
										</div>

									</div>

									<!-- Extra Information -->
									<div class="row">
										<div class="col-lg-12">
											<div class="form-group">
												<label for="extra_information">Extra Information</label>
												<textarea class="form-control" rows="3" placeholder="Extra Information For The Class" autocomplete="off" id="extra_information" name="extra_information"></textarea>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
						<div class="box-footer">
							<input type="submit" name="submit" class="btn btn-primary pull-right" value="Create">
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>


</div>





<div id="uploadimageModal" class="modal" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4>Upload and crop photo</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8 text-center">
						<div id="image_crop" style="width: 350px; height: 350px; margin-top: 30px;"></div>
					</div>
					<div class="col-md-4">
						<br>
						<br>
						<br>
						<button class="btn btn-success crop_button" data-action="<?php echo RUTA_URL; ?>/Clubs/Schedule/uploadPhoto">Crop</button>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="close" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm modal-notify" role="document">
		<!--Content-->
		<div class="modal-content text-center">
			<!--Header-->
			<div class="modal-header bg-danger d-flex justify-content-center">
				<p class="heading">Are you sure to eliminate?</p>
			</div>

			<!--Body-->
			<div class="modal-body">

				<i class="fa fa-times fa-4x animated rotateIn"></i>

			</div>

			<!--Footer-->
			<div class="modal-footer flex-center">
				<input type="hidden" id="id-form-delete" name="id-form-delete">
				<a id="btn-form-delete" class="form-delete btn btn-primary">Yes</a>
				<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>
<!--Modal: modalConfirmDelete-->



<!--Modal: modalConfirmDelete2-->
<div class="modal fade" id="modalConfirmDelete2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm modal-notify" role="document">
		<!--Content-->
		<div class="modal-content text-center">
			<!--Header-->
			<div class="modal-header bg-danger d-flex justify-content-center">
				<p class="heading">Are you sure to eliminate?</p>
			</div>

			<!--Body-->
			<div class="modal-body">

				<i class="fa fa-times fa-4x animated rotateIn"></i>

			</div>

			<!--Footer-->
			<div class="modal-footer flex-center">
				<input type="hidden" id="id-form-delete2" name="id-form-delete2">
				<a id="btn-form-delete2" class="form-delete2 btn btn-primary">Yes</a>
				<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
			</div>
		</div>
		<!--/.Content-->
	</div>
</div>
<!--Modal: modalConfirmDelete2-->

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script src="<?php echo RUTA_JS; ?>/crop_image.js" type="text/javascript"></script>
<script src="<?php echo RUTA_JS; ?>/clubs/schedule.js" type="text/javascript"></script>
<script type="text/javascript">
	$('#start_time').timepicker();
	$('#end_time').timepicker();
</script>