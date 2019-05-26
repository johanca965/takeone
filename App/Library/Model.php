<?php 


class Model extends Conex
{
	// variable que contiene el nombre de la tabla
	protected $table;
	// variable que contiene los datos que se pueden guardar
	protected $fillable = [];
	// variable que contiene los campos que no queremos dejar ver
	protected $hidden = [];
	// variable que contendra los campos y valores del sql
	private $values;

	
	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
	}
	
	// funcion para ejecutar un query desde cualquier vista diferente a los preparados
	// es especialmente para busquedas diferentes a las planteadas
	protected function simple( $sql )
	{
		// retorna el resultado de ese query
		return $this->conex->query( $sql );
	}


	// funcion para obtener todos los registros
	// $input: campo por donde se desea organizar
	// $order: tipo de orden por el cual se desea visualizar
	protected function all( $input = 'id', $order = 'asc' )
	{
		// funcion para arreglar los campos que podemos dejar ver
		$this->selectInputs();
		// ejecutamos y retornamos los valores de la consulta
		return $this->conex->query( ' SELECT ' . $this->values . ' FROM ' . $this->table . ' ORDER BY ' . $input . ' ' . $order );
	}


	// funcion para obtener buscar un registro por ID
	protected function find( $id )
	{
		// funcion para arreglar los campos que podemos dejar ver
		$this->selectInputs();
		// ejecutamos y retornamos los valores de la consulta
		return $this->conex->query(' SELECT ' . $this->values . ' FROM ' . $this->table . ' WHERE id = ' . $id );
	}


	// funcion para crear un registro
	// $request se recibe como array con los valores en orden del fillable
	protected function store( $request )
	{
		// arreglamos el request para asignarlo en la variable values
		$this->fillableStore( $request );
		// ejecutamos el query
		$query = $this->conex->query( ' INSERT INTO ' . $this->table . $this->values );
		// validamos que no exista un error en la consulta
		return $this->validateError( $query );
	}


	// funcion para actualizar un registro
	// $request se recibe como array con los valores en orden del fillable,
	// el id tiene que ser por obligacion el primer elemento de la lista
	protected function update( $request )
	{
		// obtenemos el id del inicio del array
		$id = $request['id'];
		// eliminamos el id de la lista
		array_shift( $request );
		// arreglamos el request para asignarlo en la variable values
		$this->fillableUpdate( $request );
		// ejecutamos el query
		$query = $this->conex->query( ' UPDATE ' . $this->table .' SET ' . $this->values .' WHERE id = ' . $id );
		// validamos que no exista un error en la consulta
		return $this->validateError( $query );
	}

	// funcion para obtener buscar un registro por ID
	protected function delete( $id )
	{
		// ejecutamos el query
		$query = $this->conex->query(' DELETE FROM ' . $this->table . ' WHERE id = ' . $id );
		// validamos que no exista un error en la consulta
		return $this->validateError( $query );
	}

	// funcion para obtener todos los registros y paginar
	// $url: variable que contiene la URL de la pagina en donde se muestra el listado
	// $pagina: variable para crear el paginador
	// $value_whr: valor por el cual se realiza la busqueda
	// $input_whr: campo por donde se desea buscar
	// $input_ord: campo por donde se desea organizar
	// $order: tipo de orden por el cual se desea visualizar
	protected function pagination( $url, $pagina, $value_whr = null, $input_whr = 'id', $input_ord = 'id', $order = 'asc', $sql = null )
	{
		// funcion para arreglar los campos que podemos dejar ver
		$this->selectInputs();
		// obtenemos los datos para realizar la seleccion de datos por pagina
		// $paginacion['inicio']: obtenemos la posicion de la variable de inicio
		// $paginacion['limit']: obtenemos la cantidad limite de datos a mostrar en el listado
		$paginacion = $this->limit( $pagina );
		// validamos si el campo de consulta es null
		if( $sql == null )
		{
			// la consulta por defecto en dado caso de que venga el sql vacio
			$sql = ' SELECT ' . $this->values . ' FROM ' . $this->table . ' WHERE ' . $input_whr . ' LIKE "%' . $value_whr . '%"';
		}
		// ejecutamos y retornamos los valores de la consulta limitada y ordenada
		$list = $this->conex->query( $sql.' ORDER BY ' . $input_ord . ' ' . $order . ' LIMIT ' . $paginacion['inicio'] . ', ' . $paginacion['limit'] );
		// ejecutamos y retornamos los valores de la consulta sin limites para obtener la cantidad total de registros
		$all = $this->conex->query( $sql );
		// obtenemos el renderizado de los links de la paginacion
		$render = $this->render( $url, $pagina, $value_whr, $all->num_rows );
		return [
			'list' => $list,
			'cant' => $all->num_rows,
			'render' => $render
		];
	}

	// funcion para obtener la seleccion de datos por pagina
	// $pagina: variable para crear el paginador
	protected function limit( $pagina )
	{
		//examino la página a mostrar y el inicio del registro a mostrar
		if ( $pagina === 1 )
			$inicio = 0;
		else
		   $inicio = ($pagina - 1) * LIMIT_PAGE;
		return [ 'inicio' => $inicio, 'limit' => LIMIT_PAGE ];
	}

	// funcion para crear los links de la paginacion
	// $url: variable que contiene la URL de la pagina en donde se muestra el listado
	// $pagina: variable para crear el paginador
	// $value_whr: valor por el cual se realiza la busqueda
	// $cant: numero total de registros
	protected function render( $url, $pagina, $value_whr, $cant )
	{
		// variable que renderiza el listado
		$links = '<div class="pagination">';
		//calculo el total de páginas
		$total_paginas = ceil( $cant / LIMIT_PAGE );
		if ( $total_paginas > 1 ) 
		{
			// validamos que no sea la pagina 1 para colocar el link anterior
			if ($pagina != 1)
				$links .= '<a class="link_pagination" href="'.$url.'/'.($pagina-1).'/'.$value_whr.'"><i class="fa fa-angle-left"></i></a>';
			for ($i=1;$i<=$total_paginas;$i++) {
				// validamos que sea un link anterior a la pagina actual y que sea mayor o igual a 3 paginas atras
				if (  $i >= ($pagina-3) && $i < $pagina )
					$links .= '<a class="link_pagination" href="'.$url.'/'.$i.'/'.$value_whr.'">'.$i.'</a>';
            	//si muestro el índice de la página actual, no coloco enlace
				else if ($pagina == $i)
					$links .= '<span class="link_pagination_active">'.$pagina.'</span>';
				// validamos que sea un link siguiente a la pagina actual y que sea menor o igual a 3 paginas adelante
				else if (  $i <= ($pagina+3) && $i > $pagina )
					$links .= '<a class="link_pagination" href="'.$url.'/'.$i.'/'.$value_whr.'">'.$i.'</a>';
			}
			// validamos que no sea la ultima pagina para colocar el link siguiente
			if ($pagina != $total_paginas)
				$links .= '<a class="link_pagination" href="'.$url.'/'.($pagina+1).'/'.$value_whr.'"><i class="fa fa-angle-right"></i></a>';
		}
		$links .= '</div>';
		// retornamos el renderizado
		return $links;
	}

	// funcion para arreglar los datos obtenidos por el request del store
	private function fillableStore( $request )
	{
		// limpiamos la variable
		$this->values = '';
		// contamos cuantos campos se pueden guardar
		$cant = count( $this->fillable );
		// abrimos un parantesis para asignar cuales campos se pueden guardar
		$this->values = ' ( ';
		// recorremos la variable que contiene los campos a guardar
		for ($i=0; $i < $cant; $i++) {
			// asignamos los campos que se pueden guardar
			// dejamos un espacio en blanco para separar los campos
			$this->values .= ' ' . $this->fillable[$i] . ',';
		}
		// eliminamos la coma del ultimo caracter para evitar problemas en la base de datos
		$this->values = $this->deleteLastWord( $this->values );
		// cerramos el parentesis para agregar los valores de los campos que se dejan guardar
		$this->values .= ' ) VALUES ( ';
		// llenamos los valores de los campos
		for ($i=0; $i < $cant; $i++) {
			// escapamos la variable para evitar que nos hagan sql injection
			// agreamos los campos que se dejan guardar que provienen del request
			// dejamos un espacio en blanco para separar los campos
			$this->values .= " '". $this->protectVars( $request[ $this->fillable[$i] ] ) ."',";
		}
		// eliminamos la coma del ultimo caracter para evitar problemas en la base de datos
		$this->values = $this->deleteLastWord( $this->values );
		// cerramos el ultimo parentesis
		$this->values .= ' ) ';
	}


	// funcion para arreglar los datos obtenidos por el request del update
	private function fillableUpdate( $request )
	{
		// limpiamos la variable
		$this->values = '';
		// contamos cuantos campos se pueden guardar
		$cant = count( $this->fillable );
		// recorremos la variable que contiene los campos a guardar
		for ($i=0; $i < $cant; $i++) {
			// validamos que el campo no sea nulo para poder actualizarlo
			if( isset( $request[ $this->fillable[ $i ] ] ) && !empty( $request[ $this->fillable[ $i ] ] ) )
				// escapamos la variable para evitar que nos hagan sql injection
				// arreglamos la variable que contiene los campos y valores
				// dejamos un espacio en blanco para separar los campos,
				// luego seleccionamos de la lista el campo que se desea actualizar con la variable fillable
				// luego se asigna el valor que trae la variable request de acuerdo a los campos que se dejan guardar
				$this->values .= " " . $this->fillable[$i] . " = '". $this->protectVars( $request[ $this->fillable[$i] ] ) ."'," ;
		}
		// eliminamos la coma del ultimo caracter para evitar problemas en la base de datos
		$this->values = $this->deleteLastWord( $this->values );
	}


	// funcion para seleccionar los campos que se pueden retornar
	protected function selectInputs()
	{
		// por defecto asuminos que todas las tablas tienen un id asi que lo agregados al listado de los que se dejaran ver
		$this->values = "id,";
		// obtenemos una copia de los datos que se pueden guardar
		$fillables = $this->fillable;
		// recorremos el array de los campos que no se dejaran ver
		foreach ($this->hidden as $hidden) {
			// preguntamos si existe ese valor en el array de copia
			if( in_array($hidden, $fillables) )
				// eliminamos ese valor del array de copia
				unset( $fillables[ array_search( $hidden, $fillables ) ] );
		}
		// recorremos los campos finales para organizar la cadena 
		foreach ($fillables as $data) {
			// organizamos la cadena para ser usada
			$this->values .= " $data,";
		}
		// eliminamos la coma del ultimo caracter para evitar problemas en la base de datos
		$this->values = $this->deleteLastWord( $this->values );
		// retornamos esta cadena para que sea utilizada en otras clases
		return $this->values;
	}


	// funcion para eliminar el ultimo caracter de una cadena
	private function deleteLastWord( $str )
	{
		return substr($str, 0, -1);
	}

	// funcion para arreglar una cadena para evitar el sql injection
	protected function protectVars( $str )
	{
		// escapamos los caracteres raros
		$str = $this->conex->real_escape_string( $str );
		// retornamos este valir
		return $str;
	}


	// funcion para parar el sistema si tenemos algún tipo de error 
	protected function validateError( $query )
	{
		if( !$query )
		{
			return $this->conex->error;
		}
		else
		{
			return "true";
		}
	}
}