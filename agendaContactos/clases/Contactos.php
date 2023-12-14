<?php 
	require_once "Conexion.php";

	class Contactos extends Conexion {

		public function obtenerDatosContacto($idContacto) {
			$conexion = Conexion::conectar();
			$sql = "CALL sp_obtenerDatosContacto(?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idContacto);
			$query->execute();
			$result = $query->get_result();
			
			if ($result->num_rows > 0) {
				$contacto = $result->fetch_assoc();
				
				$datos = array(
					"id_contacto" => $contacto['id_contacto'],
					"id_categoria" => $contacto['id_categoria'],
					"nombre" => $contacto['nombre'],
					"paterno" => $contacto['paterno'],
					"materno" => $contacto['materno'],
					"telefono" => $contacto['telefono'],
					"email" => $contacto['email']
				);
		
				return $datos;
			} else {
				return null; // O en caso de que no se encuentre el contacto
			}
		}		

		public function obtenerContactos($idUsuario) {
			$conexion = Conexion::conectar();
			$sql = "CALL sp_obtenerContactos(?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idUsuario);
			$query->execute();
			$result = $query->get_result();
			$query->close();
			$conexion->close();
			return $result;
		}
		
		public function agregarContacto($datos){
			$conexion = Conexion::conectar();
			$sql = "CALL sp_agregarContacto(?, ?, ?, ?, ?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('iisssss', $datos['idCategoria'], $datos['idUsuario'],
											$datos['nombre'], $datos['paterno'], $datos['materno'],
											$datos['telefono'], $datos['email']);
			$respuesta = $query->execute();
			return $respuesta;
		}

		public function actualizarContacto($datos) {
			$conexion = Conexion::conectar();
			$sql = "CALL sp_actualizarContacto(?, ?, ?, ?, ?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('isssssi', $datos['idCategoria'],
										  $datos['nombre'],
										  $datos['paterno'],
										  $datos['materno'],
										  $datos['telefono'],
										  $datos['email'],
										  $datos['idContacto']);
			$respuesta = $query->execute();
			return $respuesta;
		}

		public function eliminarContacto($idContacto) {
			$conexion = Conexion::conectar();
			$sql = "CALL sp_eliminarContacto(?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idContacto);
			$respuesta = $query->execute();
			return $respuesta;
		}		
	}
 ?>