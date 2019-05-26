<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title><?php echo APP_NAME; ?> | Panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- toastr notifications -->
	<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/toastr.css">
	<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/style.css">
	<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/members.css">
	<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/croppie.css">
	<!-- AdminLTE Skins. We have chosen the skin-blue for this starter page. However, you can choose any other skin. Make sure you apply the skin class to the body tag so the changes take effect. -->
	<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>/adminlte/skins/skin-red.min.css">
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
  <body style="background-color: #F1EFEF;" manifest="manifest.cache">


  	<div class="container">
  		<div class="row" style="justify-content: center; display: flex; margin-top: 5rem;">
  			<div class="col-12 col-lg-10">
  				<!-- Card -->
  				<div class="card promoting-card">
  					<!-- Card content -->
  					<div class="card-body" style="display: flex; background-color: #DF3939; justify-content: space-between;">
  						<!-- Avatar -->
  						<div style="display: flex; align-items: center;">
  							<img src="<?php echo RUTA_IMG; ?>/clubs/<?php echo $params['club']['slug']; ?>/<?php echo $params['club']['logo']; ?>" class="img-fluid" style="max-height: 100px; border-radius: 50%; margin-right: 1.2rem;" alt="avatar">
  							<div style="color: white;">
  								<h3><?php echo ucwords($params['club']['title']); ?></h3>
  								<small style="font-family: Arial; letter-spacing: 1px; margin-right: 1.2rem;">
  									<i class="fa fa-phone"></i>
  									<?php 
  									echo '(+'.$params['country']['phonecode'].') '.$params['club']['phone']; 
  									?>
  								</small>
  								<small style="font-family: Arial; letter-spacing: 1px; text-transform: lowercase;">
  									<i class="fa fa-map"></i>
  									<?php 
  									echo $params['club']['city'].', '.$params['country']['name']; 
  									?>
  								</small>
  							</div>
  						</div>

  						<img src="<?php echo RUTA_IMG; ?>/logotipo.png" class="img-responsive hidden-xs hidden-sm" style="max-height: 70px;" alt="avatar">

  					</div>

  					<!-- Card content -->
  					<div class="card-body" style="padding: 20px;">
  						<div id="errors-create-invitation">
  							<?php echo $this->errors(); ?>
  						</div>
  						<form id="form-create-invitation" method="post" action="<?php echo RUTA_URL; ?>/Invitation/store-trainner" autcomplete="off">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p style=" font-size: 18px; line-height: 26px; text-align: justify;">You have been selected by the <i><?php echo ucwords($params['club']['title']); ?></i> club to be part of your team as an <i><?php echo ucwords($params['activity']); ?></i> trainner with a salary of <i><?php echo ucwords($params['salary']." ".$params['current']); ?></i>, if you wish to accept the invitation please complete the following form, otherwise you can close the window or click on the button cancel.</p>
                                </div>
                            </div>
  							<div class="row">
  								<div class="col-lg-12">
  									<h3 style="color: red;">Account information</h3>
  									<hr>
  								</div>
  								<div class="col-12 col-md-6">
  									<input type="hidden" class="form-control" name="club_id" id="club_id" value="<?php echo $params['club']['id']; ?>">
                                    <input type="hidden" class="form-control" name="activity" id="activity" value="<?php echo $params['activity']; ?>">
                                    <input type="hidden" class="form-control" name="salary" id="salary" value="<?php echo $params['salary']; ?>">
  									<div class="form-group">
  										<label for="Name">Name (*)</label>
  										<input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
  									</div>
  								</div>
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="username">Email (*)</label>
  										<input type="text" class="form-control validate_crop_image" id="username" name="username" placeholder="Email" value="" required>
  									</div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="password">Password (*)</label>
  										<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  									</div>
  								</div>					
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="upload_photo">Photo(*)</label>
  										<input type="file" name="upload_image" id="upload_image" required>
  										<input type="hidden" class="input_crop_image" name="photo" id="photo" required>
  									</div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-lg-12">
  									<h3 style="color: red;">Personal information</h3>
  									<hr>
  								</div>
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="country">Country (*)</label>
  										<select id="country" name="country" class="browser-default form-control" data-url="<?php echo RUTA_URL; ?>/Location/states/" required>
  											<option value="" selected="">-- Choose an option --</option>
  											<?php foreach ($params['countries'] as $country) {
  												echo "
  												<option value='".$country['id']."'>".utf8_encode( ucfirst( $country['name'] ) )."</option>
  												";
  											} ?>
  										</select>
  									</div>
  								</div>
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="city">City (*)</label>
  										<input type="text" class="form-control validate_crop_image" id="city" name="city" placeholder="City" value="" required>
  									</div>
  								</div>	
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="address">Address</label>
  										<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="">
  									</div>
  								</div>	  								
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="birthday">Date of birth</label>
  										<input type="date" class="form-control" id="birthday" name="birthday">
  									</div>
  								</div>	 												
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="gender">Gender</label>
  										<select id="gender" name="gender" class="browser-default form-control" >
  											<option value="" selected>-- Select a gender --</option>
  											<option value="male">Male</option>
  											<option value="female">Female</option>
  											<option value="other">Other</option>
  										</select>
  									</div>
  								</div>
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="marital">Marital status</label>
  										<select id="marital" name="marital" class="browser-default form-control" >
  											<option value="" >-- Select a marital status --</option>
  											<option value="single">Single</option>
  											<option value="married">Married</option>
  											<option value="seperated">Seperated</option>
  											<option value="divorced">Divorced</option>
  											<option value="widowed">Widowed</option>
  											<option <value="other">Other</option>
  										</select>
  									</div>
  								</div>
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="bloodtype">Blood type</label>
  										<select id="bloodtype" name="bloodtype" class="browser-default form-control" >
  											<option value="" >-- Select a blood type --</option>
  											<option value="i don't know">I Don't Know</option>
  											<option value="A+">A+</option>
  											<option value="B+">B+</option>
  											<option value="AB+">AB+</option>
  											<option value="O+">O+</option>
  											<option value="A-">A-</option>
  											<option value="B-">B-</option>
  											<option value="AB-">AB-</option>
  											<option value="O-">O-</option>
  										</select>
  									</div>
  								</div>
  								<div class="col-12 col-md-6">
  									<div class="form-group">
  										<label for="mobile">Mobile</label>
  										<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" value="">
  									</div>
  								</div>
  								<div class="col-12 col-md-12">
  									<div class="form-group">
  										<label for="social_link">Social link</label>
  										<input type="text" class="form-control" id="social_link" name="social_link" placeholder="Social link" value="">
  									</div>
  								</div>
  							</div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3 style="color: red;">Health condition information</h3>
                                    <hr>
                                </div>
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="helth_issues">
                                            <input type="checkbox" id="helth_issues" name="helth_issues[]" value="injuries" placeholder="Health issues"> Injuries
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="helth_issues_2">
                                            <input type="checkbox" id="helth_issues_2" name="helth_issues[]" value="chest pain" placeholder="Health issues"> Chest pain
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="helth_issues_3">
                                            <input type="checkbox" id="helth_issues_3" name="helth_issues[]" value="anemia" placeholder="Health issues"> Anemia
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="helth_issues_4">
                                            <input type="checkbox" id="helth_issues_4" name="helth_issues[]" value="bone fractures" placeholder="Health issues"> Bone fractures
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="helth_issues_5">
                                            <input type="checkbox" id="helth_issues_5" name="helth_issues[]" value="heart disease" placeholder="Health issues"> Heart disease
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <label for="helth_issues_6">
                                            <input type="checkbox" id="helth_issues_6" name="helth_issues[]" value="back bone pain" placeholder="Health issues"> Back bone pain
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="helth_issues" name="helth_issues[]" placeholder="Others">
                                    </div>
                                </div>
                            </div>
  							<div class="row">
  								<div class="col-12 text-center">
  									<a href="<?php echo RUTA_URL; ?>" style="width: 200px;" class="btn btn-danger">Cancel</a>
  									<button type="submit" style="width: 200px;" class="btn btn-primary">Finish</button>
  								</div>
  							</div>
  						</form>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>


  	<div id="uploadimageModal" class="modal" role="dialog">
  		<div class="modal-dialog">
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4>Upload and crop photo</h4>
  				</div>
  				<div class="modal-body">
  					<div class="row">
  						<div class="col-md-8 text-center">
  							<div id="image_crop" style="width: 350px; height: 350px; margin-top: 30px;"></div>
  						</div>
  						<div class="col-md-4">
  							<br>
  							<br>
  							<br>
  							<button class="btn btn-success crop_button" data-action="<?php echo RUTA_URL; ?>/Invitation/uploadPhoto">Crop</button>
  						</div>
  					</div>
  				</div>
  				<div class="modal-footer">
  					<button type="button" class="close" data-dismiss="modal">Close</button>
  				</div>
  			</div>
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
  	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/croppie.js"></script>
  	<script type="text/javascript" src="<?php echo RUTA_JS; ?>/crop_image.js"></script>
  	<script>
  		new WOW().init();

        $(document).ready(function() {
        	$("#form-create-invitation").submit(function(){
				$("#errors-create-invitation").html('');
				var form = $("#form-create-invitation");
				var url = form.attr('action');
				$.ajax({
					url: url,
					type: 'POST',
					data: form.serialize(),
					beforeSend: function() {
						toastr.info("Creating record...");
					},
					success: function(data) {
						data = data.split("|");
						if( data[0] === 'true' )
						{
							toastr.success("Successful registration.");
							window.location = data[1];
						}else
						{
							toastr.error("An error has occurred.");
							$("#errors-create-invitation").append( data[0] );
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
  </body>
  </html>