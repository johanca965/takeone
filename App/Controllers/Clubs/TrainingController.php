<?php

class TrainingController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 2 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->clubpackageModel = $this->model('Clubpackage');
		// importamos el modelo correspondiente
		$this->trainingModel = $this->model('Training');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->clubscheduleModel = $this->model('Clubschedule');

	}

	// función principal
	public function index()
	{
		$this->location('Clubs/Training/List');
	}

	public function list( $date = '', $package_id = '' )
	{
		if( empty( $date )){ $date = date('Y-m-d'); }
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [ 
			'packages' => $this->clubpackageModel->findByCludID( $club['id'] ),
			'attended' => $this->trainingModel->attended( $date, $package_id ),
			'notattended' => $this->notattended( $date, $package_id, $club['id'] ),
			'date' => $date,
			'package_id' => $package_id,
			'breadcrumb_data' => '<li class="active">Attendence</li>'
		];
		// redireccionamos al listado de clubs
		$this->view('Clubs/Members/trainings', $params);
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

	private function notattended( $date, $package_id, $club_id )
	{
		// validamos que no tengamos datos vacios
		if( !empty($date) and !empty($package_id) )
		{
			// buscamos que existan clases registradas
			$result = mysqli_fetch_array( $this->trainingModel->hasclass( $date, $package_id ) );
			// validamos que existan clases registradas
			if( $result['count'] > 0 )
			{
				// obtenemos los atendidos en la fecha dada con el paquete
				$attendeds = $this->trainingModel->attended( $date, $package_id );
				// buscamos todos los miembros del club
				$members_find = $this->memberModel->findAllMembersWithClubAndDay( $club_id, $this->convertDateToName( $date ), $date, $package_id );
				// creamos un nuevo vector
				$members = [];
				// recorremos cada uno de los resultados para crear un array
				foreach ($members_find as $subkey => $subArray)
					// agregamos cada resultado al array
					array_push($members, $subArray);

				// recorremos el array creado
				foreach ($members as $key => $value) {
					// recorremos los atendidos obtenidos
					foreach( $attendeds as $attended => $valueat ){
						// validamos que cada atendido esta en el nuevo array
						if( $value['id'] == $valueat['member_id'] )
							// eliminamos el atendido del array nuevo
							unset( $members[$key] );
					}
				}
				// devolvemos el array
				return $members;
			}
			else
			{
				// obtenemos la cantidade de miembros para atender
				$cant_members_for_attendence = mysqli_fetch_assoc( $this->clubscheduleModel->allMembersWithClubAndDay( $club_id, $this->convertDateToName( $date ) ) );
				// validamos si existe miembros a la espera del día de hoy
				if( $cant_members_for_attendence['cant'] > 0 )
				{
					// buscamos todos los miembros del club
					$members_find = $this->memberModel->findAllMembersWithClubAndDay( $club_id, $this->convertDateToName( $date ), $date, $package_id );
					// creamos un nuevo vector
					$members = [];
					// recorremos cada uno de los resultados para crear un array
					foreach ($members_find as $subkey => $subArray)
						// agregamos cada resultado al array
						array_push($members, $subArray);
					// devolvemos el array
					return $members;
				}
				else
				{
					// retornamos un valor vacio
					return ['message' => 'Members are not expected for the selected day and package.'];
				}
			}
		}
		// retornamos un valor vacio
		return ['message' => 'Please select a date and a package'];
	}

	// función para devolver el nombre del día apartir de una fecha
	public function convertDateToName( $date )
	{
		//a timestamp 
		$dates = strtotime($date); 
		//el parametro w en la funcion date indica que queremos el dia de la semana 
		//lo devuelve en numero 0 domingo, 1 lunes,.... 
		switch (date('w', $dates)){ 
			case 0: return "Sunday"; break; 
			case 1: return "Monday"; break; 
			case 2: return "Tuesday"; break; 
			case 3: return "Wednesday"; break; 
			case 4: return "Thursday"; break; 
			case 5: return "Friday"; break; 
			case 6: return "Saturday"; break; 
		} 
	}

}