<?php 


class Championship extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "Championships";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "club_id", "title", "description", "inscription_code", "created_at", "updated_at" ];
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
	public function listing( $pagina = 1, $input_whr = 'title', $value_whr = null, $input_ord = 'created_at', $order = 'desc' )
	{
		// validamos si estan buscando por club
		if( $input_whr == "club" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$club = mysqli_fetch_assoc( parent::simple( ' SELECT id FROM clubs WHERE title LIKE "%'.$value_whr.'%" ' ) );
				// reasignamos el valor del id
				$value_whr = $club['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "club_id";
		}
		// Creamos la ruta en la cual vamos a mostrar los datos de la pagina y con cual realizamos la consulta
		$url = RUTA_URL . "/Hyperboard/Championship/Records";
        // generamos la consulta sql con los datos a obtener
        $sql = ' SELECT t1.*, t2.title as club FROM ' . $this->table . ' t1 INNER JOIN clubs t2 on t1.club_id = t2.id WHERE ' . $input_whr . ' LIKE "%' . $value_whr . '%"';
        // retornamos los valores obtenidos con la función de paginacion
        return parent::pagination( $url, $pagina, $value_whr, $input_whr, $input_ord, $order, $sql );
	}


}