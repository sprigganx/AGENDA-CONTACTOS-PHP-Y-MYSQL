<?php
$usuariosModeradores = [3];
$esModerador = in_array($_SESSION['id_usuario'], $usuariosModeradores);
?>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgb(247, 144, 144);">
  <a class="navbar-brand" href="inicio.php">
    <span class="fa-solid fa-address-book fa-3x"></span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="inicio.php">
          <span class="fas fa-house-user"></span> Inicio <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactos.php">
          <span class="fas fa-id-card-alt"></span> Contactos
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="categorias.php">
          <span class="fas fa-layer-group"></span> Categorias
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="importar_exportar.php">
          <span class="fa-solid fa-file-csv"></span> Importar/Exportar
        </a>
      </li>
      <?php if ($esModerador): ?>
        <!-- Muestra la pestaña solo si el usuario es moderador -->
        <li class="nav-item">
          <a class="nav-link" href="moderacion.php">
            <span class="fa-solid fa-user-tie"></span> Moderacion
          </a>
        </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="procesos/logout/logout.php">
          <span class="fa-solid fa-right-from-bracket"></span> Salir
        </a>
      </li>
    </ul>
  </div>
</nav>