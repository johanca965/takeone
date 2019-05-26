<?php

class AuthController extends Controller
{

	public function __construct()
	{
		$this->userModel = $this->model('User');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->trainingModel = $this->model('Training');
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'country' );
	}

	public function index(){
		$this->location('Auth/login');
	}

	public function login()
	{
		 // echo file_get_contents('https://ipapi.co/62.215.48.9/timezone/');exit();
		$this->view('Auth/login');
	}

	public function sign_up(){
		$this->view('Auth/sign_up', ['countries' => $this->countryModel->listSimple()]);
	}

	public function recover(){
		$this->view('Auth/recover');
	}

	public function terms_conditions()
	{
		$this->view('Auth/terms_conditions');
	}

	// funcion para ejecutar el acceso o el logueo
	public function access()
	{
		$this->Auth();
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'username' => 'required',
			'password' => 'required',
		] );

		if( $errors )
		{
			echo $this->errors();
			return;
		}

		// validamos que sea una peticion por post
		$this->methodPost();
		
		// enviamos peticion al modelo para que inicie la sesion
		$login = $this->Auth()->login( $_POST['username'], $_POST['password'] );
		$login = explode("|", $login);
		// validamos si se logueo o no
		if( $login[0] != 'logueado' )
		{
			// agregamos a las variables de error la respuesta del servidor
			array_push($this->errors, $login[0]);
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo $this->errors();
			return;
		}
		// retornamos a la vista de acceso cuando se satisfatorio el logueo
		echo "true|".$login[1];
	}

	// funcion para cerrar sesion
	public function logout()
	{
		$this->Auth();
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$this->Auth()->logout();
		// retornamos a la vista de inicio de sesion
		$this->location('welcome');
	}

	// funcion para cerrar sesion
	public function inactividad_logout()
	{
		$this->Auth();
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$this->Auth()->logout();
		// retornamos a la vista de inicio de sesion
		echo "true";
	}

	// funcion para registrar un usuario
	public function register()
	{
		$this->Auth();
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'name' => 'required',
			'username' => 'required|unique:users',
			'password' => 'required',
			'country' => 'required'
		] );

		if( $errors )
		{
			echo $this->errors();
			return;
		}
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$login = $this->Auth()->register( $_POST['name'], $_POST['username'], $_POST['password'], 'avatar.png', $_POST['country'] );
		$login = explode("|", $login);
		// validamos si se logueo o no
		if( $login[0] != 'logueado' )
		{
			// agregamos a las variables de error la respuesta del servidor
			array_push($this->errors, $login[0]);
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo $this->errors();
			return;
		}
		// enviamos correo de verificacion
		$this->sendMailVerify();
		// retornamos a la vista de acceso cuando se satisfatorio el logueo
		echo "true|".$login[1];
	}

	// función para validar la recuperación de contraseña
	public function recover_validation()
	{
		$this->Auth();
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'email' => 'required|email',
		] );

		if( $errors )
		{
			echo $this->errors();
			return;
		}
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$recover = $this->Auth()->recover_password( $_POST['email'] );

		// validamos si se logueo o no
		if( $recover != 'sent' )
		{
			// agregamos a las variables de error la respuesta del servidor
			array_push($this->errors, $recover);
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo $this->errors();
			return;
		}
		else{
			// retornamos a la vista de acceso cuando se satisfatorio el logueo
			echo 'true';
		}
	}

	// función para verificar la cuenta de un usuario
	public function verify( $_token, $user_id, $date )
	{
		// request a enviar
		$request = [
			'id' => $user_id,
			'email_verified_at' => date('Y-m-d H:i:s')
		];
		// realizamos la petición de registro
		$result = $this->userModel->verified( $request );
		// validamos si existe error
		if( !$result )
		{
			// creamos array con mensaje de error
			$msg = [
				'type' => 'error',
				'message' => $result
				];
			}
		else
		{
			// creamos array con mensaje de éxito
			$msg = [
				'type' => 'success',
				'message' => 'Your account has been verified successfully.'
			];
		}

		// buscamos los clubs a los que pertenece el usuario
		$my_clubs = $this->memberModel->findByUserID( $this->Auth()->user()->id() );
		// buscamos los clubs a los que pertenece el usuario
		$record_trainigs = $this->trainingModel->findByUserID( $this->Auth()->user()->id() );
		// creamos el request a pasar
		$params = [
			'clubs' => $my_clubs,
			'record_trainigs' => $record_trainigs,
			'type' => $msg['type'],
			'message' => $msg['message'],
		];
		
		if( !$this->Auth()->check() )		
			$this->view('Auth/verify', $params);
		else
		{
			// validamos el tipo de rol para ser redireccionado
			switch ( $this->Auth()->user()->role() ) {
				case 1:
				$this->view('Members/verify', $params);
				break;
				case 2:
				$this->view('Clubs/verify', $params);
				break;
				case 3:
				$this->view('Federations/verify', $params);
				break;			
				default:
				$this->view('Administrators/verify', $params);
				break;
			}
		}
	}

	// función para solicitar nuevo correo de verificación
	public function newSendMailVerify()
	{
		// llamamos a la función que envia el nuevo correo
		if( $this->sendMailVerify() )
			echo "true";
		else
			echo "false";
	}

	// función para enviar correo de verificación
	private function sendMailVerify()
	{
		require_once RUTA_APP."/Traits/SendMailTrait.php";
		require_once RUTA_APP."/Helpers/EmailTemplates/EmailverifyTemplate.php";
		$template = EmailverifyTemplate::template( $_SESSION['_token'], $_SESSION['id'] );
		return SendMailTrait::send( SMTP_ADDRESS, APP_NAME, $template, 'Verification mail', $_SESSION['username'], "Verification mail" );
	}

}