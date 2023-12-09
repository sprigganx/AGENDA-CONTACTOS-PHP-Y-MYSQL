<?php
    require_once "../../clases/Usuarios.php";

    $datos = array(
        "idUsuario" => $_POST['idUsuarioU'],
        "nombre_usuario" => $_POST['usuarioU'],
        "contrasena_usuario" => $_POST['contrasenaU'],
        "correo_usuario" => $_POST['mailU']
    );
    $Usuarios = new Usuarios();
    echo $Usuarios->actualizarUsuario($datos);
?>