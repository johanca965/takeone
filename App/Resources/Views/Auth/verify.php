<?php 
require_once RUTA_RESOURCES."/Templates/Login/header.php";
?>

<div class="container">
	<div class="row align-items-center justify-content-center my-5">
		<div class="col-12 col-md-10">
			<div class="card">
				<div class="card-body px-5">
					<form method="POST" action="<?php echo RUTA_URL; ?>/auth/access" id="login-form" name="login-form" autocomplete="off">
						<div id="errors-login"></div>
						<div class="row my-4">
							<div class="col-12">
								<?php 
	// vallidamos el tipo de error
	if($params['type'] == 'error') 
	{
		echo '
		<div class="alert alert-warning">
			<strong>Warning!</strong> '.$params['message'].'
		</div>
		';
	}
	else
	{
		echo '
		<div class="alert alert-success">
			<strong>Success!</strong> '.$params['message'].'
		</div>
		';
	}
?>
								<h5 class="h6 grey-text"><a href="<?php echo RUTA_URL; ?>/Auth/Sign_up" title="Sign up" class="btn btn-sm btn-danger white-text raleway-bold">Login now</a></h5>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



<?php
require_once RUTA_RESOURCES."/Templates/Login/footer.php";
?>