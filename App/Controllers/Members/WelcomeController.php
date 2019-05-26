<?php

class WelcomeController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 1 );
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->trainingModel = $this->model('Training');

	}

	public function index()
	{	
		// buscamos los clubs a los que pertenece el usuario
		$my_clubs = $this->memberModel->findClubsByUserID( $this->Auth()->user()->id() );
		// buscamos los clubs a los que pertenece el usuario
		$record_trainigs = $this->trainingModel->findByUserID( $this->Auth()->user()->id() );
		// creamos el request a pasar
		$params = [
			'clubs' => $my_clubs,
			'record_trainigs' => $record_trainigs
		];
		$this->view('Members/welcome', $params);
	}

	public function trainingGraphics()
	{
		$member = mysqli_fetch_assoc( $this->memberModel->findByUserID( $this->Auth()->user()->id() ) );
		// obtenemos los datos del club
		echo 'true-'.$this->trainingModel->countOfMonthWithUserID( $member['member_id'] );
	}

}