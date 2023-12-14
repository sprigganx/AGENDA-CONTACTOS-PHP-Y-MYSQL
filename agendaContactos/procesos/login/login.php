<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Usuarios.php";

    $con = new Conexion();
    $conexion = $con->conectar();

    // Validamos que el formulario y que el botón login hayan sido presionados
    if(isset($_POST['login'])) {

        // Obtener los valores enviados por el formulario
        $usuario = $_POST['nombre_usuario'];
        $contrasena = $_POST['contrasena_usuario'];

        $usuarios = new Usuarios();
        $existeUsuario = $usuarios->verificarExistenciaUsuario($usuario);

        // Verificar si el usuario existe
        if (!$existeUsuario) {
            // El usuario no existe, mostrar alerta
            echo '<script>
                    alert("El usuario no existe o no es correcto. Por favor, verifique sus credenciales."); 
                    window.location.href = "../../login.php";
                </script>';
        } else {
            // El usuario existe, verificar la contraseña
            $resultado = $usuarios->obtenerDatosUsuarioPorCredenciales($usuario, $contrasena);

            if ($resultado) {
                // Inicio de sesión exitoso
                // Obtener el id_usuario de la fila
                $id_usuario = $resultado['idUsuario'];

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
