<?php 


/**
 *  Modelo base del cual se puede partir para la creacion de nuevos
 */

// Si se necesita incluir un archivo adicional dentro de este archivo con la ayuda de RUTA_APP se posiciona en la carpeta raiz del proyecto
// Para poder acceder a las funcionalidades de el solo se requiere realizar una instancia al nombre del archivo como tal
require_once RUTA_APP."/Folder/NameFile.php";

class Example extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "table_name";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ "inputs_name" ];
		// variable que contiene los campos que no queremos dejar ver
		$this->hidden = [];
	}

	// funcion para realizar alguna accion del crud
	public function crud( $request )
	{
		// con parent llamamos a los metodos aloados en el modelo principal del cual extiende este
		// el request es el array que se envia de ser necesario
		parent::crud( $request );
	}
}