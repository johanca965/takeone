<?php 


class Stock extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "stocks";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"club_id", "name", "slug", "price", "cant", "state", "photo", "code", "created_at", "updated_at"
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

	// función para listar los registros
	public function findByClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.* FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id WHERE t1.club_id = "'.$club_id.'" ORDER BY t1.created_at DESC ' );
	}

	// función para listar los registros
	public function findByAvailableClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.* FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id WHERE t1.club_id = "'.$club_id.'" and t1.cant > 0 ORDER BY t1.name ASC ' );
	}

	// función para listar los registros
	public function findByExhaustedClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.* FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id WHERE t1.club_id = "'.$club_id.'" and t1.cant = 0 ORDER BY t1.name ASC ' );
	}

	// función para almacenar un registro
	public function findBySlug( $slug )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT * FROM " . $this->table ." WHERE slug = '".$slug."' ");
	}

}