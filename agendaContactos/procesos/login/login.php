<?php
require_once "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();

// Validamos que el formulario y que el botón login hayan sido presionados
if(isset($_POST['login'])) {

    // Obtener los valores enviados por el formulario
    $usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena_usuario'];

    // Verificar si el usuario existe
    $consulta_existencia = "SELECT * FROM t_usuarios WHERE nombre_usuario = '$usuario'";
    $resultado_existencia = mysqli_query($conexion, $consulta_existencia);

    if (mysqli_num_rows($resultado_existencia) == 0) {
        // El usuario no existe, mostrar alerta
        echo 
        '<script>
            alert("El usuario incorrecto. Por favor, verifique sus credenciales."); window.location.href = "../../login.php"
        </script>';
    } else {
        // El usuario existe, verificar la contraseña
        $sql = "SELECT * FROM t_usuarios WHERE nombre_usuario = '$usuario' AND contrasena_usuario = '$contrasena'";
        $resultado = mysqli_query($conexion, $sql);
        $numero_registros = mysqli_num_rows($resultado);
        
        if ($numero_registros != 0) {
            // Inicio de sesión exitoso
            // Obtener el id_usuario de la fila
            $row = mysqli_fetch_assoc($resultado);
            $id_usuario = $row['id_usuario'];

            // Iniciar la sesión y almacenar el id_usuario
            session_start();
            $_SESSION['id_usuario'] = $id_usuario;

            // Redirigir al usuario a inicio
            header("Location: ../../inicio.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo 
            '<script>
                alert("Contraseña incorrecta. Por favor, verifique sus credenciales."); window.location.href = "../../login.php";
            </script>';
        }
    }
}
?>
