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
	<title>Ceses Personal</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_boton.css">
	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>
		<body>
			
					<?php include 'partials/header.php' ?> <!-- cabecera -->			

	 <?php require_once "config.php"; ?> <!-- conexion con base de datos test -->
<!-- Codigo de Formulario de ceses -->


<!-- se mostrara solo al iniciar sesion -->
 	<?php if(!empty($user)): ?>
<p><b>Usuario. <?= $user['email']; ?></b>
	______________________________________________________
	<a class="boton_cerrar" href="logout.php"> Cerrar Sesión </a></b></p>
<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>

		<center>	<table border="1">
					<tr>
						<th colspan="2"><big><strong>Formulario Ceses</strong></big></th>
					</tr>
					<td><center>
						<form  action="guardar_cese.php" method="POST">		
						<input type="text" name="ci" value="" placeholder="N° de cédula (Ejemplo: V- 1.234.567)" required="" >	
						<input type="text" name="nombre" value="" placeholder="Ingrese Nombres" required="" >
						<input type="text" name="apellido" value="" placeholder="Ingrese Apellidos" required="" >
						<input type="text" name="ne" value="" placeholder="Nivel educativo (Ejemplo: Prof. Mcs. )" required="" >
						<input type="text" name="cargo" value="" placeholder="Cargo" required="" >
						</td></center>
						<td><center>
						Fecha de Cese: <input type="date" name="fecha_cargo" required="" /><br /><br />
						Fecha de Elaboración: <input type="date" name="fecha_elaboracion" required="" /><br /><br />
						<!-- Código para ingresar fecha de cese -->
			  Fecha de Elaboración :
			   <select name="dia" required="" >
			   		<option value="" disabled selected>- -SELECCIONE DIA- -</option>
			   		<option value="01">01</option>
			   		<option value="02">02</option>
			   		<option value="03">03</option>
			   		<option value="04">04</option>
			   		<option value="05">05</option>
			   		<option value="06">06</option>
			   		<option value="07">07</option>
			   		<option value="08">08</option>
			   		<option value="09">09</option>
			   		<option value="10">10</option>
			   		<option value="11">11</option>
			   		<option value="12">12</option>
			   		<option value="13">13</option>
			   		<option value="14">14</option>
			   		<option value="15">15</option>
			   		<option value="16">16</option>
			   		<option value="17">17</option>
			   		<option value="18">18</option>
			   		<option value="19">19</option>
			   		<option value="20">20</option>
			   		<option value="21">21</option>
			   		<option value="22">22</option>
			   		<option value="23">23</option>
			   		<option value="24">24</option>
			   		<option value="25">25</option>
			   		<option value="26">26</option>
			   		<option value="27">27</option>
			   		<option value="28">28</option>
			   		<option value="29">29</option>
			   		<option value="30">30</option>
			   		<option value="31">31</option>
			   	</select>
			   		
			   	<select name="fm" required="">
			   		<option value="" disabled selected>- -SELECCIONE MES- -</option>
			   		<option value="enero">ENERO</option>
			   		<option value="febrero">FEBRERO</option>
			   		<option value="marzo">MARZO</option>
			   		<option value="abril">ABRIL</option>
			   		<option value="mayo">MAYO</option>
			   		<option value="junio">JUNIO</option>
			   		<option value="julio">JULIO</option>
			   		<option value="agosto">AGOSTO</option>
			   		<option value="septiembre">SEPIEMBRE</option>
			   		<option value="octubre">OCTUBRE</option>
			   		<option value="noviembre">NOBIEMBRE</option>
			   		<option value="diciembre">DICIEMBRE</option>
			   		</select>
			   		<select name="fa" required="">
			   			<option value="" disable selected>- -SELECCIONE AÑO- -</option><br><br/>
			   			<option value="2019">2019</option>
			   			<option value="2020">2020</option><br/>
			   		</select><br/><br/> 
						<input type="reset" value="Limpiar">
						<input type="submit" name="Submit" value="Enviar"/><br /><br /> 
						</form>
						</center>
					</td>
			</table>
			</center>
<!-- Vinculo para regresar a pagina de inicio -->
<a class="boton_volver" href="index.php">Volver a Inicio</a>
<a class="boton_hist" href="histo_cese.php">Historial de Ceses</a>
<!-- Codigo que se genera cuando verifica si la sesion esta abierta -->
			<?php else: ?> <!-- Menú principal -->
				      <p>Por favor, Seleccionar una opción</p><br />
				      <a class="boton_iniciarsesion"href="login.php">Iniciar Sesión</a> o
				      <a class="boton_registro"href="signup.php">Registrarse</a><br /><br />
			<?php endif; ?>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>