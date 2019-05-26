<?php

class NotificationController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 2 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->notificationModel = $this->model('Notification');
		// importamos el modelo correspondiente
		$this->notificationsendModel = $this->model('Notificationsend');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');

	}

	// funcion para mostrar el listado de notificaciones
	public function index()
	{	
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [ 
			'notifications' => $this->notificationModel->findByClubID( $club['id'] ),
			'breadcrumb_data' => '<li class="active">Notifications</li>'
		];
		$this->view('Clubs/Notifications/index', $params );
	}

	// funcion para crear una nueva notificación
	public function create()
	{
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$this->view('Clubs/Notifications/create', ['members' => $this->memberModel->findByClubID( $club['id'] ) ]);
	}

	// funcion para crear una nueva notificación
	public function edit( $id )
	{
		$notification = mysqli_fetch_assoc( $this->notificationModel->find( $id ) );
		$params = [
			'notification' => $notification,
			'members' => $this->notificationsendModel->findMembersByClubID( $notification['id'] )
		];
		$this->view('Clubs/Notifications/edit', $params);
	}

	// funcion para registrar las notificaciones
	public function store()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'members' => 'required',
			'message' => 'required'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		// obtenemos la hora para buscar 
		$time = date('Y-m-d H:i:s');
		// creamos un array que contiene los datos a guardar
		$request = [
			'club_id' => $club['id'],
			'message' => $_POST['message'],
			'created_at' => $time,
			'updated_at' => $time
		];
		// realizamos la petición
		$result = $this->notificationModel->store( $request );
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
			// obtenemos los datos de la notificacion
			$notification = mysqli_fetch_assoc( $this->notificationModel->findIDByMessageTime( $_POST['message'], $time ) );
			// contamos los miembros
			$cant = count($_POST['members']);
			// validamos que existan miembros seleccionados
			if( $cant > 0 )
			{
				// recorremos el vector para hacer el registro
				for ($i=0; $i < $cant; $i++) {
					// creamos un array que contiene los datos a guardar
					$request = [
						'notification_id' => $notification['id'],
						'member_id' => $_POST['members'][$i],
						'readed' => 1,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')
					];
					// realizamos la petición
					$result = $this->notificationsendModel->store( $request );
					// validamos si existe error
					if( !$result )
					{
					// agregamos el mensaje de error
						array_push( $this->errors, $result );
					// mostramos el mensaje de error
						echo $this->errors();
						exit();
					}
				}
				echo 'true';
			}
			else
			{
				// mostramos mensaje de error y eliminamos el mensaje
				$this->notificationModel->delete( $notification['id'] );
				// agregamos el mensaje de error
				array_push( $this->errors, 'you must select members to send the notification.' );
				// mostramos el mensaje de error
				echo $this->errors();
			}
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