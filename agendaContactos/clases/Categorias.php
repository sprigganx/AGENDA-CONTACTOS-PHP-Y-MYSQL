<?php
    require_once "Conexion.php";

    class Categorias extends Conexion{

		public function obtenerDatosCategoria($idCategoria) {
			$conexion = Conexion::conectar();
			$sql = "CALL sp_obtenerDatosCategoria(?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idCategoria);
			$query->execute();
			$result = $query->get_result();
			
			if ($result->num_rows > 0) {
				$categoria = $result->fetch_assoc();
				
				$datos = array(
					"idCategoria" => $categoria['id_categoria'],
					"nombre" => $categoria['nombre'],
					"descripcion" => $categoria['descripcion']
				);
		
				return $datos;
			} else {
				return null; // O en caso de que no se encuentre la categoría
			}
		}

		public function obtenerCategorias($idUsuario) {
			$conexion = Conexion::conectar();
			$sql = "CALL sp_obtenerCategorias(?)";
			
			// Preparar la llamada al procedimiento almacenado
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idUsuario);
			$query->execute();
			
			// Obtener resultados
			$result = $query->get_result();
	
			// Cerrar la conexión
			$query->close();
			$conexion->close();
			
			return $result;
		}
		
		public function agregarCategoria($datos){
			$conexion = Conexion::conectar();
			$sql = "CALL sp_agregarCategoria(?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('iss', $datos['idUsuario'], $datos['nombre'], $datos['descripcion']);
			$respuesta = $query->execute();
			return $respuesta;
		}

		public function actualizarCategoria($datos) {
			$conexion = Conexion::conectar();
			$sql = "CALL sp_actualizarCategoria(?, ?, ?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('ssi', $datos['nombre'], $datos['descripcion'], $datos['idCategoria']);
			$respuesta = $query->execute();
			return $respuesta;
		}	

        public function eliminaCategoria($idCategoria) {
			$conexion = Conexion::conectar();
			$sql = "CALL sp_eliminarCategoria(?)";
			$query = $conexion->prepare($sql);
			$query->bind_param('i', $idCategoria);
			$respuesta = $query->execute();
			return $respuesta;
		}	
    }
?>