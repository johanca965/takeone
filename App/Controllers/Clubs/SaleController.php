<?php

class SaleController extends Controller
{

	public function __construct()
	{
		// validamos que solo puedan ingresar los del rol de miembro
		$this->Auth()->validate_role_user( 2 );
		// importamos el modelo correspondiente
		$this->auditModel = $this->model('Audit');
		// importamos el modelo correspondiente
		$this->saleModel = $this->model('sale');
		// importamos el modelo correspondiente
		$this->stockModel = $this->model('stock');
		// importamos el modelo correspondiente
		$this->productsaleModel = $this->model('Productsale');
		// importamos el modelo correspondiente
		$this->clubModel = $this->model('Club');
		// importamos el modelo correspondiente
		$this->memberModel = $this->model('Member');
		// importamos el modelo correspondiente
		$this->clubnotificationModel = $this->model('Clubnotification');

	}

	// función para obtener los datos del club
	public function index()
	{
		// obtenemos los datos del club
		$result = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [
			'sales_done' => $this->saleModel->findDoneByClubID( $result['id'] ),
			'sales_expired' => $this->saleModel->findExpiredByClubID( $result['id'] ),
			'sales_canceled' => $this->saleModel->findCanceledByClubID( $result['id'] ),
			'club' => $result,
			'breadcrumb_data' => '<li class="active">Sales</li>'
		];
		$this->view('Clubs/Sales/index', $params );
	}

	// función para mostrar el formulario de crear
	public function create()
	{
		// obtenemos los datos del club
		$result = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$params = [
			'members' => $this->memberModel->findByAllClubID( $result['id'] ),
			'products' => $this->stockModel->findByAvailableClubID( $result['id'] ),
			'club' => $result,
			'breadcrumb_data' => '
				<li>
                    <a title="List products" href="'.RUTA_URL.'/Clubs/Sale/">
                       <i class="fa fa-shopping-cart"></i> Sales</a>
                </li>
				<li class="active">New</li>
			'
		];
		$this->view('Clubs/Sales/create', $params);
	}

	// función para mostrar el formulario de crear
	public function edit( $id )
	{
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$sale = mysqli_fetch_assoc($this->saleModel->find( $id ));
		$params = [
			'sale' => $sale,
			'productsales' => $this->productsaleModel->findBySaleID( $sale['id'] ),
			'members' => $this->memberModel->findByClubID( $club['id'] ),
			'products' => $this->stockModel->findByAvailableClubID( $club['id'] ),
			'club' => $club,
			'breadcrumb_data' => '
				<li>
                    <a title="List products" href="'.RUTA_URL.'/Clubs/Sale/">
                       <i class="fa fa-shopping-cart"></i> Sales</a>
                </li>
				<li class="active">Update</li>
			'
		];
		$this->view('Clubs/Sales/edit', $params);
	}

