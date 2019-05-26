<?php 


class City extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "cities";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"state_id", "name"
		];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [ "" ];
	}

	public function listSimple()
	{
		return parent::all();
	}

	// función para buscar un registro
	public function find( $id )
	{
		// ejecutamos la consulta
		return parent::find( $id );
	}

	public function findList( $state_id )
	{
		return parent::simple( 'SELECT * FROM ' . $this->table . ' WHERE state_id = "' . $state_id . '"' );
	}

	public function findByName( $name )
	{
		return parent::simple( 'SELECT * FROM ' . $this->table . ' WHERE name = "' . $name . '"' );
	}

}