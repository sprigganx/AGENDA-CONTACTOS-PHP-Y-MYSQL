<?php
    require_once "Conexion.php";

    class Usuarios extends Conexion{

		public function agregarUsuario($datos){
			$conexion = Conexion::conectar();
			$sql = "INSERT INTO t_usuarios (nombre_usuario, contrasena_usuario, correo_usuario, fechaInsert) 
					VALUES (?, ?, ?, NOW())";
			$query = $conexion->prepare($sql);
			$query->bind_param('sss', $datos['nombre_usuario'], $datos['contrasena_usuario'], $datos['correo_usuario']);
			$respuesta = $query->execute();
			return $respuesta;
		}

        public function eliminarUsuario($idUsuario) {
			$conexion = Conexion::conectar();
			$sql = "DELETE FROM t_usuarios WHERE id_usuario = ?";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idUsuario);
			$respuesta = $query->execute();
			return $respuesta;
		}

		public function obtenerDatosUsuario($idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT id_usuario, nombre_usuario, contrasena_usuario, correo_usuario
                    FROM t_usuarios 
                    WHERE id_usuario = '$idUsuario'";
            $result = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($result);
        
            $datos = array(
                "idUsuario" => $usuario['id_usuario'],
                "nombreUsuario" => $usuario['nombre_usuario'],
                "contrasenaUsuario" => $usuario['contrasena_usuario'],
                "correoUsuario" => $usuario['correo_usuario']
            );
            return $datos;
        }
        
		public function actualizarUsuario($datos) {
            $conexion = Conexion::conectar();
        
            $sql = "UPDATE t_usuarios 
                    SET nombre_usuario = ?, 
                    contrasena_usuario = ?, 
                    correo_usuario = ?
                    WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssi', $datos['nombre_usuario'],
                                       $datos['contrasena_usuario'],
                                       $datos['correo_usuario'],
                                       $datos['idUsuario']);
            $respuesta = $query->execute();
            return $respuesta;
        }            
    }
?>