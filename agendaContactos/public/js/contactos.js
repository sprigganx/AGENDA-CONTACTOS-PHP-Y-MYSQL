$(document).ready(function() {
    $('#cargaTablaContactos').load('vistas/contactos/tablaContactos.php');
});

function eliminarContacto(){
    swal({
        title: "¿Está seguro de eliminar este contacto?",
        text: "¡Una vez eliminado, no podrá ser recuperado!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("¡Se ha eliminado!");
        }
      });
}