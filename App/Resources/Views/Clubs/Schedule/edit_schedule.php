<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<div id="errors-edit">
				<?php echo $this->errors(); ?>
			</div>
			<form id="form-edit" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Schedule/update" autcomplete="off">
				<?php echo $this->csrfToken(); ?>
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title"> Edit Schedule</h3>
						<a href="<?php echo RUTA_URL; ?>/Clubs/Schedule/List" class="pull-right btn btn-primary btn-sm">
							<i class="fa fa-list" style="margin-right: 5px;"></i> List
						</a>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-lg-12">
								<div class="row">
									<input id="id" name="id"  type="hidden" value="<?php echo $params['schedule']['id']; ?>">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="package_id">Select Package</label>
											<select class="form-control select2" id="package_id" name="package_id">
												<option value="">Belongs To ...</option>
												<?php 
													foreach ($params['packages'] as $package) 
													{
														$select = "";
														if( $package['id'] == $params['schedule']['package_id'])
															$select = "selected";
														echo "
														<option ".$select." value=".$package['id'].">".ucfirst( $package['title'] )."</option>
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
												<option value="">Select Your Activity</option>
												<option <?php if( $params['schedule']['activity'] == 'TaeKwonDo' ){ echo "selected"; } ?> value="TaeKwonDo">TaeKwonDo</option>
												<option <?php if( $params['schedule']['activity'] == 'Karate' ){ echo "selected"; } ?> value="Karate">Karate</option>
												<option <?php if( $params['schedule']['activity'] == 'Muai Thai' ){ echo "selected"; } ?> value="Muai Thai">Muai Thai</option>
												<option <?php if( $params['schedule']['activity'] == 'Mix Martial Arts' ){ echo "selected"; } ?> value="Mix Martial Arts">Mix Martial Arts</option>
												<option <?php if( $params['schedule']['activity'] == 'Swimming' ){ echo "selected"; } ?> value="Swimming">Swimming</option>
												<option <?php if( $params['schedule']['activity'] == 'Soccer (Football)' ){ echo "selected"; } ?> value="Soccer (Football)">Soccer (Football)</option>
												<option <?php if( $params['schedule']['activity'] == 'Horse Riding' ){ echo "selected"; } ?> value="Horse Riding">Horse Riding</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="trainner_id">Trainner</label>
											<select class="form-control select2" id="trainner_id" name="trainner_id">
												<?php 
													$this->findtrainnerEdit( $params['schedule']['activity'], $params['schedule']['trainner_id'] )
												?>
											</select>
										</div>
									</div>
									<div class="col-lg-3">
										<div class="bootstrap-timepicker">
											<div class="form-group">
												<label for="start_time">Start Time</label>
												<div class="input-group">
													<input id="start_time" name="start_time"  type="text" class="form-control timepicker" placeholder="Set Class Start Time" value="<?php echo $params['schedule']['start_time']; ?>">
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
													<input id="end_time" name="end_time"  type="text" class="form-control timepicker" placeholder="Set Class Start Time" value="<?php echo $params['schedule']['end_time']; ?>">
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
												<option <?php if( $params['schedule']['class_timing'] == 'Single Class' ){ echo "selected"; } ?> value="Single Class" selected>Single Class</option>
												<option <?php if( $params['schedule']['class_timing'] == 'Parallel Classes' ){ echo "selected"; } ?> value="Parallel Classes">Parallel Classes</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<?php 
										$saturday_sel = ''; $sunday_sel = ''; $monday_sel = ''; $tuesday_sel = ''; $wednesday_sel = ''; $thursday_sel = ''; $friday_sel = '';
										$days = explode(',', $params['schedule']['days']);
										foreach ($days as $day) 
										{
											if( $day == 'Saturday' ) $saturday_sel = 'checked';
											if( $day == 'Sunday' ) $sunday_sel = 'checked';
											if( $day == 'Monday' ) $monday_sel = 'checked';
											if( $day == 'Tuesday' ) $tuesday_sel = 'checked';
											if( $day == 'Wednesday' ) $wednesday_sel = 'checked';
											if( $day == 'Thursday' ) $thursday_sel = 'checked';
											if( $day == 'Friday' ) $friday_sel = 'checked';
										}
									?>
									<div class="col-lg-12">
										<label for="days">Select Days</label>
										<div name="days" class="form-group">
											<div class="col-lg-3">
												<label><input <?php echo $saturday_sel; ?> id="days" name="days[]" type="checkbox" value="Saturday" class="minimal-red"> Saturday</label>
											</div>
											<div class="col-lg-3">
												<label><input <?php echo $sunday_sel; ?> id="days" name="days[]" type="checkbox" value="Sunday" class="minimal-red"> Sunday</label>
											</div>
											<div class="col-lg-3">
												<label><input <?php echo $monday_sel; ?> id="days" name="days[]" type="checkbox" value="Monday" class="minimal-red"> Monday</label>
											</div>
											<div class="col-lg-3">
												<label><input <?php echo $tuesday_sel; ?> id="days" name="days[]" type="checkbox" value="Tuesday" class="minimal-red"> Tuesday</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-lg-12">
											<div class="col-lg-3">
												<label><input <?php echo $wednesday_sel; ?> id="days" name="days[]" type="checkbox" value="Wednesday" class="minimal-red"> Wednesday</label>
											</div>
											<div class="col-lg-3">
												<label><input <?php echo $thursday_sel; ?> id="days" name="days[]" type="checkbox" value="Thursday" class="minimal-red"> Thursday</label>
											</div>
											<div class="col-lg-3">
												<label><input <?php echo $friday_sel; ?> id="days" name="days[]" type="checkbox" value="Friday" class="minimal-red"> Friday</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label for="extra_information">Extra Information</label>
											<textarea class="form-control" rows="3" placeholder="Extra Information For The Class" autocomplete="off" id="extra_information" name="extra_information"><?php echo $params['schedule']['extra_information']; ?></textarea>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="box-footer">
						<input type="submit" name="submit" class="btn btn-primary pull-right" value="Update">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script src="<?php echo RUTA_JS; ?>/clubs/schedule.js" type="text/javascript"></script>
<script type="text/javascript">
	$('#start_time').timepicker();
	$('#end_time').timepicker();
</script>