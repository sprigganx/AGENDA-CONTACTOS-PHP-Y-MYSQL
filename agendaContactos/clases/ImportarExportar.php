<?php
    require_once "Conexion.php";

    class ImportarExportar extends Conexion{

        public function checkCategoriaDuplicidad($nombre, $idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_checkCategoriaDuplicidad(?, ?, @idCategoria)";
            $query = $conexion->prepare($sql);
            $query->bind_param('si', $nombre, $idUsuario);
            $query->execute();
    
            $selectIdCategoria = $conexion->query("SELECT @idCategoria AS idCategoria");
            $resultado = $selectIdCategoria->fetch_assoc();
            
            return $resultado['idCategoria'];
        }
    
        public function insertarCategoria($nombre, $descripcion, $idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_insertarCategoria(?, ?, ?, @idCategoria)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssi', $nombre, $descripcion, $idUsuario);
            $query->execute();
    
            $selectIdCategoria = $conexion->query("SELECT @idCategoria AS idCategoria");
            $resultado = $selectIdCategoria->fetch_assoc();
    
            return $resultado['idCategoria'];
        }

        public function insertarActualizarContacto($nombre, $aPaterno, $aMaterno, $telefono, $email, $idCategoria, $idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_insertarActualizarContacto(?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssi', $nombre, $aPaterno, $aMaterno, $telefono, $email, $idCategoria, $idUsuario);
            $query->execute();
        }

        public function exportarCSV($idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "CALL sp_obtenerContactosCSV(?)";
            
            // Preparar la llamada al procedimiento almacenado
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idUsuario);
            $query->execute();
            
            // Obtener resultados
            $result = $query->get_result();
    
            // Abrir el buffer de salida
            $output = fopen("php://output", "w");
    
            $delimiter = ";";
            // Encabezados CSV
            fputcsv($output, array('Apellido paterno', 'Apellido materno', 'Nombre', 'Telefono', 'Email', 'Categoria', 'Descripcion'), $delimiter);
            // Filas CSV
            while ($mostrar = $result->fetch_assoc()) {
                // Usar el delimitador personalizado
                fputcsv($output, $mostrar, $delimiter);
            }
    
            // Cerrar el buffer de salida
            fclose($output);
            
            // Cerrar la conexión
            $query->close();
            $conexion->close();
        }
    }
?>