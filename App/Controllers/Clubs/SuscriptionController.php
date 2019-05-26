<?php

class SuscriptionController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 2 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->suscriptionModel = $this->model('suscription');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->clubnotificationModel = $this->model('Clubnotification');

	}

	// función para obtener los datos del club
	public function index()
	{
		// obtenemos los datos del club
		$result = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [
			'suscriptions_approval' => $this->suscriptionModel->findApprovalByClubID( $result['id'] ),
			'suscriptions_expired' => $this->suscriptionModel->findExpiredByClubID( $result['id'] ),
			'club' => $result,
			'breadcrumb_data' => '<li class="active">Suscriptions</li>'
		];
		$this->view('Clubs/Suscription/index', $params );
	}



	// función para mostrar el formulario de crear
	public function edit( $id )
	{
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$suscription = mysqli_fetch_assoc($this->suscriptionModel->find( $id ));
		$params = [
			'suscription' => $suscription,
			'members' => $this->memberModel->findByClubID( $club['id'] )
		];
		$this->view('Clubs/Suscription/edit', $params);
	}

	// función para actualizar suscripción
	public function update()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'payment_method' => 'required',
			'stocksale_id' => 'required',
			'quantity' => 'required'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// creamos un array que contiene los datos a guardar
		$request = [
			'id' => $_POST['id'],
			'price' => $_POST['price'],
			'payment_method' => $_POST['payment_method'],
			'state' => $_POST['state'],
			'update_at' => date('Y-m-d H:i:s'),
		];
		// realizamos la petición
		$result = $this->suscriptionModel->update( $request );
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
				'tabla' => 'Suscription',
				'action' => 'Update',
				'code' => $_POST['id'],
				'description' => 'Sale update with price: ' . $_POST['price'] .', payment method: ' . $_POST['payment_method'] .'.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
			
	}

	// función para cuando se pague una suscripción aprovada
	public function payment()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'id' => 'required'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// buscamos los datos de la susctipciones
		$suscription = mysqli_fetch_assoc( $this->suscriptionModel->find( $_POST['id'] ) );
		// buscamos los datos del miembro
		$member = mysqli_fetch_assoc( $this->memberModel->find( $suscription['member_id'] ) );
		if( $member['accepted'] == 2 )
		{
			if( $member['active'] == 2 )
			{	
				// creamos un array que contiene los datos a guardar
				$request = [
					'id' => $_POST['id'],
					'state' => "paid",
					'update_at' => date('Y-m-d H:i:s'),
				];
				// realizamos la petición
				$result = $this->suscriptionModel->update( $request );
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
					$this->deleteNotification( $_POST['id'] );
					// creamos un array que contiene los datos a registrar
					$request = [
						'user_id' => $this->Auth()->user()->id(),
						'tabla' => 'Suscription',
						'action' => 'Update',
						'code' => $_POST['id'],
						'description' => 'Sale update with state: "paid".',
						'created_at' => date('Y-m-d H:i:s')
					];
					// realizamos la petición
					$this->auditModel->store( $request );
					// mostramos mensaje de éxito
					echo 'true';
				}
			}
			else
			{
				// agregamos el error de no aceptado
				array_push( $this->errors, "The member is blocked." );
				// mostramos el error
				echo $this->errors();
				// evitamos que siga la función
				return;
			}
		}
		else
		{
			// agregamos el error de no aceptado
			array_push( $this->errors, "The member has not yet been accepted." );
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
	}

	public function cancel()
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
		// buscamos los datos de la susctipciones
		$suscription = mysqli_fetch_assoc( $this->suscriptionModel->find( $_POST['id'] ) );
		// buscamos los datos del miembro
		$member = mysqli_fetch_assoc( $this->memberModel->find( $suscription['member_id'] ) );
		if( $member['accepted'] == 2 )
		{
			if( $member['active'] == 2 )
			{
				// creamos un array que contiene los datos a guardar
				$request = [
					'id' => $_POST['id'],
					'state' => "canceled",
					'update_at' => date('Y-m-d H:i:s'),
				];
				// realizamos la petición
				$result = $this->suscriptionModel->update( $request );
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
					$this->deleteNotification( $_POST['id'] );
					// creamos un array que contiene los datos a registrar
					$request = [
						'user_id' => $this->Auth()->user()->id(),
						'tabla' => 'Suscription',
						'action' => 'Update',
						'code' => $_POST['id'],
						'description' => 'Sale update with state: "canceled".',
						'created_at' => date('Y-m-d H:i:s')
					];
					// realizamos la petición
					$this->auditModel->store( $request );
					// mostramos mensaje de éxito
					echo 'true';
				}
			}
			else
			{
				// agregamos el error de no aceptado
				array_push( $this->errors, "The member is blocked." );
				// mostramos el error
				echo $this->errors();
				// evitamos que siga la función
				return;
			}
		}
		else
		{
			// agregamos el error de no aceptado
			array_push( $this->errors, "The member has not yet been accepted." );
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
	}

	// función para eliminar la notificación de la suscripción
	public function deleteNotification( $id )
	{
		$this->clubnotificationModel->deleteSectionID( "suscription", $id );
	}


	// función para convertir la fecha en amigable para el usuario
	public function convertDate( $date )
	{
		// explotamos la fecha para separarla
		$fecha_exp = explode( ' ', $date );
		// explotamos la fecha para obtener y, m, d
		$fecha = explode( '-', $fecha_exp[0] );
		// array para mostrar el mes en español
		$meses = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		return $meses[ $fecha[1] - 1 ]. " ".$fecha[2].", ".$fecha[0]." at ".$fecha_exp[1];
	}

}