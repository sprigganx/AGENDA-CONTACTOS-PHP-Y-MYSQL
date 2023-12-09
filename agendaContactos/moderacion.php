<?php
    session_start();
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="bdsjs/img/spriggan_icon.png">
    <title>Moderacion</title>
    <?php require_once "archivosDependencias.php"; ?>
</head>

<body>
    <div class="container">
        <?php require_once "menu.php"; ?>
        <div class="jumbotron">
          <h1 class="display-4">Moderacion</h1>
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">
            <span class="fa-solid fa-user-plus"></span> Agregar Usuario
          </button>
          <hr class="my-4">
          <div id="cargaTablaUsuarios"></div>
        </div>

        <?php 
          require_once "vistas/usuarios/modalAgregar.php";
          require_once "vistas/usuarios/modalActualizar.php"; 
        ?>
    </div>
    <script src="js/usuarios.js"></script>
</body>
</html>