<?php 


class Sale extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "sales";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"club_id", "member_id", "total", "payment_method", "state", "created_at", "updated_at"
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
		return parent::simple( ' SELECT t1.*, t4.name as member FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id INNER JOIN members t3 ON t1.member_id = t3.id INNER JOIN users t4 ON t3.user_id = t4.id  WHERE t1.club_id = "'.$club_id.'" ORDER BY t1.created_at DESC ' );
	}

	public function findDoneByClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t4.name as member FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id INNER JOIN members t3 ON t1.member_id = t3.id INNER JOIN users t4 ON t3.user_id = t4.id  WHERE t1.club_id = "'.$club_id.'" and state = "paid" ORDER BY t1.created_at DESC ' );
	}

	public function findExpiredByClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t4.name as member FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id INNER JOIN members t3 ON t1.member_id = t3.id INNER JOIN users t4 ON t3.user_id = t4.id  WHERE t1.club_id = "'.$club_id.'" and state = "to pay" ORDER BY t1.created_at DESC ' );
	}

	public function findCanceledByClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t4.name as member FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id INNER JOIN members t3 ON t1.member_id = t3.id INNER JOIN users t4 ON t3.user_id = t4.id  WHERE t1.club_id = "'.$club_id.'" and state = "canceled" ORDER BY t1.created_at DESC ' );
	}

	public function findByClubDate( $club_id, $time )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT * FROM  ' . $this->table . ' WHERE club_id = "'.$club_id.'" and created_at = "'.$time.'" ' );
	}

	public function salesWithClub( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT sum(total) as cant FROM ' . $this->table . ' WHERE club_id = "'.$club_id.'" and created_at >= CAST("'.date('Y-m-01 H:i:s').'" AS datetime) ' );
	}

	public function countOfMonthWithCludID( $club_id )
	{
		$m = '';
		for ($i=1; $i < 13; $i++) 
		{ 
			$m .= $this->countByMontt( $club_id, $i ).'-';
		}
		$m = trim($m, '-');
		return $m;
	}

	private function countByMontt( $club_id, $month )
	{
		if( $month == 12 )
		{
			$from = date('Y').'-'.$month.'-01 '.date('H:i:s');
			$to = date('Y').'-01-01 '.date('H:i:s');
		}
		else
		{
			$from = date('Y-'.$month.'-01 H:i:s');
			$to = date('Y-'.($month+1).'-01 H:i:s');			
		}
		// ejecutamos la consulta
		$result = parent::simple( ' SELECT sum(total) as cant FROM ' . $this->table . ' WHERE club_id = "'.$club_id.'" and created_at >= CAST("'.$from.'" AS datetime) and created_at <= CAST("'.$to.'" AS datetime) ' );
		$cant = mysqli_fetch_assoc( $result );
		if( is_null( $cant['cant'] ) )
			$cant['cant'] = 0;
		return $cant['cant'];
	}

}