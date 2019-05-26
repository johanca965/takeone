<?php 
require_once RUTA_RESOURCES."/Templates/Login/header.php";
?>

<div class="container">
	<div class="row align-items-center justify-content-center my-5">
		<div class="col-12 col-md-10">
			<div class="card">
				<div class="card-body px-5">
					<form method="POST" action="<?php echo RUTA_URL; ?>/auth/recover_validation" id="recover-form" name="recover-form">
						<div id="errors-recover"></div>
						<div class="row my-4">
							<div class="col-12">
								<h3 class="raleway-bold red-text h2">Recover my password</h3>
								<h5 class="h6 grey-text">Are you already part of Takeone? <a href="<?php echo RUTA_URL; ?>/Auth/Login" title="Login" class="red-text raleway-bold">Login</a></h5>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-12">
								<h5 class="h6 text-justify recover-description">Enter the email linked to your account to send you your new password:</h5>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="md-form">
									<input type="email" id="email" name="email" class="form-control" title="Email" placeholder="Email">
									<label for="username">Email</label>
								</div>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-7 col-sm-6 mt-2">
								<a href="<?php echo RUTA_URL; ?>/Auth/Sign_up" class="raleway-bold btn-outline-red btn red-text">Sign up</a>
							</div>
							<div class="col-5 col-sm-6">
								<div class="text-right mt-2">
									<button id="btn-recover" class="btn btn-danger">Recover</button>
								</div>
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