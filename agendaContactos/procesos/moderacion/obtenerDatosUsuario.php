<?php 

    require_once "../../clases/Usuarios.php";

    $idUsuario = $_POST['idUsuarioU'];
    $Usuarios = new Usuarios();

    echo json_encode($Usuarios->obtenerDatosUsuario($idUsuario));