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
	<title>Eliminar Credencial</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>
	<body>
		<center>
			<?php include 'partials/header.php' ?> <!-- cabecera -->

			<!-- se mostrara solo al iniciar sesion -->
 	<?php if(!empty($user)): ?>
	<b>Usuario. <?= $user['email']; ?>
      <a class="boton_cerrar" href="logout.php">[ Cerrar Sesión ]</a></b>

<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>


	<big><strong>Resultado de operación:</strong></big><br />
	<form>
		<?php 
			$conexion=mysqli_connect("localhost","root","","test") or die ("Problemas con la conexión");
			$registros=mysqli_query($conexion,"select * from creden where ci='$_POST[codEliminar]'")
			or die("Problemas en el select:".mysqli_error($conexion));

			if($reg=mysqli_fetch_array($registros))
			{
				mysqli_query($conexion, "delete from creden where ci='$_POST[codEliminar]'") or die("Problemas en el select:".mysqli_error($conexion));
				echo "<b>Se efectuó el borrado del Credencial.</b><br /><br />";
			}
			mysqli_close($conexion);
		?>
	</form> 

<a href="creden.php">[ Volver a formulario Credencial ]</a><br />
<a href="index.php">[ Ir a pagina de inicio ]</a><br />
	<?php else: ?> <!-- Menú principal -->
		<p>Por favor, Seleccionar una opción</p><br />
		<a href="login.php">[ Iniciar Sesión ]</a> o
	    <a href="signup.php">[ Registrarse ]</a><br /><br />
	<?php endif; ?>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>