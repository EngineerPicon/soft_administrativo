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
	<link rel="icon" href="assets/img/favicon.ico"> <!-- vinculo icono pestaña -->
	<title>Vista previa Credecial</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>
<body>
<?php include 'partials/header.php' ?> <!-- cabecera -->
<!-- Código para verificar que la sesión esta abierta -->
			<?php if(!empty($user)): ?>
					<b><br> Usuario. <?= $user['email']; ?>
	      			<br/>
	      			<a href="logout.php">[ Cerrar Sesión ]</a></b><br/><br/>
<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>

<!-- Documento vista previa credencial-->
<p>AQ/JG</p>

<br><img src="assets/img/Logo.jpg"><br><br>

<br><br><center><u><b>C R E D E N C I A L</b></u></center><br><br>
		<form><p>Quien suscribe Dr. ALBERTO QUINTERO,  titular de la Cédula de Identidad Nº 11.468.002,  en  mi  condición  de  Rector  de la Universidad Nacional  Experimental  de los Llanos Occidentales Ezequiel  Zamora “UNELLEZ”, designado  mediante  Gaceta Oficial  de la República Bolivariana  de Venezuela Nº 40.871,  Resolución N° 046  de  fecha 17/03/2016,  informo que este Despacho Rectoral, ha decidido OTORGAR la responsabilidad al  ciudadano
			<?php 
			$nombre = $_POST['nombre']; 
			echo $nombre;
			?> 
			<?php $apellido = $_POST['apellido'];
			echo $apellido;
			?>, titular de la cédula de identidad N°
			<?php 
		    $ci = $_POST['ci'];
		    echo $ci;
		    ?>
		    <?php
		    $cargo = $_POST['cargo'];
		    echo $cargo;
		    ?>,<u>a partir del
		    <?php
		    $select = $_POST['select'];
		    echo $select;
		    ?> /
		    <?php 
		    $mes = $_POST['mes'];
		    echo $mes;
		    ?> /
		    <?php 
		    $year = $_POST['year'];
		    echo $year;
		    ?>.</u></p>

  <br><p>En tal sentido, es de importancia resaltar que dicha Credencial, constituye solamente un mérito en su historia laboral  y no genera ninguna incidencia presupuestaria. </p>


<br><br><p>En  Barinas, a  los
	<?php
	$select1 = $_POST['select1'];
	echo $select1;
	?> (
	<?php
	$cant = $_POST['cant'];
	echo $cant;
	?>
	) días  del mes de
	<?php
	$select2 = $_POST['select2'];
	echo $select2;
	?>
	de
	<?php
	$select3 = $_POST['select3'];
	echo $select3;
	?>.</p></form>

<center><br><p>Atentamente,</p>


<br><p><b>Dr. ALBERTO QUINTERO</b><br><b>RECTOR</b></p></center>


<br><p><b>c.c. VRS</b></p>
<p><b>c.c. DSG</b></p><br>

 <p>AQ/JG</p>
<!-- Código que se genera cuando verifica si la sesion esta abierta -->
 <?php else: ?> <!-- Menú principal -->
				      <p>Por favor, Seleccionar una opción</p><br/>
				      <a href="login.php">[ Iniciar Sesión ]</a> o
				      <a href="signup.php">[ Registrarse ]</a><br/><br/>
				    <?php endif; ?>	
 <a href="creden.php">Volver</a>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>
