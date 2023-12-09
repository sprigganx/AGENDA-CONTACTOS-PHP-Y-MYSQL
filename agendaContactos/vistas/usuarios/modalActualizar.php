<!-- Modal -->
<div class="modal fade" id="modalActualizarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmActualizarUsuario">
            <input type="text" id="idUsuarioU" name="idUsuarioU" hidden="">
            <label for="usuarioU">Usuario</label>
            <input type="text" class="form-control" id="usuarioU" name="usuarioU">
            <label for="contrasenaU">Contraseña</label>
            <input type="text" class="form-control" id="contrasenaU" name="contrasenaU">
            <label for="mailU">Correo</label>
            <input type="text" class="form-control" id="mailU" name="mailU">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizarUsuario">Actualizar</button>
      </div>
    </div>
  </div>
</div>