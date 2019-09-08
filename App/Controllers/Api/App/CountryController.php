<?php

class CountryController extends Controller
{

	public function __construct()
	{
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'country' );
	}

	public function index(){
		$this->location('Auth/login');
	}

	public function listing()
	{
		$list = [];
		$countries = $this->countryModel->all();
		foreach ($countries as $country) {
			$list[] = $country;
		}
		echo json_encode( [ 'countries' => $list ] );
	}

}