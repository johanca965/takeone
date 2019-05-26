<?php 
require_once RUTA_RESOURCES."/Templates/Login/header.php";
?>

<div class="container">
	<div class="row align-items-center justify-content-center my-5">
		<div class="col-12 col-md-10">
			<div class="card">
				<div class="card-body px-5">
					<form method="POST" action="<?php echo RUTA_URL; ?>/auth/register" id="register-form" name="register-form" autocomplete="off">
						<div id="errors-register"></div>
						<div class="row">
							<div class="col-12">
								<h3 class="raleway-bold red-text h2">Sing up</h3>
								<h5 class="h6 grey-text">Are you already part of Takeone? <a href="<?php echo RUTA_URL; ?>/Auth/Login" title="Login" class="red-text raleway-bold">Login</a></h5>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="md-form">
									<input type="text" id="name" name="name" class="form-control" title="Full name" autofocus>
									<label for="name">Full name</label>
								</div>
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
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<select id="country" name="country" class="browser-default form-control">
										<option value="" selected="">-- Select your country --</option>
										<?php foreach ($params['countries'] as $country) {
											// dejamos la variable de selección vacia
											$selected = '';
													// preguntamos si el id de la ciudad es la misma del usuario
											if( $country['id'] == $params['club']['country_id'] )	
												$selected = 'selected';
											echo "
											<option ".$selected." value='".$country['id']."'>".utf8_encode( ucfirst( $country['name'] ) )."</option>
											";
										} ?>
									</select>
								</div>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-12" style="margin-bottom: 10px;">
								<small>By clicking "Sign up", you accept our <a href="<?php echo RUTA_URL; ?>/Auth/Terms-Conditions" target="_new" class="red-text" title="Terms and Conditions">Terms and Conditions</a>.</small>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-12 col-sm-7">
								<a href="<?php echo RUTA_URL; ?>/Auth/Recover" class="raleway-bold red-text btn-outline-red btn w-100">Forgot Password?</a>
							</div>
							<div class="col-12 col-sm-5">
								<div class="text-right">
									<button id="btn-register" class="btn btn-danger w-100">Sign up</button>
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