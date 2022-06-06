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
<html lang="en-Es">
<head>	
	<meta charset="utf-8">
	<link rel="icon" href="assets/img/favicon.ico"> <!-- Viculo llamado ico pestaña -->
	<title>SISTEMA | GUAICAIPURO</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
 	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>
<body>
	<form>
<!--  
////////////////////////////////////////////////////////////////////////////////////
Formulario html, llamado con el metodo post a la base de datos 
Aqui podra ingresar al nuevo sistema de 
generación de reportes digitales en PDF, para 
los ceses de funciones, nombramientos y 
credenciales.
////////////////////////////////////////////////////////////////////////////////////
 -->			
<!-- menu iniciar sesión o registrarse sentencia php-->
<!-- Código de cabecera del sistema -->
 	<?php include 'partials/header.php' ?>
 <!-- conexion base de datos test -->
 	<?php require 'config.php' ?> 	
<!-- se mostrara solo al iniciar sesion -->
 	<?php if(!empty($user)): ?>
<b>Bienvenido. <?= $user['email']; ?>_______________________________________________________<!--<a class="boton_resetpassword" href="reset_password.php">Cambiar Contraseña</a>--> <a class="boton_cerrar" href="logout.php"> Cerrar Sesión </a></b><br />
<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>
</form>

<center>
<!-- Código de la tabla de busqueda y opciones de inicio -->
	<table border="1">
		
		<tr>
			<th><center><strong><br /><a class="boton_cese" href="cese.php">Formulario Ceses</a></strong></center><br /></th>
			<th><center><strong><br /><a class="boton_nombra" href="nombra.php">Formulario Nombramientos</a></strong></center><br /></th>
			<th><center><strong><br /><a class="boton_creden" href="creden.php">Formulario Credenciales</a></strong></center><br /></th>
		</tr>
		<tr>
			<td><center><strong><br /><a class="boton_hist" href="histo_cese.php">Historial de Ceses</a></strong></center><br />
	 <hr><center><strong>Buscar Cese:</strong><form method="POST" action="con_cese.php">
	 <input type="text" name="datoBuscar" placeholder="Cédula identidad (Ejemplo: V-1.234.567)" />
	 <input type="reset" name="Limpiar"> <input type="submit" name="Buscar"/>
	 </form></td>
			<td><center><strong><br /><a class="boton_hist" href="histo_nombra.php">Historial de Nombramientos</a></strong></center><br />
	 <hr>
	<center><strong>Buscar Nombramiento:</strong><form method="POST" action="con_nom.php">
	 <input type="text" name="datoBuscar" placeholder="Cédula identidad (Ejemplo: V-1.234.567)" />
	 <input type="reset" name="Limpiar"> <input type="submit" name="Buscar"/>
	 </form></td>
			<td><center><strong><br /><a class="boton_hist" href="histo_creden.php">Historial de Credenciales</a></strong></center><br />
			<hr><center><strong>Buscar Credencial:</strong><form method="POST" action="con_cred.php">
	 <input type="text" name="datoBuscar" placeholder="Cedula identidad (Ejemplo: V-1.234.567)" />
	 <input type="reset" name="Limpiar"> <input type="submit" name="Buscar"/>
	 </form>
	 </td>
		</tr>
		</table>
</center>	
<!-- Código que se genera cuando verifica si la sesion esta abierta -->
    <?php else: ?> <!-- Menú principal -->
      <big><strong><p>Por favor, Seleccionar una opción</p></strong></big><br />
      <a class="boton_iniciosesion" href="login.php">Iniciar Sesión</a> 
      <a class="boton_registro" href="signup.php">Registrarse</a><br /><br />
    <?php endif; ?>
<!--Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>