$(document).ready(function() {

    $('#cargaTablaCategorias').load('vistas/categorias/tablaCategorias.php');

});

function eliminarCategoria(){
    swal({
        title: "¿Está seguro de eliminar esta categoría?",
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