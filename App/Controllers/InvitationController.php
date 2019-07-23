<?php

class InvitationController extends Controller
{

	public function __construct()
	{
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'Country' );
		// con esto instanciamos el modelo correspondiente
		$this->clubpackageModel = $this->model( 'Clubpackage' );
		// con esto instanciamos el modelo correspondiente
		$this->userModel = $this->model('User');
		// con esto instanciamos el modelo correspondiente
		$this->userdataModel = $this->model('Userdata');
		// con esto instanciamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// con esto instanciamos el modelo correspondiente
		$this->memberpackageModel = $this->model('Memberpackage');
		// importamos el modelo correspondiente
		$this->clubnotificationModel = $this->model('Clubnotification');
		// importamos el modelo correspondiente
		$this->clubtrainnerModel = $this->model('Clubtrainner');
		// importamos el modelo correspondiente
		$this->suscriptionModel = $this->model('suscription');
		// importamos el modelo correspondiente
		$this->suscriptionpackageModel = $this->model('Suscriptionpackage');
	}

	public function index(){}

	public function new( $club_slug )
	{
		$club = mysqli_fetch_assoc( $this->clubModel->findBySlug( $club_slug ) );
		$params = [
			'club' => $club,
			'country' => mysqli_fetch_assoc( $this->countryModel->find( $club['country_id'] ) ),
			'countries' => $this->countryModel->listSimple(),
			'clubpackages' => $this->clubpackageModel->findByCludID( $club['id'] ),
		];
		$this->view('invitation', $params);
	}

	public function trainner( $club_slug, $activity, $salary )
	{
		$salary = explode(' ', $salary);
		$club = mysqli_fetch_assoc( $this->clubModel->findBySlug( $club_slug ) );
		$params = [
			'club' => $club,
			'country' => mysqli_fetch_assoc( $this->countryModel->find( $club['country_id'] ) ),
			'countries' => $this->countryModel->listSimple(),
			'activity' => $activity,
			'salary' => $salary[0],
			'current' => $salary[1],
		];
		$this->view('invitation-trainner', $params);
	}

	public function store()
	{
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'name' => 'required',
			'username' => 'required|unique:users',
			'password' => 'required',
			'photo' => 'required',
			'country' => 'required',
			'city' => 'required'
		] );

		if( $errors )
		{
			echo $this->errors();
			return;
		}

		// validamos que existan dias en el programa
		if( !isset( $_POST['packages'] ) )
		{
			// retornamos un mensaje de error al usuario
			array_push( $this->errors, "You must select packages to join this club." );
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$login = $this->register( $_POST['name'], $_POST['username'], $_POST['password'], $_POST['photo'], $_POST['country'] );
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
		else
		{
			// validamos que tenga problemas de salud
			if( isset( $_POST['helth_issues'] ) )
			{
				$helth_issues = '';
				// recorremos los problemas de salud para ser guardados
				foreach ($_POST['helth_issues'] as $day) 
				{
					// concatenamos los problemas de salud
					$helth_issues .= $helth_issues . ',';
				}
				// eliminamos el último caracter de la cadena
				$helth_issues = trim($helth_issues, ',');
			}
			// obtenems los datos del usuario
			$userdata = mysqli_fetch_assoc( $this->userdataModel->findByUser( $this->Auth()->user()->id() ) );
			// request que se enviara a actualizar
			$request = [
				'id' => $userdata['id'],
				'city' => $_POST['city'],
				'helth_issues' => $helth_issues,
				'gender' => $_POST['gender'],
				'marital' => $_POST['marital'],
				'bloodtype' => $_POST['bloodtype'],
				'birthday' => $_POST['birthday'],
				'address' => $_POST['address'],
				'mobile' => $_POST['mobile'],
				'social_link' => $_POST['social_link'],
			];
			// realizamos la petición
			$this->userdataModel->update( $request );
			// creamos el request con los datos necesarios
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'club_id' => $_POST['club_id'],
				'accepted' => 1,
				'active' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			// ejecutamos la petición de seguimiento
			$this->memberModel->store( $request );
			// buscamos los datos del miembro
			$member = mysqli_fetch_assoc( $this->memberModel->findMemberWithClub( $_POST['club_id'], $this->Auth()->user()->id() ) );
			// creamos la notificación de nuevo miembro
			$request = [
				'club_id' => $_POST['club_id'],
				'importance' => '1',
				'section' => 'member',
				'section_id' => $member['id'],
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			$this->clubnotificationModel->store( $request );
			// total del primer pago de la suscripción
			$total_first_suscription = 0;
			// recorremos los paquetes seleccionados por el miembro
			foreach ($_POST['packages'] as $package) 
			{
				// creamos el request con los datos necesarios
				$request = [
					'member_id' => $member['id'],
					'package_id' => $package,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				];
				// ejecutamos la petición de seguimiento
				$this->memberpackageModel->store( $request );
				// buscamos los datos del paquete
				$package_data = mysqli_fetch_assoc( $this->clubpackageModel->find( $package ) );
				// sumamos todos los valores de la suscripcin
				$total_first_suscription += $package_data['price'];
			}
			// buscamos los datos del club
			$club = mysqli_fetch_assoc( $this->clubModel->find( $_POST['club_id'] ) );
			// sumamos el valor de la administración
			$total_first_suscription += $club['administration_fee'];
			// creamos la notificación de nuevo miembro
			$time = date('Y-m-d H:i:s');
			$request = [
				'club_id' => $_POST['club_id'],
				'member_id' => $member['id'],
				'price' => $total_first_suscription,
				'payment_method' => 'cash',
				'state' => 'approval',
				'created_at' => $time,
				'updated_at' => $time,
			];
			// guardamos la suscripción
			$this->suscriptionModel->store( $request );
			// buscamos los datos de la suscripción
			$suscription = mysqli_fetch_assoc( $this->suscriptionModel->findByClubUserIDDate( $_POST['club_id'], $member['id'], $time ) );
			// recorremos los paquetes de donde se calculo el total
			foreach ($_POST['packages'] as $package) 
			{
				// creamos la notificación de nuevo miembro
				$request = [
					'suscription_id' => $suscription['id'],
					'package_id' => $package,
					'created_at' => date('Y-m-d H:i:s')
				];
				// creamos la nueva notificacion
				$this->suscriptionpackageModel->store( $request );
			}
			// creamos la notificación de nuevo miembro
			$request = [
				'club_id' => $_POST['club_id'],
				'importance' => '2',
				'section' => 'suscription',
				'section_id' => $suscription['id'],
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			// creamos la nueva notificacion
			$this->clubnotificationModel->store( $request );
			// retornamos a la vista de acceso cuando se satisfatorio el logueo
			echo "true|".$login[1];
		}
	}

	public function store_trainner()
	{
		// validamos que sea una peticion por post
		$this->methodPost();
		// realizamos la peticion al modelo de cerrar sesion
		$login = $this->register( $_POST['name'], $_POST['username'], $_POST['password'], $_POST['photo'], $_POST['country'] );
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
		else
		{
			// validamos que tenga problemas de salud
			if( isset( $_POST['helth_issues'] ) )
			{
				$helth_issues = '';
				// recorremos los problemas de salud para ser guardados
				foreach ($_POST['helth_issues'] as $day) 
				{
					// concatenamos los problemas de salud
					$helth_issues .= $helth_issues . ',';
				}
				// eliminamos el último caracter de la cadena
				$helth_issues = trim($helth_issues, ',');
			}
			// obtenems los datos del usuario
			$userdata = mysqli_fetch_assoc( $this->userdataModel->findByUser( $this->Auth()->user()->id() ) );
			// request que se enviara a actualizar
			$request = [
				'id' => $userdata['id'],
				'city' => $_POST['city'],
				'helth_issues' => $helth_issues,
				'gender' => $_POST['gender'],
				'marital' => $_POST['marital'],
				'bloodtype' => $_POST['bloodtype'],
				'birthday' => $_POST['birthday'],
				'address' => $_POST['address'],
				'mobile' => $_POST['mobile'],
				'social_link' => $_POST['social_link'],
			];
			// realizamos la petición
			$this->userdataModel->update( $request );
			// creamos el request con los datos necesarios
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'club_id' => $_POST['club_id'],
				'accepted' => 2,
				'active' => 2,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			// ejecutamos la petición de seguimiento
			$this->memberModel->store( $request );
			// creamos el nuevo trainner
			$request = [
				'club_id' => $_POST['club_id'],
				'user_id' => $this->Auth()->user()->id(),
				'activity' => $_POST['activity'],
				'salary' => $_POST['salary'],
				'status' => 'Accept',
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			$this->clubtrainnerModel->store( $request );
			
			// retornamos a la vista de acceso cuando se satisfatorio el logueo
			echo "true|".$login[1];
		}
	}

	// funcion para registrar un usuario en la base de datos
	public function register( $name, $username, $password, $photo, $country_id )
	{
		// protegemos el valor inicial de las variables
		$username_logueo = $username;
		$password_logueo = $password;
		// encriptamos y protegemos la variable del password
		$password = password_hash( $password , PASSWORD_BCRYPT);
		// creamos la notificación de nuevo miembro
		$request = [
			'name' => $name,
			'slug' => SlugTrait::slug($name),
			'username' => $username,
			'password' => $password,
			'email_verified_at' => date('Y-m-d H:i:s'),
			'role_id' => "1",
			'photo' => SlugTrait::slug($username).'/'.$photo,
			'online' => "1",
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		$this->userModel->store( $request );

		$user = mysqli_fetch_assoc( $this->userModel->findBySlug( SlugTrait::slug($name) ) );

		// creamos la notificación de nuevo miembro
		$request = [
			'user_id' => $user['id'],
			'country_id' => $country_id,
			'city' => 'NULL',
			'rfid' => 'NULL',
			'cpr' => 'NULL',
			'passport' => 'NULL',
			'helth_issues' => 'NULL',
			'gender' => 'NULL',
			'marital' => 'NULL',
			'bloodtype' => 'NULL',
			'birthday' => 'NULL',
			'address' => 'NULL',
			'mobile' => 'NULL',
			'social_link' => 'NULL',
			'confirm_code' => 'NULL',
			'confirmed' => 'NULL',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		$this->userdataModel->store( $request );
		// lo mandamos a loguearde si todo esta correcto
		return $this->Auth()->login( $username_logueo, $password_logueo );
	}

	// función para subir el logo del club
	public function uploadPhoto()
	{
		// obtenemos la imagen despúes de hacer crop
		$data = $_POST['image'];
		// expltamos la imagen para obtener los datos del base64
		$image_exp = explode(",", $data);
		// desencriptamos el base64
		$data = base64_decode($image_exp[1]);
		// obtenemos el slug del titulo del club
		$slug = SlugTrait::slug( $_POST['folder'] );
		// creamos el nombre de la imagen
		$imageName = time() . '-' . $slug . '.png';
		// creamos la ruta de acuerdo a la varible global public
		$folder = RUTA_PUBLIC . '/' . 'img/users/' . $slug;
		// creamos la carpeta si no existe
		if (!file_exists($folder))
			// creamos la carpeta
			mkdir($folder, 0777, true);
		// creamos la imagen segun la ruta que deseemos
		file_put_contents($folder.'/'.$imageName, $data);
		// enviamos el nombre de la imagen
		echo "true|".$imageName;
	}

}