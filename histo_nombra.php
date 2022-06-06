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
<!-- Historial de los Nombramientos de personal realizados -->
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="assets/img/favicon.ico"> <!-- Viculo llamado ico pestaña -->
	<title>Historial Nombramientos</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
 	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>

<body>
	
		<?php include 'partials/header.php' ?>

		<!-- se mostrara solo al iniciar sesion -->
 	<?php if(!empty($user)): ?>
	<b>Usuario. <?= $user['email']; ?>
		______________________________________________________
      <a class="boton_cerrar" href="logout.php">Cerrar Sesión</a></b>
		
<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>

<a class="boton_volver" href="nombra_esp_pdf.php">Generar documento PDF todos los nombramientos</a>
<a class="boton_volver" href="nombra_pdf.php">Generar historial PDF</a>
<a class="boton_volver" href="borrado_nombra.php">Borrar Todo Historial</a><br /><br />
<!-- Vinculo para regresar a pagina de inicio -->
<a class="boton_volver" href="nombra.php">Formulario Nombramiento</a>
<a class="boton_volver" href="index.php">Volver a Inicio</a><br /><br />
<center>
	<form>
	<big><strong>Historial de Nombramientos</strong></big><br /><br />

<!-- ////////////////////////////////////////////////////////////////////////////////////
    // Código PHP de conexion con la base de datos MySQL nombre test,
	// en la tabla nombramiento 
	////////////////////////////////////////////////////////////////////////////////////
-->
		<?php
				$conexion=mysqli_connect("localhost","root","","test") or die ("Problemas con la conexión :(");

				$registros=mysqli_query($conexion,"select * from nombra") or die 
				("Problemas en el select:".mysqli_error($conexion));

				echo "<table border='1'>
				<tr>
					<td><b>ID</b></td>
					<td><b>Nombres</b></td>
					<td><b>Apellidos</b></td>
					<td><b>Cédula de identidad</b></td>
					<td><b>Cargo</b></td>
					<td><b>Designado</b></td>
					<td><b>Fecha Nombramiento Personal</b></td>
					<td><b>Fecha Elaboración Documento</b></td>
					<td><b>Cédula de identidad del Sustituido</b></td>
					<td><b>Nombre del Sustituido</b></td>
					<td><b>Apellido del Sustituido</b></td>
					<td><b>Nivel Educativo del Sustituido</b></td>
					<td colspan ='3'><center><b>Opciones</b></center></td>	
				</tr>";

				while ($reg=mysqli_fetch_array($registros))
				{
					echo "<tr><td>".$reg['id']."</td>";
					echo "<td>".$reg['nombre']."</td>";
					echo "<td>".$reg['apellido']."</td>";
					echo "<td>".$reg['ci']."</td>";
					echo "<td>".$reg['cargo']."</td>";
					echo "<td>".$reg['designado']."</td>";
					echo "<td>".$reg['fecha_cargo']."</td>";
					echo "<td>".$reg['fecha_elaboracion']."</td>";
					echo "<td>".$reg['ci_sust']."</td>";
					echo "<td>".$reg['nomb_sust']."</td>";
					echo "<td>".$reg['ap_sust']."</td>";
					echo "<td>".$reg['ne_sust']."</td>";

					
					/* /////////////////////////////////////////7///////////////
					// Aqui se agregan los botones para que hagan las tareas de 
					// modificar nombramiento, eliminar nombramiento
					////////////////////////////////////////////////////////////
					*/
					// Botón para modificar
					echo "<td>
							<form method='post' action='act_nomb.php'>
							<input type='hidden' value='$reg[ci]' name='codModificar'/>
							<input type='submit' value='Modificar'/>
							</form>
						 </td>";
				    // Botón para eliminar 
					echo "<td>
							<form method='post' action='elim_nomb.php'>
							<input type='hidden' value='$reg[ci]' name='codEliminar'/>
							<input type='submit' value='Eliminar'/>
							</form>
						 </td>";
				}
		echo "</table";
	mysqli_close($conexion);
?>
<!-- ////////////////////////////////////////////////////////////////////////////////////
	// Fin del código PHP de el llamado de la tabla de conexión de la base de datos test, 
	// con la tabla nombramiento
	 ////////////////////////////////////////////////////////////////////////////////////
-->
</form>
</center>
					<?php else: ?> <!-- Menú principal -->
				      <p>Por favor, Seleccionar una opción</p><br/>
				      <a class="boton_iniciosesion" href="login.php">Iniciar Sesión</a> o
				      <a class="boton_registro" href="signup.php">Registrarse</a><br/><br/>
				    <?php endif; ?>

<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>