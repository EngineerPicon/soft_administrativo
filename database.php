<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'php_login_database';
try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>

<!-- Programador Rolando Picon Nadales 2019
	Si puedes ver esto es que se hizo 
	el llamado de conexion correcto de 
	base de datos php_login_database
-->