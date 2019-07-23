<?php 


class Member extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "members";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "user_id", "club_id", "accepted", "active", "created_at", "updated_at" ];
	}

	// función para almacenar un registro
	public function store( $request )
	{
		// ejecutamos la consulta
		return parent::store( $request );
	}

	// función para editar un registro
	public function update( $request )
	{
		// ejecutamos la consulta
		return parent::update( $request );
	}

	// función para buscar un registro
	public function find( $id )
	{
		// ejecutamos la consulta
		return parent::find( $id );
	}

	// función para buscar por id de usuario los clubes
	public function findClubsByUserID( $user_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t2.title as club, t2.slug, t2.logo, t3.name as owner FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id INNER JOIN users t3 ON t2.user_id = t3.id WHERE t1.user_id = "'.$user_id.'" ORDER BY t2.title DESC ' );
	}

	// función para buscar por id de usuario los del miembro
	public function findByUserID( $user_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t1.id as member_id, t2.*, t3.*, t4.name as country FROM  ' . $this->table . ' t1 INNER JOIN users t2 ON t1.user_id = t2.id INNER JOIN user_data t3 ON t3.user_id = t2.id INNER JOIN countries t4 ON t3.country_id = t4.id WHERE t1.user_id = "'.$user_id.'" ' );
	}

	// función para buscar por id de usuario
	public function findByClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t3.name as member, t3.slug, t3.photo FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id INNER JOIN users t3 ON t1.user_id = t3.id WHERE t1.club_id = "'.$club_id.'" and t1.accepted = 2 ORDER BY t2.title DESC ' );
	}

	// función para buscar si el miembro pertenece o no a un club
	public function findMemberWithClub( $club_id, $user_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t1.id as member_id, t2.id, t2.name, t2.photo, t2.username, t3.mobile, t3.city, t3.address, t3.cpr, t3.rfid, t3.passport, t4.name as country FROM  ' . $this->table . ' t1 INNER JOIN users t2 ON t1.user_id = t2.id INNER JOIN user_data t3 ON t3.user_id = t2.id INNER JOIN countries t4 ON t3.country_id = t4.id WHERE t1.user_id = "'.$user_id.'" and t1.club_id = "'.$club_id.'" ' );
	}

	// función para contar la cantidad de mienbros del club
	public function countByClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) FROM ' . $this->table . ' WHERE club_id = "'.$club_id.'" ' );
	}

	// función para eliminar un registro
	public function delete( $id )
	{
		// ejecutamos la consulta
		return parent::delete( $id );
	}

	// función para listar los registros
	public function listing( $pagina = 1, $input_whr = 'club', $value_whr = null, $input_ord = 'created_at', $order = 'desc' )
	{
		// validamos si estan buscando por club
		if( $input_whr == "club" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$club = mysqli_fetch_assoc( parent::simple( ' SELECT id FROM clubs WHERE title LIKE "%'.$value_whr.'%" ' ) );
				// reasignamos el valor del id
				$value_whr = $club['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "club_id";
		}
		// validamos si estan buscando por city
		else if( $input_whr == "user" )
		{
			// validamos que no sea vacio
			if( !empty( $value_whr ) )
			{
				// buscamos los datos del usuario
				$user = mysqli_fetch_assoc( parent::simple( ' SELECT id FROM users WHERE name LIKE "%'.$value_whr.'%" ' ) );
				// reasignamos el valor del id
				$value_whr = $user['id'];
			}
			// cambiamos el campo de búsqueda
			$input_whr = "user_id";
		}
		// Creamos la ruta en la cual vamos a mostrar los datos de la pagina y con cual realizamos la consulta
		$url = RUTA_URL . "/Hyperboard/Championship/Records";
        // generamos la consulta sql con los datos a obtener
        $sql = ' SELECT t1.*, t2.title as club, t3.name as user FROM ' . $this->table . ' t1 INNER JOIN clubs t2 on t1.club_id = t2.id INNER JOIN users t3 ON t2.user_id = t3.id WHERE ' . $input_whr . ' LIKE "%' . $value_whr . '%"';
        // retornamos los valores obtenidos con la función de paginacion
        return parent::pagination( $url, $pagina, $value_whr, $input_whr, $input_ord, $order, $sql );
	}

	public function listingByClub( $club_id )
	{
		return parent::simple(' SELECT t1.*, t2.title as club, t3.name as member, t3.slug as member_slug, t3.photo FROM ' . $this->table . ' t1 INNER JOIN clubs t2 on t1.club_id = t2.id INNER JOIN users t3 ON t1.user_id = t3.id WHERE t1.club_id LIKE "%' . $club_id . '%" order by t1.accepted desc');
	}

	public function listingByClubAccepted( $club_id )
	{
		return parent::simple(' SELECT t1.*, t3.name, t3.slug, t3.photo FROM ' . $this->table . ' t1 INNER JOIN clubs t2 on t1.club_id = t2.id INNER JOIN users t3 ON t1.user_id = t3.id WHERE t1.club_id LIKE "%' . $club_id . '%" and t1.accepted = "2" and t1.active = "2" order by t1.accepted desc');
	}

	public function listingByClubBlocked( $club_id )
	{
		return parent::simple(' SELECT t1.*, t3.name, t3.slug, t3.photo FROM ' . $this->table . ' t1 INNER JOIN clubs t2 on t1.club_id = t2.id INNER JOIN users t3 ON t1.user_id = t3.id WHERE t1.club_id LIKE "%' . $club_id . '%" and t1.accepted = "2" and t1.active = "1" order by t1.accepted desc');
	}

	public function listingByClubNew( $club_id )
	{
		return parent::simple(' SELECT t1.*, t3.name, t3.slug, t3.photo FROM ' . $this->table . ' t1 INNER JOIN clubs t2 on t1.club_id = t2.id INNER JOIN users t3 ON t1.user_id = t3.id WHERE t1.club_id LIKE "%' . $club_id . '%" and t1.accepted = "1" order by t1.accepted desc');
	}

	public function listingByClubDelete( $club_id )
	{
		return parent::simple(' SELECT t1.*, t3.name, t3.slug, t3.photo FROM ' . $this->table . ' t1 INNER JOIN clubs t2 on t1.club_id = t2.id INNER JOIN users t3 ON t1.user_id = t3.id WHERE t1.club_id LIKE "%' . $club_id . '%" and t1.accepted = "4" order by t1.accepted desc');
	}

	public function newMembersWithClub( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) as cant FROM ' . $this->table . ' WHERE club_id = "'.$club_id.'" and created_at >= CAST("'.date('Y-m-01 H:i:s').'" AS datetime) and accepted != "4" ' );
	}

	public function allMembersWithClub( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT count(*) as cant FROM ' . $this->table . ' WHERE club_id = "'.$club_id.'" and accepted = "2" ' );
	}

	// función para buscar por id de usuario
	public function findByAllClubID( $club_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t3.name as member, t3.slug, t3.photo FROM  ' . $this->table . ' t1 INNER JOIN clubs t2 ON t1.club_id = t2.id INNER JOIN users t3 ON t1.user_id = t3.id WHERE t1.club_id = "'.$club_id.'" and t1.accepted != "4" ORDER BY t2.title DESC ' );
	}

	// función para contar los miembros de cumpleaos por mes
	public function findByClubBithdayMembersMonth( $club_id )
	{
		$from = date('Y-m-01');
		$fecha = new DateTime();
		$fecha->modify('last day of this month');
		$to = $fecha->format('Y-m-d');
		// ejecutamos la consulta
		return parent::simple( ' SELECT t2.name, t2.slug, t2.photo, t3.birthday FROM ' . $this->table . ' t1 INNER JOIN users t2 ON t1.user_id = t2.id INNER JOIN user_data t3 ON t3.user_id = t2.id WHERE t1.club_id = "'.$club_id.'" and t3.birthday >= CAST("'.$from.'" AS datetime) and t3.birthday <= CAST("'.$to.'" AS datetime) ' );
	}

	// función para obtener los miembros de un club, apartir de una fecha
	public function findAllMembersWithClubAndDay( $club_id, $day, $date, $package_id )
	{
		$date_sus = explode('-', $date);
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.id, t1.id as member_id, t2.name, t2.slug, t2.photo FROM ' . $this->table . ' t1 INNER JOIN users t2 ON t1.user_id = t2.id INNER JOIN member_packages t3 ON t3.member_id = t1.id INNER JOIN club_schedule t4 ON t4.package_id = t3.package_id INNER JOIN suscriptions t5 ON t5.member_id = t1.id WHERE t1.club_id = "'.$club_id.'" and t4.days LIKE "%'.$day.'%" and t5.state = "paid" and t5.created_at LIKE "%'.$date_sus[0].'-'.$date_sus[1].'-%" and t3.package_id = "'.$package_id.'" ' );
	}

}