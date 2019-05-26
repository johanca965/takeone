<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="container-fluid" style="padding-top: 2rem;">
	<div class="row">
		<div class="col-12 col-md-6">
			<div class="box box-danger direct-chat">
				<div class="box-header with-border">
					<h3 class="box-title text-red">My clubs</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="list-content-welcome">
						<?php if( $params['clubs']->num_rows < 1 ){ ?>
							<div class="empty-list-content-welcome">
								<div class="">
									<h1 class="text-center">
										<i class="fa fa-vihara fa-3x"></i>
									</h1>
									<h3 class="text-center" style="padding: 1rem;">You are not a member of a club yet. <a href="<?php echo RUTA_URL; ?>/Members/Club/" title="¡Join one now!">¡Join one now!</a></h3>
								</div>
							</div>
						<?php 
							}else{
								foreach ($params['clubs'] as $club) 
								{
						?>
									<a href="<?php echo RUTA_URL.'/Members/Club/Information/'.$club['slug']; ?>" class="item-list-content-welcome">
										<h3>
											<img src="<?php echo RUTA_IMG.'/clubs/'.$club['slug'].'/'.$club['logo']; ?>" class="item-image" alt="User Image">
											<?php echo $club['club']; ?>
										</h3>
										<h6>
											<strong>Owner:</strong> <?php echo ucwords( $club['owner'] ); ?> - 
											<strong>Member from:</strong> 
											<?php
		                                    //  we get the registration date and we convert it to the whole
											$date_as_integer = strtotime( $club['created_at'] );
		                                    // we get the month
											$month = date("M", $date_as_integer);
		                                    // we get the year
											$year = date("Y", $date_as_integer);
		                                    // we show the data
											echo $month.'. '.$year;
											?>
											- <strong>Accepted:</strong> 
											<?php 
												if( $club['accepted'] == 1 )
													echo 'On hold';
												else if( $club['accepted'] == 3 )
													echo 'Rejected';
												else
												{
													echo 'Member - <strong>State:</strong> ';
													if( $club['active'] == 1 )
														echo 'Inactive';
													else
														echo 'Active';
												}

											?>
										</h6>
									</a>
						<?php 
								}
							} 
						?>			
					</div>			
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="box box-danger direct-chat">
				<div class="box-header with-border">
					<h3 class="box-title text-red">Training history</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="list-content-welcome">
						<?php if( $params['record_trainigs']->num_rows < 1 ){ ?>
							<div class="empty-list-content-welcome">
								<div class="">
									<h1 class="text-center">
										<i class="fa fa-dumbbell fa-3x"></i>
									</h1>
									<h3 class="text-center" style="padding: 1rem;">No data has been found.</h3>
								</div>
							</div>
						<?php 
							}else{
						?>
							<canvas data-url="<?php echo RUTA_URL; ?>/Members/Welcome/trainingGraphics" id="myChart" width="100%" height="65"></canvas>
						<?php
							} 
						?>			
					</div>			
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script>
	$(document).ready(function() {
		var url = $('#myChart').data('url');
		$.ajax({
			url: url,
			type: 'POST',
			beforeSend: function() {
				toastr.info("Processing request...");
			},
			success: function(data) {
				data = data.split('-');
				if( data[0] === 'true' )
				{
					toastr.success("Processed request.");
					var ctx = document.getElementById('myChart');
					var myChart = new Chart(ctx, {
						type: 'line',
						data: {
							labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
							datasets: [{
								label: 'All',
								data: [ data[1], data[2], data[3], data[4], data[5], data[6], data[7], data[8], data[9], data[10], data[11], data[12] ],
								backgroundColor: [
								'rgba(255, 99, 132, 0.2)',
								],
								borderColor: [
								'rgba(255, 99, 132, 1)',
								],
								borderWidth: 2
							}]
						},
						options: {
							responsive: true,
							tooltips: {
								mode: 'index',
								intersect: false,
							},
							hover: {
								mode: 'nearest',
								intersect: true
							},
							scales: {
								xAxes: [{
									display: true,
									scaleLabel: {
										display: true,
										labelString: 'Month'
									}
								}],
								yAxes: [{
									display: true,
									scaleLabel: {
										display: true,
										labelString: 'Value'
									}
								}]
							}
						}
					});
				}else
				{
					toastr.error("Not found results.");
					// console.log(data[0]);
				}
			},
			error: function(xhr) { // if error occured
				toastr.error("An error has occurred.");
			    // console.log(xhr.statusText + xhr.responseText);
			},
		});
		return false;
	});
</script>