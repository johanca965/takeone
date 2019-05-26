<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Birthday of the <?php echo date('F'); ?></h3>
				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>
			<div class="box-body">
				<!-- Validity Expire Warnning  -->
				<ul class="users-list clearfix">
					<?php 
					foreach ($params['members'] as $members) 
					{
						echo "
						<li>
							<img src='".RUTA_IMG."/users/".$members['photo']."' style='width: 100px; height: 100px;' alt='".ucwords($members['name'])." Image'>
							<span class='users-list-date'>".ucwords($members['name'])."</span>
							</span>
							<span class='users-list-date'>".$this->convertBirthday($members['birthday'])."</span>
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


<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>