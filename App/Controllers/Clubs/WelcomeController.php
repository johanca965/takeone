<?php

class WelcomeController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 2 );
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->saleModel = $this->model('Sale');
		// importamos el modelo correspondiente
		$this->suscriptionModel = $this->model('Suscription');
		// importamos el modelo correspondiente
		$this->trainingModel = $this->model('Training');
		// importamos el modelo correspondiente
		$this->clubscheduleModel = $this->model('Clubschedule');

	}

	public function index()
	{	
		// obtenemos los datos del club
		$result = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [
			'club' => $result,
			'cant_new_members' => mysqli_fetch_assoc( $this->memberModel->newMembersWithClub( $result['id'] ) ),
			'cant_sales' => mysqli_fetch_assoc( $this->saleModel->salesWithClub( $result['id'] ) ),
			'cant_suscriptions' => mysqli_fetch_assoc( $this->suscriptionModel->suscriptionWithClub( $result['id'] ) ),
			'cant_attendence' => mysqli_fetch_assoc( $this->trainingModel->trainingWithClub( $result['id'], date('Y-m-d') ) ),
			'all_members' => mysqli_fetch_assoc( $this->clubscheduleModel->allMembersWithClubAndDay( $result['id'], date('l') ) ),
			'breadcrumb_data' => '<li class="active">Statistics</li>'
		];
		if( empty($params['all_members']['cant']) )
			$params['all_members']['cant'] = 0;
		$this->view('Clubs/welcome', $params );
	}

	public function salesGraphics()
	{
		// obtenemos los datos del club
		$result = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		echo 'true-'.$this->saleModel->countOfMonthWithCludID( $result['id'] ).'-'.$this->suscriptionModel->countOfMonthWithCludID( $result['id'] );
	}



}