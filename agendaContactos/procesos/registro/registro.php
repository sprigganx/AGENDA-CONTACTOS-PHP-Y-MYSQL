<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Usuarios.php";

    $con = new Conexion();
    $conexion = $con->conectar();

    // Validamos que el formulario y que el botón registro hayan sido presionados
    if (isset($_POST['registro'])) {

        // Obtener los valores enviados por el formulario
        $usuario = $_POST['nombre_usuario'];
        $contrasena = $_POST['contrasena_usuario'];
        $correo = $_POST['correo_usuario'];

        $usuarios = new Usuarios();
        $existeUsuario = $usuarios->verificarExistenciaUsuario($usuario);
        
        // Verificar si el usuario ya existe
        if ($existeUsuario) {
            // El usuario ya existe, mostrar alerta y redirigir al registro
            echo '<script>alert("El usuario ya existe."); window.location.href = "../../registro.php";</script>';
            exit();
        }

        // Insertamos los datos en la base de datos
        $resultado = $usuarios->insertarUsuario($usuario, $contrasena, $correo);

        if ($resultado) {
            // Inserción correcta, redirigir al usuario al login
            header("Location: ../../login.php");
            exit();
        } else {
            // Inserción fallida
            echo "¡No se puede insertar la informacion!" . "<br>";
            echo "Error: " . $existeUsuario . "<br>" . mysqli_error($conexion);
        }
    }
?>