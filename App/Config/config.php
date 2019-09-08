<?php 

// Versión de Hyperlink S.E. Framework 2.1
// Documentación disponible en https://framework.hyperlinkse.com

// desactivamos todos los warning, notice y errores de php
error_reporting(0);

////////////////////////////
// rutas de la aplicacion //
////////////////////////////

// nos devolvemos a la carpeta padre de nuestra aplicacion la cual es App
// con la ayuda de la palabra reservada dirname vamos seleccionando las carpetas
// la constante global __FILE__ nos da la ruta completa de este archivo incluyendo el nombre
define( 'RUTA_APP', dirname( dirname( __FILE__ ) ) );
// separador de directorios para rutas reales \
define( 'DS' , DIRECTORY_SEPARATOR);
// ruta publica del real del sistema, evitar usarla lo mas posible
define( 'RUTA_PUBLIC', dirname( RUTA_APP ) . '/Public/' );
// ruta publica para acceder a los paquetes instalados con composer
define( 'RUTA_VENDOR', dirname( RUTA_APP ) . '/vendor/' );
// ruta url del sitio
define( 'RUTA_URL', 'http://localhost/proyectos/takeone' );
// ruta para la carpeta publica css
define( 'RUTA_CSS', RUTA_URL . '/css/' );
// ruta para la carpeta publica js
define( 'RUTA_JS', RUTA_URL . '/js/' );
// ruta para la carpeta publica img
define( 'RUTA_IMG', RUTA_URL . '/img/' );
// ruta para la carpeta privada de las vistas
define( 'RUTA_RESOURCES', RUTA_APP . '/Resources/' );
// nombre de la aplicacion por defecto
define( 'APP_NAME', 'TAKEONE SPORTS & TECHNOLOGY' );

// configuración de acceso a la base de datos
// variable que permite la conexion
define( 'DB_CONEX', 'on' );
// nombre del servidor
define( 'DB_HOST', 'localhost' );
// usuario del servidor
define( 'DB_USER', 'root' );
// contraseña del servidor
define( 'DB_PASS', '' );
// base de datos del servidor
define( 'DB_NAME', 'takeone_10_04_19' );
// charset de la base de datos del servidor
define('DB_CHARSET','utf-8');

// configracion de acceso al envio de correos
// smtp Hots
define( 'SMTP_HOST', 'mail.hyperlinkse.com' );
// smtp Usuario
define( 'SMTP_USER', 'comercial@hyperlinkse.com' );
// smtp Password
define( 'SMTP_PASSWORD', 'empresa2018' );
// smtp Destinatario
define( 'SMTP_ADDRESS', 'comercial@hyperlinkse.com' );

// configuración para métodos de encriptación y desencriptación
// variable que contiene el metodo de encriptacion
define( 'MHETOD_ENCRYPTION', 'AES-256-CBC' );
// variable que contiene el string que desea concatenar a la encriptacion
define( 'SECRET_KEY_ENCRYPTION', 'aeiou' );
// variable que contiene los numeros que desea concatenar a la encriptacion
define( 'SECRET_IV_ENCRYPTION', '123456789' );

// tamaño max. de los archivos
define('MAX_SIZE', 1024*700);
// cantidad de resultados por pagina
define( 'LIMIT_PAGE', 10 );

