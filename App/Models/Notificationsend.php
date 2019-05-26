<?php 


class Notificationsend extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "notification_sends";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"notification_id", "member_id", "readed", "created_at", "updated_at"
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
	public function findByNotificationID( $notification_id, $user_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.id FROM  ' . $this->table . ' t1 INNER JOIN members t2 ON t1.member_id = t2.id INNER JOIN users t3 ON t2.user_id = t3.id WHERE t1.notification_id = "'.$notification_id.'" and t3.id = "'.$user_id.'" ' );
	}

	// función para almacenar un registro
	public function delete( $id )
	{
		// ejecutamos la consulta
		return parent::delete( $id );
	}

	public function deleteWithMemberID( $member_id )
	{
		return parent::simple(' DELETE FROM ' . $this->table . ' WHERE member_id = "'.$member_id.'" ');
	}

	// función para listar los registros
	public function findMembersByClubID( $notification_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.readed, t3.name, t3.photo FROM  ' . $this->table . ' t1 INNER JOIN members t2 ON t1.member_id = t2.id INNER JOIN users t3 ON t2.user_id = t3.id WHERE t1.notification_id = "'.$notification_id.'" ORDER BY t1.created_at DESC ' );
	}

}