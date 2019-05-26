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
						<h3 class="box-title">Members accepted</h3>
						<div class="box-tools pull-right">
							<a href="<?php echo RUTA_URL; ?>/Clubs/Member/Add" class="btn btn-primary btn-sm">Quick add</a>
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<ul class="users-list clearfix">
							<?php 
							foreach ($params['members_accepted'] as $member_accepted) 
							{
								echo "
								<li>
								<img src='".RUTA_IMG."/users/".$member_accepted['photo']."' style='width: 128px; height: 100px;' alt='Package Image'>
								<a class='users-list-name' href='".RUTA_URL."/Clubs/Member/See/".$member_accepted['slug']."'>".ucwords($member_accepted['name'])."</a>
								<span class='users-list-date' style='font-size: 16px; margin-top: 5px;'>
								<a href='".RUTA_URL."/Clubs/Member/See/".$member_accepted['slug']."' title='Update' style='margin-right: 5px;'>
								<i class='fa fa-edit'></i> See data
								</a>
								</span>
								</li>
								";
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Members blocked</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<ul class="users-list clearfix">
							<?php 
							foreach ($params['members_blocked'] as $member_blocked) 
							{
								echo "
								<li>
								<img src='".RUTA_IMG."/users/".$member_blocked['photo']."' style='width: 128px; height: 100px;' alt='Package Image'>
								<a class='users-list-name' href='".RUTA_URL."/Clubs/Member/See/".$member_blocked['slug']."'>".ucwords($member_blocked['name'])."</a>
								<span class='users-list-date' style='font-size: 16px; margin-top: 5px;'>
								<a href='".RUTA_URL."/Clubs/Member/See/".$member_blocked['slug']."' title='Update' style='margin-right: 5px;'>
								<i class='fa fa-edit'></i> See data
								</a>
								</span>
								</li>
								";
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Members deleted</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<ul class="users-list clearfix">
							<?php 
							foreach ($params['members_delete'] as $members_delete) 
							{
								echo "
								<li>
								<img src='".RUTA_IMG."/users/".$members_delete['photo']."' style='width: 128px; height: 100px;' alt='Package Image'>
								<a class='users-list-name' href='".RUTA_URL."/Clubs/Member/See/".$members_delete['slug']."'>".ucwords($members_delete['name'])."</a>
								<span class='users-list-date' style='font-size: 16px; margin-top: 5px;'>
								<a href='".RUTA_URL."/Clubs/Member/See/".$members_delete['slug']."' title='Update' style='margin-right: 5px;'>
								<i class='fa fa-edit'></i> See data
								</a>
								</span>
								</li>
								";
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Create Package -->
	<section class="col-lg-6">
		<div class="row">

			<div class="col-lg-12">
				<form id="form-sendMail" method="post" action="<?php echo RUTA_URL; ?>/Clubs/Member/sendMail" autcomplete="off">
					<?php echo $this->csrfToken(); ?>
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title"> New member</h3>
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

								</div>
							</div>
						</div>
						<div class="box-footer">
							<input type="submit" name="submit" class="btn btn-primary pull-right" value="Send">
						</div>
					</div>
				</form>
			</div>

			<div class="col-lg-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title"> Requests for members</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
					</div>
					<div class="box-body">
						<ul class="users-list clearfix">
							<?php 
							foreach ($params['members_new'] as $members_new) 
							{
								echo "
								<li>
								<img src='".RUTA_IMG."/users/".$members_new['photo']."' style='width: 128px; height: 100px;' alt='Package Image'>
								<a class='users-list-name' href='".RUTA_URL."/Clubs/Member/See/".$members_new['slug']."'>".ucwords($members_new['name'])."</a>
								<span class='users-list-date' style='font-size: 16px; margin-top: 5px;'>
								<a href='".RUTA_URL."/Clubs/Member/See/".$members_new['slug']."' title='Update' style='margin-right: 5px;'>
								<i class='fa fa-edit'></i> See data
								</a>
								</span>
								</li>
								";
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>


</div>




<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>

<script type="text/javascript">
	$(document).ready(function() {
		
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