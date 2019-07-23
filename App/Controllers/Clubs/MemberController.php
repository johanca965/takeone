<?php

class MemberController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 2 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->userModel = $this->model('User');
		// con esto instanciamos el modelo correspondiente
		$this->userdataModel = $this->model('Userdata');
		// importamos el modelo correspondiente
		$this->clubnotificationModel = $this->model('Clubnotification');
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'country' );
		// con esto instanciamos el modelo correspondiente
		$this->clubpackageModel = $this->model( 'Clubpackage' );
		// importamos el modelo correspondiente
		$this->suscriptionModel = $this->model('suscription');
		// con esto instanciamos el modelo correspondiente
		$this->memberpackageModel = $this->model('Memberpackage');
		// importamos el modelo correspondiente
		$this->suscriptionpackageModel = $this->model('Suscriptionpackage');

	}

	// función principal
	public function index()
	{
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [ 
			'members_accepted' => $this->memberModel->listingByClubAccepted( $club['id'] ),
			'members_blocked' => $this->memberModel->listingByClubBlocked( $club['id'] ),
			'members_new' => $this->memberModel->listingByClubNew( $club['id'] ),
			'members_delete' => $this->memberModel->listingByClubDelete( $club['id'] ),
			'breadcrumb_data' => '<li class="active">Manage</li>'
		];
		// redireccionamos al listado de clubs
		$this->view('Clubs/Members/index', $params);
	}

	// función para obtener los datos del miembro
	public function see( $slug )
	{
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$user = mysqli_fetch_assoc( $this->userModel->findBySlug( $slug ) );
		$member = mysqli_fetch_assoc( $this->memberModel->findMemberWithClub( $club['id'], $user['id'] ) );
		$params = [
			'member' => $member,
			'club' => $club,
			'suscriptions' => $this->suscriptionModel->getAllByMemberID( $member['member_id'] ),
			'breadcrumb_data' => '
				<li>
                    <a title="List members" href="'.RUTA_URL.'/Clubs/Member/">
                       <i class="fa fa-users"></i> Members</a>
                </li>
				<li class="active">See</li>
			'
		];
		$this->view('Clubs/Members/see', $params);
	}

	// función para obtener los datos del miembro
	public function add()
	{
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [
			'club' => $club,
			'country' => $this->countryModel->listSimple(),
			'clubpackages' => $this->clubpackageModel->findByCludID( $club['id'] ),
			'breadcrumb_data' => '
				<li>
                    <a title="List members" href="'.RUTA_URL.'/Clubs/Member/">
                       <i class="fa fa-users"></i> Members</a>
                </li>
				<li class="active">New</li>
			'
		];
		$this->view('Clubs/Members/add', $params);
	}

	// función para obtener los datos del miembro
	public function birthdays()
	{
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [
			'members' => $this->memberModel->findByClubBithdayMembersMonth( $club['id'] ),
			'breadcrumb_data' => '
				<li>
                    <a title="List members" href="'.RUTA_URL.'/Clubs/Member/">
                       <i class="fa fa-users"></i> Members</a>
                </li>
				<li class="active">Birthdays</li>
			'
		];
		$this->view('Clubs/Members/birthdays', $params);
	}

	// funcion para aceptar, rechazar o eliminar un miembro
	public function accepted()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'member_id' => 'required',
			'accepted' => 'required',
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		if( $_POST['accepted'] == '2' )
			$active = '2';
		else
			$active = '1';
		// creamos el request con los datos necesarios
		$request = [
			'id' => $_POST['member_id'],
			'accepted' => $_POST['accepted'],
			'active' => $active,
			'updated_at' => date('Y-m-d H:i:s')
		];
		// ejecutamos la petición de seguimiento
		$result = $this->memberModel->update( $request );
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
			// borramos la notificacions
			$this->clubnotificationModel->deleteSectionID( "member", $_POST['member_id'] );
			/*// validamos si fue rechazado
			if( $_POST['accepted'] == 3 )
			{
				// buscamos los datos de la suscripción
				$suscription = $this->suscriptionModel->findByMemberID( $_POST['member_id'] );
			}*/
			// creamos un array que contiene los datos a registrar
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'tabla' => 'Members',
				'action' => 'Accept/Reject',
				'code' => $_POST['member_id'],
				'description' => 'Accept/Reject member of club.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// funcion para aceptar, rechazar o eliminar un miembro
	public function active()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'member_id' => 'required',
			'active' => 'required',
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
			'id' => $_POST['member_id'],
			'active' => $_POST['active'],
			'updated_at' => date('Y-m-d H:i:s')
		];
		// ejecutamos la petición de seguimiento
		$result = $this->memberModel->update( $request );
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
			// creamos un array que contiene los datos a registrar
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'tabla' => 'Members',
				'action' => 'Locked/Unlocked',
				'code' => $_POST['member_id'],
				'description' => 'Locked/Unlocked member of club.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// función registrar un nuevo miembro
	public function registermember()
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
		$user = $this->register( $_POST['name'], $_POST['username'], $_POST['password'], $_POST['photo'], $_POST['country'] );
		$user = explode("|", $user);
		// validamos si se logueo o no
		if( $user[0] != 'true' )
		{
			// agregamos a las variables de error la respuesta del servidor
			array_push($this->errors, $user[0]);
			// agregamos los errores obtenidos desde la peticion hecha al model
			echo $this->errors();
			return;
		}
		else
		{
			// obtenems los datos del usuario
			$userdata = mysqli_fetch_assoc( $this->userdataModel->findByUser( $user[1] ) );
			// request que se enviara a actualizar
			$request = [
				'id' => $userdata['id'],
				'city' => $_POST['city'],
				'cpr' => $_POST['cpr'],
				'mobile' => $_POST['mobile'],
			];
			// realizamos la petición
			$this->userdataModel->update( $request );
			// creamos el request con los datos necesarios
			$request = [
				'user_id' => $user[1],
				'club_id' => $_POST['club_id'],
				'accepted' => 2,
				'active' => 2,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			// ejecutamos la petición de seguimiento
			$this->memberModel->store( $request );
			// buscamos los datos del miembro
			$member = mysqli_fetch_assoc( $this->memberModel->findMemberWithClub( $_POST['club_id'], $user[1]) );
			// creamos la notificación de nuevo miembro
			$request = [
				'club_id' => $_POST['club_id'],
				'importance' => '1',
				'section' => 'member',
				'section_id' => $member['member_id'],
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
					'member_id' => $member['member_id'],
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
				'member_id' => $member['member_id'],
				'price' => $total_first_suscription,
				'total_discount' => 0,
				'payment_method' => 'cash',
				'state' => 'approval',
				'created_at' => $time,
				'updated_at' => $time,
			];
			// guardamos la suscripción
			$this->suscriptionModel->store( $request );
			// buscamos los datos de la suscripción
			$suscription = mysqli_fetch_assoc( $this->suscriptionModel->findByClubUserIDDate( $_POST['club_id'], $member['member_id'], $time ) );
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
			echo "true";
		}
	}

	// funcion para registrar un usuario en la base de datos
	public function register( $name, $username, $password, $photo, $country_id )
	{
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
		
		$result = $this->userModel->store( $request );
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
			$result = $this->userdataModel->store( $request );
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
			// lo mandamos a loguearde si todo esta correcto
				return "true|".$user['id'];
			}
		}
	}

	public function update_rfid()
	{
		$this->methodPost();
		// validamos que existan los campos
		$errors = $this->validate( $_POST, [
			'member_id' => 'required',
			'rfid' => 'required'
		] );

		if( $errors )
		{
			echo $this->errors();
			return;
		}
		// buscamos los datos del miembro
		$member = mysqli_fetch_assoc( $this->memberModel->find( $_POST['member_id'] ) );
		// buscamos los datos del usuario
		$user = mysqli_fetch_assoc( $this->userModel->find( $member['user_id'] ) );
		// buscamos los datos del usuario
		$user_data = mysqli_fetch_assoc( $this->userdataModel->findByUser( $user['id'] ) );
		// creamos la notificación de nuevo miembro
		$request = [
			'id' => $user_data['id'],
			'rfid' => $_POST['rfid'],
			'updated_at' => date('Y-m-d H:i:s')
		];
		
		$result = $this->userdataModel->update( $request );
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
			// lo mandamos a loguearde si todo esta correcto
			echo "true";
		}

	}


	// función para validar la membresia de un usuario
	public function validateMember( $member_id, $accepted, $active )
	{
		
		if( $accepted == 1 )
		{
			return '
			<a href="#" data-member-id="'.$member_id.'" data-url="'.RUTA_URL.'/Clubs/Member/Accepted" data-accepted="2" class="btn btn-danger accepted_member" title="Accept member">Accept</a>
			<a href="#" data-member-id="'.$member_id.'" data-url="'.RUTA_URL.'/Clubs/Member/Accepted" data-accepted="3" class="btn btn-danger accepted_member" title="Reject member">Reject</a>
			';
		}
		else if( $accepted == 2 )
		{
			if( $active == 1 )
			{
				return '
				<a href="#" data-member-id="'.$member_id.'" data-url="'.RUTA_URL.'/Clubs/Member/Accepted" data-accepted="4" class="btn btn-danger accepted_member" title="Release member">Release</a>
				<a href="#" data-member-id="'.$member_id.'" data-url="'.RUTA_URL.'/Clubs/Member/Active" data-active="2" class="btn btn-danger active_member" title="Unblock member">Unblock</a>
				';
			}
			else
			{
				return '
				<a href="#" data-member-id="'.$member_id.'" data-url="'.RUTA_URL.'/Clubs/Member/Accepted" data-accepted="4" class="btn btn-danger accepted_member" title="Release member">Release</a>
				<a href="#" data-member-id="'.$member_id.'" data-url="'.RUTA_URL.'/Clubs/Member/Active" data-active="1" class="btn btn-danger active_member" title="Block member">Block</a>
				';
			}
		}
		else
		{
			return '<a href="#" data-member-id="'.$member_id.'" data-url="'.RUTA_URL.'/Clubs/Member/Accepted" data-accepted="2" class="btn btn-danger accepted_member" title="Rejoin member">Rejoin</a>';
		}
	}

	// función para buscar los packetes de una suscripción
	public function find_packages_by_suscription_id( $suscription_id, $price )
	{
		// buscamos los paquetes que tiene la suscripción
		$packages = $this->suscriptionpackageModel->findBySuscriptionId( $suscription_id );
		// validamos que existan datos
		if( $packages && $packages->num_rows > 0 )
		{
			// variable que contendra el nombre de los paquetes
			$package_title = '';
			// variable que obtendra el total de los paquetes
			$total = 0.0;
			// recorremos los paquetes
			foreach ($packages as $package) 
			{
				// buscamos todos los datos del 
				$package_data = $this->clubpackageModel->find( $package['id'] );
				// validamos que existan datos
				if( $package_data && $package_data->num_rows > 0 )
				{
					$package_data = mysqli_fetch_assoc( $package_data );
					// vamos sumando el valor del paquete
					$total += $package_data['price'];
				}
				// vamos concatenando
				$package_title .= $package['title'].", ";
			}
			if( $price > $total )
				// vamos concatenando
				$package_title .= "Administration free, ";
			// eliminamos la , y el espacio en blanco
			$package_title = substr( $package_title, 0, -2 );
			// retornamos los paquetes
			return $package_title;
		}
	}

	// función para sumar 30 días a la fecha
	public function expire_date( $fecha )
	{
		$nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
		$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
		return $nuevafecha;
	}

	// función para enviar el correo al nuevo miembro de la plataforma
	public function sendMail()
	{
		// buscamos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		// requerimos los complementos del envio de correos
		require_once RUTA_APP."/Traits/SendMailTrait.php";
		// requerimos la plantilla adecuada
		require_once RUTA_APP."/Helpers/EmailTemplates/InvitationclubTemplate.php";
		// obtenemos la plantilla
		$template = InvitationclubTemplate::template( $_POST['name'], $club['slug'], $club['title'] );
		// validamos si se envio el correo
		if( SendMailTrait::send( SMTP_ADDRESS, APP_NAME, $template, 'Invitation mail', $_POST['email'], "Club invitation" ) )
			echo "true";
		else
			echo "Error sending the mail";
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
		return $meses[ $fecha[1] - 1 ]. " ".$fecha[2].", ".$fecha[0];
	}

	// función para convertir la fecha en amigable para el usuario
	public function convertDateAll( $date )
	{
		$fecha_exp = explode( ' ', $date );
		// explotamos la fecha para obtener y, m, d
		$fecha = explode( '-', $fecha_exp[0] );
		// array para mostrar el mes en español
		$meses = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		return $meses[ $fecha[1] - 1 ]. " ".$fecha[2].", ".$fecha[0]." at ".$fecha_exp[1];
	}

	// función para convertir la fecha en amigable para el usuario
	public function convertBirthday( $date )
	{
		// explotamos la fecha para separarla
		$fecha = explode( ' ', $date );
		// explotamos la fecha para obtener y, m, d
		$fecha = explode( '-', $fecha[0] );
		// array para mostrar el mes en español
		$meses = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		return $meses[ $fecha[1] - 1 ]. " ".$fecha[2];
	}

}