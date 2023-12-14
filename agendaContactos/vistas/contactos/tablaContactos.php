<?php
    require_once "../../clases/Conexion.php";
    require_once "../../clases/Contactos.php";
    session_start();

    $Contactos = new Contactos();
    $con = new Conexion();
    $conexion = $con->conectar();

    // Obtener el ID del usuario de la sesión
    $idUsuario = $_SESSION['id_usuario'];
    $result = $Contactos->obtenerContactos($idUsuario);
?>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-condensed" id="tablaContactosDT">
                <thead>
                    <tr>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Categoria</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        while ($mostrar = mysqli_fetch_array($result)) {  
                            $idContacto = $mostrar['idContacto'];
                    ?>
                    <tr>
                        <td><?php echo $mostrar['paterno'] ?></td>
                        <td><?php echo $mostrar['materno'] ?></td>
                        <td><?php echo $mostrar['nombre'] ?></td>
                        <td><?php echo $mostrar['telefono'] ?></td>
                        <td><?php echo $mostrar['email'] ?></td>
                        <td><?php echo $mostrar['categoria'] ?></td>
                        <td>
                            <span class="btn btn-warning btn-sm" onclick="obtenerDatosContacto('<?php echo $idContacto ?>')" data-toggle="modal" data-target="#modalActualizarContacto">
                                <span class="fas fa-edit"></span>
                            </span>
                        </td>
                        <td>
                            <span class="btn btn-danger btn-sm" onclick="eliminarContacto('<?php echo $idContacto ?>')">
                                <span class="far fa-trash-alt"></span>
                            </span>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaContactosDT').DataTable();
    });
</script>