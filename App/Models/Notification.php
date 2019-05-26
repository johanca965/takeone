<?php 


class Notification extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "notifications";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"club_id", "message", "created_at", "updated_at"
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

	// función para listar los registros no leidos
	public function findByUserID( $user_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.id, t1.message, t2.updated_at, t5.title, t5.slug, t5.logo FROM notifications t1 INNER JOIN notification_sends t2 ON t2.notification_id = t1.id INNER JOIN members t3 ON t2.member_id = t3.id INNER JOIN users t4 ON t3.user_id = t4.id INNER JOIN clubs t5 ON t1.club_id = t5.id WHERE t4.id = "'.$user_id.'" and t2.readed = "1" ORDER BY t1.updated_at DESC ' );
	}

	// función para listar los registros completos
	public function findByUserIDComplete( $user_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.id, t1.message, t2.updated_at, t2.readed, t5.title, t5.slug, t5.logo FROM notifications t1 INNER JOIN notification_sends t2 ON t2.notification_id = t1.id INNER JOIN members t3 ON t2.member_id = t3.id INNER JOIN users t4 ON t3.user_id = t4.id INNER JOIN clubs t5 ON t1.club_id = t5.id WHERE t4.id = "'.$user_id.'" ORDER BY t1.updated_at DESC ' );
	}

	// función para listar los registros completos
	public function findByNotificationIDComplete( $notification_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.id, t1.message, t2.updated_at, t2.readed, t5.title, t5.slug, t5.logo FROM notifications t1 INNER JOIN notification_sends t2 ON t2.notification_id = t1.id INNER JOIN members t3 ON t2.member_id = t3.id INNER JOIN users t4 ON t3.user_id = t4.id INNER JOIN clubs t5 ON t1.club_id = t5.id WHERE t1.id = "'.$notification_id.'" ' );
	}

	// función para listar los registros
	public function findIDByMessageTime( $message, $time )
	{
		$message = mysqli_real_escape_string($this->conex, $message);
		// ejecutamos la consulta
		return parent::simple( ' SELECT id FROM  ' . $this->table . ' WHERE message = "'.$message.'" and created_at = "'.$time.'" ' );
	}

}