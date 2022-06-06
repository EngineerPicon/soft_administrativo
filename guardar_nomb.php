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
    <title>Guardado Nombramiento</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_index.css">
    <link rel="stylesheet" href="assets/css/style1.css"> <!-- estilos de formato -->
    <link rel="stylesheet" href="assets/css/style_menu.css"> <!-- Estilos para el menú despegable-->
</head>
<body>
  <form>
<!-- menu iniciar sesión o registrarse sentencia php-->

  <?php include 'partials/header.php' ?>

<!-- se mostrara solo al iniciar sesion -->
  <?php if(!empty($user)): ?>
<b>Usuario. <?= $user['email']; ?>
      <a class="boton_cerrar" href="logout.php">[ Cerrar Sesión ]</a></b>

<!-- Código de menú desplegable -->

<?php include 'partials/menu.php' ?>


<big><strong>Resultado de operación:</strong></big><br />
<?php

$conexion=mysqli_connect("localhost", "root", "", "test") or die ("problemas con la conexión");

mysqli_query($conexion, "insert into nombra(nombre, apellido, ci, ne, cargo, designado, fecha_cargo, fecha_elaboracion, dia, fm, fa, ci_sust, nomb_sust, ap_sust, ne_sust) values 
('$_POST[nombre]', '$_POST[apellido]', '$_POST[ci]', '$_POST[ne]', '$_POST[cargo]', 
'$_POST[designado]', '$_POST[fecha_cargo]', '$_POST[fecha_elaboracion]', '$_POST[dia]', '$_POST[fm]', '$_POST[fa]', '$_POST[ci_sust]', '$_POST[nomb_sust]', '$_POST[ap_sust]', '$_POST[ne_sust]')") 
                                            
or die 
("Problemas en el select".mysqli_error($conexion));

mysqli_close($conexion);

    echo "<b>El Formulario fue enviado con exito.</b>";
?>
</form>
<br /><br /><a href="nombra.php">[ Volver a formulario Nombramiento ]</a><br /><br />
<a href="index.php">[ Volver a inicio ]</a>

 <?php else: ?> <!-- Menú principal -->
              <p>Por favor, Seleccionar una opción</p><br/>
              <a href="login.php">[ Iniciar Sesión ]</a> o
              <a href="signup.php">[ Registrarse ]</a><br/><br/>
            <?php endif; ?> 
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>
         