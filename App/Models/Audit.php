<?php 


class Audit extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "audits";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "user_id", "tabla", "action", "code", "description", "created_at" ];
	}

	// función para almacenar un registro
	public function store( $request )
	{
		// ejecutamos la consulta
		return parent::store( $request );
	}

	// función para listar los registros
	public function listing( $pagina = 1, $input_whr = 'tabla', $value_whr = null, $input_ord = 'created_at', $order = 'desc' )
	{
		// validamos si estan buscando por usuario
		if( $input_whr == "user" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$user = mysqli_fetch_assoc( parent::simple( ' SELECT id FROM users WHERE name LIKE "'.$value_whr.'" ' ) );
				// reasignamos el valor del id
				$value_whr = $user['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "user_id";
		}
		// Creamos la ruta en la cual vamos a mostrar los datos de la pagina y con cual realizamos la consulta
		$url = RUTA_URL . "/Hyperboard/Audit/Records";
        // generamos la consulta sql con los datos a obtener
        $sql = ' SELECT t1.*, t2.name as user FROM ' . $this->table . ' t1 INNER JOIN users t2 on t1.user_id = t2.id WHERE ' . $input_whr . ' LIKE "%' . $value_whr . '%"';
        // retornamos los valores obtenidos con la función de paginacion
        return parent::listing( $url, $pagina, $value_whr, $input_whr, $input_ord, $order, $sql );
	}

	public function find( $id )
	{
		return parent::simple( ' SELECT t1.*, t2.name as user FROM ' . $this->table . ' t1 INNER JOIN users t2 on t1.user_id = t2.id WHERE t1.id = "' . $id . '" ' );
	}


}