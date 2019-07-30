<?php

class MemberController extends Controller
{

	public function __construct()
	{
		$this->userModel = $this->model('User');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->trainingModel = $this->model('Training');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->clubscheduleModel = $this->model('Clubschedule');
		// importamos el modelo correspondiente
		$this->memberpackageModel = $this->model('Memberpackage');
		// importamos el modelo correspondiente
		$this->suscriptionModel = $this->model('Suscription');
	}

	public function index(){
		$this->location('Auth/login');
	}

	// función para realizar el registro de una visita
	public function attendence()
	{
		// capturamos el id del club para ser reutilizado
		$club_id = $_POST["club_id"];
		// buscamos los datos del  miembro
		$member = $this->memberModel->findMemberWithClub( $club_id, $_POST["user_id"] );
		// validamos que exista el registro
		if( !$member or $member->num_rows < 1 )
			// mostramos mensaje de error
			$msg = "You don't belong to this club.";
		else
		{
			// obtenemos los datos del miembro
			$member = mysqli_fetch_assoc( $member );
			// validamos si el miembro no ha sido aceptado
			if( $member["accepted"] == 1 )
				// mostramos mensaje de error
				$msg = "You have not been accepted by the club yet.";
			// validamos si el miembro no ha sido eliminado
			else if( $member["accepted"] == 4 )
				// mostramos mensaje de error
				$msg = "You are not part of the club.";
			// validamos si el miembro no ha sido bloqueado
			else if( $member["active"] == 1 or $member["active"] == 3 )
				// mostramos mensaje de error
				$msg = "You have been blocked by the club.";
			else
			{
				// buscamos los datos de la última suscripción del miembro
				$last_suscription = $this->suscriptionModel->findLastByMemberID( $member['member_id'] );
				// validamos que exista el registro
				if( $last_suscription && $last_suscription->num_rows > 0 )
				{
					// obtenemos los datos de la última suscripción del miembro
					$last_suscription = mysqli_fetch_assoc( $last_suscription );
					// validamos si la suscripción fue cancelada
					if( $last_suscription["state"] == "canceled" )
						// mostramos mensaje de error
						$msg = "Your subscription was canceled.";
					else if( $last_suscription["state"] == "expired" )
						// mostramos mensaje de error
						$msg = "Your subscription has expired.";
					else
					{
						// obtenemos los datos del club
						$club = mysqli_fetch_assoc( $this->clubModel->find( $club_id ) );
						// definimos la zona horaria
						if( !$club['gmt_time'] )
							date_default_timezone_set( 'Asia/Bahrain' );
						else
							date_default_timezone_set( $club['gmt_time'] );
						// obtenemos el día
						$day = date('l');
						// obtenemos el tiempo para la búsqueda
						$time = $this->change_hour_12_to_24( date('h:i A') );
						// obtenemos todas las clases que tiene el club en el día especifico
						$schedules = $this->clubscheduleModel->findByClubandDay( $club_id, $day );
						// recorremos todos las clases
						foreach ($schedules as $schedule) 
						{
							// obtenemos la hora de inicio formateada
							$start_time = $this->change_hour_12_to_24( $schedule["start_time"] );
							// obtenemos la hora de fin formateada
							$end_time = $this->change_hour_12_to_24( $schedule["end_time"] );
							// validamos que la hora en que el usuario se va a registrar se encuentre la clase
							if( $start_time <= $time && $time <= $end_time )
							{
								// validamos si el usuario tiene registrado el paquete
								$package_member = $this->memberpackageModel->findByMemberandPackageID( $member['member_id'], $schedule["package_id"] );
								// validamos que exista el registro
								if( $package_member && $package_member->num_rows > 0 )
								{
									// creamos el request a enviar
									$request = [
										"clubschedule_id" => $schedule["id"],
										"member_id" => $member['member_id'],
										"created_at" => date('Y-m-d H:i:s')
									];
									$result = $this->trainingModel->store( $request );
									// validamos si se logueo o no
									if( !$result )
									{
										// agregamos los errores obtenidos desde la peticion hecha al model
										$msg = $result;
										return;
									}
									else
										// retornamos a la vista de acceso cuando se satisfatorio el logueo
										$msg = "successful";
								}
							}
							else
								$msg = "There are no schedules available at this time.";
						}
					}
				}
				else
					// mostramos mensaje de error
					$msg = "A club subscription has not been found.";
				
			}
		}
		// imprimos el mensaje de respuesta
		echo json_encode( ['msg' => $msg] );
	}


	public function change_hour_12_to_24( $hour )
	{
		return date( "H:i", strtotime( $hour ) );
	}

}