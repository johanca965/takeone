<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>


<div class="content">
	<div class="row">
		<!-- Club Trainners -->
		<section class="col-lg-6 connectedSortable">

			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Club Trainners</h3>
				</div> <!-- /.box-header -->
				<div class="box-body no-padding">
					<!-- Validity Expire Warnning  -->
					<ul class="users-list clearfix">
						<?php 
						foreach ($params['trainners'] as $trainner) 
						{
							echo "
							<li>
							<img src='".RUTA_IMG."/users/".$trainner['photo']."' style='width: 128px; height: 108px;' alt='User Image'>
							<a class='users-list-name' href='#'>".ucwords($trainner['name'])."</a>
							<span class='users-list-date'>( ".ucwords($trainner['activity'])." )</span>
							<span class='users-list-date'>".ucwords($trainner['status']).", Since ".$this->convertDate($trainner['created_at'])."</span>
							</li>
							";
						}
						?>
					</ul>
				</div>
			</div> <!-- /.box -->

		</section>

		<section class="col-lg-6">
			<div class="row">
				<div class="col-lg-12">
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Trainner</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							</div>
						</div>
						<div class="box-body" style="padding: 2rem;">
							<div id="errors-create-2">
								<?php echo $this->errors(); ?>
							</div>
							<form id="form-create-2" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Trainner/store" autcomplete="off">
								<?php echo $this->csrfToken(); ?>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_id">User (*)</label>
										<select class="browser-default form-control js-example-basic-single" name="user_id" id="user_id">
											<option value="" selected="">-- Choose an option --</option>
											<?php 
											foreach ($params['members'] as $user) 
											{
												echo '
												<option value="'.$user['user_id'].'">'.$user['member'].'</option>
												';
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Activity</label>
										<select class="form-control select2" id="activity" name="activity">
											<option value="">Select Your Activity</option>
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
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label>Salary</label>
										<input type="number" id="salary" name="salary" value="" class="form-control" placeholder="Salary" step="0.01" min="0">
									</div>
								</div>
								<div class="col-md-12">
									<button type="submit" class="btn btn-danger">Create</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				
				<div class="col-lg-12">
					<form id="form-sendMail" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Trainner/sendMail" autcomplete="off">
						<?php echo $this->csrfToken(); ?>
						<div class="box box-success">
							<div class="box-header with-border">
								<h3 class="box-title"> New trainner</h3>
								<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								</div>
							</div>
							<div class="box-body">
								<!-- Activity Information Panel -->
								<div class="row">
									<div class="col-lg-12">
										<div id="errors-sendMail">
											<?php echo $this->errors(); ?>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Name</label>
													<input class="form-control" type="text" name="name" id="name" value="" placeholder="Name" autocomplete="off">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="">E-mail</label>
													<input class="form-control" type="text" name="email" id="email" value="" placeholder="E-mail" autocomplete="off">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-lg-6">
												<div class="form-group">
													<label>Activity</label>
													<select class="form-control select2" id="activity" name="activity">
														<option value="">Select Your Activity</option>
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
											<div class="col-lg-6">
												<div class="form-group">
													<label>Salary</label>
													<input type="number" id="salary" name="salary" value="" class="form-control" placeholder="Salary" step="0.01" min="0">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="box-footer">
								<input type="submit" name="submit" class="btn btn-primary pull-right" value="Send">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
</div>


<?php require_once RUTA_RESOURCES."/Templates/adminlte/footer.php"; ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.js-example-basic-single').select2();


		$("#form-sendMail").submit(function(){
			$("#errors-sendMail").html('');
			var form = $("#form-sendMail");
			var url = form.attr('action');
			$.ajax({
				url: url,
				type: 'POST',
				data: form.serialize(),
				beforeSend: function() {
					toastr.info("Sending invitation...");
				},
				success: function(data) {
					if( data === 'true' )
					{
						toastr.success("Invitation sended.");
						location.reload();
					}else
					{
						toastr.error("An error has occurred.");
						$("#errors-sendMail").append( data );
					}
				},
				error: function(xhr) {
					toastr.error("An error has occurred.");
			    	// console.log(xhr.statusText + xhr.responseText);
			    },
			});
			return false;
		});	
	});
</script>