	// función para crear venta
	public function store()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'member_id' => 'required',
			'payment_method' => 'required',
			'stocksale_id' => 'required',
			'quantity' => 'required'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// validamos que existan productos en la venta
		if( !isset( $_POST['stocksale_id'] ) )
		{
			// retornamos un mensaje de error al usuario
			array_push( $this->errors, "You must select products to be able to make the sale." );
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		// variable que guarda la fecha de registro
		$time = date('Y-m-d H:i:s');
		// creamos un array que contiene los datos a guardar
		$request = [
			'club_id' => $club['id'],
			'member_id' => $_POST['member_id'],
			'total' => $_POST['total_sale_input'],
			'payment_method' => $_POST['payment_method'],
			'state' => $_POST['state'],
			'created_at' => $time,
			'updated_at' => $time
		];
		// realizamos la petición
		$result = $this->saleModel->store( $request );
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
			// realizamos la petición para los datos de la venta
			$result = mysqli_fetch_assoc( $this->saleModel->findByClubDate( $club['id'], $time ) );
			// recorremos los productos a guardar
			for ($i=0; $i < count( $_POST['stocksale_id'] ); $i++) { 
				// obtenemos los datos del producto a guardar
				$stock = mysqli_fetch_assoc($this->stockModel->find( $_POST['stocksale_id'][$i] ));
				// creamos la variable que contiene los datos
				$request = [
					'sale_id' => $result['id'],
					'stock_id' => $_POST['stocksale_id'][$i],
					'cant' => $_POST['quantity'][$i],
					'subtotal' => $stock['price'],
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				];
				// realizamos la inserción
				if( $this->productsaleModel->store( $request ) )
				{
					// realizamos la resta de stock
					$cant = $stock['cant'] - $_POST['quantity'][$i];
					// validams si la cantidad es 0 para generar la notificación
					if( $cant == 0 )
					{
						$cant = 'NULL';
						// creamos la variable que contiene los datos
						$request = [
							'club_id' => $club['id'],
							'importance' => '5',
							'section' => 'stock',
							'section_id' => $stock['id'],
							'created_at' => date('Y-m-d H:i:s'),
							'updated_at' => date('Y-m-d H:i:s')
						];
						$this->clubnotificationModel->store( $request );
					}
					// creamos la variable que contiene los datos
					$request = [
						'id' => $stock['id'],
						'cant' => $cant,
						'updated_at' => date('Y-m-d H:i:s')
					];
					// modificamos el producto
					$this->stockModel->update( $request );
				}
				else
				{
					$this->productsaleModel->deleteWithSaleID( $result['id'] );
					$this->saleModel->delete( $result['id'] );
					// agregamos el mensaje de error
					array_push( $this->errors, "An error occurred while making the sale, try again" );
					// mostramos el mensaje de error
					echo $this->errors();
					exit();
				}
			}
			// creamos un array que contiene los datos a registrar
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'tabla' => 'Sale',
				'action' => 'Create',
				'code' => $result['id'],
				'description' => 'Sale registration with club code: ' . $club['id'] .', member code: ' . $_POST['member_id'] .', total: ' . $_POST['total_sale_input'] .', payment method: ' . $_POST['payment_method'] .'.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// función para actualizar venta
	public function update()
	{
		// validar método post
		$this->methodPost();
		// validación de campos
		$errors = $this->validate( $_POST, [
			'member_id' => 'required',
			'payment_method' => 'required',
			'stocksale_id' => 'required',
			'quantity' => 'required'
		]);
		// validamos si existe un error
		if( $errors )
		{
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}
		// validamos que existan productos en la venta
		if( !isset( $_POST['stocksale_id'] ) )
		{
			// retornamos un mensaje de error al usuario
			array_push( $this->errors, "You must select products to be able to make the sale." );
			// mostramos el error
			echo $this->errors();
			// evitamos que siga la función
			return;
		}		
		// variable que guarda la fecha de registro
		$time = date('Y-m-d H:i:s');
		// creamos un array que contiene los datos a guardar
		$request = [
			'id' => $_POST['id'],
			'member_id' => $_POST['member_id'],
			'total' => $_POST['total_sale_input'],
			'payment_method' => $_POST['payment_method'],
			'state' => $_POST['state'],
			'updated_at' => $time,
		];
		// realizamos la petición
		$result = $this->saleModel->update( $request );
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
			// eliminamos los productos previos
			$this->productsaleModel->deleteWithSaleID( $_POST['id'] );
			// recorremos los productos a guardar
			for ($i=0; $i < count( $_POST['stocksale_id'] ); $i++) { 
				// obtenemos los datos del producto a guardar
				$stock = mysqli_fetch_assoc($this->stockModel->find( $_POST['stocksale_id'][$i] ));
				// creamos la variable que contiene los datos
				$request = [
					'sale_id' => $_POST['id'],
					'stock_id' => $_POST['stocksale_id'][$i],
					'cant' => $_POST['quantity'][$i],
					'subtotal' => $stock['price'],
					'created_at' => date('Y-m-d H:i:s'),
					'updated_at' => date('Y-m-d H:i:s')
				];
				// realizamos la inserción
				$this->productsaleModel->store( $request );
			}
			// creamos un array que contiene los datos a registrar
			$request = [
				'user_id' => $this->Auth()->user()->id(),
				'tabla' => 'Sale',
				'action' => 'Update',
				'code' => $_POST['id'],
				'description' => 'Sale update with member code: ' . $_POST['member_id'] .', total: ' . $_POST['total_sale_input'] .', payment method: ' . $_POST['payment_method'] .'.',
				'created_at' => date('Y-m-d H:i:s')
			];
			// realizamos la petición
			$this->auditModel->store( $request );
			// mostramos mensaje de éxito
			echo 'true';
		}
	}

	// mostrar un producto en la tabla de la vista
	public function showproduct()
	{
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$stock = mysqli_fetch_assoc($this->stockModel->find( $_POST['stock_id_add'] ));
		if( ($stock['cant']-$_POST['quantity_add']) < 0 )
		{
			// mostramos el mensaje de error
			echo "error|An error occurred while adding the product, you don't have enough to sell.";
			exit();
		}
		$subtotal = $_POST['quantity_add']*$stock['price'];
		$total = $_POST['total_sale_input'] + $subtotal;
		$tr = '
		<tr>
			<td class="text-center">'.ucwords($stock['name']).'</td>
			<td class="text-center">'.$stock['price'].' '.$club['currency'].'</td>
			<td class="text-center">'.$_POST['quantity_add'].'</td>
			<td class="text-center">'.$subtotal.' '.$club['currency'].'</td>
			<td class="text-center">
				<a class="delete_product" data-url="'.RUTA_URL.'/Clubs/Sale/showtotal" data-subtotal="'.$subtotal.'"><i class="fa fa-trash"></i></a>
			</td>
			<td style="display: none;">
				<input type="hidden"  name="stocksale_id[]" value="'.$_POST['stock_id_add'].'" />
				<input type="hidden"  name="quantity[]" value="'.$_POST['quantity_add'].'" />
			</td>
		</tr>

				<script>
				$(".delete_product").click(function(){
					var obj = $(this);
					var total_sale_input = $("#total_sale_input").val();
					var _token = $("#_token").val();
					var url = obj.data("url");
					var subtotal = obj.data("subtotal");
					$.ajax({
						url: url,
						type: "POST",
						data: { "total_sale_input" : total_sale_input, "subtotal" : subtotal, "total_sale_input": total_sale_input, "_token" : _token },
						beforeSend: function() {
							toastr.info("Processing petition...");
						},
						success: function(data) {
							data = data.split("-");
							if( data[0] === "true" )
							{
								$(".total_sale").html( data[1] );
								$("#total_sale_input").val( data[2] );
								obj.parent("td").parent("tr").remove();
								toastr.success("Petition processed.");
							}else
							{
								toastr.error("An error has occurred. Try again later.");
							}
						},
						error: function(e) {
							toastr.error("An error has occurred.");
						},
					});
					
					return false;
				});
				</script>
		';
		echo 'true|'.$tr.'|'.$total.' '.$club['currency'].'|'.$total;
	}

	public function showtotal()
	{
		// obtenemos los datos del club
		$club = mysqli_fetch_assoc( $this->clubModel->findByUserID( $this->Auth()->user()->id() ) );
		$total = $_POST['total_sale_input']-$_POST['subtotal'];
		echo 'true-'.$total.' '.$club['currency'].'-'.$total;
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