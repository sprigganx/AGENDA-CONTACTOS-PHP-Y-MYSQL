<?php 
    require_once "../../clases/Conexion.php";
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
        // El usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
        header("Location: login.php");
        exit();
    }
    $objCon = new Conexion();
    $conexion = $objCon->conectar();
    $idUsuario = $_SESSION['id_usuario'];

    $sql = "SELECT nombre, descripcion, id_categoria 
            FROM t_categorias
            WHERE id_usuario = $idUsuario"; // Filtrar por el id_usuario
    $result = mysqli_query($conexion, $sql); 
?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-condensed" id="tablaCategoriasDT">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($mostrar = mysqli_fetch_array($result)) {  
                        $idCategoria = $mostrar['id_categoria']; 
                ?>
                    <tr>
                        <td><?php echo $mostrar['nombre'] ?></td>
                        <td><?php echo $mostrar['descripcion'] ?></td>
                        <td>
                            <span onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarCategoria">
                                <span class="fa-solid fa-pen-to-square"></span>
                            </span>
                        </td>
                        <td>
                            <span class="btn btn-danger btn-sm" onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
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
        $('#tablaCategoriasDT').DataTable();
    });
</script>