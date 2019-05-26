<?php

class ScheduleController extends Controller
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
		$this->clubtrainnerModel = $this->model('Clubtrainner');
		// importamos el modelo correspondiente
		$this->clubscheduleModel = $this->model('Clubschedule');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');

	}

	public function index()
	{
		$this->location('Clubs/Schedule/List');
	}

	// función para mostrar la vista de inicio
	public function list( $package_id = '' )
	{
		if( !empty($package_id) )
			$package_selected = mysqli_fetch_assoc( $this->clubpackageModel->find( $package_id ) );
		else
			$package_selected = ['title' => 'All'];

		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		
		$params = [ 
			'packages' => $this->clubpackageModel->findByCludID( $club['id'] ),
			'schedules' => $this->clubscheduleModel->listado( $package_id, $club['id'] ),
			'package_selected' => $package_selected,
			'breadcrumb_data' => '<li class="active">Schedule</li>'
		];
		$this->view('Clubs/Schedule/index', $params);
	}


	// función para mostrar la vista de inicio
	public function edit( $id )
	{
		$params = [ 
			'packages' => $this->clubpackageModel->all(),
			'schedule' => mysqli_fetch_assoc( $this->clubscheduleModel->find( $id ) )
		];
		$this->view('Clubs/Schedule/edit_schedule', $params);
	}


	// función para mostrar la vista de inicio
	public function editpackage( $id )
	{
		$this->view('Clubs/Schedule/edit_package', [ 'package' => mysqli_fetch_assoc( $this->clubpackageModel->find( $id ) ) ]);
	}

	// función para guardar los prgramas
	public function store()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'package_id' => 'required|number',
			'activity' => 'required',
			'start_time' => 'required',
			'end_time' => 'required',
			'class_timing' => 'required',
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
		if( !isset( $_POST['days'] ) )
		{
			// retornamos un mensaje de error al usuario
			array_push( $this->errors, "You must select days to create schedule." );
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		else
		{
			$days = '';
			// recorremos los dias para ser guardados
			foreach ($_POST['days'] as $day) 
			{
				// concatenamos los dias
				$days .= $day . ',';
			}
			// eliminamos el último caracter de la cadena
			$days = trim($days, ',');
		}


		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );

		// realizamos la consulta para validar que la clase no interfiere con otra
		$result = $this->clubscheduleModel->validate( $club['id'], $_POST['package_id'], $_POST['start_time'], $_POST['activity'] );
			// validamos de que no existan más resultados
		if( $result->num_rows > 0 )
		{
				// recorremos los resultados
			foreach ($result as $value) 
			{
					// obtenemos los dias de cada resultad
				$days_search = explode(',', $value['days']);
					// recorremos los dias obtenidos
				foreach ($days_search as $day_search) 
				{
						// recorremos los días seleccionados
					foreach ($_POST['days'] as $day_selected)
					{
							// validamos si es el mism día
						if( $day_selected == $day_search )
						{
								// retornamos un mensaje de error al usuario
							array_push( $this->errors, "The schedule interferes with other schedules." );
								// mostramos el error
							echo $this->errors();
								// evitamos que siga la función
							return;
						}
					}
				}
			}
		}
		// creamos un array que contiene los datos a guardar
		$request = [
			'club_id' => $club['id'],
			'package_id' => $_POST['package_id'],
			'activity' => $_POST['activity'],
			'trainner_id' => $_POST['trainner_id'],
			'start_time' => $_POST['start_time'],
			'end_time' => $_POST['end_time'],
			'class_timing' => $_POST['class_timing'],
			'days' => $days,
			'extra_information' => $_POST['extra_information'],
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		// realizamos la petición
		$result = $this->clubscheduleModel->store( $request );
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
			// mostramos mensaje de éxito
			echo 'true';
		}
	}


	// función para modificar los prgramas
	public function update()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'package_id' => 'required|number',
			'activity' => 'required',
			'start_time' => 'required',
			'end_time' => 'required',
			'class_timing' => 'required',
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
		if( !isset( $_POST['days'] ) )
		{
			// retornamos un mensaje de error al usuario
			array_push( $this->errors, "You must select days to create schedule." );
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		else
		{
			$days = '';
			// recorremos los dias para ser guardados
			foreach ($_POST['days'] as $day) 
			{
				// concatenamos los dias
				$days .= $day . ',';
			}
			// eliminamos el último caracter de la cadena
			$days = trim($days, ',');
		}
		// creamos un array que contiene los datos a guardar
		$request = [
			'id' => $_POST['id'],
			'package_id' => $_POST['package_id'],
			'activity' => $_POST['activity'],
			'trainner_id' => $_POST['trainner_id'],
			'start_time' => $_POST['start_time'],
			'end_time' => $_POST['end_time'],
			'class_timing' => $_POST['class_timing'],
			'days' => $days,
			'extra_information' => $_POST['extra_information'],
			'updated_at' => date('Y-m-d H:i:s')
		];
		// realizamos la petición
		$result = $this->clubscheduleModel->update( $request );
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
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// función para guardar los paquetes
	public function storepackage()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'title' => 'required',
			'capacity' => 'required|number',
			'gender' => 'required',
			'min_age' => 'required|number',
			'max_age' => 'required|number',
			'price' => 'required',
			'picture' => 'required',
			'status' => 'required'
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
			'title' => $_POST['title'],
			'slug' => SlugTrait::slug( $_POST['title'] ),
			'capacity' => $_POST['capacity'],
			'gender' => $_POST['gender'],
			'min_age' => $_POST['min_age'],
			'max_age' => $_POST['max_age'],
			'price' => $_POST['price'],
			'discount' => $_POST['discount'],
			'picture' => $_POST['picture'],
			'status' => $_POST['status'],
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		// realizamos la petición
		$result = $this->clubpackageModel->store( $request );
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
			// realizamos la petición para los datos del blog
			$result = mysqli_fetch_assoc( $this->clubpackageModel->findBySlug( SlugTrait::slug( $_POST['title'] ) ) );
			// creamos un array que contiene los datos a registrar
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'tabla' => 'Club package',
				'action' => 'Create',
				'code' => $result['id'],
				'description' => 'Package registration with club code: ' . $club['id'] .', title: ' . $_POST['title'] .', capacity: ' . $_POST['capacity'] .', gender: ' . $_POST['gender'] .', min age: ' . $_POST['min_age'] .', max age: ' . $_POST['max_age'] .', price: ' . $_POST['price'] .', discount: ' . $_POST['discount'] .', picture: ' . $_POST['picture'] .', status: ' . $_POST['status'] .'.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}


	// función para guardar los paquetes
	public function updatepackage()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'capacity' => 'required|number',
			'gender' => 'required',
			'min_age' => 'required|number',
			'max_age' => 'required|number',
			'price' => 'required',
			'picture' => 'required',
			'status' => 'required'
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
			'capacity' => $_POST['capacity'],
			'gender' => $_POST['gender'],
			'min_age' => $_POST['min_age'],
			'max_age' => $_POST['max_age'],
			'price' => $_POST['price'],
			'discount' => $_POST['discount'],
			'picture' => $_POST['picture'],
			'status' => $_POST['status'],
			'updated_at' => date('Y-m-d H:i:s')
		];
		// realizamos la petición
		$result = $this->clubpackageModel->update( $request );
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
			// realizamos la petición para los datos del blog
			$result = mysqli_fetch_assoc( $this->clubpackageModel->findBySlug( SlugTrait::slug( $_POST['title'] ) ) );
			// creamos un array que contiene los datos a registrar
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'tabla' => 'Club package',
				'action' => 'Create',
				'code' => $result['id'],
				'description' => 'Package registration with title: ' . $_POST['title'] .', capacity: ' . $_POST['capacity'] .', gender: ' . $_POST['gender'] .', min age: ' . $_POST['min_age'] .', max age: ' . $_POST['max_age'] .', price: ' . $_POST['price'] .', discount: ' . $_POST['discount'] .', picture: ' . $_POST['picture'] .', status: ' . $_POST['status'] .'.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// función para buscar los entrenadores de acuerdo a una actividad
	public function findtrainner()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'activity' => 'required',
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
		// realizamos la petición
		$result = $this->clubtrainnerModel->findByClubActivity( $club['id'], $_POST['activity'] );
		// listado por defecto
		$listado = '<option value="NULL" selected disabled>Select Your Trainner</option><option value="0">Unidentified</option>';
		// validamos que existan resultads
		if( $result->num_rows > 0 )
		{
			$trainner = mysqli_fetch_assoc($result);
			foreach ($result as $state) {
				$listado .= "<option value='".$trainner['id']."'>".ucwords($trainner['name'])."</option>";
			}
			echo "true|".$listado;
		}
		else
		{
			echo 'Not found results.|'.$listado;
		}
	}

	// función para buscar los entrenadores de acuerdo a una actividad
	public function findtrainnerEdit( $activity, $trainner_id )
	{
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		// realizamos la petición
		$result = $this->clubtrainnerModel->findByClubActivity( $club['id'], $activity );
		// validamos que existan resultads
		if( $result->num_rows > 0 )
		{
		// listado por defecto
			$listado = '<option value="NULL" selected disabled>Select Your Trainner</option><option value="0">Unidentified</option>';
			$trainner = mysqli_fetch_assoc($result);
			foreach ($result as $state) 
			{
				$select = "";
				if( $trainner['id'] == $trainner_id )
					$select = "selected";
				$listado .= "<option ".$select." value='".$trainner['id']."'>".ucwords($trainner['name'])."</option>";
			}
		}
		else
		{
			// listado por defecto
			$listado = '<option value="NULL" disabled>Select Your Trainner</option><option value="0" selected>Unidentified</option>';
		}
		echo $listado;
	}


	// funcion para eliminar un dato
	public function delete()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'id' => 'required|number'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// realizamos la petición
		$result = $this->clubscheduleModel->delete( $_POST['id'] );
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
			// mostramos mensaje de éxito
			echo 'true';
		}
	}


	// funcion para eliminar un dato
	public function deletepackage()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'id' => 'required|number'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// realizamos la petición
		$result = $this->clubpackageModel->delete( $_POST['id'] );
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
			// mostramos mensaje de éxito
			echo 'true';
		}
	}


	// función para subir el logo del club
	public function uploadPhoto()
	{
		// obtenemos la imagen despúes de hacer crop
		$data = $_POST['image'];
		// expltamos la imagen para obtener los datos del base64
		$image_exp = explode(",", $data);
		// desencriptamos el base64
		$data = base64_decode($image_exp[1]);
		// obtenemos el slug del titulo del club
		$slug = SlugTrait::slug( $_POST['folder'] );
		// creamos el nombre de la imagen
		$imageName = time() . '-' . $slug . '.png';
		// creamos la ruta de acuerdo a la varible global public
		$folder = RUTA_PUBLIC . '/' . 'img/schedule/' . $slug;
		// creamos la carpeta si no existe
		if (!file_exists($folder))
			// creamos la carpeta
			mkdir($folder, 0777, true);
		// creamos la imagen segun la ruta que deseemos
		file_put_contents($folder.'/'.$imageName, $data);
		// enviamos el nombre de la imagen
		echo "true|".$imageName;
	}

}