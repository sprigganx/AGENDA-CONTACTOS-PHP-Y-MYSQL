<?php
require_once "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

$tipo = $_FILES['archivo']['type'];
$tamanio = $_FILES['archivo']['size'];
$archivotmp = $_FILES['archivo']['tmp_name'];
$lineas = file($archivotmp);

foreach ($lineas as $linea) {
    $datos = explode(";", $linea);

    $aPaterno = !empty($datos[0]) ? ($datos[0]) : '';
    $aMaterno = !empty($datos[1]) ? ($datos[1]) : '';
    $nombre = !empty($datos[2]) ? ($datos[2]) : '';
    $telefono = !empty($datos[3]) ? ($datos[3]) : '';
    $email = !empty($datos[4]) ? ($datos[4]) : '';
    $categoria = !empty($datos[5]) ? ($datos[5]) : '';
    $descripcion = !empty($datos[6]) ? ($datos[6]) : '';

    // Insertar en t_categorias
    if (!empty($categoria) && $categoria != 'Categoria') {
        $check_categoria_duplicidad = "SELECT id_categoria FROM t_categorias WHERE nombre='" . ($categoria) . "'";
        $ca_categoria_dupli = mysqli_query($conexion, $check_categoria_duplicidad);

        if ($row = mysqli_fetch_assoc($ca_categoria_dupli)) {
            $id_categoria = $row['id_categoria'];
        } else {
            // Si la categoría no existe, la insertamos
            $insertarCategoria = "INSERT INTO t_categorias(nombre, descripcion) VALUES ('$categoria', '$descripcion')";
            mysqli_query($conexion, $insertarCategoria);
            
            // Obtener el ID de la nueva categoría
            $id_categoria = mysqli_insert_id($conexion);
        }
    }

    if (!empty($nombre) && $nombre != 'Nombre') {
        $checkemail_duplicidad = "SELECT nombre FROM t_contactos WHERE telefono='" . ($telefono) . "'";
        $ca_dupli = mysqli_query($conexion, $checkemail_duplicidad);
        $cant_duplicidad = mysqli_num_rows($ca_dupli);

        // No existe Registros Duplicados
        if ($cant_duplicidad == 0) {
            $insertarData = "INSERT INTO t_contactos( 
               nombre,
                paterno,
                materno,
                telefono,
                email,
                id_categoria
            ) VALUES(
                '$nombre',
                '$aPaterno',
                '$aMaterno',
                '$telefono',
                '$email',
                '$id_categoria'
            )";
            mysqli_query($conexion, $insertarData);
        } else {
            // Caso Contrario actualizo el o los Registros ya existentes
            $updateData = "UPDATE t_contactos SET 
                nombre='" . $nombre . "',
                paterno='" . $aPaterno . "',
                materno='" . $aMaterno . "',
                telefono='" . $telefono . "',
                email='" . $email . "',
                id_categoria='" . $id_categoria . "'
                WHERE telefono='" . $telefono . "'";
            $result_update = mysqli_query($conexion, $updateData);
        }
    }
}

header("Location: ../../contactos.php");
exit();
?>