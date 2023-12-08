<?php
// En la página de cierre de sesión (por ejemplo, logout.php)
session_start();

// Destruir todas las variables de sesión
session_unset();
session_destroy();
header("Location: ../../login.php"); // Redirigir al usuario a la página de inicio de sesión
exit();
?>
