<?php

// cargamos los datos de la aplicacion
require_once 'Config/config.php'; 


// cargamos las librerias de la biblioteca
spl_autoload_register( function( $class ) {
	require_once 'Library/' . $class . '.php';
} );


			