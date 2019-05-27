<?php

class InformationController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 2 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'country' );

	}

	// función para obtener los datos del club
	public function index()
	{	
		// obtenemos los datos del club
		$result = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [
			'club' => $result,
			'countries' => $this->countryModel->listSimple(),
			'breadcrumb_data' => '<li class="active">Settings</li>'
		];
		$this->view('Clubs/information', $params);
	}

	// funcion para actualizar los datos del club
	public function update()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'title' => 'required|unique:clubs:'.$_POST['id'],
			'established' => 'required',
			'country_id' => 'required',
			'city' => 'required',
			'phone' => 'required',
			'logo' => 'required',
			'currency' => 'required',
			'administration_fee' => 'required'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// obtenemos los datos del país
		$country = mysqli_fetch_assoc( $this->countryModel->find( $_POST['country_id'] ) );
		// creamos un array que contiene los datos a guardar
		$request = [
			'id' => $_POST['id'],
			'title' => $_POST['title'],
			'slug' =>  SlugTrait::slug( $_POST['title'] ),
			'established' => $_POST['established'],
			'address_line1' => $_POST['address_line1'],
			'address_line2' => $_POST['address_line2'],
			'country_id' => $_POST['country_id'],
			'city' => $_POST['city'],
			'lat' => $_POST['lat'],
			'lon' => $_POST['lon'],
			'logo' => $_POST['logo'],
			'phone' => $_POST['phone'],
			'email' => $_POST['email'],
			'currency' => $_POST['currency'],
			'gmt_time' => $country['gmt_time'],
			'administration_fee' => $_POST['administration_fee'],
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		if( empty( $request['tumblr'] ) )
			$request['tumblr'] = 'default.png';
		// realizamos la petición
		$result = $this->clubModel->update( $request );
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
			$result_club = mysqli_fetch_assoc( $this->clubModel->findBySlug( SlugTrait::slug( $_POST['title'] ) ) );
			// creamos un array que contiene los datos a registrar
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'tabla' => 'Club',
				'action' => 'Actualizaci+on',
				'code' => $result_club['id'],
				'description' => 'Club update with title: ' . $result_club['title'] .', slug: ' . SlugTrait::slug( $result_club['slug'] ) .', established: '. $result_club['established'] .', address_line1: '. $result_club['address_line1'] .', address_line2: '. $result_club['address_line2'] .', country_id: '. $result_club['country_id'] .', city: '. $result_club['city'] .', lat: '. $result_club['lat'] .', lon: '. $result_club['lon'] .', logo: '. $result_club['logo'] .', phone: '. $result_club['phone'] .'.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// función para subir el logo del club
	public function uploadLogo()
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
		$folder = RUTA_PUBLIC . '/' . 'img/clubs/' . $slug;
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