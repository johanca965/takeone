<?php

/*
 * Controlador base del cual se puede partir para la creacion de nuevos
*/

// Si se necesita incluir un archivo adicional dentro de este archivo con la ayuda de RUTA_APP se posiciona en la carpeta raiz del proyecto
// Para poder acceder a las funcionalidades de el solo se requiere realizar una instancia al nombre del archivo como tal
require_once RUTA_APP."/Folder/NameFile.php";

class ExampleController extends Controller
{
	
	public function __construct()
	{
		// con esto instanciamos el modelo correspondiente
		$this->nameModel = $this->model( 'name_model' );
		// validamos que exista la sesion y si no evitamos que entren
		$this->Auth()->guest();
	}

	// funcion que se debe tener por defecto en todos los controladores y de ejemplo para las funciones de tipo $_GET o cuando solo quieres mostrar una vista
	public function index()
	{
		// para ejecutar alguna funcion del modelo se ejecuta asi
		// para algunas funciones prediseñadas como store y update el request se pasa como
		// array con los valores agregados igual que en la variable fillable del modelo
		$this->nameModel->nameMethod( $request );

		// asi pasamos datos a la vista
		$data = [
			'name_param' => 'value_param'
		];
		
		// con esto llamamos la vista correspondiente, el segundo dato es el array con parametros
		// recordar que para usar los parametros en la vista se una asi: $params['name_param'] y si es un array multidimencional se ejecuta con un foreach
		$this->view('name_view', $data);
	}

	// funcion para realizar algun registro del CrUD, la minuscula es listar asi que esa no cuenta para esta funcuion
	public function CrUD()
	{
		// si requiere de algún tipo de validacion solo debe ingresarlo aqui
		// name_view: nombre de la vista a donde redireccionar si tiene algún error
		// $_POST pasa el array con los datos del formulario
		// el resto es un array con lo que se desea validar: 
		// // required: valida que el campo exista y tenga un valor
		// // number: valida que sea un nmero		
		// // email: valida que sea un email valido
		// // unique: valida que sea un registro unico en la tabla que pasen despues de los primeros puntos y el siguiente parametro significa que valida todos los campos menos el de ese id
		$this->validate( 'name_view', $_POST, [
			'column_name' => 'required|number|email|unique:table:'.$id,
		] );
		// llamamos a la funcion para validar que nos envien los datos por metodo post
		$this->methodPost();
		// llamamos la funcion que queremos ejecutar del modelo
		$this->nameModel->name_method( $_POST );
		// redireccionamos a la vista con location para evitar ejecutar la consulta anterior nuevamente
		$this->location('RUTA_URL_COMPLETE');
	}


}