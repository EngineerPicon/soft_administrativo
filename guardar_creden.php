<?php
  session_start();
  require 'database.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
      $user = $results;
    }
  }
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="assets/img/favicon.ico"> <!-- Viculo llamado ico pestaña -->
	<title>Guardado Credencial</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
	 
</head>

		<body>
			<center>
			<?php include 'partials/header.php' ?>

			<!-- se mostrara solo al iniciar sesion -->
 	<?php if(!empty($user)): ?>
	<b>Usuario. <?= $user['email']; ?>
      <a class="boton_cerrar" href="logout.php">[ Cerrar Sesión ]</a></b>
      
		<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>

<big><strong>Resultado de operación:</strong></big><br />

<?php

$conexion=mysqli_connect("localhost", "root", "", "test") or die ("problemas con la conexión");

mysqli_query($conexion, "insert into creden(nombre, apellido, ci, ne, cargo, fecha_cargo, dia, mes, year, fecha_elaboracion, fd, fn, fm, fa) values ('$_POST[nombre]', '$_POST[apellido]', '$_POST[ci]', '$_POST[ne]', '$_POST[cargo]', '$_POST[fecha_cargo]', '$_POST[dia]', '$_POST[mes]', '$_POST[year]', '$_POST[fecha_elaboracion]', '$_POST[fd]', '$_POST[fn]', '$_POST[fm]', '$_POST[fa]')") or die ("Problemas en el select".mysqli_error($conexion));

mysqli_close($conexion);

    echo "<b>El Formulario fue enviado con exito.</b>";

?>
<br /><br /><a href="creden.php">[ Volver a Formulario credencial ]</a>

	<?php else: ?> <!-- Menú principal -->
			<p>Por favor, Seleccionar una opción</p><br/>
			<a href="login.php">[ Iniciar Sesión ]</a> o
			<a href="signup.php">[ Registrarse ]</a><br/><br/>
	<?php endif; ?>	
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>