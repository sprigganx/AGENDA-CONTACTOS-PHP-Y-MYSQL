<?php

require_once "../../clases/Categorias.php";

$datos = array(
    "idUsuario" => $_POST['idUsuario'],
    "nombre" => $_POST['nombreCategoria'],
    "descripcion" => $_POST['descripcion']
);

$Categorias = new Categorias();
echo $Categorias->agregarCategoria($datos);
?>
