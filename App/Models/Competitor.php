<?php 


class Competitor extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "competitors";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"championship_id", "member_id", "approved", "confirmed", "created_at", "updated_at"
		];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [ "" ];
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

	// función para almacenar un registro
	public function delete( $id )
	{
		// ejecutamos la consulta
		return parent::delete( $id );
	}

	// función para listar los registros
	public function listing( $pagina = 1, $input_whr = 'championship', $value_whr = null, $input_ord = 'created_at', $order = 'desc' )
	{
		// validamos si estan buscando por city
		if( $input_whr == "championship" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$championship = mysqli_fetch_assoc( parent::simple( ' SELECT id FROM championships WHERE title LIKE "%'.$value_whr.'%" ' ) );
				// reasignamos el valor del id
				$value_whr = $championship['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "championship_id";
		}
		// validamos si estan buscando por user
		else if( $input_whr == "member" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$member = mysqli_fetch_assoc( parent::simple( ' SELECT t1.id FROM members t1 INNER JOIN users t2 ON t1.user_id = t2.id WHERE t2.name LIKE "%'.$value_whr.'%" ' ) );
				// reasignamos el valor del id
				$value_whr = $member['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "member_id";
		}
		// Creamos la ruta en la cual vamos a mostrar los datos de la pagina y con cual realizamos la consulta
		$url = RUTA_URL . "/Hyperboard/Competitor/Records";
        // generamos la consulta sql con los datos a obtener
        $sql = ' SELECT t1.*, t3.name as user FROM ' . $this->table . ' t1 INNER JOIN members t2 on t1.member_id = t2.id INNER JOIN users t3 ON t2.user_id = t3.id WHERE ' . $input_whr . ' LIKE "%' . $value_whr . '%"';
        // retornamos los valores obtenidos con la función de paginacion
        return parent::pagination( $url, $pagina, $value_whr, $input_whr, $input_ord, $order, $sql );
	}

}