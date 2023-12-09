<?php 
	session_start();
	require_once "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();
	$idUsuario = $_SESSION['id_usuario'];

	$sql = "SELECT id_categoria,
					nombre 
			FROM t_categorias 
			WHERE id_usuario = $idUsuario
			ORDER BY nombre";
	$result = mysqli_query($conexion, $sql);
 ?>
 	<label for="idCategoriaSelect">Selecciona una categoria</label>
 	<select id="idCategoriaSelect" name="idCategoriaSelect" class="form-control">
 		<option value="0">Selecciona una categoria</option>
 	<?php while($ver = mysqli_fetch_row($result)): ?>
 		<option value="<?php echo $ver[0] ?>"><?php echo $ver[1]; ?></option>
 	<?php endwhile; ?>
 	</select>