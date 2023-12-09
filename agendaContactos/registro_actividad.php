<?php
    session_start();

    if (!isset($_SESSION['id_usuario'])) {
        // El usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
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
    <title>Registro Actividad</title>
    <?php require_once "archivosDependencias.php"; ?>
</head>

<body>
    <div class="container">
        <?php require_once "menu.php"; ?>
        <div class="jumbotron">
            <h1 class="display-4">Registro de Actividades</h1>
            <hr class="my-4"><br><br>
        </div>
    </div>
</body>
</html>