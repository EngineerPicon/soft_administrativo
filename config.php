<?php
/*Conexion de la base de datos con nuestras paginas WEB*/
define('DB_SERVER', 'Localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'test');
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if ($link === false) {
	die('ERROR: No puede conectar. '.mysqli_connect_error());
}
?>
<!-- Programador Rolando Picon Nadales 2019
	Si puedes ver esto es que se hizo 
	el llamado de conexion correcto de 
	base de datos test
-->