<?php

class TrainingController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 1 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->trainingModel = $this->model('Training');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');

	}

	// función principal
	public function index()
	{
		$member = mysqli_fetch_assoc( $this->memberModel->findByUserID( $this->Auth()->user()->id() ) );
		// redireccionamos al listado de clubs
		$this->view('Members/User/trainings', [ 'trainings' => $this->trainingModel->findByMemberID( $member['member_id'] ) ]);
	}

	// función para convertir la fecha en amigable para el usuario
	public function convertDate( $date )
	{
		// explotamos la fecha para separarla
		$fecha_exp = explode( ' ', $date );
		// explotamos la fecha para obtener y, m, d
		$fecha = explode( '-', $fecha_exp[0] );
		// array para mostrar el mes en español
		$meses = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
		return $meses[ $fecha[1] - 1 ]. " ".$fecha[2].", ".$fecha[0]." at ".$fecha_exp[1];
	}

}