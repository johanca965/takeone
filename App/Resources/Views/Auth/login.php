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
								<h3 class="raleway-bold red-text h2">Login</h3>
								<h5 class="h6 grey-text">Don't use Takeone yet? <a href="<?php echo RUTA_URL; ?>/Auth/Sign_up" title="Sign up" class="red-text raleway-bold">Join now</a></h5>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="md-form">
									<input type="text" id="username" name="username" class="form-control" title="Email" placeholder="Email">
									<label for="username">Email</label>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="md-form">
									<input type="password" id="password" name="password" class="form-control" title="Password">
									<label for="password">Password</label>
								</div>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-12 col-lg-7 mt-2">
								<a href="<?php echo RUTA_URL; ?>/Auth/Recover" class="raleway-bold red-text btn-outline-red btn w-100">Forgot Password?</a>
							</div>
							<div class="col-12 col-lg-5">
								<div class="text-right mt-2">
									<button id="btn-login" class="btn btn-danger w-100">Login</button>
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