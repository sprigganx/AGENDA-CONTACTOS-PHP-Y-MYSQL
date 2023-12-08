<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="bdsjs/img/spriggan_icon.png">
    <title>Contactos Agenda</title>
    <?php require_once "archivosDependencias.php"; ?>
</head>

<body>
    <div class="container">
        <?php require_once "menu.php"; ?>
        
        <div class="jumbotron">
          <h1 class="display-4">Contactos</h1>
          <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarContacto">
            <span class="fa-solid fa-user-plus"></span> Agregar Contacto
          </button>
          <hr class="my-4">

          <div id="cargaTablaContactos"></div>
        </div>

        <?php 
          require_once "vistas/contactos/modalAgregar.php";
          require_once "vistas/contactos/modalActualizar.php"; 
        ?>

    </div>

    <script src="js/contactos.js"></script>
</body>

</html>