<?php 


class Memberpackage extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "member_packages";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "member_id", "package_id", "created_at", "updated_at" ];
	}

	// función para almacenar un registro
	public function all( $input = 'created_at', $order = 'desc' )
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
	public function delete( $id )
	{
		// ejecutamos la consulta
		return parent::delete( $id );
	}

	// función para almacenar un registro
	public function find( $id )
	{
		// ejecutamos la consulta
		return parent::find( $id );
	}

	public function findByMemberID( $member_id )
	{
		return parent::simple(" SELECT t2.* FROM ". $this->table ." t1 INNER JOIN club_packages t2 ON t2.id = t1.package_id WHERE t1.member_id = '". $member_id ."' ");
	}

	public function findByMemberandPackageID( $member_id, $package_id )
	{
		return parent::simple(" SELECT t1.id FROM ". $this->table ." t1 INNER JOIN club_packages t2 ON t2.id = t1.package_id WHERE t1.member_id = '". $member_id ."' and package_id = '".$package_id."' ");
	}

	public function deleteByMemberID( $member_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' DELETE FROM  ' . $this->table . ' WHERE member_id = "'.$member_id.'" ' );
	}

}