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
								echo "
								<li>
								<img src='".RUTA_IMG."/users/".$notattended['photo']."' style='width: 128px; height: 100px;' alt='".ucwords($notattended['name'])."'>
								<span class='users-list-name' href='".RUTA_URL."/Clubs/Schedule/list/".$package['id']."' style='margin-top: 5px;'>".ucwords($notattended['name'])."</span>
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

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script type="text/javascript">
	$(".btn-find").click(function(event) {
		if( $("#date").val() == '' )
		{
			$("#date").focus();
			toastr.error("Please fill in the indicated field.");
			return;
		}

		if( $("#package_id").val() == '' )
		{
			$("#package_id").focus();
			toastr.error("Please fill in the indicated field.");
			return;
		}
		
		window.location = $(this).data('url')+'/'+$("#date").val()+'/'+$("#package_id").val();
	});
</script>