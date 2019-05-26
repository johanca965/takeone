<?php 


class Productsale extends Model
{

	public function __construct()
	{
		// llamamos el contructor de la clase padre
		parent::__construct();
		// variable para declarar el nombre de la tabla al cual pertenece
		$this->table = "product_sales";
		// llenamos la variable que contiene los datos que se pueden registrar en masa 
		$this->fillable = [ 
			"sale_id", "stock_id", "cant", "subtotal", "created_at", "updated_at"
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
	public function findBySaleID( $sale_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' SELECT t1.*, t2.name FROM  ' . $this->table . ' t1 INNER JOIN stocks t2 ON t1.stock_id = t2.id WHERE t1.sale_id = "'.$sale_id.'" ORDER BY t1.created_at DESC ' );
	}

	public function deleteWithSaleID( $sale_id )
	{
		// ejecutamos la consulta
		return parent::simple( ' DELETE FROM  ' . $this->table . ' WHERE sale_id = "'.$sale_id.'" ' );
	}

	// función para listar los registros
	public function listing( $pagina = 1, $input_whr = '', $value_whr = null, $input_ord = 'created_at', $order = 'desc' )
	{
		
	}

}