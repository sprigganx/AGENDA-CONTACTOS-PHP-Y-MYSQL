<?php
    session_start();
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: text/csv");
    header("Content-Disposition: attachment; filename=contactos.csv");

    require_once "../../clases/Conexion.php";
    require_once "../../clases/ImportarExportar.php";

    $con = new Conexion();
    $conexion = $con->conectar();

    $importarExportar = new ImportarExportar();
    $importarExportar->exportarCSV($_SESSION['id_usuario']);

    $idUsuario = $_SESSION['id_usuario'];
?>