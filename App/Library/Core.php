<?php

/*
	Mapear la url ingresada en el navegador
	1. controlador
	2. metodo
	3. parametro
*/

/**
 * 
 */
class Core
{
	// declaramos la variable vacia por si estan en la raiz del proyecto
	protected $folderCurrent = '';
	// si no hay un controlador se cargara por defecto este
	protected $controllerCurrent = 'Welcome';
	// variable que contiene el nombre del controllador de errores 404
	private $error404 = 'Error404Controller';
	// si no hay un metodo por defecto se cargara el index
	protected $methodCurrent = 'index';
	// declaramos un array vacio para obtener los posibles parametros que se l pueden pasar a la vista
	protected $params = [];

	// constructor
	public function __construct()
	{
		// llamamos la funcion que define los archivos a buscar
		$this->getUrl();
		// buscar en la carpeta controladores si el controlador existe
		// el ucwords pone la primera letra en mayuscula y el resto en minusculua
		if( file_exists( '../App/Controllers/' . ucwords( $this->folderCurrent ) . '/' . ucwords( $this->controllerCurrent ) . 'Controller.php' ) )
		{
			// si existe se asigna como controlador actual
			$this->controllerCurrent = ucwords( $this->controllerCurrent ) . 'Controller';
		}
		else
		{
			// limpiamos las carpetas para dejarlo en el directorio raiz de los controladores
			$this->folderCurrent = "";
			// si no existe se asigna como controlador actual el erro 404
			$this->controllerCurrent = $this->error404;	
		}

		// cargamos el controlador que queremos ver
		require_once  '../App/Controllers/' . ucwords( $this->folderCurrent ) . '/' . ucwords( $this->controllerCurrent ) . '.php';
		// instanciamos el controlador para poder hacer uno de sus funcionalidades
		$this->controllerCurrent = new $this->controllerCurrent;

		// validamos que exista un metodo en la url
		if( isset( $this->methodCurrent ) )
		{
			// validamos la segunda parte de la url que seria el metodo
			if( !method_exists( $this->controllerCurrent, $this->methodCurrent ) )
			{
				// si no existe el metodo eliminamos la instancia del objeto
				unset($this->controllerCurrent);
				// requerimos el controlador de error
				require_once  '../App/Controllers/' . $this->error404 . '.php';
				// instanciamos el controlador
				$this->controllerCurrent = new $this->error404;
				// formateamos el metodo para asignar el inicial
				$this->methodCurrent = 'index';
			}
		}

		// llamamos el callback con los parametros del array
		call_user_func_array( [ $this->controllerCurrent, $this->methodCurrent ], $this->params );

	}


	// funcion que define los archivos de la ruta a buscar
	public function getUrl()
	{
		// validamos que exista la variable url para saber que estan buscando otra ruta que no sea el index
		if ( isset($_GET['url']) ) {
			// cortamos los espacios que tenga hacia la derecha para dejarla limpia
			$url = rtrim( $_GET['url'], '/' );
			// filtramos para que la interprete como una url
			$url = $this->limpiarUrl( $url );
			// explotamos la variable para obtener los metodos requeridos
			$url = explode('/', $url);
			// declaramos un araray vacio que contendra los indices de los folders, controller, method para eliminarlos de la url para pasarlo como parametros
			$url_delete = [];
			// recorremos el contenido de la variable url
			for( $i = 0; $i < count($url); $i++ )
			{
				// validamos que exista algo en la variable
				if( isset( $url[$i] ) )
				{
					// validamos si es una carpeta para definir los folders
					if( file_exists( '../App/Controllers/' . $this->folderCurrent . '/' . ucwords( $url[$i] ) ) )
					{
						// concotenamos el folder por si es mas de uno
						$this->folderCurrent .= ucwords($url[$i]) . '/';
						// agregamos esta posicion al array para ser eliminado
						array_push($url_delete, $i);
						// validamos si existe algo en la posicion siguiente y que sea un archivo el cual sera el controlador
						if( isset( $url[$i+1] ) && file_exists( '../App/Controllers/' . $this->folderCurrent . '/' . ucwords( $url[$i+1] . 'Controller.php' ) )  )
						{
							// asignamos este valor al controlador
							$this->controllerCurrent = $url[$i+1];
							// agregamos esta posicion al array para ser eliminado
							array_push($url_delete, $i+1);
							// validamos si existe algo en la posicion siguiente del controlador para validar si es un metodo
							// de lo contrario tomara el valor por defecto
							if( isset( $url[$i+2] ) )
							{
								// asignamos este metodo
								// reemplazamos los - por _ para generar rutas mas dinamicas
								$this->methodCurrent = str_replace("-", "_", $url[$i+2]);
								// agregamos esta posicion al array para ser eliminado
								array_push($url_delete, $i+2);
							}
						}
						else
						{
							// validamos que sea en la última posicion para evitar errores al seguir buscando entre carpetas
							if( $i == (count($url)-1) )
							{
								// si no existe un controlador dejamos el folder vacio para posicionarnos en la raiz de los controladores
								$this->folderCurrent = '';
								// asignamos el valor del controlador de la pagina de error 404
								$this->controllerCurrent = $this->error404;
							}
						}
					}
					else
					{
						// si no es una carpeta validamos que este en la posicion inicial con eso deberia estar en la raiz de los controladores, por eso el valor 0
						// y que la variable folder sea vacío para saber que no esta en la carpeta raiz del controllador
						if( $i == 0 && $this->folderCurrent == "" )
						{
							// validamos que el controlador exista
							if( file_exists( '../App/Controllers/' . ucwords( $url[$i] . 'Controller.php' ) )  )
							{
								// asignamos este valor al controlador
								$this->controllerCurrent = $url[$i];
								// agregamos esta posicion al array para ser eliminado
								array_push($url_delete, $i);
								// validamos si existe un metodo, si no tomara el valor del metodo por defecto
								if( isset( $url[$i+1] ) )
								{
									// asignamos este valor al metodo actual
									// reemplazamos los - por _ para generar rutas mas dinamicas
									$this->methodCurrent = str_replace("-", "_", $url[$i+1]);
									// agregamos esta posicion al array para ser eliminado
									array_push($url_delete, $i+1);
								}
							}
							else
							{
								// si no existe un controlador dejamos el folder vacio para posicionarnos en la raiz de los controladores
								$this->folderCurrent = '';
								// asignamos el valor del controlador de la pagina de error 404
								$this->controllerCurrent = $this->error404;
							}
						}
					}
				}
			}
			// eliminamos los valores de los indices repetidos de la busqueda anterior
			$url_unicos = array_unique($url_delete);
			// recorremos el array de los indices unicos
			for( $i = 0; $i < count($url_unicos); $i++ )
				// eliminamos de la url los valores de foldes, controller, metodo para pasar solo los parametos
				unset( $url[$i] );
			// obtener los posibles parametros
			// si existen para metros le pasamos un arreglo en caso de no tener nada lo dejamos vacio
			$this->params = $url ? array_values( $url ) : [];
		}
	}

	// funcion para limpiar la url de caracteres extraños
	private function limpiarUrl( $url )
	{
		// array que contiene los caracteres extraños para evitar problemas
		$order = array( "+", "!", "*", "'", "(", ")", ",", "{", "}", "|", "\\", "^", "~", "[", "]", "`", ">", "<", ";", ":", "&", "=", "%");
		// reemplazamos por vacio cada caracter extraño
		$url =  str_replace($order, "", $url);
		// retornamos la nueva url
		return $url;
	}

}