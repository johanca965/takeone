<?php 
require_once RUTA_RESOURCES."/Templates/Login/header.php";
?>


<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/intlTelInput.min.css">


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
						<div class="row mb-4">
							<div class="col-6">
								<a href="" class="btn btn-block btn-primary show_input_email">E-mail</a>
							</div>
							<div class="col-6">
								<a href="" class="btn btn-block btn-primary show_input_country">Telephone</a>
							</div>
						</div>
						<div class="row input_email">
							<div class="col-12">
								<div class="md-form my-2">
									<input type="text" id="username" name="username" class="form-control" title="Email" placeholder="Email">
								</div>
							</div>
						</div>
						<div class="row input_country" style="display: none;">
							<div class="col-12">
								<div class="md-form my-2">
									<input type="text" name="telephone" id="telephone"  class="form-control" style="width: calc(100% - 55px)" value="+973-">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-12">
								<div class="md-form my-2">
									<input type="password" id="password" name="password" class="form-control" title="Password" placeholder="Password">
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



<?php require_once RUTA_RESOURCES."/Templates/Login/footer.php"; ?>

<script src="<?php echo RUTA_JS; ?>/tel-input/intlTelInput.min.js" type="text/javascript"></script>
<script src="<?php echo RUTA_JS; ?>/tel-input/script.js" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".show_input_email").click(function(){
			$(".input_email").slideDown('slow');
			$(".input_country").slideUp('slow');
			$(".input_country input").val('');
			return false;
		});
		$(".show_input_country").click(function(){
			$(".input_email").slideUp('slow');
			$(".input_email input").val('');
			$(".input_country").slideDown('slow');
			return false;
		});
	});

	var input = document.querySelector("#telephone");
	var ruta_url = document.querySelector("#ruta_url").value;
    window.intlTelInput(input, {
    	utilsScript: ruta_url+"/js/tel-input/utils.js",
    	preferredCountries : ["bh", "us",  "co"]
    });	
</script>