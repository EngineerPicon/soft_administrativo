<?php
  session_start();
  if (isset($_SESSION['user_id'])) {
    header('Location: /Soft_Despacho/app/');
  }
  require 'database.php';
  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $message = '';
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /Soft_Despacho/app/");
    } else {
      $message = 'Lo Siento, las credenciales introducidas no son validas';
    }
  }
?>
<!DOCTYPE html>
<html lang="es-ES">
  <head>
    <meta charset="utf-8">
    <link rel="icon" href="assets/img/favicon.ico"> <!-- Viculo llamado ico pestaña -->
    <title>Iniciar Sesión</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style_index.css">
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/style_menu.css">
  </head>
  <body>
<!-- Código de cabecera del sistema -->
<?php include 'partials/header.php' ?>
<!-- Codigo para mostrar incio de sesión -->
    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <big><strong><p>Iniciar Sesión</p></strong></big>
    <span>o <a class="boton_registro" href="signup.php">Registrarse</a></span>
    <form action="login.php" method="POST">
      <input name="email" type="text" required="" placeholder="Ingrese su Correo-e">
      <input name="password" type="password" required="" placeholder="Ingrese su clave">
      <input type="submit" value="Iniciar sesión">
    </form>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
  </body>
</html>
