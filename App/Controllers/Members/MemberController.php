<?php

class MemberController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 1 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->suscriptionModel = $this->model('Suscription');
		// importamos el modelo correspondiente
		$this->notificationsendModel = $this->model('Notificationsend');
		// con esto instanciamos el modelo correspondiente
		$this->clubpackageModel = $this->model( 'Clubpackage' );
		// con esto instanciamos el modelo correspondiente
		$this->memberpackageModel = $this->model('Memberpackage');
		// importamos el modelo correspondiente
		$this->clubnotificationModel = $this->model('Clubnotification');
	}

	// función principal
	public function index()
	{
		// redireccionamos al listado de clubs
		$this->location('Members/Welcome');
	}

	// función que registra la solicitud de un nuevo miembro
	public function store()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'club_id' => 'required',
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
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
		// obtenemos los datos del usuario
		$user_id = $this->Auth()->user()->id();
		// obtenemos los datos del registro
		$search = $this->memberModel->findMemberWithClub( $_POST['club_id'], $user_id );
		// validamos que no exista un registro previo
		if( $search->num_rows < 1 )
		{
			// creamos el request con los datos necesarios
			$request = [
				'user_id' => $user_id,
				'club_id' => $_POST['club_id'],
				'accepted' => 1,
				'active' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
				// ejecutamos la petición de seguimiento
			$result = $this->memberModel->store( $request );
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
				// obtenemos los datos del registro
				$member = mysqli_fetch_assoc( $this->memberModel->findMemberWithClub( $_POST['club_id'], $user_id ) );
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
				// creamos un array que contiene los datos a registrar
				$request = [
					'user_id' => $this->Auth()->user()->id(),
					'tabla' => 'Members',
					'action' => 'Request join ',
					'code' => $member['id'],
					'description' => 'New club member.',
					'created_at' => date('Y-m-d H:i:s')
				];
				// realizamos la petición
				$this->auditModel->store( $request );
				// mostramos mensaje de éxito
				echo 'true|'.RUTA_URL.'/Members/Club/Find';
			}
		}
		else
		{
			echo 'There is already a request to join the club.';
		}
	}

	// función que cancela la solicitud de un nuevo miembro
	public function delete()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'club_id' => 'required',
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// obtenemos los datos del usuario
		$user_id = $this->Auth()->user()->id();
		// obtenemos los datos del registro
		$search = $this->memberModel->findMemberWithClub( $_POST['club_id'], $user_id );
		// validamos que no exista un registro previo
		if( $search->num_rows > 0 )
		{
			// obtenemos los datos del miembr
			$member = mysqli_fetch_assoc( $search );
			// ejecutamos la petición de seguimiento
			$result = $this->memberModel->delete( $member['id'] );
			print_r($result); exit();
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
					'action' => 'Request canceled',
					'code' => $member['id'],
					'description' => 'Request canceled by the user.',
					'created_at' => date('Y-m-d H:i:s')
				];
				// realizamos la petición
				$this->auditModel->store( $request );
				// mostramos mensaje de éxito
				echo 'true|delete';
			}
		}
		else
		{
			echo 'The request to join does not exist.';
		}
	}

}