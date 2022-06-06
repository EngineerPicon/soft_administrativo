<?php
// Inicializar la sesión.
// Si está usando session_name("algo"), ¡no lo olvide ahora!
session_start();
// Destruir todas las variables de sesión.
$_SESSION = array();
// Si se desea destruir la sesión completamente, borre también la cookie de sesión.
// Nota: ¡Esto destruirá la sesión, y no la información de la sesión!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_unset();
// Finalmente, destruir la sesión.
session_destroy();
header('Location: /Soft_Despacho/app');//regresar a la pagina inicio index.php
?>
<!-- Programador: Rolando Picón Nadales - © Todos los derechos reservados 2019 -->
