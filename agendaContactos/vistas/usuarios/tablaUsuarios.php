<?php 
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Usuarios.php";
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        // El usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
        header("Location: login.php");
        exit();
    }
    $idUsuario = $_SESSION['id_usuario'];

    $objCon = new Conexion();
    $conexion = $objCon->conectar();
    $Usuarios = new Usuarios();
    $result = $Usuarios->obtenerUsuarios();
?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-condensed" id="tablaUsuarioDT">
                <thead>
                    <tr>
                        <th>ID Usuario</th>
                        <th>Usuario</th>
                        <th>Contraseña</th>
                        <th>Correo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($mostrar = mysqli_fetch_array($result)) {  
                        $idUsuarioT = $mostrar['id_usuario']; 
                ?>
                    <tr>
                        <td><?php echo $mostrar['id_usuario'] ?></td>
                        <td><?php echo $mostrar['nombre_usuario'] ?></td>
                        <td><?php echo $mostrar['contrasena_usuario'] ?></td>
                        <td><?php echo $mostrar['correo_usuario'] ?></td>
                        <td>
                            <span onclick="obtenerDatosUsuario('<?php echo $idUsuarioT ?>')" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarUsuario">
                                <span class="fa-solid fa-pen-to-square"></span>
                            </span>
                        </td>
                        <td>
                            <span class="btn btn-danger btn-sm" onclick="eliminarUsuario('<?php echo $idUsuarioT ?>')">
                                <span class="fa-regular fa-trash-can"></span>
                            </span>
                        </td>
                    </tr>
                <?php 
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaUsuarioDT').DataTable();
    });
</script>