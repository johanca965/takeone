<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<div class="container-fluid">
	<div class="row">
		<?php
			if( $params['cant'] > 0 )
			{
				foreach ($params['list'] as $club) 
				{
					echo '
						<div class="col-12 col-sm-6 col-lg-4">
							<div class="card">
								<div class="card-header">
									<img src="'.RUTA_IMG.'/clubs/'.$club['slug'].'/'.$club['logo'].'" class="img-responsive">
								</div>
								<div class="card-body">
									<h4 class="text-center">'.ucwords( $club['title'] ).'</h4>
									<p><strong>Owner:</strong> '.ucwords( $club['owner'] ).'</p>
									<p><strong>Location:</strong> '.ucwords( utf8_encode($club['city']) ).', '.ucwords( $club['country'] ).'</p>
									<p><strong>Estableshid:</strong> '.$this->convertDate( $club['established'] ).'</p>
									<p><strong>Members:</strong> '.$this->cantMembers( $club['id'] ).'</p>
									<p class="text-center"><a href="'.RUTA_URL.'/Members/Club/Information/'.$club['slug'].'" title="See club information">See club information</a></p>
									<p class="links">
										'.$this->validateFollow( $club['id'] ).'
										'.$this->validateMember( $club['id'] ).'
									</p>
								</div>
							</div>
						</div>
					';
				}

				echo $params['render'];
			}
			else
			{
				echo '
						<div class="col-12">
							<div class="card">
								<div class="card-body text-center">
									<h1 class="text-danger"><i class="fa fa-vihara fa-4x"></i></h1>
									<h3 class="mt-4">UPS! We have not found registered clubs, try it later.</h3>
									<a href="'.RUTA_URL.'/Members/Club/Found" class="btn btn-outline-danger w-200">Found my club</a>
								</div>
							</div>
						</div>
					';
			}
		?>
	</div>
</div>

<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>
<script src="<?php echo RUTA_JS; ?>/members/clubs.js"></script>