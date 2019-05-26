<?php 


class Clubnotification extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "club_notifications";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		// importance:
		//// 1: new members
		//// 2: suscription payment aproval
		//// 3: suscription expired
		//// 4: birthday members of month
		//// 5: stock empty
		$this->fillable = [ 
			"club_id", "importance", "section", "section_id", "created_at", "updated_at"
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

	public function deleteSectionID( $section, $section_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' DELETE FROM  ' . $this->table . ' WHERE section = "'.$section.'" and section_id = "'.$section_id.'" ' );
	}


	// función para listar los registros no leidos
	public function findByClubNewsMembers( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) as cant FROM  ' . $this->table . ' WHERE club_id = "'.$club_id.'" and importance = "1" ' );
	}

	// función para contar las suscripciones por aprobat
	public function findByClubPaymentApproval( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) as cant FROM  ' . $this->table . ' WHERE club_id = "'.$club_id.'" and importance = "2" ' );
	}

	// función para contar las suscripciones expiradas
	public function findByClubSuscriptionExpired( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) as cant FROM  ' . $this->table . ' WHERE club_id = "'.$club_id.'" and importance = "3" ' );
	}

	// funcion para contar los productos vacios
	public function findByClubStockempty( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) as cant FROM  ' . $this->table . ' WHERE club_id = "'.$club_id.'" and importance = "5" ' );
	}

	// función para contar los miembros de cumpleaos por mes
	public function findByClubBithdayMembersMonth( $club_id )
	{
		$from = date('Y-m-01');
		$fecha = new DateTime();
		$fecha->modify('last day of this month');
		$to = $fecha->format('Y-m-d');
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) as cant FROM members t1 INNER JOIN users t2 ON t1.user_id = t2.id INNER JOIN user_data t3 ON t3.user_id = t2.id WHERE t1.club_id = "'.$club_id.'" and t3.birthday >= CAST("'.$from.'" AS datetime) and t3.birthday <= CAST("'.$to.'" AS datetime) ' );
	}

}