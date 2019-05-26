<?php 

// clase para conectarse a la base de datos y ejecutar las consultas con PDO

class Conex
{
	// definimos las variables de conexion
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $db = DB_NAME;
	private $charset = DB_CHARSET;

	// creamos una variable que contiene la conexion
	protected $conex;

	public function __construct()
	{
		// validamos que se encuentre habalitada la conexión
		if( DB_CONEX == 'on' )
		{
			// realizamos la conexion a la base de datos
			$this->conex = new mysqli( $this->host, $this->user, $this->pass, $this->db );
			// validamos que se conecte bien
	        if ( $this->conex->connect_errno ) 
	        { 
	            echo "Error al conectarse al servidor: ". $this->conex->connect_error; 
	            return;     
	        } 
	        // asignamos el charset por defecto a la base de datos
	        $this->conex->set_charset( $this->charset );
		}
	}

}