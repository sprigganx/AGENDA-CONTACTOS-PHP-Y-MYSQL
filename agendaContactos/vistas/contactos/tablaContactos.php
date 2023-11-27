<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-condensed" id="tablaContactosDT">
                <thead>
                    <tr>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Email</th>
                        <th>Categoría</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <span class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarContacto">
                                <span class="fa-solid fa-pen-to-square"></span>
                            </span>
                        </td>
                        <td>
                            <span class="btn btn-danger btn-sm" onclick="eliminarContacto()">
                                <span class="fa-regular fa-trash-can"></span>
                            </span>
                        </td>
                    </tr>
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