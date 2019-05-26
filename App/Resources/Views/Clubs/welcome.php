<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="row">
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>
					<?php 
					if( isset( $params['cant_sales']['cant'] ) )
						if( $params['cant_sales']['cant'] >= 1000 )
							echo ($params['cant_sales']['cant']/1000)."K"; 
						else if( $params['cant_sales']['cant'] >= 1000000 )
							echo ($params['cant_sales']['cant']/1000000)."M"; 
						else
							echo $params['cant_sales']['cant'];
					else
						echo 0;
					?> 
					<sup><small style="color: #fff !important;"><?php echo $params['club']['currency']; ?></small></sup>
				</h3>

				<p><?php echo date('F'); ?> Sales</p>
			</div>
			<div class="icon">
				<i class="fab fa-opencart"></i>
			</div>
			<a href="<?php echo RUTA_URL; ?>/Clubs/Sale" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>
					<?php 
					if( isset( $params['cant_suscriptions']['cant'] ) )
						if( $params['cant_suscriptions']['cant'] >= 1000 )
							echo ($params['cant_suscriptions']['cant']/1000)."K"; 
						else if( $params['cant_suscriptions']['cant'] >= 1000000 )
							echo ($params['cant_suscriptions']['cant']/1000000)."M"; 
						else
							echo $params['cant_suscriptions']['cant'];
					else
						echo 0;
					?> 
					<sup><small style="color: #fff !important;"><?php echo $params['club']['currency']; ?></small></sup></h3>

				<p><?php echo date('F'); ?> Subscriptions</p>
			</div>
			<div class="icon">
				<i class="fas fa-money-bill-wave"></i>
			</div>
			<a href="<?php echo RUTA_URL; ?>/Clubs/Suscription" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3><?php echo $params['cant_new_members']['cant']; ?></h3>

				<p><?php echo date('F'); ?> New Members</p>
			</div>
			<div class="icon">
				<i class="fa fa-user-plus"></i>
			</div>
			<a href="<?php echo RUTA_URL; ?>/Clubs/Member" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3><?php echo $params['cant_attendence']['cant'] .' / '. $params['all_members']['cant'] ; ?></h3>

				<p><?php echo date('d').'<sup>'.date('S').'</sup> '.date('F'); ?> Attendence</p>
			</div>
			<div class="icon">
				<i class="fas fa-clock"></i>
			</div>
			<a href="<?php echo RUTA_URL; ?>/Clubs/Training/List/<?php echo date('Y-m-d'); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-xs-12 ">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Revenue</h3>
			</div>
			<div class="box-body">
				<canvas data-url="<?php echo RUTA_URL; ?>/Clubs/Welcome/salesGraphics" id="myChart" width="100%" height="30"></canvas>
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
				console.log(data);
				data = data.split('-');
				if( data[0] === 'true' )
				{
					var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
					var d = new Date();
					var month = d.getMonth();
					toastr.success("Processed request.");
					var ctx = document.getElementById('myChart');
					var myChart = new Chart(ctx, {
						type: 'line',
						data: {
							labels: months,
							datasets: [
							{
								label: 'Sales',
								data: [ data[1], data[2], data[3], data[4], data[5], data[6], data[7], data[8], data[9], data[10], data[11], data[12] ],
								backgroundColor: [
								'rgba(255, 99, 132, 0.2)',
								],
								borderColor: [
								'rgba(255, 99, 132, 1)',
								],
								borderWidth: 2
							},
							{
								label: 'Suscriptions',
								data: [ data[13], data[14], data[15], data[16], data[17], data[18], data[19], data[20], data[21], data[22], data[23], data[24] ],
								backgroundColor: [
								'rgba(50, 50, 255, 0.2)',
								],
								borderColor: [
								'rgba(50, 50, 255, 1)',
								],
								borderWidth: 2
							},
							]
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
										labelString: 'Current Month ('+months[month]+')'
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
					toastr.error("An error has occurred.");
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