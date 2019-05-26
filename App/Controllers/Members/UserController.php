<?php

class UserController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->guest( );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->userModel = $this->model('User');
		// importamos el modelo correspondiente
		$this->userdataModel = $this->model('Userdata');
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'country' );
		// con esto instanciamos el modelo correspondiente
		$this->stateModel = $this->model( 'state' );
		// con esto instanciamos el modelo correspondiente
		$this->clubModel = $this->model( 'Club' );

	}

	// función principal
	public function index()
	{
		// redireccionamos al listado de clubs
		$this->location('Members/User/Profile');
	}

	// función para mostrar los datos del usuario
	public function profile()
	{
		// obtenemos los datos del usuario
		$userdata = mysqli_fetch_assoc( $this->userdataModel->findByUser( $this->Auth()->user()->id() ) );
		// creamos el request 
		$params = [
			'countries' => $this->countryModel->listSimple(),
			'user' => $this->userModel->findUser(),
			'userdata' => $userdata,
		];
		$this->view('Members/User/profile', $params );
	}

	// función para actualizar un registro
	public function update()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'id' => 'required|number',
			'country_id' => 'required|number',
			'city' => 'required',
			'name' => 'required',
			'username' => 'required|unique:users:'.$_POST['id']
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
			'name' => $_POST['name'],
			'slug' =>  SlugTrait::slug( $_POST['name'] ),
			'password' => password_hash( $_POST['password'], PASSWORD_BCRYPT),
			'photo' => SlugTrait::slug( $_POST['username'] ).'/'.$_POST['photo'],
			'updated_at' => date('Y-m-d H:i:s')
		];	
		// validamos si el password viene vacío
		if( empty( $_POST['password'] ) )
			// lo sacamos de la listaa para evitar actualizarla
			unset( $request['password'] );

		// validamos si la foto viene vacía
		if( empty( $_POST['photo'] ) )
			// la sacamos de la listaa para evitar actualizarla
			unset( $request['photo'] );
		// obtenemos los datos iniciales del registro
		$data = mysqli_fetch_array( $this->userModel->find( $_POST['id'] ) );
		// realizamos la petición
		$result = $this->userModel->update( $request );
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
			// obtenems los datos del usuario
			$userdata = mysqli_fetch_assoc( $this->userdataModel->findByUser( $_POST['id'] ) );
			// request que se enviara a actualizar
			$request = [
				'id' => $userdata['id'],
				'country_id' => $_POST['country_id'],
				'city' => $_POST['city'],
				'rfid' => $_POST['rfid'],
				'cpr' => $_POST['cpr'],
				'passport' => $_POST['passport'],
				'helth_issues' => $_POST['helth_issues'],
				'gender' => $_POST['gender'],
				'marital' => $_POST['marital'],
				'bloodtype' => $_POST['bloodtype'],
				'birthday' => $_POST['birthday'],
				'address' => $_POST['address'],
				'mobile' => $_POST['mobile'],
				'social_link' => $_POST['social_link'],
			];
			// realizamos la petición
			$result = $this->userdataModel->update( $request );
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
				// creamos un arrau que contiene los datos a registrar
				$request = [
					'user_id' => $this->Auth()->user()->id(),
					'tabla' => 'Users',
					'action' => 'Upgrade',
					'code' => $_POST['id'],
					'description' => 'User update with code ' . $_POST['id'] .' pfor the following data with their respective values: name: ' . $data['name'] .', slug: ' . SlugTrait::slug( $data['name'] ) .' created the day ' . $data['created_at'] . '.',
					'created_at' => date('Y-m-d H:i:s')
				];
				// realizamos la petición
				$this->auditModel->store( $request );
				// mostramos mensaje de éxito
				echo 'true';
			}
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
		$folder = RUTA_PUBLIC . '/' . 'img/users/' . $slug;
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