<?php

////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////
//                                                                                                    //
// Para usar este trait se importa de igual manera que cualquier otro trait                           //
// Para hacer uno de las plantillas debe importarlas de la siguiente manera                           //
// ejemplo con la plantilla por defecto:                                                              //
// require_once RUTA_APP."/Traits/NexmoTrait.php";                                                    //
// Ejemplo para visualizar el pdf guardandolo en el servidor                                          //
// $nexmo = NexmoTrait::send_message( $number, $code );                                               //
//                                                                                                    //
////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////

// requerimos el autoload de los archivos cargados con composer
require_once RUTA_VENDOR . '/autoload.php';

class NexmoTrait
{

	public static function send_message( $number, $code )
	{
		$basic  = new \Nexmo\Client\Credentials\Basic("02581d2f", "wVgNE5Twky2RvoUg");
		$client = new \Nexmo\Client( $basic );

		try {
			$message = $client->message()->send([
				'to' => $number,
				'from' => 'Acme Inc',
				'text' => 'The code to register on TAKEONE is: '.$code
			]);
			$response = $message->getResponseData();

			if( $response['messages'][0]['status'] == 0 ) 
				return "The message was sent successfully";
			else 
				return "The message failed with status: " . $response['messages'][0]['status'];
		} 
		catch (Exception $e) 
		{
			return "The message was not sent. Error: " . $e->getMessage();
		}
	}

}