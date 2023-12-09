<!-- Modal -->
<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmAgregarUsuario">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario">
            <label for="contrasena">Contraseña</label>
            <input type="text" class="form-control" id="contrasena" name="contrasena">
            <label for="mail">Correo</label>
            <input type="text" class="form-control" id="mail" name="mail">
            <input type="hidden" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['id_usuario']; ?>">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnAgregarUsuario">Guardar</button>
      </div>
    </div>
  </div>
</div>