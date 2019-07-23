<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php echo APP_NAME; ?> | Panel</title>
	<!-- toastr notifications -->
	<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/mdb.min.css">
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter page. However, you can choose any other skin. Make sure you apply the skin class to the body tag so the changes take effect. -->
	<link rel="icon" type="image/ico" href="<?php echo RUTA_URL; ?>/favicon.ico">
	<link rel="shortcut icon" href="<?php echo RUTA_URL; ?>/favicon.ico">
	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo RUTA_URL; ?>/icons/favicon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo RUTA_URL; ?>/icons/favicon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo RUTA_URL; ?>/icons/favicon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo RUTA_URL; ?>/icons/favicon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo RUTA_URL; ?>/icons/favicon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo RUTA_URL; ?>/icons/favicon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo RUTA_URL; ?>/icons/favicon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo RUTA_URL; ?>/icons/favicon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo RUTA_URL; ?>/icons/favicon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="<?php echo RUTA_URL; ?>/icons/favicon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo RUTA_URL; ?>/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo RUTA_URL; ?>/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo RUTA_URL; ?>/icons/favicon-16x16.png">
	<link rel="manifest" href="<?php echo RUTA_URL; ?>/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo RUTA_URL; ?>/icons/favicon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  	<!--[if lt IE 9]>
  		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  	<![endif]-->

  	<!-- Google Font -->
  	<link rel="stylesheet"href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  	<style type="text/css">
  		hr{
  			border-color: red;
  		}
  	</style>

  </head>
  <body style="background-color: #000;" manifest="manifest.cache">

  	<div class="container" style="min-height: 100vh;">
  		<div class="row justify-content-center p-5">
  			<div class="col-12 white-text text-center">
  				<h3 class="h5 mb-3">Select the account you want to change:</h3>
  			</div>
  			<?php 
  				foreach ($params['users'] as $user) 
  				{
  					echo '
  						<div class="col-12 col-md-6 col-lg-4 p-3">
  							<a href="'.RUTA_URL.'/Members/User/Change-account/'.$user['id'].'">
	  							<!-- Card -->
								<div class="card">
	  								<!-- Card image -->
	  								<div class="view overlay">
	    								<img class="card-img-top img-fluid" src="'.RUTA_IMG.'users/'.$user['photo'].'" alt="Profile image" style="max-height: 250px;">
      									<div class="mask rgba-white-slight"></div>
  									</div>
	  								<!-- Card content -->
	  								<div class="card-body text-center">
	    								<!-- Title -->
	    								<h4 class="card-title black-text">'.ucwords( $user['name'] ).'</h4>
									    <!-- Button -->
									    <a href="'.RUTA_URL.'/Members/User/Change-account/'.$user['id'].'" class="btn btn-outline-danger">Select</a>
	  								</div>
								</div>
							</a>
  						</div>
  					';
  				}
  			?>
  		</div>
  	</div>


  	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/jquery-3.3.1.js"></script>
  	<!-- Bootstrap tooltips -->
  	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/popper.min.js"></script>
  	<!-- Bootstrap core JavaScript -->
  	
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  	<!-- MDB core JavaScript -->
  	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/mdb.min.js"></script>
  	<!-- Your custom js (optional) -->
  	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/script.js"></script>
  	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/inactividad.js"></script>
  </body>
  </html>