<?php

class WelcomeController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 4 );
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->userModel = $this->model('User');
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'country' );

	}

	public function index()
	{	
		$params = [
			'clubs_approved' => $this->clubModel->listClubApproved(),
			'clubs_waiting' => $this->clubModel->listClubWaitingApproved(),
		];
		$this->view('Administrators/welcome', $params);
	}

	public function approved()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'id' => 'required',
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// creamos el request con los datos necesarios
		$request = [
			'id' => $_POST['id'],
			'approved' => '2',
			'addedby' => $this->Auth()->user()->id(),
			'updated_at' => date('Y-m-d H:i:s')
		];
		// ejecutamos la petición de seguimiento
		$result = $this->clubModel->update( $request );
		// validamos si existe error
		if( !$result )
		{
			// agregamos el mensaje de error
			array_push( $this->errors, $result );
			// mostramos el mensaje de error
			echo $this->errors();
		}
		else
		{
			$club = mysqli_fetch_assoc( $this->clubModel->find( $_POST['id'] ) );
			// creamos el request con los datos necesarios
			$request = [
				'id' => $club['user_id'],
				'role_id' => '2',
				'updated_at' => date('Y-m-d H:i:s')
			];
			// ejecutamos la petición de seguimiento
			$this->userModel->update( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// función para convertir la fecha en amigable para el usuario
	public function convertDate( $date )
	{
		// explotamos la fecha para separarla
		$fecha = explode( ' ', $date );
		// explotamos la fecha para obtener y, m, d
		$fecha = explode( '-', $fecha[0] );
		// array para mostrar el mes en español
		$meses = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		return $meses[ $fecha[1] - 1 ]. " ".$fecha[2].", ".$fecha[0] ;
	}

}