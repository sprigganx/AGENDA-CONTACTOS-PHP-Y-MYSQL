<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=contactos.csv");

require_once "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

$sql = "SELECT 
    contactos.paterno AS paterno,
    contactos.materno AS materno,
    contactos.nombre AS nombre,
    contactos.telefono AS telefono,
    contactos.email AS email,
    categorias.nombre AS categoria,
    categorias.descripcion AS descripcion
FROM
    t_contactos AS contactos
        INNER JOIN
    t_categorias AS categorias ON contactos.id_categoria = categorias.id_categoria";

$result = mysqli_query($conexion, $sql);

// Abrir el buffer de salida
$output = fopen("php://output", "w");

// Cambiar el delimitador a punto y coma
$delimiter = ";";

// Encabezados CSV
fputcsv($output, array('Apellido paterno', 'Apellido materno', 'Nombre', 'Telefono', 'Email', 'Categoria', 'Descripcion'), $delimiter);

// Filas CSV
while ($mostrar = mysqli_fetch_assoc($result)) {
    // Usar el delimitador personalizado
    fputcsv($output, $mostrar, $delimiter);
}

// Cerrar el buffer de salida
fclose($output);

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
