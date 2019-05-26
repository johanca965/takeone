<?php 


class Country extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "countries";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"name", "phonecode", "currency", "gmt_time"
		];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [ "" ];
	}

	// función para almacenar un registro
	public function find( $id )
	{
		// ejecutamos la consulta
		return parent::find( $id );
	}

	public function listSimple()
	{
		return parent::simple("SELECT * FROM " . $this->table . " WHERE gmt_time != '' ");
	}

}