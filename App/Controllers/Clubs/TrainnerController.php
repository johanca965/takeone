<?php

class TrainnerController extends Controller
{

	public function __construct()
	{
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->clubtrainnerModel = $this->model('Clubtrainner');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->userModel = $this->model('User');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->notificationModel = $this->model('Notification');
		// importamos el modelo correspondiente
		$this->notificationsendModel = $this->model('Notificationsend');
	}

	// función para obtener los datos del club
	public function index()
	{	
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 2 );
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [ 
			'members' => $this->memberModel->findByClubID( $club['id'] ),
			'trainners' => $this->clubtrainnerModel->lista( $club['id'] ),
			'breadcrumb_data' => '<li class="active">Trainners</li>'
		];
		$this->view('Clubs/Trainners/create', $params);
	}


	public function store()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'user_id' => 'required|number',
			'activity' => 'required',
			'salary' => 'required'
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
		// creamos un array que contiene los datos a guardar
		$request = [
			'club_id' => $club['id'],
			'user_id' => $_POST['user_id'],
			'activity' => $_POST['activity'],
			'salary' => $_POST['salary'],
			'status' => 'send',
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		// realizamos la petición
		$result = $this->clubtrainnerModel->store( $request );
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
			// buscamos el miembro que se desea vlver entrenador
			$search = $this->memberModel->findMemberWithClub( $club['id'], $_POST['user_id'] );
			// validamos que existe algún dato
			if( $search->num_rows < 1 )
			{
				// creamos el request con los datos necesarios para volverlo miembro del club
				$request_member = [
					'user_id' => $_POST['user_id'],
					'club_id' => $club['id'],
					'accepted' => 2,
					'active' => 2,
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				];
				// ejecutamos la petición de seguimiento
				$this->memberModel->store( $request_member );
				// buscamos el miembro que se desea vlver entrenador
				$search = $this->memberModel->findMemberWithClub( $club['id'], $_POST['user_id'] );
			}

			$member = mysqli_fetch_assoc( $search );

			// obtenemos los datos del usuario seleccionado
			$user = mysqli_fetch_assoc( $this->userModel->find( $_POST['user_id'] ) );
			
			// obtenemos la hora para buscar 
			$time = date('Y-m-d H:i:s');
			$route = '<a target="_new" href="'.RUTA_URL.'/Clubs/Trainner/Status/Decline/'.$club['id'].'/'.$_POST['user_id'].'/'.$_POST['activity'].'" class="btn btn-danger btn-sm">Decline</a> <a target="_new" href="'.RUTA_URL.'/Clubs/Trainner/Status/Accept/'.$club['id'].'/'.$_POST['user_id'].'/'.$_POST['activity'].'" class="btn btn-primary btn-sm">Accept</a>';
			// creamos un array que contiene los datos a guardar
			$request_notification = [
				'club_id' => $club['id'],
				'message' => 'Dear '.ucwords( $user['name'] ).' trainer. <br> You have been selected to be trainer of '.ucwords( $_POST['activity'] ).' in '.ucwords( $club['title'] ).'. <br> Your salary is '.$_POST['salary'].', <br> Best Regards. <br>'.$route,
				'created_at' => $time,
				'updated_at' => $time
			];
			// realizamos la petición
			$this->notificationModel->store( $request_notification );
			// obtenemos los datos de la notificacion
			$notification = mysqli_fetch_assoc( $this->notificationModel->findIDByMessageTime( $request_notification['message'], $time ) );

			// creamos un array que contiene los datos a guardar
			$request_send = [
				'notification_id' => $notification['id'],
				'member_id' => $member['id'],
				'readed' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
					// realizamos la petición
			$result = $this->notificationsendModel->store( $request_send );

			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// función para enviar el correo al nuevo miembro de la plataforma
	public function sendMail()
	{
		// buscamos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		// requerimos los complementos del envio de correos
		require_once RUTA_APP."/Traits/SendMailTrait.php";
		// requerimos la plantilla adecuada
		require_once RUTA_APP."/Helpers/EmailTemplates/InvitationtrainerTemplate.php";
		// obtenemos la plantilla
		$template = InvitationtrainerTemplate::template( $_POST['name'], $club['slug'], $club['title'], $_POST['activity'], $_POST['salary'], $club['currency'] );
		// validamos si se envio el correo
		if( SendMailTrait::send( SMTP_ADDRESS, APP_NAME, $template, 'Invitation mail', $_POST['email'], "Club invitation" ) )
			echo "true";
		else
			echo "Error sending the mail";
	}


	public function status( $answer, $club_id, $user_id, $activity )
	{
		$trainer = mysqli_fetch_assoc( $this->clubtrainnerModel->findByClubUserIDActivity( $club_id, $user_id, $activity ) );
		// creamos un array que contiene los datos a guardar
		$request = [
			'id' => $trainer['id'],
			'status' => $answer,
			'updated_at' => date('Y-m-d H:i:s')
		];
		// realizamos la petición
		$result = $this->clubtrainnerModel->update( $request );
		// mostramos la ventana con agradecimiento por la respuesta
		$this->location('Members/Clubs/trainner');
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