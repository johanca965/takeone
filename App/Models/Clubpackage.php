<?php 


class Clubpackage extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "club_packages";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "club_id", "title", "slug", "capacity", "gender", "min_age", "max_age", "price", "discount", "picture", "status", "created_at", "updated_at" ];
	}

	// función para almacenar un registro
	public function all( $input = 'title', $order = 'desc' )
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

	// función para almacenar un registro
	public function findBySlug( $slug )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT * FROM " . $this->table ." WHERE slug = '".$slug."' ");
	}

	public function findByCludID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT * FROM " . $this->table ." WHERE club_id = '".$club_id."' ");
	}

}