<?php

class StockController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 2 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->stockModel = $this->model('stock');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->clubnotificationModel = $this->model('Clubnotification');

	}

	// función para obtener los datos del club
	public function index()
	{
		// obtenemos los datos del club
		$result = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [
			'stocks' => $this->stockModel->findByAvailableClubID( $result['id'] ),
			'stocks_exhausted' => $this->stockModel->findByExhaustedClubID( $result['id'] ),
			'club' => $result,
			'breadcrumb_data' => '<li class="active">Stock</li>'
		];
		$this->view('Clubs/Stock/index', $params);
	}

	// función para mostrar el formulario
	public function create()
	{
		$params = [
			'breadcrumb_data' => '
				<li>
                    <a title="List products" href="'.RUTA_URL.'/Clubs/Stock/">
                       <i class="fa fa-box"></i> Stock</a>
                </li>
				<li class="active">New</li>
			'
		];
		$this->view('Clubs/Stock/create', $params);
	}

	// función para mostrar los datos
	public function edit( $slug )
	{
		$params = [
			'stock' => mysqli_fetch_assoc( $this->stockModel->findBySlug( $slug ) ),
			'breadcrumb_data' => '
				<li>
                    <a title="List products" href="'.RUTA_URL.'/Clubs/Stock/">
                       <i class="fa fa-box"></i> Stock</a>
                </li>
				<li class="active">Update</li>
			'
		];
		$this->view('Clubs/Stock/edit', $params );
	}

	// funcion para registrar los stocks
	public function store()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'name' => 'required',
			'price' => 'required',
			'quantity' => 'required|number'
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
			'name' => $_POST['name'],
			'slug' =>  SlugTrait::slug( $_POST['name'] ),
			'price' => $_POST['price'],
			'cant' => $_POST['quantity'],
			'state' => 'active',
			'photo' => $_POST['logo'],
			'code' => $_POST['code'],
			'created_at' => date('Y-m-d H:i:s'),
			'updated_at' => date('Y-m-d H:i:s')
		];
		// realizamos la petición
		$result = $this->stockModel->store( $request );
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
			$result = mysqli_fetch_assoc( $this->stockModel->findBySlug( SlugTrait::slug( $_POST['name'] ) ) );
			// creamos un array que contiene los datos a registrar
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'tabla' => 'Stock',
				'action' => 'Create',
				'code' => $result['id'],
				'description' => 'Stock registration with name: ' . $result['name'] .', slug: ' . SlugTrait::slug( $_POST['name'] ) .', price: ' . $result['price'] .', quantity: ' . $result['cant'] .', state: ' . $result['state'] .'.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// funcion para registrar los stocks
	public function update()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'name' => 'required',
			'price' => 'required',
			'quantity' => 'required|number'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}

		// realizamos la petición para los datos del stock
		$result_stock = mysqli_fetch_assoc( $this->stockModel->findBySlug( SlugTrait::slug( $_POST['name'] ) ) );
		// validamos si tiene cantidad vacia y si la cantidad a ingresar es mayor a 0
		if( $result_stock['cant'] < 1 && $_POST['quantity'] > 0 )
			// borramos la notificacions
			$this->clubnotificationModel->deleteSectionID( "stock", $_POST['id'] );
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		// creamos un array que contiene los datos a guardar
		$request = [
			'id' => $_POST['id'],
			'name' => $_POST['name'],
			'slug' =>  SlugTrait::slug( $_POST['name'] ),
			'price' => $_POST['price'],
			'cant' => $_POST['quantity'],
			'state' => $_POST['state'],
			'photo' => $_POST['logo'],
			'code' => $_POST['code'],
			'updated_at' => date('Y-m-d H:i:s')
		];
		// realizamos la petición
		$result = $this->stockModel->update( $request );
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
				'tabla' => 'Stock',
				'action' => 'Update',
				'code' => $result_stock['id'],
				'description' => 'Stock update with name: ' . $result_stock['name'] .', slug: ' . SlugTrait::slug( $_POST['name'] ) .', price: ' . $result_stock['price'] .', quantity: ' . $result_stock['cant'] .', state: ' . $result_stock['state'] .'.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
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
		$folder = RUTA_PUBLIC . '/' . 'img/products/' . $slug;
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

}