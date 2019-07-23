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
		// importamos el modelo correspondiente
		$this->memberpackageModel = $this->model('Memberpackage');

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
					'price' => $_POST['total_suscription'],
					'total_discount' => $_POST['total_discount'],
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
			'id' => 'Observation',
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
					'observation' => $_POST['observation'],
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

	public function findPackagesMembers()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'member_id' => 'required'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// buscamos los datos del paquete
		$packages = $this->memberpackageModel->findByMemberID( $_POST['member_id'] );
		// variable que contiene el lsitado a devolver
		$rows = '
			<div class="form-group">
				<label>List of packages to make discount:</label>
			</div>
		';
		foreach ($packages as $package) 
		{
			$rows .= '
				<div class="form-group" style="margin-top: 15px;">
					<label for="discount_'.$package['title'].'">'.ucwords( $package['title'] ).': '.$package['price'].' '.$_POST['currency'].'</label>
					<input type="number" class="form-control suscription_discount" id="discount_'.$package['title'].'" placeholder="min. 0 - max. '.$package['discount'].' '.$_POST['currency'].'" value="0" max="'.$package['discount'].'" min="0">
					<input type="hidden" class="form-control suscription_price" value="'.$package['price'].'">
				</div>
			';
		}

		$rows .= '
			<div class="form-group" style="text-align: left">
				<label>Total: <font class="total_suscription">'.$_POST['total'].'</font> '.$_POST['currency'].'</label>
				<input type="hidden" class="form-control" id="total_suscription" name="total_suscription" value="'.$_POST['total'].'">
				<input type="hidden" class="form-control" id="total_discount" name="total_discount" value="">
				<input type="hidden" class="form-control" id="original_total" value="'.$_POST['total'].'">
			</div>
			<script>
				$(".suscription_discount").change(function(){
					// variable que contiene el valor a descontar del total
					var total_discount = 0;
					$("#list-package .form-group").each(function(){
		        	    // obtenemos el valor del descuento
						var discount = $(this).children(".suscription_discount").val();
						if( discount != undefined )
						{
							// obtenemos el valor máximo del descuento
							var max = $(this).children(".suscription_discount").attr("max");
							// validamos si el descuento a aplicar es mayor al máximo
							if( parseFloat(discount) > parseFloat(max)  )
							{
								// mostramos el valor del descuento como el máximo
								$(this).children(".suscription_discount").val( max );
								// cambiamos el valor del descuento por el máximo
								discount = max;
							}
							// obtenemos el valor del paquete
							var price = $(this).children(".suscription_price").val();
							// validamos si el descuento es mayor al precio
							if( parseFloat(discount) > parseFloat(price)  )
							{
								// mostramos el valor del descuento como el máximo
								$(this).children(".suscription_discount").val( price );
								// cambiamos el valor del descuento por el máximo
								discount = price;
							}
							// obtenemos el descuento a restar del paquete
							total_discount = parseFloat(total_discount) + parseFloat(discount);
						}
		        	});
					// obtenemos el total original de la suscripcion
					var total = $("#original_total").val();
					// realizamos el calculo con el descuento
					total = total - total_discount;
					// asiganamos el valor del descuento a la variable visible del usuario del total
					$(".total_suscription").html(total);
					// asignamos el valor total del descuento al campo de cambios
					$("#total_suscription").val(total);
					// asignamos el valor del descuento al campo de cambios
					$("#total_discount").val(total_discount);
				}); 
			</script>
		';

		echo "true|".$rows;

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