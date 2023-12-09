$(document).ready(function(){
    $('#cargaTablaUsuarios').load('vistas/usuarios/tablaUsuarios.php');
	
    $('#btnAgregarUsuario').click(function(){

		if ($('#usuario').val() == "") {
			swal("Debes agregar un nombre de usuario!");
			return false;
		}

		agregarUsuario();
	});

    $('#btnActualizarUsuario').click(function(){
        actualizarUsuario();
    });
});

function agregarUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "procesos/moderacion/agregarUsuario.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmAgregarUsuario')[0].reset();
                $('#cargaTablaUsuarios').load('vistas/usuarios/tablaUsuarios.php');
                swal(":D", "Se agregó con éxito", "success");
            } else {
                swal(":(", "No se pudo agregar", "error");
            }
        }
    });
}

function actualizarUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizarUsuario').serialize(),
        url: "procesos/moderacion/actualizarUsuario.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#cargaTablaUsuarios').load('vistas/usuarios/tablaUsuarios.php');
                $('#modalEditarUsuario').modal('toggle');
                swal(":D", "¡Se actualizó con éxito!", "success");
            } else {
                swal(":(", "¡No se pudo actualizar!", "error");
            }
        }
    });
}

function eliminarUsuario(idUsuario) {
    swal({
        title: "¿Está seguro de eliminar este usuario?",
        text: "¡Una vez eliminado, no podrá ser recuperado!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                data: "idUsuarioU=" + idUsuario,
                url: "procesos/moderacion/eliminarUsuario.php",
                success:function(respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#cargaTablaUsuarios').load('vistas/usuarios/tablaUsuarios.php');
                        swal(":D", "Se eliminó con éxito!", "success");
                    } else {
                        swal(":(", "No se pudo eliminar!", "error");
                    }
                }
            });
        }
    });
}

function obtenerDatosUsuario(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuarioU=" + idUsuario,
        url: "procesos/moderacion/obtenerDatosUsuario.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);

            $('#idUsuarioU').val(respuesta['idUsuario']);  
            $('#usuarioU').val(respuesta['nombreUsuario']);
            $('#contrasenaU').val(respuesta['contrasenaUsuario']);
            $('#mailU').val(respuesta['correoUsuario']);
        }
    });
}
