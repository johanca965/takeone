<?php 


class Club extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "clubs";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"user_id", "title", "slug", "established", "address_line1", "address_line2", "country_id", "city", "lat", "lon", "logo", "phone", "email", "uniqe_id", "approved", "addedby", "currency", "gmt_time", "administration_fee", "created_at", "updated_at"
		];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [ "" ];
	}

	// función que devuelve todos los registros
	public function full()
	{
		// ejecutamos la consulta
		return parent::simple(' SELECT t1.*, t2.name as owner t3.name as country FROM ' . $this->table .' t1 INNER JOIN users t2 ON t1.user_id = t2.id INNER JOIN countries t3 ON t1.country_id = t3.id ' );
	}

	// función para almacenar un registro
	public function all( $input = "created_at", $order = "asc" )
	{
		// ejecutamos la consulta
		return parent::all( $input, $order );
	}

	// función para almacenar un registro
	public function store( $request )
	{
		// ejecutamos la consulta
		return parent::store( $request );
	}

	// función para almacenar un registro
	public function update( $request )
	{
		// ejecutamos la consulta
		return parent::update( $request );
	}

	// función para almacenar un registro
	public function find( $id )
	{
		// ejecutamos la consulta
		return parent::find( $id );
	}

	// función para buscar un registro por slug
	public function findBySlug( $slug )
	{
		// ejecutamos la consulta
		return parent::simple( " SELECT t1.*, t2.name as owner, t2.photo, t3.name as country FROM " . $this->table . " t1 INNER JOIN users t2 on t1.user_id = t2.id INNER JOIN countries t3 ON t1.country_id = t3.id WHERE t1.slug = '" . $slug . "' " );
	}

	// función para buscar un registro por slug
	public function findByUserID( $user_id )
	{
		// ejecutamos la consulta
		return parent::simple( " SELECT t1.*, t2.name as owner, t2.photo, t3.name as country FROM " . $this->table . " t1 INNER JOIN users t2 on t1.user_id = t2.id INNER JOIN countries t3 ON t1.country_id = t3.id  WHERE t1.user_id = '" . $user_id . "' " );
	}

	// función para almacenar un registro
	public function delete( $id )
	{
		// ejecutamos la consulta
		return parent::delete( $id );
	}

	// función para listar los registros
	public function listing( $pagina = 1, $input_whr = 'title', $value_whr = null, $input_ord = 'title', $order = 'asc' )
	{
		// validamos si estan buscando por city
		if( $input_whr == "city" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$city = mysqli_fetch_assoc( parent::simple( ' SELECT id FROM cities WHERE name LIKE "%'.$value_whr.'%" ' ) );
				// reasignamos el valor del id
				$value_whr = $city['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "club_id";
		}
		// validamos si estan buscando por user
		else if( $input_whr == "user" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$user = mysqli_fetch_assoc( parent::simple( ' SELECT id FROM users WHERE name LIKE "%'.$value_whr.'%" ' ) );
				// reasignamos el valor del id
				$value_whr = $user['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "user_id";
		}
		// Creamos la ruta en la cual vamos a mostrar los datos de la pagina y con cual realizamos la consulta
		$url = RUTA_URL . "/Members/Club/Find";
        // generamos la consulta sql con los datos a obtener
        $sql = ' SELECT t1.*, t2.name as owner, t3.name as country FROM ' . $this->table . ' t1 INNER JOIN users t2 on t1.user_id = t2.id INNER JOIN countries t3 ON t1.country_id = t3.id WHERE ' . $input_whr . ' LIKE "%' . $value_whr . '%" and approved = "2" ';
        // retornamos los valores obtenidos con la función de paginacion
        return parent::pagination( $url, $pagina, $value_whr, $input_whr, $input_ord, $order, $sql );
	}


	// función para listar los registros
	public function myclubs( $pagina = 1, $input_whr = 'title', $value_whr = null, $user_id, $input_ord = 'title', $order = 'asc' )
	{
		// validamos si estan buscando por city
		if( $input_whr == "city" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$city = mysqli_fetch_assoc( parent::simple( ' SELECT id FROM cities WHERE name LIKE "%'.$value_whr.'%" ' ) );
				// reasignamos el valor del id
				$value_whr = $city['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "club_id";
		}
		// validamos si estan buscando por user
		else if( $input_whr == "user" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$user = mysqli_fetch_assoc( parent::simple( ' SELECT id FROM users WHERE name LIKE "%'.$value_whr.'%" ' ) );
				// reasignamos el valor del id
				$value_whr = $user['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "user_id";
		}
		// Creamos la ruta en la cual vamos a mostrar los datos de la pagina y con cual realizamos la consulta
		$url = RUTA_URL . "/Members/Club/Find";
        // generamos la consulta sql con los datos a obtener
        $sql = ' SELECT t1.*, t2.name as owner, t3.name as country FROM ' . $this->table . ' t1 INNER JOIN users t2 on t1.user_id = t2.id INNER JOIN countries t3 ON t1.country_id = t3.id INNER JOIN members t4 ON t1.id = t4.club_id WHERE ' . $input_whr . ' LIKE "%' . $value_whr . '%" and t4.user_id = "'.$user_id.'" and t4.accepted = "2" ';
        // retornamos los valores obtenidos con la función de paginacion
        return parent::pagination( $url, $pagina, $value_whr, $input_whr, $input_ord, $order, $sql );
	}



	// función para buscar un registro por slug
	public function listClubApproved()
	{
		// ejecutamos la consulta
		return parent::simple( " SELECT t1.*, t2.name as owner, t3.name as country FROM " . $this->table . " t1 INNER JOIN users t2 on t1.user_id = t2.id INNER JOIN countries t3 ON t1.country_id = t3.id  WHERE t1.approved = '2' " );
	}

	// función para buscar un registro por slug
	public function listClubWaitingApproved()
	{
		// ejecutamos la consulta
		return parent::simple( " SELECT t1.*, t2.name as owner, t3.name as country FROM " . $this->table . " t1 INNER JOIN users t2 on t1.user_id = t2.id INNER JOIN countries t3 ON t1.country_id = t3.id  WHERE t1.approved = '1' " );
	}

}