<?php 


class Training extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "trainings";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"clubschedule_id", "member_id", "created_at"
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

	public function findByUserID( $user_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t3.title as club FROM  ' . $this->table . ' t1 INNER JOIN club_schedule t2 ON t1.clubschedule_id = t2.id INNER JOIN clubs t3 ON t2.club_id = t3.id INNER JOIN members t4 ON t4.club_id = t3.id WHERE t4.user_id = "'.$user_id.'" ORDER BY t1.created_at DESC ' );
	}

	/*// función para almacenar un registro

	// funcion para buscar historial por id del club
	public function findByClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t4.* FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id INNER JOIN members t3 ON t3.club_id = t2.id INNER JOIN users t4 ON t3.user_id = t4.id WHERE t1.club_id = "'.$club_id.'" ORDER BY t1.created_at DESC ' );
	}

	// función para almacenar un registro
	public function delete( $id )
	{
		// ejecutamos la consulta
		return parent::delete( $id );
	}

	

	*/

	public function countOfMonthWithUserID( $member_id )
	{
		$m = '';
		for ($i=1; $i < 13; $i++) 
		{ 
			$m .= $this->countByMontt( $member_id, $i ).'-';
		}
		$m = trim($m, '-');
		return $m;
	}

	private function countByMontt( $member_id, $month )
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
		$result = parent::simple( ' SELECT count(*) as cant FROM ' . $this->table . ' WHERE member_id = "'.$member_id.'" and created_at >= CAST("'.$from.'" AS datetime) and created_at <= CAST("'.$to.'" AS datetime) ' );
		$cant = mysqli_fetch_assoc( $result );
		return $cant['cant'];
	}



	// funcion para buscar historial por id del miembro
	public function findByMemberID( $member_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t2.activity, t3.*, t6.title as package FROM ' . $this->table . ' t1 INNER JOIN club_schedule t2 ON t1.clubschedule_id = t2.id INNER JOIN clubs t3 ON t2.club_id = t3.id INNER JOIN members t4 ON t4.club_id = t3.id INNER JOIN users t5 ON t4.user_id = t5.id INNER JOIN club_packages t6 ON t2.package_id = t6.id WHERE t1.member_id = "'.$member_id.'" GROUP BY t1.id ORDER BY t1.created_at DESC ' );
	}



	// attended for club
	public function attended( $date, $package_id, $club_id )
	{
		$date_sus = explode('-', $date);
		return parent::simple( ' SELECT t1.id, t3.id as member_id, t4.name, t4.slug, t4.photo FROM trainings t1 INNER JOIN club_schedule t2 ON t1.clubschedule_id = t2.id INNER JOIN members t3 ON t1.member_id = t3.id INNER JOIN users t4 ON t3.user_id = t4.id INNER JOIN club_packages t5 ON t2.package_id = t5.id INNER JOIN suscriptions t6 ON t6.member_id = t1.member_id WHERE t1.created_at LIKE "%'.$date.'%" and t5.id LIKE "%'.$package_id.'%" and t6.state = "paid" and t6.created_at LIKE "%'.$date_sus[0].'-'.$date_sus[1].'-%"  and t3.club_id = "'.$club_id.'" ORDER BY t1.created_at DESC ' );
	}

	public function hasclass( $date, $package_id )
	{
		return parent::simple( ' SELECT count(t1.id) as count FROM  ' . $this->table . ' t1 INNER JOIN club_schedule t2 ON t1.clubschedule_id = t2.id INNER JOIN club_packages t3 ON t2.package_id = t3.id WHERE t1.created_at LIKE "%'.$date.'%" and t3.id LIKE "%'.$package_id.'%" ORDER BY t1.created_at DESC ' );
	}

	public function trainingWithClub( $club_id, $date )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) as cant FROM ' . $this->table . ' t1 INNER JOIN club_schedule t2 ON t1.clubschedule_id = t2.id INNER JOIN clubs t3 ON t2.club_id = t3.id WHERE t2.club_id = "'.$club_id.'" and t1.created_at LIKE "%'.$date.'%" ' );
	}

}