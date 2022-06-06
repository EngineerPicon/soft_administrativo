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
<!-- Pagina de Acerca del código del sistema WEB -->
<!DOCTYPE html>
<html lang="es-ES">
<head>
	<meta charset="utf-8">
	<link rel="icon" href="assets/img/favicon.ico"><!-- Vinculo para icono de pestaña -->
	<title>Sistema Acceso</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/style_menu.css">
</head>
		<body>
			
				<!--Código de Cabecera -->
				<?php include 'partials/header.php' ?>
				
<!-- se mostrara solo al iniciar sesion -->
 <?php if(!empty($user)): ?><b>Usuario. <?= $user['email']; ?> 
 	______________________________________________________
 	<a class="boton_cerrar" href="logout.php">Cerrar Sesión</a></b>
			<!-- Código de menú desplegable -->
			<?php include 'partials/menu.php' ?>
</form>
<hr>
<center>
	<b><p>REPÚBLICA BOLIVARINA DE VENEZUELA</p>
	<p>BARINAS UNELLEZ VPDS © 2019</p></b>
	<p><address>Programador y Desarrollador: Rolando Picón Nadales</address></p>
						
			</center>
<!-- Código que se genera cuando verifica si la sesion esta abierta -->
<?php else: ?> <!-- Menú principal -->
	<p>Por favor, Seleccionar una opción</p><br />
	<a class="boton_iniciosesion" href="login.php">[ Iniciar Sesión ]</a> o
	<a class="boton_registro" href="signup.php">[ Registrarse ]</a><br /><br />
<?php endif; ?>
		</body>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</html>