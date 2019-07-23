<?php

// wget -O - http://takeone.technology/Cronjob/Suscription/expired >/dev/null 2>&1
// wget -O - http://takeone.technology/Cronjob/Suscription/generate >/dev/null 2>&1


class SuscriptionController extends Controller
{

	public function __construct()
	{
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->suscriptionModel = $this->model('Suscription');
		// importamos el modelo correspondiente
		$this->suscriptionpackageModel = $this->model('Suscriptionpackage');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->userModel = $this->model('User');
		// importamos el modelo correspondiente
		$this->clubnotificationModel = $this->model('Clubnotification');
		// importamos el modelo correspondiente
		$this->clubpackageModel = $this->model('Clubpackage');
		// importamos el modelo correspondiente
		$this->memberpackageModel = $this->model('Memberpackage');

	}

	// función para obtener los datos del club
	public function index()
	{
		$this->location("Auth/Login");
	}

	// función para generar nuevas suscripciones
	public function generate()
	{
		// buscamos todos los clubs del sistema
		$clubs = $this->clubModel->all();
		// recorremos todos los clubs encontrados para emprezar el proceso
		foreach ($clubs as $club) 
		{
			// obtenemos el id del club
			$club_id = $club['id'];
			// buscamos todos los miembros del club
			$members = $this->memberModel->findByClubID( $club_id );
			// recorremos todos los miembros encontrados para emprezar a validar
			foreach ($members as $member)
			{
				// validamos que el miembro este activo y aceptado
				if( $member["accepted"] == 2 && $member["active"] == 2 )
				{
					// obtenemos el id del miembro
					$member_id = $member["id"];
					// buscamos la última suscripción
					$last_suscription = $this->suscriptionModel->getLastByMemberID( $member_id );
					// validamos si existe un registro o creamos uno nuevo
					if( !$last_suscription or $last_suscription->num_rows < 1 )
					{
						// generamos una nueva suscripción
						$this->generate_suscription( $club_id, $member_id );
					}
					else
					{
						// obtenemos los datos de la ultima suscripcion
						$last_suscription = mysqli_fetch_assoc( $last_suscription );
						// validamos si la suscripción es diferente de cancelada
						if( $last_suscription["state"] != "canceled" )
						{
							// obtenemos la cantidad de días de diferencia
							$cant_days = $this->diferenciaDias( $last_suscription["created_at"], date("Y-m-d") );
							// validamos que la fecha de la suscripción tenga una diferencia mayor o igual a 30 días
							if( $cant_days >= 30 )
							{
								// generamos una nueva suscripción
								$this->generate_suscription( $club_id, $member_id );
							}
						}
					}
				}
			}
		}
	}

	// función para validar si la fecha ya expiro
	public function expired()
	{
		// buscamos todos los clubs del sistema
		$clubs = $this->clubModel->all();
		// recorremos todos los clubs encontrados para emprezar el proceso
		foreach ($clubs as $club) 
		{
			// obtenemos el id del club
			$club_id = $club['id'];
			// buscamos todos los miembros del club
			$members = $this->memberModel->findByClubID( $club_id );
			// recorremos todos los miembros encontrados para emprezar a validar
			foreach ($members as $member)
			{
				// validamos que el miembro este activo y aceptado
				if( $member["accepted"] == 2 && $member["active"] == 2 )
				{
					// obtenemos el id del miembro
					$member_id = $member["id"];
					// buscamos la última suscripción
					$suscriptions = $this->suscriptionModel->findByMemberID( $member_id );
					// validamos si existe un registro o creamos uno nuevo
					if( $suscriptions && $suscriptions->num_rows > 0 )
					{
						// recorremos todos los miembros encontrados para emprezar a validar
						foreach ($suscriptions as $suscription)
						{
							// validamos si la suscripción es diferente de cancelada
							if( $suscription["state"] == "approval" )
							{
								// obtenemos la cantidad de días de diferencia
								$cant_days = $this->diferenciaDias( $suscription["created_at"], date("Y-m-d") );
								// validamos que la fecha de la suscripción tenga una diferencia mayor o igual a 30 días
								if( $cant_days >= 30 )
								{
									// creamos el request con los datos a guardar
									$request = [
										"id" => $suscription["id"],
										"state" => "expired",
										"updated_at" => date('Y-m-d H:i:s'),
									];
									// creamos la función para actualizar los datos
									$result = $this->suscriptionModel->update( $request );
									// obtenemos los datos de la notificación de la suscripcion
									$notificacion = mysqli_fetch_assoc( $this->clubnotificationModel->findByClubIdandSectionandSectionId( $club_id, "suscription", $suscription["id"] ) );
									// creamos el request con los datos a guardar
									$request = [
										"id" => $notificacion["id"],
										"importance" => "3",
										"updated_at" => date('Y-m-d H:i:s'),
									];
									// creamos la función para actualizar los datos
									$result = $this->clubnotificationModel->update( $request );
								}
								// validamos que la fecha de la suscripción tenga una diferencia mayor o igal a 27 para enviar un correo
								if( $cant_days == 27 )
								{
									// obtenemos los datos del usuario
									$user = mysqli_fetch_assoc( $this->userModel->find( $member["user_id"] ) );
									// importamos la libreria para enviar correos
									require_once RUTA_APP."/Traits/SendMailTrait.php";
									// importamos la plantilla
									require_once RUTA_APP."/Helpers/EmailTemplates/SubscriptionreminderTemplate.php";
									// instanciamos la pantilla
									$template = SubscriptionreminderTemplate::template( $club['title'] );
									// enviamos el correo
									SendMailTrait::send( SMTP_ADDRESS, APP_NAME, $template, 'Subscription reminder', $user['username'], "Subscription reminder" );
								}
							}
						}
					}
				}
			}
		}
	}

