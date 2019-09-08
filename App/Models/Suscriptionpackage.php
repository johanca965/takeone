<?php 


class Suscriptionpackage extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "suscription_packages";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		// importance:
		//// 1: new members
		//// 2: suscription payment aproval
		//// 3: suscription expired
		//// 4: birthday members of month
		//// 5: stock empty
		$this->fillable = [ 
			"suscription_id", "package_id", "created_at"
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

	public function findBySuscriptionId( $suscription_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t2.id, t2.title FROM  ' . $this->table . ' t1 INNER JOIN club_packages t2 ON t1.package_id = t2.id WHERE t1.suscription_id = "'.$suscription_id.'" ' );
	}

	public function deleteBySuscriptionId( $suscription_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' DELETE FROM  ' . $this->table . ' WHERE suscription_id = "'.$suscription_id.'" ' );
	}

}