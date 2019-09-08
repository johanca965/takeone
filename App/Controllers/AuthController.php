<?php

require_once RUTA_APP."/Traits/NexmoTrait.php";

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
		$this->view('Auth/login', ['countries_phonecode' => $this->countryModel->all()]);
	}

	public function sign_up(){
		$this->view('Auth/sign_up', ['countries' => $this->countryModel->listSimple(), 'countries_phonecode' => $this->countryModel->all()]);
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
		// validamos que sea una peticion por post
		$this->methodPost();
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'password' => 'required',
		] );
		// validamos si no ingreso ningún valor para iniciar sesión
		if( empty( $_POST['username'] ) && empty( $_POST['telephone'] ) )
		{
			// agregamos a las variables de error la respuesta del servidor
			array_push($this->errors, "Please enter an email or telephone.");
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo $this->errors();
			return;
		}

		if( $errors )
		{
			echo $this->errors();
			return;
		}
		// validamos si el email esta vacio o no existe
		if( !isset( $_POST['username'] ) or empty( $_POST['username'] ) )
		{
			// asignamos el valor del telefono al username 
			$_POST['username'] = $_POST['telephone'];
			// buscamos si existe el "-" en la busqueda
			$valide_guion = strpos($_POST['username'], "-");
			// validamos que no exista
			if( !$valide_guion )
			{
				// agregamos a las variables de error la respuesta del servidor
				array_push($this->errors, "Please do not delete the '-' character from the phone number.");
				// agregamos los errores obtenidos desde la peticion hecha al model
				echo $this->errors();
				return;
			}
		}
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
		// validamos que sea una peticion por post
		$this->methodPost();
		// conjunto de validaciones a realizar
		$validations = [
			'name' => 'required',
			'password' => 'required',
			'country' => 'required'
		];
		// validamos si no ingreso ningún valor para iniciar sesión
		if( empty( $_POST['username'] ) && empty( $_POST['telephone'] ) )
		{
			// agregamos a las variables de error la respuesta del servidor
			array_push($this->errors, "Please enter an email or telephone.");
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo $this->errors();
			return;
		}
		// validamos si el usuario es un número de teléfono
		if( is_numeric( $_POST['username'] ) )
		{
			// creamos las validaciones correspondientes
			$validations['telephone'] = 'unique:users';
			// buscamos si existe el "-" en la busqueda
			$valide_guion = strpos($_POST['telephone'], "-");
			// validamos que no exista
			if( !$valide_guion )
			{
				// agregamos a las variables de error la respuesta del servidor
				array_push($this->errors, "Please do not delete the '-' character from the phone number.");
				// agregamos los errores obtenidos desde la peticion hecha al model
				echo $this->errors();
				return;
			}
		}
		else
		{
			// creamos las validaciones correspondientes
			$validations['username'] = 'unique:users';
			// validamos que exista el telefono y que no sea vacio
			if( isset( $_POST['telephone'] ) && !empty( $_POST['telephone'] ) )
			{
				// creamos las validaciones correspondientes
				$validations['telephone'] = 'unique:users';
				// buscamos si existe el "-" en la busqueda
				$valide_guion = strpos($_POST['telephone'], "-");
				// validamos que no exista
				if( !$valide_guion )
				{
					// agregamos a las variables de error la respuesta del servidor
					array_push($this->errors, "Please do not delete the '-' character from the phone number.");
					// agregamos los errores obtenidos desde la peticion hecha al model
					echo $this->errors();
					return;
				}				
			}
			else
				// de lo contrario asignamos un valor vacio
				$_POST['telephone'] = '';
		}
		// validamos que existan los campos
		$errors = $this->validate( $_POST, $validations );
		// validamos si hay un error
		if( $errors )
		{
			echo $this->errors();
			return;
		}
		// realizamos la peticion al modelo de cerrar sesion
		$login = $this->Auth()->register( $_POST['name'], $_POST['username'], $_POST['telephone'], $_POST['password'], 'avatar.png', $_POST['country'] );
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
			'account_verified_at' => date('Y-m-d H:i:s')
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
		$my_clubs = $this->memberModel->findClubsByUserID( $this->Auth()->user()->id() );
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

	// función para verificar la cuenta de un usuario
	public function verify_sms( $code )
	{
		// request a enviar
		$request = [ 'id' => $this->Auth()->user()->id() ];
		// validamos que el codigo enviamo para verificación se correcto
		if( $code == $_SESSION['code_verification_mobile_sms'] )
		{
			$request['account_verified_at'] = date('Y-m-d H:i:s');
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
		}
		else
		{
			// creamos array con mensaje de error
			$msg = [
				'type' => 'error',
				'message' => 'The code is incorrect. Try again!'
			];
		}

		// buscamos los clubs a los que pertenece el usuario
		$my_clubs = $this->memberModel->findClubsByUserID( $this->Auth()->user()->id() );
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

	// función para enviar el código de validación de cuenta
	public function send_code_verification_mobile_sms()
	{
		// iniciamos la sesión
		$this->Auth();
		// creamos el codigo de 6 digitos de validación de cuenta
		$_SESSION['code_verification_mobile_sms'] = random_int( 0, 9).''.random_int( 0, 9).''.random_int( 0, 9).''.random_int( 0, 9).''.random_int( 0, 9).''.random_int( 0, 9);
		// eliminamos el '-' del numero de telefono
		$telephone = str_replace( "-", "", $_POST['telephone'] );
		// enviamos el código con ayuda de nexmo
		echo NexmoTrait::send_message( $telephone, $_SESSION['code_verification_mobile_sms'] );
	}

	// función para validar el código de validación de cuenta
	public function validate_sms()
	{
		// iniciamos la sesión
		$this->Auth();
		// creamos el codigo de 6 digitos de validación de cuenta
		if( $_SESSION['code_verification_mobile_sms'] == $_POST['code'] )
			echo "true";
		else
			echo "Incorrect validation code.";
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
		$this->Auth();
		require_once RUTA_APP."/Traits/SendMailTrait.php";
		require_once RUTA_APP."/Helpers/EmailTemplates/EmailverifyTemplate.php";
		$template = EmailverifyTemplate::template( $_SESSION['_token'], $_SESSION['id'] );
		return SendMailTrait::send( SMTP_ADDRESS, APP_NAME, $template, 'Verification mail', $_SESSION['username'], "Verification mail" );
	}

}