<?php 


class Clubschedule extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "club_schedule";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "club_id", "package_id", "activity", "trainner_id", "start_time", "end_time", "class_timing", "days", "extra_information", "created_at", "updated_at" ];
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

	// función para almacenar un registro
	public function findByPackageandClubandDay( $club_id, $package_id, $day )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT * FROM " . $this->table ." WHERE club_id = '".$club_id."' and package_id = '".$package_id."' and days LIKE '%".$day."%'  ");
	}

	// función para almacenar un registro
	public function findByClubandDay( $club_id, $day )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT * FROM " . $this->table ." WHERE club_id = '".$club_id."' and days LIKE '%".$day."%' ");
	}

	// función para almacenar un registro
	public function listado( $package_id, $club_id )
	{
		if( empty($package_id) )
			// ejecutamos la consulta
			return parent::simple(" SELECT t1.*, t2.title, t2.slug, t2.picture FROM " . $this->table ." t1 INNER JOIN club_packages t2 ON t1.package_id = t2.id WHERE t1.club_id = '".$club_id."' ORDER BY start_time DESC ");
		else
			// ejecutamos la consulta
			return parent::simple(" SELECT t1.*, t2.title, t2.slug, t2.picture FROM " . $this->table ." t1 INNER JOIN club_packages t2 ON t1.package_id = t2.id WHERE t1.package_id = '".$package_id."' and t1.club_id = '".$club_id."' ORDER BY start_time DESC ");
	}

	// función para validar
	public function validate( $club_id, $package_id, $start_time, $activity )
	{
		// ejecutamos la consulta
		return parent::simple(" SELECT t1.* FROM " . $this->table ." t1 INNER JOIN club_packages t2 ON t1.package_id = t2.id WHERE t1.club_id = '".$club_id."' and t1.package_id = '".$package_id."' and t1.start_time = '".$start_time."' and t1.activity = '".$activity."' and t1.class_timing != 'Parallel Classes' ORDER BY start_time DESC ");
	}

	// función para obtener la cantidad de miembros que deben asistir a clases
	public function allMembersWithClubAndDay( $club_id, $day, $date )
	{
		$date_sus = explode('-', $date);
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) as cant FROM ' . $this->table . ' t1 INNER JOIN club_packages t2 ON t1.package_id = t2.id INNER JOIN member_packages t3 ON t3.package_id = t1.package_id INNER JOIN members t4 ON t4.id = t3.member_id INNER JOIN suscriptions t5 ON t5.member_id = t4.id WHERE t1.club_id = "'.$club_id.'" and t1.days LIKE "%'.$day.'%" and t4.accepted = "2" and t4.active = "2" and t5.state = "paid" and t5.created_at LIKE "%'.$date_sus[0].'-'.$date_sus[1].'-%" ' );
	}

}