	// función para generar una nueva suscripción
	private function generate_suscription( $club_id, $member_id )
	{
		// buscamos los paquetes del miembro
		$packages = $this->memberpackageModel->findByMemberID( $member_id );
		// variable que contendra el total de la suscripción
		$total = 0;
		// validamos si existe un registro
		if( $packages && $packages->num_rows > 0 )
		{
			// recorremos todos los packetes encontrados para emprezar a validar
			foreach ($packages as $package)
			{
				// obtenemos los datos del paquete
				$clubpackage = mysqli_fetch_assoc( $this->clubpackageModel->find( $package["id"] ) );
				// validamos si existe un registro
				if( $clubpackage && !empty( $clubpackage["id"] ) )
				{
					// guardamos los ids de los paquetes para luego ser registrados
					$packages_ids[] = $clubpackage;
					// obtenemos el total de los paquetes
					$total += $clubpackage["price"];
				}
			}
			
		}
		// validamos si el total es mayor a 0 para crear la nueva suscripcion
		if( $total > 0 )
		{
			// creamos la notificación de nuevo miembro
			$time = date('Y-m-d H:i:s');
			// creamos el request con los datos a guardar
			$request = [
				"club_id" => $club_id,
				"member_id" => $member_id,
				"price" => $total,
				"total_discount" => 0,
				"payment_method" => "cash",
				"state" => "approval",
				"created_at" => $time,
				"updated_at" => $time,
			];
			// creamos la función para guardar los datos
			$result = $this->suscriptionModel->store( $request );
			// validamos que se ejecute bien
			if( $result )
			{
				// obtenemos los datos de la suscripción
				$suscription = mysqli_fetch_assoc( $this->suscriptionModel->findByClubUserIDDate( $club_id, $member_id, $time ) );
				// recorremos los paquetes de donde se calculo el total
				foreach ($packages_ids as $package) 
				{
					// creamos la notificación de nuevo miembro
					$request = [
						'suscription_id' => $suscription['id'],
						'package_id' => $package['id'],
						'created_at' => date('Y-m-d H:i:s')
					];
					// creamos la nueva notificacion
					$this->suscriptionpackageModel->store( $request );
				}
				// creamos la notificación de nuevo miembro
				$request = [
					'club_id' => $club_id,
					'importance' => '2',
					'section' => 'suscription',
					'section_id' => $suscription['id'],
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				];
				// creamos la nueva notificacion
				$this->clubnotificationModel->store( $request );
			}
		}

	}

	// función para obtener la cantidad de días de diferencia entre dos fechas
	public function diferenciaDias($inicio, $fin)
	{
	    $inicio = strtotime($inicio);
	    $fin = strtotime($fin);
	    $dif = $fin - $inicio;
	    $diasFalt = (( ( $dif / 60 ) / 60 ) / 24);
	    return ceil($diasFalt);
	}


}