<?php 


class State extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "states";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"country_id", "name", "created_at", "updated_at" 
		];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [ "" ];
	}

	public function listSimple()
	{
		return parent::all();
	}


	public function findList( $country_id )
	{
		return parent::simple( 'SELECT * FROM ' . $this->table . ' WHERE country_id = "' . $country_id . '"' );
	}

}