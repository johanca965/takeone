<?php

class AuthController extends Controller
{

	public function __construct()
	{
		$this->userModel = $this->model('User');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->suscriptionModel = $this->model('Suscription');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->clubpackageModel = $this->model('Clubpackage');
		// importamos el modelo correspondiente
		$this->trainingModel = $this->model('Training');
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'country' );
	}

	public function index(){
		$this->location('Auth/login');
	}

	// funcion para ejecutar el acceso o el logueo
	public function login()
	{
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'username' => 'required',
			'password' => 'required',
		] );
		
		// enviamos peticion al modelo para que inicie la sesion
		$login = $this->Auth()->login( $_POST['username'], $_POST['password'] );
		$login = explode("|", $login);
		// validamos si se logueo o no
		if( $login[0] != 'logueado' )
		{
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo json_encode( [ 'msg' => $login[0] ] );
		}
		else
		{
			// asignamos los valores del usuario a sesionarse
			$user['id'] = $_SESSION['id'];
			$user['_token'] = $_SESSION['_token'];
			$user['name'] = $_SESSION['name'];
			$user['photo'] = $_SESSION['photo'];

			// buscamos los clubs a los que pertenece el miembro
			$clubs_member = $this->memberModel->findByUserID( $user['id'] );
			// recorremos los clubs del miembro
			foreach($clubs_member as $club) 
			{
				// buscamos los datos del club
				$find_club = mysqli_fetch_assoc( $this->clubModel->find( $club['club_id'] ) );
				// buscamos los paquetes del club
				$find_package_club = $this->clubpackageModel->findByCludID( $club['club_id'] );
				// recorremos los datos de cada paquete
				foreach($find_package_club as $item)
				{
					$package['id'] = $item['id'];
					$package['title'] = $item['title'];
					$package['picture'] = $item['slug']."/".$item['picture'];
					// agregamos los datos del paquete a un nuevo multiarray
					$package_club[] =  $package;
				}
				// buscamos el estado de la suscripción
				$suscription = mysqli_fetch_assoc( $this->suscriptionModel->findLastByMemberID( $club['member_id'] ) );
				// asigamos el id del club al que pertenece
				$club_add['id'] = $club['club_id'];
				// asigamos el id del club al que pertenece
				$club_add['title'] = $find_club['title'];
				// agregamos los paquetes del club
				$club_add['packages'] = $package_club;
				// enviamos el estado de la ultima suscripcion
				$club_add['suscription_state'] = $suscription['state'];
				// agregamos el club a un nuevo multiarray
				$clubs[] = $club_add;
				// eliminamos la variable que contiene los paquetes del club
				unset( $package_club );
			}
			// array que contendra los datos del usuario sesionado
			$response = [
				'user' => $user,
				'clubs' => $clubs,
				 'msg' => "successful"
			];
			// retornamos a la vista de acceso cuando se satisfatorio el logueo
			echo json_encode( $response );
		}
	}


	// función para validar la recuperación de contraseña
	public function recover()
	{
		// realizamos la peticion al modelo de cerrar sesion
		$recover = $this->Auth()->recover_password( $_POST['email'] );

		// validamos si se logueo o no
		if( $recover != 'sent' )
		{
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo json_encode( [ 'msg' => $recover ] );
			return;
		}
		else{
			// retornamos a la vista de acceso cuando se satisfatorio el logueo
			echo json_encode( [ 'msg' => "successful" ] );
		}
	}

	

}