<?php 


class Userdata extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "user_data";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"user_id", "country_id", "city", "rfid", "cpr", "passport", "helth_issues", "gender", "marital", "bloodtype", "birthday", "address", "mobile", "social_link", "confirm_code", "confirmed", "created_at", "updated_at"
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
	public function findByUser( $user_id )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT * FROM " . $this->table ." WHERE user_id = '".$user_id."' ");
	}

	// función para almacenar un registro
	public function delete( $id )
	{
		// ejecutamos la consulta
		return parent::delete( $id );
	}

	// función para listar los registros
	public function listing( $pagina = 1, $input_whr = '', $value_whr = null, $input_ord = 'created_at', $order = 'desc' )
	{
		
	}

}