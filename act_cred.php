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
	<link rel="icon" href="assets/img/favicon.ico"> <!-- Enlace del icono de la pagina WEB -->
	<title>Actualizar datos de Credencial</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
 	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>
<body>
<!--  
////////////////////////////////////////////////////////////////////////////////////
// Código para actualizar directamente en la base de datos test, 
// un registro en tabla credencial.
////////////////////////////////////////////////////////////////////////////////////
 -->			
<!-- menu iniciar sesión o registrarse sentencia php-->
 	<?php include 'partials/header.php' ?>
<!-- se mostrara solo al iniciar sesion -->
 	<?php if(!empty($user)): ?>
<b>Usuario. <?= $user['email']; ?>
      <a href="logout.php">[ Cerrar Sesión ]</a></b>

<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>

	</form>
<!-- Código del método POST para actualizar base de datos test. de tabla registro credencial -->
<form method="POST" action="actDatos_Cred.php">
	INGRESE LA CÉDULA DEL USUARIO A MODIFICAR:
	<input type="text" name="cedula"><br />
	<input type="submit" value="Buscar" />
	<input type="reset" value="Limpiar" />
</form>
<br />
<br />
<a href="creden.php"> Volver a formulario Credencial</a>
<!-- Código que se genera cuando verifica si la sesion esta abierta -->
    <?php else: ?> <!-- Menú principal -->
      <big><strong><p>Por favor, Seleccionar una opción</p></strong></big><br />
      <a href="login.php">[ Iniciar Sesió ]</a> o
      <a href="signup.php">[ Registrarse ]</a><br /><br />
    <?php endif; ?>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>