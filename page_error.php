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
	<link rel="icon" href="img/favicon.ico"> <!-- Enlace del icono de la pagina WEB -->
	<title>Error de ingreso de sesión</title>
</head>
<!-- Estilos de la pagina  -->
	<style type="text/css">
		*{
			margin: 0px;
			padding: 0px;
		}

		body {
			background-image:url(img/terepaima.jpg);
			background-attachment: fixed;
			background-size: 100% 20%;
			background-repeat: no-repeat;
			background-position: 0px 0px;
		}

		h1 {
			color: red; /*Color letras rojo*/
			background: black; /*Color Fondo negro*/
		}

		
		input[type="submit"]{
			padding: 10px;
			color: #fff; /*Color letras blanca*/
			background: #0098cb; /*Color Fondo Azúl*/
			width: 320px;
			margin: 20px auto;
			margin-top: 0;
			border: 0;
			border-radius: 3px;
			cursor: pointer;
		}
		
		input[type="submit"]:hover {
			background-color: #00b8eb;
		}
	</style>
<body>
	<center>
		<br><br><br><br><br><br><br> <!--Saltode lineas-->
	 <h1><p>ACCESO NEGADO</p></h1><br>
	 </center>

	 <center>
	 	<form name="login" method="post" action="index.html">
	 <h2>
	 <p>Oops! los datos suministrados no son correctos :(</p><br>
	 
	  <input type="submit" name="Submit" value="Intentar de nuevo ingresar al sistema" />
	</form>
	</h2>
	</center>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>