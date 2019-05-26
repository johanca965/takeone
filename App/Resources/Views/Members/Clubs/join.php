<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="row" style="justify-content: center; display: flex; margin-top: 2rem;">
	<div class="col-lg-10">
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

				<img src="<?php echo RUTA_IMG; ?>/logotipo.png" class="img-responsive" style="max-height: 70px;" alt="avatar">

			</div>

			<!-- Card content -->
			<div class="card-body">
				<div id="errors-create-invitation">
					<?php echo $this->errors(); ?>
				</div>
				<form id="form-create-invitation" method="post" action="<?php echo RUTA_URL; ?>/Members/Member/store" autcomplete="off">
					<?php echo $this->csrfToken(); ?>
					<div class="row">
						<input type="hidden" class="form-control" name="club_id" id="club_id" value="<?php echo $params['club']['id']; ?>">
						<div class="col-xs-12">
							<h3 style="color: red;">Package selection</h3>
							<hr>
						</div>
						<?php
						$i = 1; 
						foreach ($params['clubpackages'] as $clubpackage) 
						{
							echo '
							<div class="col-xs-6 col-md-4 col-lg-3">
							<div class="form-group">
							<label for="packages_'.$i.'" style="text-align: center; width: 100%; padding:5px; padding-top: 70px; position: relative;">
							<input type="checkbox" data-price="'.$clubpackage['price'].'" id="packages_'.$i.'" name="packages[]" value="'.$clubpackage['id'].'" placeholder="packages" class="item_package" style="display: none;"> 
							<img src="'.RUTA_IMG.'/schedule/'.$clubpackage['slug'].'/'.$clubpackage['picture'].'" width="50" height="50" style="border-radius: 50%; margin-right: 5px; top: 10px; display: block; position: absolute; left: 50%; transform: translate(-50%);">
							<span style="">'.$clubpackage['title'].'</span>
							<p style="font-weight: normal; font-size: 12px; margin: 0;">'.$clubpackage['min_age'].' - '.$clubpackage['max_age'].' years</p>
							<p style="font-weight: normal; font-size: 12px; margin: 0;">$'.$clubpackage['price'].' '.$params['club']['currency'].'</p>
							</label>
							</div>
							</div>
							';
							$i++;
						}
						?>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<input type="hidden" name="total" id="total" value="<?php echo $params['club']['administration_fee']; ?>">
							<h4>Total: <span class="total_show"><?php echo $params['club']['administration_fee']; ?></span> <?php echo $params['club']['currency']; ?></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 text-center">
							<a href="<?php echo RUTA_URL; ?>" style="width: 200px;" class="btn btn-danger">Cancel</a>
							<button type="submit" style="width: 200px;" class="btn btn-primary">Join</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script type="text/javascript">
	$(".item_package").change(function(){
		var total = $("#total").val();
		if( $(this).prop('checked') ) 
		{
			total = parseFloat( $(this).data('price') ) + parseFloat( total );
			$(this).parent('label').css('background-color', '#DFD8D8');
		}else
		{
			total = parseFloat( total ) - parseFloat( $(this).data('price') );
			$(this).parent('label').css('background-color', 'transparent');
		}
		$("#total").val( total );
		$(".total_show").html( total );
	});

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