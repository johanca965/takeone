<?php

class WelcomeController extends Controller
{

	public function __construct()
	{
		$this->Auth()->guest();
		// con esto instanciamos el modelo correspondiente
		$this->userdataModel = $this->model( 'userdata' );
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'country' );
	}

	public function index()
	{	
		$this->Auth();
		// $this->Auth()->logout();
		switch ( $this->Auth()->user()->role() ) {
			case 1:
			$this->location('Members/Welcome');
			break;
			case 2:
			$this->location('Clubs/Welcome');
			break;
			case 3:
			$this->location('Federations/Welcome');
			break;
			case 4:
			$this->location('Administrators/Welcome');
			break;			
			default:
			$this->location('Auth/Login');
			break;
		}
	}

}