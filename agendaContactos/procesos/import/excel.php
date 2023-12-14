<?php
    session_start();
    require_once "../../clases/Conexion.php";
    require_once "../../clases/ImportarExportar.php";

    $con = new Conexion();
    $conexion = $con->conectar();
    $importarExportar = new ImportarExportar();

    $idUsuario = $_SESSION['id_usuario'];

    $tipo = $_FILES['archivo']['type'];
    $tamanio = $_FILES['archivo']['size'];
    $archivotmp = $_FILES['archivo']['tmp_name'];
    $lineas = file($archivotmp);

    foreach ($lineas as $linea) {
        $datos = explode(";", $linea);

        $aPaterno = !empty($datos[0]) ? trim($datos[0]) : '';
        $aMaterno = !empty($datos[1]) ? trim($datos[1]) : '';
        $nombre = !empty($datos[2]) ? trim($datos[2]) : '';
        $telefono = !empty($datos[3]) ? trim($datos[3]) : '';
        $email = !empty($datos[4]) ? trim($datos[4]) : '';
        $categoria = !empty($datos[5]) ? trim($datos[5]) : '';
        $descripcion = !empty($datos[6]) ? trim($datos[6]) : '';

        // Insertar en t_categorias
        if (!empty($categoria) && $categoria != 'Categoria') {
            $id_categoria = $importarExportar->checkCategoriaDuplicidad($categoria, $idUsuario);

            if (isset($id_categoria) && !empty($id_categoria)) {
            } else {
                $id_categoria = $importarExportar->insertarCategoria($categoria, $descripcion, $idUsuario);
            }
        }

        if (!empty($nombre) && $nombre != 'Nombre') {
            $importarExportar->insertarActualizarContacto($nombre, $aPaterno, $aMaterno, $telefono, $email, $id_categoria, $idUsuario);
        }
    }
    header("Location: ../../contactos.php");
    exit();
?>