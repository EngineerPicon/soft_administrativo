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
	<link rel="icon" href="assets/img/favicon.ico"> <!-- Vinculo para icono de pestaña -->
	<title>Vista previa Nombramiento</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/style_index.css">
	<link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
	<link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
	<link rel="stylesheet" href="assets/css/style_nomb.css"> <!-- Estilos para vista documento -->
</head>
<body>
	<center>
	<?php include 'partials/header.php' ?>
			<?php if(!empty($user)): ?>
					<b><br> Usuario. <?= $user['email']; ?>
	      			<br/>
	      			<a href="logout.php">[ Cerrar Sesión ]</a></b><br/><br/>


<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>

<!-- Documento vista previa nombramiento-->
<br><img src="assets/img/Logo.jpg"><br/><br/>

<p>R/______/02  /19<br/></p>
<p name="Date">Barinas,  01 de Febrero de 2019</p><br/>

<p>
     	Ciudadana:
    <b><?php 	$ne = $_POST['ne']; 
			echo $ne; $nombre = $_POST['nombre']; echo $nombre; $apellido = $_POST['apellido']; echo $apellido;?></b>	
     	C.I. <?php $ci = $_POST['ci']; echo $ci;?>
     	Personal Docente  Activo
     	Presente.-
</p>


<p name="p1">                                                                                                                                                                                                   Me dirijo a usted, en la oportunidad de comunicarle que de acuerdo con el capítulo III artículo 20, numeral 9 del Reglamento de la Universidad Nacional Experimental de los Llanos Occidentales “Ezequiel Zamora”, artículo 19 de la Ley del Estatuto de la Función Pública y Punto de Cuenta N° 463, de fecha 28/01/2019, suscrita por la Dra. Yajaira Pujol, Vicerrectora Académica (E) VPDS, he decidido designarla como<b>JEFE DEL SUBPROGRAMA LICENCIATURA EN EDUCACION MENCION INGLES - BARINAS,</b><u>a partir de la presente fecha,</u>en sustitución de la Prof. Norbis Pérez, titular de la cédula de identidad N° V- 14.791.977, quien deberá hacer entrega formal, de conformidad con el artículo 9 de las Normas para Regular la Entrega de los Órganos y Entidades de la Administración Pública y sus Respectivas Oficinas o Dependencias, publicadas en Gaceta Oficial N° 39.229, de fecha 27 de julio de 2009. De lo contrario, en la condición de servidor público entrante debe levantar acta detallada a que se refiere el artículo 4 ejusdem, con asistencia de dos testigos, y del auditor interno del organismo o entidad, en la cual dejará constancia del estado en que se encuentren los asuntos, bienes y los recursos asignados, y se especificarán los errores, deficiencias u omisiones que se advirtieren, así como cualquier otra situación que sea necesario señalar en resguardo de la delimitación de responsabilidades de quien recibe.</b><br/>

<p>                                                                                                      En tal sentido, le informo los deberes que los funcionarios o funcionarias públicos de libre nombramiento y remoción, cumplirán de acuerdo con lo establecido en el artículo 33 de la Ley del Estatuto de la Función Pública, entre ellos: 1. Prestar sus servicios personalmente con la eficiencia requerida; 2. Acatar las órdenes e instrucciones emanadas de los superiores jerárquicos; 3. Guardar la reserva, discreción y secreto que requieran los asuntos relacionados con las funciones que tengan atribuidas,  dejando  a  salvo  lo  previsto en el numeral 4 del referido artículo; 4. Vigilar, conservar y salvaguardar los  documentos  y  bienes de la Administración Pública confiados a su guarda, uso o administración; 5. Poner en conocimiento de sus superiores las iniciativas   que   estimen   útiles   para  la conservación del patrimonio nacional, el mejoramiento de los servicios y cualesquiera otras que incidan favorablemente en las actividades a cargo de esta Universidad; y 6. Inhibirse del conocimiento de los asuntos en que tenga interés, según lo dispuesto en el numeral 10 del mencionado artículo. </p><br/>

<p>           
	De igual manera, se le notifica que de conformidad con los artículos 5, 6  y
10  numeral  1 de la Ley del Estatuto de la Función Pública, la Oficina de Recursos 
Humanos es la que tiene  competencia   de   ejecutar   las   decisiones   sobre   la   gestión   de  la  función pública o en materia de  administración de personal, que 
tome el Rector por ser el presidente del Consejo Directivo, por lo  que se exhorta 
no emitir constancias de trabajo o constancias por realizar funciones distintas a su cargo nominal que pudieran afectar los intereses y derechos de la UNELLEZ, asimismo; se insta a dar cumplimiento a la circular N° 03/2012, de fecha 17/04/2012, suscrita por este despacho, la cual establece que ningún Jefe de unidad académica  o  administrativa  de  la  UNELLEZ,  incluyendo   los   Vicerrectores  y  Secretario General  deben  designar,    trasladar,   reubicar,  remover  o  despedir  al  personal   bajo   su supervisión, previa evaluación y aprobación del ciudadano Rector, ni contratar o permitir la entrada y permanencia de personas que no sean trabajadores de la institución para que realicen actividades académicas, administrativas o propias de la unidad que dirigen, ya que de comprobarse dicha situación, será responsable por los futuros actos administrativos o decisiones judiciales que causen perjuicios a la UNELLEZ, de conformidad con el artículo 79 de la Ley del Estatuto de la Función Pública.</p><br/><br/>
 

<p>           Sin más a que hacer referencia, aprovecho la ocasión para desearle el mayor éxito en sus funciones.</p>

<center><p>Atentamente,<br/><br/><br/>

<b>Dr.  ALBERTO QUINTERO</b><br/>
<b>RECTOR</b></p></center>



<p name="cc"><b><br/>
			c.c.  Programa Ciencias de la Educación<br/>
			c.c. RRHH<br/>
			c.c. VPDS<br/>
			c.c. Bienes</b></p><br/>


<p>
AQ/JG
</p>
<br><br>	
<h3><p><a href="nombra_pdf.php">Generar Documento PDF</a></p><br><br>
</h3><h3><a href="nombra.php">volver a formulario Nombramiento</a></h3>
	<h3><a href="index.php">volver a pagina Pprincipal</a></h3>
 </center>
<!-- Código que se genera cuando verifica si la sesion esta abierta -->
<?php else: ?> <!-- Menú principal -->
				      <p>Por favor, Seleccionar una opción</p><br/>
				      <a href="login.php">[ Iniciar Sesión ]</a> o
				      <a href="signup.php">[ Registrarse ]</a><br/><br/>
				    <?php endif; ?>		
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>
