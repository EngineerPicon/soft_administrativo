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
<!-- Historial de los Credenciales de personal realizados -->
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="assets/img/favicon.ico"> <!-- Viculo llamado ico pestaña -->
	<title>Historial Credenciales</title>
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
						______________________________________________________
	      			<a class="boton_cerrar" href="logout.php">Cerrar Sesión</a></b>
<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>
<a class="boton_volver" href="creden_esp_pdf.php">Generar documento PDF todos los Credenciales</a>
<a class="boton_volver" href="creden_pdf.php">Generar historial PDF todos los Credenciales ]</a>
<a class="boton_volver" href="borrado_creden.php">Borrar todo Historial</a><br /><br />
<a class="boton_volver" class="" href="creden.php">Formulario Credencial</a>
<!-- Vinculo para regresar a pagina de inicio -->
<a class="boton_volver" href="index.php">Volver a Inicio</a><br /><br />

<big><strong>Historial de Credenciales</strong></big><br /><br />

<!--///////////////////////////////////////////////////////////////////////////////
	//Código PHP llamado de conexión en base de datos; test la tabla credencial
	//mostrar los datos de dicha tabla en orden de mas antiguo a mas reciente
	//////////////////////////////////////////////////////////////////////////////
-->

<?php
	$conexion=mysqli_connect("localhost","root","","test") or die ("Problemas con la conexión :(");
		$registros=mysqli_query($conexion,"select * from creden") or die 
				("Problemas en el select:".mysqli_error($conexion));

				echo "<table border='1'>
				<tr>
					<td><b>ID</b></td>
					<td><b>Nombres</b></td>
					<td><b>Apellidos</b></td>
					<td><b>Cédula de identidad</b></td>
					<td><b>Nivel Educativo</b></td>
					<td><b>Cargo</b></td>
					<td><b>Fecha asignada del Cargo</b></td>
					<td><b>Fecha de Elaboración</b></td>
					<td colspan ='3'><center><b>Opciones</b></center></td>	
				</tr>";

				while ($reg=mysqli_fetch_array($registros))
				{
					echo "<tr><td>".$reg['id']."</td>";
					echo "<td>".$reg['nombre']."</td>";
					echo "<td>".$reg['apellido']."</td>";
					echo "<td>".$reg['ci']."</td>";
					echo "<td>".$reg['ne']."</td>";
					echo "<td>".$reg['cargo']."</td>";
					echo "<td>".$reg['fecha_cargo']."</td>";
					echo "<td>".$reg['fecha_elaboracion']."</td>";
					
					/* ///////////////////////////////////////
					// Aqui se agregan los botones para que hagan las tareas de 
					// modificar credencial, eliminar credencial
					//////////////////////////////////////////
					*/
					/*Botón para modificar*/
					echo "<td>
							<form method='post' action='act_cred.php'>
							<input type='hidden' value='$reg[ci]' name='codModificar'/>
							<input type='submit' value='Modificar'/>
							</form>
						 </td>";
					/* Botón para eliminar */
					echo "<td>
							<form method='post' action='elim_creden.php'>
							<input type='hidden' value='$reg[ci]' name='codEliminar'/>
							<input type='submit' value='Eliminar'/>
							</form>
						 </td>";
				}
		echo "</table";
	mysqli_close($conexion);
?>
</form>
</center>

			<?php else: ?> <!-- Menú principal -->
				<p>Por favor, Seleccionar una opción</p><br />
					<a class="boton_iniciosesion" href="login.php">Iniciar Sesión</a> o
					<a class="boton_registro" href="signup.php">Registrarse</a><br /><br />
		    <?php endif; ?>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>