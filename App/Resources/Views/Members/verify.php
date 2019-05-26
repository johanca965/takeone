<?php 
require_once RUTA_RESOURCES."/Templates/adminlte/header.php";
?>

<?php 
	// vallidamos el tipo de error
	if($params['type'] == 'error') 
	{
		echo '
		<div class="alert alert-warning">
			<strong>Warning!</strong> '.$params['message'].'
		</div>
		';
	}
	else
	{
		echo '
		<div class="alert alert-success">
			<strong>Success!</strong> '.$params['message'].'
		</div>
		';
	}
?>

<?php 
// requiermos la vista del welcome para que cargue la vista principal
require_once RUTA_RESOURCES."/Views/Members/welcome.php";
require_once RUTA_RESOURCES."/Templates/adminlte/footer.php";
?>