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
	<title>Vista previa Cese</title>
</head>
	<!-- Estilos de la pagina  -->
	<style type="text/css">
		*{
			margin-top: 0px;
			padding: 5px;
			font-family: Arial, Verdana, sans-serif;

		}
		.clearfix:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		#title {
			font-size: 1.3em;
			text-align: center;
		}
		#company {
  			float: right;
  			text-align: right;
		}

		#rec {
			float: right;
			text-align: right;
		}
		#firma {
			float: center;
			text-align: center;
		}

		#copy {
			float: left;
			text-align: left;
		}

		p[name="p3"]{
			text-align: center;
		}

		form{

			text-align:  justify;
		}
		p[name="Date"]{
			text-align: right;
		}
		p[name="cc"]{
			font-size: small;
		}
		</style>
<body>
<!--Código de Cabecera -->
				<?php include 'partials/header.php' ?>
				<?php if(!empty($user)): ?>
					<b>Usuario. <?= $user['email']; ?>
	      			<a href="logout.php">[ Cerrar Sesión ]</a></b><br />
<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>

<!-- Documento vista previa cese-->
<form><br><img src="assets/img/Logo.jpg"><br><br/>

<div id="rec"><b>RECTORADO</b></div>

<p>R/     /01/2019 </p><br/>

<div id="company" class="clearfix">
Barinas,  31 de Enero  de 2019<br/></div>

<div>Ciudadana:</div>
<b>Prof. NORBIS PEREZ</b>
<div>C.I. V- 14.791.977</div>
    Presente.-
</div>

<p> 	Me dirijo a usted, en la oportunidad de comunicarle que de acuerdo con el artículo  20, numeral 9 del Reglamento de la Universidad Nacional Experimental  de los Llanos Occidentales “Ezequiel Zamora”,  artículo 19 de la Ley del Estatuto de la Función Pública y Punto de Cuenta N° 463, de fecha 24/01/2019, suscrita por la Dra. Yajaira Pujol, Vicerrectora Académico (E) VPDS, he decidido removerla del cargo como <b>JEFE DEL SUBPROGRAMA  LICENCIATURA EN EDUCACION MENCION INGLES - BARINAS</b>, <u>a partir de la presente fecha</u>, sin perjuicio de continuar en el ejercicio del cargo nominal, que venía desempeñando antes de su designación.</p>

<p> 	Tal decisión obedece a la naturaleza jurídica del cargo, la cual es, de libre nombramiento y remoción, que no goza de estabilidad y por tanto, no es necesario la tramitación de procedimiento administrativo alguno por faltas imputadas al funcionario, basta la potestad discrecional del jerarca que lo designó. En tal sentido, se le informa que deberá hacer entrega, de conformidad con las Normas para Regular la Entrega de los Órganos y Entidades de la Administración Pública y sus Respectivas Oficinas o Dependencias, publicadas en Gaceta Oficial N° 39.229, de fecha 27 de julio de 2009.Notificación que se hace de conformidad con lo establecido en el artículo 75 de la Ley Orgánica de Procedimientos Administrativos. Igualmente  y  en  nombre de la comunidad universitaria,  agradezco el empeño  y esfuerzo desplegado  por usted  en el cumplimiento de sus  funciones.</p>

<p> 	   Sin más a que hacer referencia, se suscribe. </p>
<div id="firma" class="clearfix">
<div>Atentamente,</div><br/><br/>

<div><b>Dr.  ALBERTO QUINTERO</b></div>
<div><b>RECTOR</b></div>
</div>
<p><b>C.C. RRHH</b></p>
</form>		
<!-- Código que se genera cuando verifica si la sesion esta abierta -->
					<?php else: ?> <!-- Menú principal -->
				      <p>Por favor, Seleccionar una opción</p><br />
				      <a href="login.php">[ Iniciar Sesión ]</a> o
				      <a href="signup.php">[ Registrarse ]</a><br /><br />
				    <?php endif; ?>
		</body>
		<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>