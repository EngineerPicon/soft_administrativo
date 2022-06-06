<?php
  require 'database.php';
  $message = '';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    if ($stmt->execute()) {
      $message = 'Nuevo usuario creado con éxito';
    } else {
      $message = 'Lo sentimos, debe haber habido un problema al crear tu cuenta';
    }
  }
?>
<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="assets/img/favicon.ico"> <!-- Enlace del icono de la pagina WEB -->
    <title>Registrarse</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_index.css">
    <link rel="stylesheet" href="assets/css/style1.css">
  </head>
<body>
    <?php include 'partials/header.php' ?> <!-- cabecera del sistema web -->
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <big><strong><p>Registrarse</p></strong></big>
    <span>o <a class="boton_iniciosesion" href="login.php">Iniciar Sesión</a></span>
    <form action="signup.php" method="POST">
      <input name="email" type="text" required=""  placeholder="Ingrese su Correo-e">
      <input name="password" type="password" required="" placeholder="Ingrese su clave">
      <input name="confirm_password" type="password" required="" placeholder="Confirme su clave">
      <input type="submit" value="Enviar">
    </form>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
  </body>
</html>