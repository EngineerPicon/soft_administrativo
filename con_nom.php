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
	<title>Busqueda Nombramiento</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>
	<body>
		
			<?php include 'partials/header.php' ?> <!-- cabecera -->
			<!-- se mostrara solo al iniciar sesion -->

<!-- se mostrara solo al iniciar sesion -->
 		
			<?php if(!empty($user)): ?><b>Bienvenido. <?= $user['email']; ?>
				<a class="boton_cerrar" href="logout.php">Cerrar Sesión</a></b>
<!-- Código de menú desplegable -->			
<?php include 'partials/menu.php' ?>		 <center>


<big><strong>Resultado Consulta Especifica de personal Nombramientos: </strong></big><br /><br />
	<form>

		<?php 
			$conexion=mysqli_connect("localhost","root","","test") or die ("Problemas con la conexión");
			$registros=mysqli_query($conexion,"select * from nombra where ci='$_POST[datoBuscar]'")or die("Problemas en el select:".mysqli_error($conexion));
			if($reg=mysqli_fetch_array($registros))
			{
				echo "el ID es: ".$reg['id']."<br />";
				echo "Nombres: ".$reg['nombre']."<br />";
				echo "Apellidos: ".$reg['apellido']."<br />";
				echo "la Cédula de Identidad es: ".$reg['ci']."<br />";
				echo "Cargo es: ".$reg['cargo']."<br />";
				echo "Fecha Cargo: ".$reg['fecha_cargo']."<br />";
				echo "Fecha de Elaboración: ".$reg['fecha_elaboracion']."<br /";
				echo "<hr>";
				echo "Cedula de identidad del sustituido: ".$reg['ci_sust']."<br />";
				echo "Nombre del sustituido: ".$reg['nom_sust']."<br />";
				echo "Apellido del sustituido: ".$reg['ap_sust']."<br />";
				echo "Nivel academico del sustituido: ".$reg['ne_sust']."<br />";

			}else{
				echo "No existe número de Cédula en la tabla Nombramiento. ";
				echo "<br />";
			}
			mysqli_close($conexion);
		?>
	</form><br />
	<a href="nombra.php">[ Ir a Formulario Nombramiento ]</a><br /><br />
	<a href="index.php">[ Ir a pagina de inicio ]</a><br />
<!-- Codigo que se genera cuando verifica si la sesion esta abierta -->
	<?php else: ?> <!-- Menú principal -->
		<p>Por favor, Seleccionar una opción</p><br />
		<a href="login.php">[ Iniciar Sesión ]</a> o
		<a href="signup.php">[ Registrarse ]</a><br /><br />
	<?php endif; ?>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>