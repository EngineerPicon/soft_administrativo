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
	<title>Nombramiento Personal</title>   
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
  	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>
	<body>
		<center>
<!-- Código de cabecera del sistema -->
				<?php include 'partials/header.php' ?>	
<!-- se mostrara solo al iniciar sesion -->
			 	<?php if(!empty($user)): ?>
				<b>Usuario. <?= $user['email']; ?>
					______________________________________________________
			      <a class="boton_cerrar" href="logout.php">Cerrar Sesión</a></b>
<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>

<?php require_once "config.php"; ?> <!-- conexion con base de datos test -->

 <!-- Codigo de formulario de nombramiento -->
 <table border="1">
		<tr>
			<th colspan="4"><big><strong>Formulario Nombramiento</strong></big></th>
		</tr>
	<td><center>
	<div class="form">
	<form action="guardar_nomb.php" method="POST">
	<input type="text" name="ci" value="" placeholder="N° de cédula (Ejemplo: V- 1.234.567)" required="" />    
	<input type="text" name="nombre" value="" placeholder="Ingrese Nombres" required="" />
	<input type="text" name="apellido" value="" placeholder="Ingrese Apellidos" required="" />
	  </td><td>
	<input type="text" name="ne" value="" placeholder="Nivel educativo (Ejemplo: Prof. Mcs. Bachiller)" required="" />
	<input type="text" name="cargo" value="" placeholder="Cargo (Ejemplo: Personal Docente Activo)" required="" />
	<input type="text" name="designado" value="" placeholder="Designación (Ejemplo: JEFE PROGRAMA" required="" /> 
    </td>
    <td>
	<p>Sustitución de:</p>
	<input type="text" name="ci_sust" value="" placeholder="N° de cédula (Ejemplo: V- 1.234.567)" required="" />	
	 <input type="text" name="nomb_sust" value="" placeholder="Ingrese Nombres" required="" />
	<input type="text" name="ap_sust" value="" placeholder="Ingrese Apellidos" required="" />
	<input type="text" name="ne_sust" value="" placeholder="Nivel educativo (Ejemplo: Prof. Mcs. )" required=""/>
   </td>
   <td>
	Fecha Nombramiento Personal:<input type="date" name="fecha_cargo"/><br />
	Fecha Elaboración Documento: <input type="date" name="fecha_elaboracion"><br /><br />

<!-- Código para ingresar fecha de nombramiento -->
			  Fecha de credencial:
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
			   			<option value="" disable selected>- -SELECCIONE AÑO- -</option>
			   			<option value="2019">2019</option>
			   			<option value="2020">2020</option>
			   		</select><br/><br/> 
			   	
	<center><input type="submit" value="Enviar">
	<input type="reset" value="Limpiar"></center>
		</form>
	</div></center></td>
</table>
</center>
<!-- Fin código formulario Nombramiento -->
<!-- Vinculo para regresar a pagina de inicio -->
<a class="boton_volver" href="index.php">Volver a Inicio</a>
<a class="boton_hist" href="histo_nombra.php">Historial de Nombramientos</a>
<!-- Codigo que se genera cuando verifica si la sesion esta abierta -->
			<?php else: ?> <!-- Menú principal -->
				      <p>Por favor, Seleccionar una opción</p><br/>      <
      <a class="boton_iniciosesion" href="login.php">Iniciar Sesión</a> 
      <a class="boton_registro" href="signup.php">Registrarse</a><br /><br />
		    <?php endif; ?>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
		</body>
</html>