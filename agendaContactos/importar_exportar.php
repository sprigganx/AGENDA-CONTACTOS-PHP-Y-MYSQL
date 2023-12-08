<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="bdsjs/img/spriggan_icon.png">
    <title>Importar/Exportar</title>
    <?php require_once "archivosDependencias.php"; ?>
</head>

<body>
    <div class="container">
        <?php require_once "menu.php"; ?>

        <div class="jumbotron">
            <h1 class="display-4">Importar/Exportar</h1>
            <hr class="my-4"><br><br>
            <div class="text-center">
                <a href="procesos/export/excel.php">
                    <button type="button" class="btn btn-primary btn-label"><i class="fa-solid fa-download"></i>Exportar Archivo</button>
                </a><br><br>
                <p>O</p>
                <form action="procesos/import/excel.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="archivo" id="file-input" accept=".csv" style="display: none;">
                    <label for="file-input" class="btn btn-primary btn-label">
                        <i class="fa-solid fa-file-import"></i> Importar Archivo
                    </label><br>
                    <input type="submit" name="subir" class="btn btn-primary btn-label" value="Subir Archivo"/>
                </form>
            </div>
        </div>
    </div>
</body>

</html>