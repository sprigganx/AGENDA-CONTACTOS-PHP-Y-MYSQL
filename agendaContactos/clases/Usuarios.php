<?php
    require_once "Conexion.php";

    class Usuarios extends Conexion{

        public function obtenerDatosUsuario($idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_obtenerDatosUsuario(?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idUsuario);
            $query->execute();
            $result = $query->get_result();
            
            if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
                
                $datos = array(
                    "idUsuario" => $usuario['id_usuario'],
                    "nombreUsuario" => $usuario['nombre_usuario'],
                    "contrasenaUsuario" => $usuario['contrasena_usuario'],
                    "correoUsuario" => $usuario['correo_usuario']
                );
        
                return $datos;
            } else {
                return null; // O en caso de que no se encuentre el usuario
            }
        }

        public function obtenerDatosUsuarioPorCredenciales($usuario, $contrasena) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_obtenerDatosUsuarioPorCredenciales(?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $usuario, $contrasena);
            $query->execute();
            $result = $query->get_result();
            
            if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
    
                $datos = array(
                    "idUsuario" => $usuario['id_usuario'],
                    "nombreUsuario" => $usuario['nombre_usuario'],
                    "contrasenaUsuario" => $usuario['contrasena_usuario'],
                    "correoUsuario" => $usuario['correo_usuario']
                );
    
                return $datos;
            } else {
                return null; // En caso de que no se encuentre el usuario
            }
        }

        public function obtenerUsuarios() {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_obtenerUsuarios()";
            $result = mysqli_query($conexion, $sql);
            $conexion->close();
            return $result;
        }

		public function agregarUsuario($datos){
            $conexion = Conexion::conectar();
            $sql = "CALL sp_agregarUsuario(?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sss', $datos['nombre_usuario'], $datos['contrasena_usuario'], $datos['correo_usuario']);
            $respuesta = $query->execute();
            return $respuesta;
        }

        public function actualizarUsuario($datos) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_actualizarUsuario(?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssi', $datos['nombre_usuario'],
                                      $datos['contrasena_usuario'],
                                      $datos['correo_usuario'],
                                      $datos['idUsuario']);
            $respuesta = $query->execute();
            return $respuesta;
        }        

        public function eliminarUsuario($idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_eliminarUsuario(?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idUsuario);
            $respuesta = $query->execute();
            return $respuesta;
        }
        
        function verificarExistenciaUsuario($usuario) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_verificarExistenciaUsuario(?, @existe)";
            $query = $conexion->prepare($sql);
            $query->bind_param('s', $usuario);
            $query->execute();
            
            $selectExistencia = $conexion->query("SELECT @existe AS existe");
            $resultado = $selectExistencia->fetch_assoc();
        
            return $resultado['existe'];
        }

        public function insertarUsuario($usuario, $contrasena, $correo) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_insertarUsuario(?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('sss', $usuario, $contrasena, $correo);
            $respuesta = $query->execute();
            return $respuesta;
        }
        
    }
?>