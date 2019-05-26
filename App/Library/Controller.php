<?php 


/**
 	controlador principal de la aplicacion, se encaga de poder cargar los modelos y las vistas de la aplicacion
 */


// requerimos la clase de autentificacion
require_once RUTA_APP."/Auth/Auth.php";
// requerimos el trait de los slugs
require_once RUTA_APP."/Traits/ValidateEmailTrait.php";
// requerimos el trait de la validacion de un campo unique
require_once RUTA_APP."/Traits/ValidateUniqueTrait.php";

abstract class Controller
{
	// array vacio para guardar los errores del sistema
	protected $errors = [];
	// variable vacia para guardar los mensajes del sistema
	protected $success;
	protected $Auth;


	// funcion obligatoria en un controlador
	abstract public function index();


	// funcion para obtener los datos y funcionalidades de la sesion de un usuario
	public function Auth()
	{
		// creamos una instancia de la clase para manipular las variables de sesion
		return new Auth;
	}


	// carga el modelo que se desea desde el controlador hijo
	public function model( $model )
	{
		$model= ucwords($model);
		// incluimos el model
		require_once '../App/Models/' . $model . '.php';
		// instanciamos el modelo
		return new $model();
	}


	// carga las vistas despues de realizar alguna accion a la base de datos
	public function location( $view )
	{
		// reubicamos la vista para evitar que se reejecute la accion antes realizada
		header('Location: ' . RUTA_URL . '/' . $view );
	}


	// carga el vista por metodo get
	public function view( $view, $params = [] )
	{
		// validamos que el archivo de la vista exista
		if( file_exists( '../App/Resources/Views/' . $view . '.php' ) )
		{
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// 
			// importante: para poder usar los parametros en la vista deben llamarlo con la variable params y entre [] y comillas el nombre de la variable y si es un array multidimensional se hace con un ciclo foreach de igual manera //
			////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			// llamamos a la vista
			require_once '../App/Resources/Views/' . $view . '.php';
		}
		else
		{
			// llamamos a la vista de ellor
			$this->pageError();
		}
	}

	// funcion para crear un textbox el _token oculto en un formulario
	protected function csrfToken()
	{
		return '<input type="hidden" id="_token" name="_token" value="'.$this->Auth()->_token().'" />';
	}

	// funcion para validar que el metodo de envio sea post
	protected function methodPost()
	{
		// validamos si no existe la variable post o viene vacia
		if( !$_POST || empty( $_POST ) )
		{
			// redireccionamos al error 404
			$this->location('error404');
			// paramos cualquier otra funcionalidad del sistema
			exit();
		}
	}


	// funcion para validar campos de la base de datos
	// $request: es el array quec contiene los datos
	// $validations: son las validaciones a aplicar
	// return el valor que contiene la variable de errores por si se realiza con ajax para evitar problemas
	protected function validate( $request, $validations )
	{
		// array vacio para guardar los nombres de las posiciones del request
		$keys_request = [];
		// array vacio para guardar los errores del sistema
		$this->errors = [];
		// recorremos el elemento actual del request
		foreach ( $request as $key ) 
		{
			// validamos si existe una sesión
			if( $this->Auth()->check() )
			{
				// validamos que exista el _token de sesión para realizar acciones
				if( isset( $request['_token'] ) && !empty( $request['_token'] ) )
				{
				// validamos si el _token de sesión es el mismo al que tenemos registrado
					if( $request['_token'] != $this->Auth()->_token() )
					{
					// retornamos un mensaje de error al usuario
						array_push( $this->errors, "Sorry, your permissions do not match. Please contact the administrator for the security of the application." );
						break;
					}
				}
				else
				{
				// retornamos un mensaje de error al usuario
					array_push( $this->errors, "Sorry, your permissions do not match. Please contact the administrator for the security of the application." );
					break;
				}
			}
			// agregamos al array vacio el nombre de la posicion con ayuda de la palabra reservada key
			array_push( $keys_request, key($request) );
			// pasamos a la siguiente posicion del array
			next($request);
		}

		// recorremos el elemento actual de las validaciones
		while ( current($validations) ) {
			// preguntamos si existe el nombre de la posicion de validaciones en el array que contiene los nombres de las posiciones de los datos a ser evaluados
			if( in_array( key($validations), $keys_request ) )
			{
				// obtenemos el tipo de validacion de la posicion que se encontro en el array vacio dentro del array de validaciones
				$types = explode('|', $validations[ key($validations) ] );
				foreach( $types as $type )
				{
					// validacion para requeridos
					if( $type == 'required' )
					{
						// validamos que el campo no sea nulo ni vacio
						if( is_null( $request[ key($validations) ] ) or empty( $request[ key($validations) ] ) )
							array_push( $this->errors, "The field ". key($validations) ." is required." );
					}
					// validacion para numeros
					if( $type == 'number' )
					{
						// validamos que sea un campo numerico
						if( !is_numeric( $request[ key($validations) ] ) )
							array_push( $this->errors, "The field ". key($validations) ." is not a number." );
					}
					// validacion para emails
					if( $type == 'email' )
					{
						if ( !ValidateEmailTrait::comprobar_email( $request[ key($validations) ] ) ) {
							array_push( $this->errors, "The field ". key($validations) ." is not a valid e-mail address." );
						}
					}
					// explotamos la cadena para validar si es de tipo unique
					$type = explode(':', $type);
					// validamos si en la posicion 0 es unique de resto no entra
					if( $type[0] == 'unique' ){
						// creamos una instancia de la validacion para poder acceder a la clase conexion
						$validateunique = new ValidateUniqueTrait();
						// valido si existe algun id como parametro para evitar evaludar ese campo
						isset( $type[2] ) ? $type[2] = $type[2] : $type[2] = '';
						// preguntamos si encontro un registro 
						if( !$validateunique->ValidateUnique( $request[ key($validations) ], key($validations), $type[1], $type[2] ) )
							// retornamos un mensaje de error al usuario
							array_push( $this->errors, "The " . key($validations) . " ". $request[ key($validations) ] ." already exists." );
					}
				}
			}
			// pasamos a la siguiente posicion del array
			next($validations);
		}
		// retornamos el valor de la variable de errores
		return $this->errors;
	}


	// funcion que nos devuelve la vista de error404
	private function pageError()
	{
		$this->location('error404');
	}

	// función para mostrar los errores
	protected function errors()
	{
		if( isset( $this->errors ) && !empty( $this->errors ) ){
			echo '
				<div class="container-fluid my-4">
					<div class="row justify-content-center">
						<div class="col-10 alert alert-danger pb-0" >
							<ul class="pb-0">
			';
								foreach ($this->errors as $error) 
								{
									echo "<li> $error </li>";
								} 
			echo '
							</ul>
						</div>
					</div>
				</div>
			';
		}
	}

	// validar la url para cambiar la case active
	protected function validateUrl( $url )
	{
		if( RUTA_URL.$_SERVER['REQUEST_URI'] == RUTA_URL.'/'.$url )
			echo 'active';
	}
	
}
