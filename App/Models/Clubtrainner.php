<?php 


class Clubtrainner extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "club_trainners";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "club_id", "user_id", "activity", "salary", "status", "created_at", "updated_at" ];
	}

	// función para almacenar un registro
	public function all( $input = 'id', $order = 'desc' )
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

	// función para almacenar un registro
	public function findByClubUserIDActivity( $club_id, $user_id, $activity )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT * FROM " . $this->table ." WHERE club_id = '".$club_id."' and user_id = '".$user_id."' and activity = '".$activity."' ");
	}

	// función para almacenar un registro
	public function findByClubActivity( $club_id, $activity )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT t1.id, t2.name FROM " . $this->table ." t1 INNER JOIN users t2 ON t1.user_id = t2.id WHERE t1.club_id = '".$club_id."' and t1.activity = '".$activity."' ");
	}

	// función para almacenar un registro
	public function lista( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT t1.*, t2.name, t2.photo FROM " . $this->table ." t1 INNER JOIN users t2 ON t1.user_id = t2.id WHERE t1.club_id = '".$club_id."' ");
	}

}