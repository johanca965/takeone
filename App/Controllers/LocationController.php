<?php

class LocationController extends Controller
{

	public function __construct()
	{
		// validamos que el rol del usuario sea diferente a cliente
		$this->Auth()->guest();
		// con esto instanciamos el modelo correspondiente
		$this->stateModel = $this->model( 'state' );
		// con esto instanciamos el modelo correspondiente
		$this->cityModel = $this->model( 'city' );
	}

	public function index(){}

	public function states()
	{
		// llamamos la funcion para guardar datos
		$result = $this->stateModel->findList( $_POST['country_id'] );
		$listado = '<option disabled selected="">-- Choose an option --</option>';
		foreach ($result as $state) {
			$listado .= "<option value='".$state['id']."'>".utf8_encode($state['name'])."</option>";
		}
		echo $listado;
	}

	public function cities()
	{
		// llamamos la funcion para guardar datos
		$result = $this->cityModel->findList( $_POST['state_id'] );
		$listado = '<option disabled selected="">-- Choose an option --</option>';
		foreach ($result as $city) {
			$listado .= "<option value='".$city['id']."'>".utf8_encode($city['name'])."</option>";
		}
		echo $listado;
	}

}