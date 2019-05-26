<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="id=edge">
	<title><?php echo APP_NAME; ?></title>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/bootstrap.min.css">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/mdb.min.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/fonts.css">
	<!-- Your custom styles (optional) -->
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_CSS; ?>/login.css">
	<!-- etiquetas seo -->
	<meta http-equiv="content-language" content="es-co">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="geography" content="Bucaramanga, Santander, Colombia">
	<meta name="city" content="Bucaramanga, Santander, Colombia,">
	<meta name="country" content="colombia,">
	<meta name="language" content="spanish">
	<meta http-equiv="expires" content="never">
	<meta name="copyright" content="2018 Hyperlink Soluciones Empresariales - www.hyperlinkse.com">
	<meta name="designer" content="Hyperlink Soluciones Empresariales - www.hyperlinkse.com">
	<meta name="author" content="Hyperlink Soluciones Empresariales - www.hyperlinkse.com">
	<meta name="publisher" content="Hyperlink Soluciones Empresariales - www.hyperlinkse.com">
	<meta name="revisit-after" content="1 days">
	<meta name="distribution" content="global">
	<meta name="robots" content="Index, Follow">
	<meta property="og:url" content="" />
	<meta property="og:title" content="" />
	<meta property="og:description" content="" />
	<meta property="og:type" content="website" />
	<meta property="fb:app_id" content="">
	<meta property="og:locale" content="co_ES">
	<meta property="og:image" content="" />
	<meta property="og:image:url" content="" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="1200" />
	<meta property="og:image:height" content="630" />
	<meta property="og:image:alt" content="" />
	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="">
	<meta name="twitter:creator" content="">
	<meta name="twitter:title" content="">
	<meta name="twitter:description" content="">
	<meta name="twitter:image" content="">
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
</head>
<body manifest="manifest.cache" class="grey lighten-3">


	<div class="container">
		<div class="row align-items-center justify-content-center my-5">
			<div class="col-12 col-md-10">
				<div class="card">
					<div class="card-header red">
						<div class="row my-4 justify-content-between align-items-center">
							<div class="col-12 col-md-6 text-center text-md-left">
								<h3 class="raleway-bold white-text h2">Terms and Conditions</h3>
							</div>
							<div class="col-md-6 text-right d-none d-md-block">
								<img src="<?php echo RUTA_IMG; ?>/logotipo.png" class="img-fluid" style="max-width: 220px;">
							</div>
						</div>
					</div>
					<div class="card-body px-5">
						<form method="POST" action="<?php echo RUTA_URL; ?>/auth/access" id="login-form" name="login-form" autocomplete="off">
							<div id="errors-login"></div>
							<div class="row">
								<div class="col-12">
									<p>This set of terms and conditions are to be applied on a new <font class="red-text">member</font> to join TAKEONE platform as member</p>
									<ul style="list-style: none;">
										<li class="mt-2 text-justify">
											1.	User should provide real and accurate information (otherwise will be stopped and banned)
											<ul style="list-style: none;">
												<li class="mt-1">a.	Name</li>
												<li class="mt-1">b.	Address</li>
											</ul>
										</li>
										<li class="mt-2 text-justify">
											2.	Two level verification to avoid scams
											<ul style="list-style: none;">
												<li class="mt-1">a.	Through Email</li>
												<li class="mt-1">b.	Through Phone Via SMS</li>
											</ul>
										</li>
										<li class="mt-2 text-justify">
											3.	User profile picture are strictly take into consideration, user should only upload his personal picture (otherwise will be supervised and verified by takeone team).
										</li>
										<li class="mt-2 text-justify">
											4.	Some details like ID or passport number are required only as soon as you join any club on takeone platform and will be verified by club owner or staff.
										</li>
										<li class="mt-2 text-justify">
											5.	Any fake identity or data or disturbing content will be sent a warning and will be banned if not promptly responded to and may require a formal letter of apology to the offended users on the platform.
										</li>
										<li class="mt-2 text-justify">
											6.	Our policy forbids posting, sharing media or materials with wrong information or contents that has things to do with
											<ul style="list-style: none;">
												<li class="mt-1">a.	Politics</li>
												<li class="mt-1">b.	Religion</li>
												<li class="mt-1">c.	Rasizam</li>
												<li class="mt-1">d.	Pornography</li>
											</ul>
											Offenders will be warned and banned from using the platform.
										</li>
										<li class="mt-2 text-justify">
											7.	Item sold in takeone online store are returnable within 1 week but under certain conditions
											<ul style="list-style: none;">
												<li class="mt-1">a.	As good as new.</li>
												<li class="mt-1">b.	Undamaged and in resalable condition.</li>
												<li class="mt-1">c.	It should be given bac with the receipt and original packing of the item.</li>
											</ul>
										</li>
									</ul>
									<p class="text-justify">These are all of the terms and conditions of being a valuable member of takeone platform with you and enjoyable experience and hope takeone platform helps you accelerate towards achieving your goals, finally thank you and welcome on behalf of takeone team.</p>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/jquery-3.3.1.js"></script>
	<!-- Bootstrap tooltips -->
	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/popper.min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/mdb.min.js"></script>
	<!-- Your custom js (optional) -->
	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/script.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/login.js"></script>
	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/inactividad.js"></script>
	<script>
		new WOW().init();
	</script>
</body>
</html>