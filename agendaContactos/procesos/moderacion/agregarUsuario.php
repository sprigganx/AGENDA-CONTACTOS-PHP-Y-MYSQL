<?php

require_once "../../clases/Usuarios.php";

$datos = array(
    "nombre_usuario" => $_POST['usuario'],
    "contrasena_usuario" => $_POST['contrasena'],
    "correo_usuario" => $_POST['mail']
);

    $Usuarios = new Usuarios();
    echo $Usuarios->agregarUsuario($datos);
?>
