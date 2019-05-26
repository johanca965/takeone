<?php

class FollowerclubController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 1 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->followerclubModel = $this->model('Followersclub');

	}

	// función principal
	public function index()
	{
		// redireccionamos al listado de clubs
		$this->location('Members/Club/Find');
	}

	// función que valida si un usuario sigue o no a un club
	public function follow()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'club_id' => 'required',
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// obtenemos el id del usuario sesionado
		$user_id = $this->Auth()->user()->id();
		// buscamos los datos del usuario para el club que desea seguir
		$search = $this->followerclubModel->findFollowWithClub( $_POST['club_id'], $user_id);
		// validamos si existe el registro para cambiar el estado (following) o registrarlo
		if( $search->num_rows < 1 )
		{
			// creamos el request con los datos necesarios
			$request = [
				'user_id' => $user_id,
				'club_id' => $_POST['club_id'],
				'following' => 1,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			// ejecutamos la petición de seguimiento
			$result = $this->followerclubModel->store( $request );
		}
		else
		{
			// obtenemos los datos del registro
			$follower = mysqli_fetch_assoc( $search );
			// creamos el request con los datos necesarios
			$request = [
				'id' => $follower['id'],
				'user_id' => $follower['user_id'],
				'club_id' => $follower['club_id'],
				'following' => $_POST['following'],
				'updated_at' => date('Y-m-d H:i:s')
			];
			// ejecutamos la petición de seguimiento
			$result = $this->followerclubModel->update( $request );
		}

		// validamos si existe error
		if( !$result )
		{
			// agregamos el mensaje de error
			array_push( $this->errors, $result );
			// mostramos el mensaje de error
			echo $this->errors();
		}
		else
		{
			// obtenemos los datos del registro
			$follower = mysqli_fetch_assoc( $search );
			// creamos un array que contiene los datos a registrar
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'tabla' => 'Followers club',
				'action' => 'Following',
				'code' => $follower['id'],
				'description' => 'Club follow-up.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

}