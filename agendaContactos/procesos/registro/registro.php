<?php
require_once "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

// Validamos que el formulario y que el botón registro hayan sido presionados
if (isset($_POST['registro'])) {

    // Obtener los valores enviados por el formulario
    $usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena_usuario'];
    $correo = $_POST['correo_usuario'];

    // Verificar si el usuario ya existe
    $consulta_existencia = "SELECT id_usuario FROM t_usuarios WHERE nombre_usuario = '$usuario'";
    $resultado_existencia = mysqli_query($conexion, $consulta_existencia);

    if (mysqli_num_rows($resultado_existencia) > 0) {
        // El usuario ya existe, mostrar alerta y redirigir al registro
        echo '<script>alert("El usuario ya existe."); window.location.href = "../../registro.php";</script>';
        exit();
    }

    // Insertamos los datos en la base de datos
    $sql = "INSERT INTO t_usuarios (id_usuario, nombre_usuario, contrasena_usuario, correo_usuario) VALUES (null, '$usuario', '$contrasena', '$correo')";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        // Inserción correcta, redirigir al usuario al login
        header("Location: ../../login.php");
        exit();
    } else {
        // Inserción fallida
        echo "¡No se puede insertar la informacion!" . "<br>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }
}
?>