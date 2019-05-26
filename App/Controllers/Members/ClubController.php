<?php

class ClubController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 1 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->followerclubModel = $this->model('Followersclub');
		// importamos el modelo correspondiente
		$this->notificationModel = $this->model('Notification');
		// con esto instanciamos el modelo correspondiente
		$this->countryModel = $this->model( 'country' );
		// con esto instanciamos el modelo correspondiente
		$this->clubpackageModel = $this->model( 'Clubpackage' );
		// con esto instanciamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// con esto instanciamos el modelo correspondiente
		$this->memberpackageModel = $this->model('Memberpackage');
		// importamos el modelo correspondiente
		$this->clubnotificationModel = $this->model('Clubnotification');

	}

	// función principal
	public function index()
	{
		// redireccionamos al listado de clubs
		$this->location('Members/Club/Find');
	}

	// funcion para mostrar el listado de los clubs
	public function find( $pagina = 1, $input_whr = "title", $value_whr = null )
	{
		$this->view('Members/Clubs/find', $this->clubModel->listing( $pagina, $input_whr, $value_whr ) );
	}

	// funcion para mostrar el listado de los clubs
	public function my_clubs( $pagina = 1, $input_whr = "title", $value_whr = null )
	{
		$this->view('Members/Clubs/find', $this->clubModel->myclubs( $pagina, $input_whr, $value_whr, $this->Auth()->user()->id() ) );
	}

	// funcion para crear un club
	public function found()
	{
		$this->view('Members/Clubs/create', ['countries' => $this->countryModel->listSimple() ] );
	}

	// función para mostrar los datos del club
	public function information( $slug )
	{
		$club = mysqli_fetch_assoc( $this->clubModel->findBySlug( $slug ) );
		$params = [
			'club' => $club,
			'members' => $this->memberModel->findByAllClubID( $club['id'] )
		];
		$this->view('Members/Clubs/information', $params );
	}

	// función para mostrar el formulario de registro de miembro
	public function join( $slug )
	{
		$club = mysqli_fetch_assoc( $this->clubModel->findBySlug( $slug ) );
		$params = [
			'club' => $club,
			'country' => mysqli_fetch_assoc( $this->countryModel->find( $club['country_id'] ) ),
			'clubpackages' => $this->clubpackageModel->findByCludID( $club['id'] ),
		];
		$this->view('Members/Clubs/join', $params );
	}

	// funcion para guardar los datos del club
	public function store()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'title' => 'required|unique:clubs',
			'established' => 'required',
			'country_id' => 'required',
			'city' => 'required',
			'phone' => 'required',
			'email' => 'required|unique:clubs',
			'uniqe_id' => 'required|unique:clubs',
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
			'user_id' => $this->Auth()->user()->id(),
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
			'approved' => 1,
			'addedby' => 'NULL',
			'currency' => $_POST['currency'],
			'gmt_time' => $country['gmt_time'],
			'administration_fee' => $_POST['administration_fee'],
			'uniqe_id' => $_POST['uniqe_id'],
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		if( empty( $request['tumblr'] ) )
			$request['tumblr'] = 'default.png';
		// realizamos la petición
		$result = $this->clubModel->store( $request );
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
				'action' => 'Create',
				'code' => $result_club['id'],
				'description' => 'Club registration with title: ' . $result_club['title'] .', slug: ' . SlugTrait::slug( $result_club['slug'] ) .', established: '. $result_club['established'] .', address_line1: '. $result_club['address_line1'] .', address_line2: '. $result_club['address_line2'] .', country_id: '. $result_club['country_id'] .', city: '. $result_club['city'] .', lat: '. $result_club['lat'] .', lon: '. $result_club['lon'] .', logo: '. $result_club['logo'] .', phone: '. $result_club['phone'] .', email: '. $result_club['email'] .', uniqe_id: '. $result_club['uniqe_id'] .'.',
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

	// función para convertir la fecha en amigable para el usuario
	public function convertDate( $date )
	{
		// explotamos la fecha para separarla
		$fecha = explode( ' ', $date );
		// explotamos la fecha para obtener y, m, d
		$fecha = explode( '-', $fecha[0] );
		// array para mostrar el mes en español
		$meses = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		return $meses[ $fecha[1] - 1 ]. " ".$fecha[2].", ".$fecha[0] ;
	}

	// función para obtener la cantidad de miembros del club
	public function cantMembers( $club_id )
	{
		$result =  mysqli_fetch_assoc( $this->memberModel->countByClubID( $club_id ) );
		return $result['count(*)'];
	}

	// función para validar el seguimiento de un club
	public function validateFollow( $club_id )
	{
		$result = $this->followerclubModel->findFollowWithClub( $club_id, $this->Auth()->user()->id() );
		// following values: 1 = no siguiendo, 2 = siguiendo
		if( $result->num_rows < 1 )
			return '<a href="#" data-following="1" data-url="'.RUTA_URL.'/Members/Followerclub/Follow" data-club-id="'.$club_id.'" class="btn btn-danger btn_follower follow_club" title="Follow club">Follow</a>';
		else
		{
			$data = mysqli_fetch_assoc( $result ) ;
			if( $data['following'] == 1 )
				return '<a href="#" data-following="2" data-url="'.RUTA_URL.'/Members/Followerclub/Follow" data-club-id="'.$club_id.'" class="btn btn-danger btn_follower follow_club" title="Follow club">Follow</a>';
			else
				return '<a href="#" data-following="1" data-url="'.RUTA_URL.'/Members/Followerclub/Follow" data-club-id="'.$club_id.'" class="btn btn-outline-danger btn_follower following_club" title="Stop following club">Following</a>';
		}
	}

	// función para validar si es miembro o no de un club
	public function validateMember( $club_id )
	{
		$result = $this->memberModel->findMemberWithClub( $club_id, $this->Auth()->user()->id() );
		// accepted values: 1 = no aceptado, 2 = aceptado
		// active values: 1 = bloqueado, 2 = activo
		// validamos que existan registros
		if( $result->num_rows < 1 )
		{
			$club = mysqli_fetch_assoc( $this->clubModel->find( $club_id ) );
			return '<a href="'.RUTA_URL.'/Members/Club/Join/'.$club['slug'].'" class="btn btn-danger member_club" title="Join club">Join</a>';
		}
		else
		{
			// obtenemos los datos del registro
			$data = mysqli_fetch_assoc( $result );
			// validamoos si aún no es aceptado
			if( $data['accepted'] == 1 )
				return '<a class="btn btn-outline-grey" title="Waiting answer to the club">Waiting answer</a>';
			else
				// validamos si ya fue aceptado
				if( $data['accepted'] == 2 )
					// validamos si no esta activo
					if( $data['active'] == 1 )
						return '<a class="btn btn-outline-grey" title="You are inactive by the club, communicate with them.">Inactive</a>';
					else
					{
						$club = mysqli_fetch_assoc( $this->clubModel->find( $club_id ) );
						return '<a href="'.RUTA_URL.'/Members/Club/Information/'.$club['slug'].'" class="btn btn-success" title="See club information">Member</a>';
					}
				else
					return '<a class="btn btn-outline-grey" title="Waiting answer to the club">Waiting answer</a>';
		}
	}
		

}