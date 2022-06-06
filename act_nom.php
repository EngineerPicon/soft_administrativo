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
	<title>Actualizar datos de Nombramientos</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
 	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>

<body>

	
<!--  
////////////////////////////////////////////////////////////////////////////////////
// Código para actualizar directamente en la base de datos test, 
// un registro en tabla nombramiento.
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


<!-- incio Código PHP actualizar datos de base de datos test, tabla nombramiento. --> 

<?php
	$conexion=mysqli_connect("localhost", "root", "", "test")
	or die ("Problemas con la conexion");

	$registros=mysqli_query($conexion, "select * from nombra
							 where cedula='$_POST[codModificar]'") 
	or die("Problemas en el select: ".mysqli_error($conexion));
	
	if($reg=mysqli_fetch_array($registros))
	{
?>
<form method="POST" action="#">
	<!-- /* Aqui modificar todos los campos tabla nombramiento */ -->
	<label>Ingrese Nombre:</label>
	<input type="text" name="nombrenuevo" value="<?php echo $reg['nombre'] ?>">
	<br />
	<input type="hidden" name="nombreviejo" value="<?php echo $reg['nombre'] ?>">
	<label>Ingrese Apellido:</label>
	<input type="text" name="apellidonuevo" value="<?php echo $reg['apellido'] ?>">
	<br />
	<input type="hidden" name="apellidoviejo" value="<?php echo $reg['apellido'] ?>">
	<label>Ingrese Cédula:</label>
	<input type="text" name="cedulanuevo" value="<?php echo $reg['ci'] ?>">
	<input type="hidden" name="cedulaviejo" value="<?php echo $reg['ci'] ?>">
	<label>Ingrese nivel educativo</label>
	<input type="text" name="nenuevo" value="<?php echo $reg['ne'] ?>">
	<input type="hidden" name="neviejo" value="<?php echo $reg['ne'] ?>">
	<label>Ingrese designado:</label>
	<input type="text" name="designadonuevo" value="<?php echo $reg['designado'] ?>"> 
	<input type="hidden" name="designadoviejo" value="<?php echo $reg['designado'] ?>">
	<label>Ingrese fecha Designación:</label>
	<input type="date" name="cargonuevo" value="<?php echo $reg['fechacargo'] ?>">
	<input type="hidden" name="cargoviejo" value="<?php echo $reg['fechacargo'] ?>">
	<label>Ingrese fecha Elaboración:</label>
	<input type="date" name="elabonuevo" value="<?php echo $reg['fechaelaboracion'] ?>">
	<input type="hidden" name="elaboviejo" value="<?php echo $reg['fechaelaboracion'] ?>">
	<label>Ingrese Cedula del sustituido:</label>
	<input type="text" name="cisustnuevo" value="<?php echo $reg['cisust'] ?>">
	<input type="hidden" name="cisustviejo" value="<?php echo $reg['cisust'] ?>">
	<label>Ingrese Nombres del sustituido:</label>
	<input type="text" name="nombsustnuevo" value="<?php echo $reg['nombsust'] ?>">
	<input type="hidden" name="nombsustviejo" value="<?php echo $reg['nombsust'] ?>">
	<label>Igrese Apellidos del sustituido:</label>
	<input type="text" name="apsustnuevo" value="<?php echo $reg['apsust'] ?>">
	<input type="hidden" name="apsustviejo" value="<?php echo $reg['apsust'] ?>">
	<label>Ingrese Nivel educativo del sustituido:</label>
	<input type="text" name="nesustnuevo" value="<?php echo $reg['nesust'] ?>">
	<input type="hidden" name="nesustviejo" value="<?php echo $reg['nesust'] ?>">

	<input type="submit" value="Modificar"/>
	<input type="reset" value="Limpiar">
</form>
	<?php
}
?>
<!-- Fin Código PHP actualizar datos de base de datos test, tabla nombramiento. --> 
<!-- Vinculo para regresar al inicio de nombramiento -->
<a href="nombra.php">[ Volver a Nombramiento ]</a>
<a href="index.php">[ VOLVER AL MENÚ PRINCIPAL ]</a>



    <?php else: ?> <!-- Menú principal -->
      <big><strong><p>Por favor, Seleccionar una opción</p></strong></big><br />

      <a href="login.php">[ Iniciar Sesión ]</a> o
      <a href="signup.php">[ Registrarse ]</a><br /><br />
    <?php endif; ?>
 

<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>