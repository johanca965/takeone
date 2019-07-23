<?php

class NotificationController extends Controller
{

	public function __construct()
	{
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->notificationModel = $this->model('Notification');
		// importamos el modelo correspondiente
		$this->clubnotificationModel = $this->model('Clubnotification');
		// importamos el modelo correspondiente
		$this->notificationsendModel = $this->model('Notificationsend');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->userModel = $this->model('User');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->suscriptionModel = $this->model('Suscription');

	}

	// función principal
	public function index()
	{

	}

	// función para obtener la cantidad de notificaciones del usuario cada vez que recarge la página
	public function usernotification()
	{
		// redireccionamos al listado de clubs
		$result = $this->notificationModel->findByUserID( $this->Auth()->user()->id() );
		// variable que contiene las celdas a mostrar en el listado
		$rows = '';
		// variable que contiene la cantidad de datos
		$num_rows = $result->num_rows;
		// validamos que no tengamos un problema
		if( !$result )
		{
			echo "erros|";
			exit();
		}
		else
		{
			// validamos la cantidad de resultados
			if( $result->num_rows > 0 )
			{
				// recorremos los resultados
				foreach ($result as $notifcation) 
				{
					$rows .= '
						<li>
							<a href="'.RUTA_URL.'/General/Notification/usernotificationlist/'.$notifcation['id'].'">
								<div class="pull-left">
									<img src="'.RUTA_IMG.'/clubs/'.$notifcation['slug'].'/'.$notifcation['logo'].'" class="img-circle" alt="User Image">
	                            </div>
	                            <h4>
	                            	'.ucwords( $notifcation['title'] ).'
	                            	<small><i class="fa fa-clock"></i> '.$this->convertDate( $notifcation['updated_at'] ).'</small>
	                           	</h4>
							</a>
						</li>
					';
				}
			}
			else
			{
				$rows = '
					<li>
						<p style="padding: 5px; text-align: center;">Does not have notifications.</p>
					</li>
				';
			}
			echo $num_rows."|".$rows;
		}

	}

	public function usernotificationlist( $notifcation_id = 'null' )
	{
		if( $notifcation_id != 'null')
		{
			$notificationsend = mysqli_fetch_assoc( $this->notificationsendModel->findByNotificationID( $notifcation_id, $this->Auth()->user()->id() ) );
			$request = [
				'id' => $notificationsend['id'],
				'readed' => 2,
				'updated_at' => date('Y-m-d H:i:s')
			];
			$this->notificationsendModel->update( $request );
		}

		$params = [
			'notifications' => $this->notificationModel->findByUserIDComplete( $this->Auth()->user()->id() ),
			'notification_find' => mysqli_fetch_assoc( $this->notificationModel->findByNotificationIDComplete( $notifcation_id ) ),
		];
		$this->view('Members/Notification/index', $params);
	}

	// función para cargar los datos de las notificaciones en la cabecera
	public function clubnotification()
	{
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		// buscamos la cantidad de miembros
		$result_newmembers = $this->new_members_club( $club['id'] );
		// buscamos la cantidad de suscripciones por aprobar
		$result_paymentapproval = $this->payment_approval( $club['id'] );
		// buscamos la cantidad de suscripciones expiradas
		$result_suscriptionexpired = mysqli_fetch_assoc( $this->clubnotificationModel->findByClubSuscriptionExpired( $club['id'] ) );
		// buscamos la cantidad de miembros de cumpleañs
		$result_birthdaymembers = mysqli_fetch_assoc( $this->clubnotificationModel->findByClubBithdayMembersMonth( $club['id'] ) );
		// buscamos la cantidad de productos vacios
		$result_stockempty = mysqli_fetch_assoc( $this->clubnotificationModel->findByClubStockempty( $club['id'] ) );
		// buscamos la cantidad de trainners nuevo
		$result_stockempty = mysqli_fetch_assoc( $this->clubnotificationModel->findByClubStockempty( $club['id'] ) );
		// variable que contiene las celdas a mostrar en el listado
		$rows = '';
		// validamos que no tengamos un problema
		if( $result_newmembers < 1 && $result_paymentapproval < 1 && $result_suscriptionexpired['cant'] < 1 && $result_birthdaymembers['cant'] < 1 && $result_stockempty['cant'] < 1 )
		{
			$rows = '
					<li>
						<p style="padding: 5px; text-align: center;">Does not have notifications.</p>
					</li>
				';
			echo "0|".$rows;
		}
		else
		{
			// validamos la cantidad de resultados
			if( $result_newmembers > 0 )
			{

				$rows .= '
					<li>
						<a href="'.RUTA_URL.'/Clubs/Member" style="min-height: 30px !important; width: 100% !important; !important; display: block; color: grey; padding: 5px; border-bottom: 1px solid #eee;">
							<span class="pull-left" style="margin-right: 10px; color: #2794E1;">
								<i class="fa fa-users"></i>
							</span>
	                        <span>'.$result_newmembers.' New awaiting acceptance.</span>
						</a>
					</li>
				';
			}
			// validamos la cantidad de resultados
			if( $result_paymentapproval > 0 )
			{
				$rows .= '
					<li>
						<a href="'.RUTA_URL.'/Clubs/Suscription" style="min-height: 30px !important; width: 100% !important; !important; display: block; color: grey; padding: 5px; border-bottom: 1px solid #eee;">
							<span class="pull-left" style="margin-right: 10px; color: #E09A1F;">
								<i class="fa fa-money-bill-wave"></i>
							</span>
	                        <span>'.$result_paymentapproval.' Awaiting payment approval.</span>
						</a>
					</li>
				';
			}
			// validamos la cantidad de resultados
			if( $result_suscriptionexpired['cant'] > 0 )
			{
				$rows .= '
					<li>
						<a href="'.RUTA_URL.'/Clubs/Suscription" style="min-height: 30px !important; width: 100% !important; !important; display: block; color: grey; padding: 5px; border-bottom: 1px solid #eee;">
							<span class="pull-left" style="margin-right: 10px; color: #F02432;">
								<i class="fa fa-gem"></i>
							</span>
	                        <span>'.$result_suscriptionexpired['cant'].' Suscription expired.</span>
						</a>
					</li>
				';
			}
			// validamos la cantidad de resultados
			if( $result_birthdaymembers['cant'] > 0 )
			{
				$rows .= '
					<li>
						<a href="'.RUTA_URL.'/Clubs/Member/Birthdays" style="min-height: 30px !important; width: 100% !important; !important; display: block; color: grey; padding: 5px; border-bottom: 1px solid #eee;">
							<span class="pull-left" style="margin-right: 10px; color: #22A81B;">
								<i class="fa fa-birthday-cake"></i>
							</span>
	                        <span>'.$result_birthdaymembers['cant'].' Members are on birthday this month.</span>
						</a>
					</li>
				';
			}
			// validamos la cantidad de resultados
			if( $result_stockempty['cant'] > 0 )
			{
				$rows .= '
					<li>
						<a href="'.RUTA_URL.'/Clubs/Stock" style="min-height: 30px !important; width: 100% !important; !important; display: block; color: grey; padding: 5px; border-bottom: 1px solid #eee;">
							<span class="pull-left" style="margin-right: 10px; color: #F02432;">
								<i class="fa fa-box-open"></i>
							</span>
	                        <span>'.$result_stockempty['cant'].' Products with empty inventory.</span>
						</a>
					</li>
				';
			}
			echo ($result_newmembers+$result_paymentapproval+$result_suscriptionexpired['cant']+$result_birthdaymembers['cant']+$result_stockempty['cant'])."|".$rows;
		}
	}


