<!DOCTYPE html>
<html>
<head>
  <title>Registrarse</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="bdsjs/img/spriggan_icon.png">
  <?php require_once "archivosDependencias.php"; ?>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Formulario de registro -->
        <form action="procesos/registro/registro.php" method="POST">
          <h2 class="mt-5 mb-4">Regístrate</h2>
          <!-- Campo de entrada para el nombre de usuario -->
          <div class="form-group">
            <input type="text" class="form-control" name="nombre_usuario" placeholder="Nombre de usuario" required>
          </div>
          <!-- Campo de entrada para la contraseña -->
          <div class="form-group">
            <input type="password" class="form-control" name="contrasena_usuario" placeholder="Contraseña" required>
          </div>
		  <!-- Campo de entrada para el correo -->
          <div class="form-group">
            <input type="email" class="form-control" name="correo_usuario" placeholder="Correo" required>
          </div>
          <!-- Botón para enviar el formulario de registro -->
          <button type="submit" class="btn btn-primary" name="registro">Registrarse</button>
        </form>
        <!-- Enlace para redirigir al formulario de inicio de sesión -->
        <p class="mt-3">¿Ya tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
      </div>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
