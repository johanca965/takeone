<?php 


class User extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "users";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "name", "slug", "username", "password", "email_verified_at", "role_id", "photo", "online", "created_at", "updated_at" ];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [ "password" ];
	}

	public function id(){ return $this->findUser()['id']; }

	public function name(){ return $this->findUser()['name']; }

	public function slug(){ return $this->findUser()['slug']; }

	public function username(){ return $this->findUser()['username']; }

	public function email_verified_at(){ return $this->findUser()['email_verified_at']; }

	public function role(){ return $this->findUser()['role_id']; }

	public function photo(){ return $this->findUser()['photo']; }

	public function online(){ return $this->findUser()['online']; }

	public function created_at(){ return $this->findUser()['created_at']; }

	public function findUser(){ return mysqli_fetch_assoc( $this->find( $_SESSION['id'] ) ); }

	public function verified( $request )
	{
		// ejecutamos la consulta
		return parent::update( $request );
	}

	// función para almacenar un registro
	public function all( $input = 'name', $order = 'desc' )
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
	public function find( $id )
	{
		// ejecutamos la consulta
		return parent::find( $id );
	}

	// función para almacenar un registro
	public function update( $request )
	{
		// ejecutamos la consulta
		return parent::update( $request );
	}

	// función para almacenar un registro
	public function findBySlug( $slug )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT * FROM " . $this->table ." WHERE slug = '".$slug."' ");
	}

}