	// función para mostrar las notificaciones del club
	public function clubnotificationlist( $notifcation_id = 'null' )
	{
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		if( $notifcation_id != 'null')
		{
			$notificationsend = mysqli_fetch_assoc( $this->clubnotificationModel->find( $notifcation_id ) );
			$request = [
				'id' => $notificationsend['id'],
				'readed' => 2,
				'updated_at' => date('Y-m-d H:i:s')
			];
			$this->clubnotificationModel->update( $request );
		}

		$params = [
			'notifications' => $this->clubnotificationModel->findByClubID( $club['id'] ),
			'notification_find' => mysqli_fetch_assoc( $this->clubnotificationModel->find( $notifcation_id ) ),
		];
		$this->view('Clubs/Notifications/list', $params);
	}


	// función para obtener la cantidad de nuevos miembros y eliminar las notificaciones que se pasan
	public function new_members_club( $club_id )
	{
		// obtenemos las notificaciones los nuevos miembros
		$new_members = mysqli_fetch_assoc( $this->clubnotificationModel->findByClubNewsMembers( $club_id ) );
		// validamos si hay nuevas notificaciones
		if( $new_members['cant'] > 0 )
		{
			// obtenemos el listado de las notificaciones del club
			$new_members = $this->clubnotificationModel->getByClubNewsMembers( $club_id );
			// obtenemos la cantidad inicial
			$cant = $new_members->num_rows;
			// recorremos los datos del usuario
			foreach ($new_members as $item) 
			{
				// obtenemos los datos del miembro
				$member = mysqli_fetch_assoc( $this->memberModel->find( $item['section_id'] ) );
				// validamos si existe el miembro o si ya fue aceptado
				if( !$member or $member['accepted'] == 2 )
				{
					// disminuimos la cantidad de notificaciones
					$cant--;
					// eliminamos esta notificación de la base de datos
					$this->clubnotificationModel->delete( $item['id'] );
				}
			}
		}
		else
			// asignamos un valor por defecto en 0
			$cant = 0;		
		// retornamos el nuevo valor
		return $cant;
	}


	// función para obtener la cantidad de nuevos miembros y eliminar las notificaciones que se pasan
	public function payment_approval( $club_id )
	{
		// obtenemos las notificaciones los nuevos miembros
		$new_payment = mysqli_fetch_assoc( $this->clubnotificationModel->findByClubPaymentApproval( $club_id ) );
		// validamos si hay nuevas notificaciones
		if( $new_payment['cant'] > 0 )
		{
			// obtenemos el listado de las notificaciones del club
			$new_payment = $this->clubnotificationModel->getByClubPaymentApproval( $club_id );
			// obtenemos la cantidad inicial
			$cant = $new_payment->num_rows;
			// recorremos los datos del usuario
			foreach ($new_payment as $item) 
			{
				// obtenemos los datos del miembro
				$payment = mysqli_fetch_assoc( $this->suscriptionModel->find( $item['section_id'] ) );
				// validamos si existe el miembro o si ya fue aceptado
				if( !$payment or $payment['state'] == "paid" or $payment['state'] == "canceled" )
				{
					// disminuimos la cantidad de notificaciones
					$cant--;
					// eliminamos esta notificación de la base de datos
					$this->clubnotificationModel->delete( $item['id'] );
				}

				// obtenemos los datos del miembro
				$member = mysqli_fetch_assoc( $this->memberModel->find( $payment['member_id'] ) );
				// validamos si existe el miembro o si ya fue aceptado
				if( !$member )
				{
					// disminuimos la cantidad de notificaciones
					$cant--;
					// eliminamos esta notificación de la base de datos
					$this->clubnotificationModel->delete( $item['id'] );
				}
			}
		}
		else
			// asignamos un valor por defecto en 0
			$cant = 0;		
		// retornamos el nuevo valor
		return $cant;
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
	public function convertDateComplete( $date )
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