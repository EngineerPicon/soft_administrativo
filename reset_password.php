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
	<title>Restablecer contraseña</title>
</head>
<body>
	<body style="background-color: white;">
		<div>
			<center>
			<?php
			#Inicializar la session
			session_start();

			if(!isset($_SESSION["loggeding"]) || $_SESSION["loggedin"] !== true){
				header("location: index.php");
				exit;
			}

			// Include confg file
			require_once "config.php";

			// Defie varibles e inicializa con valores vacios
			$new_password = $confirm_password = "";
			$new_password_err = $confirm_password_err = "";
// Procesando datos del formularo donde se suministraron
			if($_SERVER["REQUEST_METHOD"] == "POST"){
// Validacion del nuevo password
				if(empty(trim($_POST["new_password"]))){
					$new_password_err = "Por favor ingrese la nueva contraseña";
				} elseif (strlen(trim($_POST["new_password"])) <6) {
					$new_password_err = "La contraseña debe tener al menos 6 caracteres.";
				} else{
					$new_password = trim($_POST["new_password"]);
				}
				 // validacion confirmada password
				if (empty(trim($_POST["confirm_password"]))){
					$confirm_password_err = "Por favor confirme la contraseña.";
				} else{
					$confirm_password = trim($_POST["confirm_password"]);
					if(empty($new_password_err) && ($new_password != $confirm_password)){
						$confirm_password_err = "La contraseña no coincidió, intente de nuevo, por favor.";
					}
				}

	// chek input errors before updating the database
	if (empty($new_password_err) && empty($confirm_password_err)){
	//Prepare anupdate statement
		$sql = "UPDATE users SET password = ? WHERE id = ?";

		if($stmt = mysqli_prepare($link, $sql)){
			// Binf variables to the prepared statement as parameters
		mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

		//set parameters
			$param_password = password_hash($new_password, PASSWORD_DEFAULT);
			$param_id = $_SESSION["id"];

		// Attempt to execute the prepared statement
		if(mysqli_stmt_execute($stmt)){
		// Password update sucessfully, destroy the session, and redirect to login page
		session_destroy();
		header("location: index.php");
		exit();
		} else{
			echo "Oops! Algo salió mal. Por favor, inténtelo de nuevo más tarde.";
		}
	}
	// Close statement
		mysqli_stmt_close($stmt);
   }
// Close connection
mysqli_close($link);
}
?>

<head>

	
<style type="text/css">
body{ font: 14px sans-serif; }
.wrapper{ width: 350px; padding: 20px; }
</style>
</head>
	<body>
	<div>
	<h2> Restablecer la contraseña</h2>
	<p>Por favor complete este formulario para restablecer su contraseña.</p>

		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
				<label>Nueva contraseña</label>
				<input type="password" name="new_password" class="form-control" value="<?php echo $new_password; ?>">
				<span class="help-block"><?php echo $new_password_err; ?>"></span>
			</div>
			<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
				<label>Confirmar contraseña</label>
			    <input type="password" name="confirm_password" class="form-control">
			    <span class="help-block"><?php echo $confirm_password_err; ?></span>
			</div>
			<div class="form-group">
				<input type="submit" value= "Enviar">
		     	<a href="index.php">Cancelar</a>
		    </div>
		</form>
	</div>
</cente>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
</body>
</html>