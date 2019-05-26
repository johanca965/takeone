<?php 

/*

	descomentar cuando este listo para subir 

// url de redireccion del sition web
$url = "";

// validamos si no es servidor seguro para ser redireccionado
if ( !$_SERVER['HTTPS'])
    // Codigo a ejecutar si se navega bajo entorno seguro.
    header("Location: ".$url.$_SERVER['REQUEST_URI'] );
    
// validamos si el requuest uri es la carpeta publica
if( $_SERVER['REQUEST_URI'] == '/Public/' )
    // si lo tiene lo redireccionamos al sitio sin www
    // colocar la url que se pone en RUTA_URL con https
    header("Location: ".$url);
else
{
    // explotamos el valor que trae el request desde el =
    // ej: /Public/index.php?url=products/diseno-web
    $request = explode("=", $_SERVER['REQUEST_URI']);
    // validamos que el request en la posicion 0 sea diferente a una ruta dinamica
    if( $request[0] == "/Public/index.php?url" )
        // seleccionamos la posicion 1 que es donde viene products/diseno-web y redireccionamos
        header("Location: ".$url."/". $request[1]);
}   

*/

// requerimos el autoload del sistema
require_once '../App/autoload.php';

// instanciamos la clase controlador
new Core;