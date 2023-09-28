<?php
mysqli_report(MYSQLI_REPORT_ERROR);
require('conectaVILLACARMEN.php');

$consulta = "SELECT * FROM POSTRES;";
if (!$resultado = $mysqli->query($consulta)) {
  echo "Lo sentimos. App falla<br>";
  echo "Error en $consulta <br>";
  exit;
}
if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {
    $descripcionPostre[] = $fila["DESCRIPCION"];
  }
?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var rowpostres = document.getElementById('rowpostres');

      <?php foreach ($descripcionPostre as $postre) { ?>
        var textoPostre = document.createElement('p');
        textoPostre.textContent = '* <?php echo $postre; ?>';

        rowpostres.appendChild(textoPostre);
      <?php } ?>
    });
  </script>
<?php
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Alqueria Villacarmen</title>
</head>

<body>
  <header>
    <div class="navbar">
      <a href="index.html"><img src="images/logo.png" class="logo" id="top-postres" /></a>
      <nav>
        <ul>
          <li><a href="index.php">Inicio</a></li>
          <li><a href="menufindesemana.php">Menú Fin de Semana</a></li>
          <li><a href="menudeldia.php">Menú Del Día</a></li>
          <li><a href="postres.php">Postres</a></li>
          <li><a href="reservas.php">Reservas</a></li>
        </ul>
      </nav>
    </div>
    <div class="decoracion_header">
      <img src="images/hojas_header.png" class="hojas_header" alt="hojas_villa-carmen" />
    </div>
  </header>

  <div class="wrapper">
    <div class="leftdecoration">
      <img src="images/hojas/hoja-3-izq.png" class="hoja-1-izq-postres" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-1-izq.png" class="hoja-2-izq-postres" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-5-izq.png" class="hoja-3-izq-postres" alt="hojas_villa-carmen">
      <!-- <img src="images/hojas/hoja-6-izq.png" class="hoja-6-izq-hidden" alt="hojas_villa-carmen"> -->
      <!-- <img src="images/hojas/hoja-2-izq.png" class="hoja-2-izq" alt="hojas_villa-carmen"> -->
      <!-- <img src="images/hojas/hoja-4-izq.png" class="hoja-4-izq-hidden" alt="hojas_villa-carmen"> -->
    </div>

    <div class="container">
      <div class="column-findesemana">
        <div class="row-1">
          <p>POSTRES</p>
        </div>
        <div class="row-2" id="rowpostres">
        </div>
      </div>
    </div>
    <div class="rightdecoration">
      <img src="images/hojas/hoja-3-der.png" class="hoja-1-der-postres" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-1-der.png" class="hoja-2-der-postres" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-4-der.png" class="hoja-3-der-postres" alt="hojas_villa-carmen">
      <!-- <img src="images/hojas/hoja-2-der.png" class="hoja-2-der" alt="hojas_villa-carmen"> -->
      <!-- <img src="images/hojas/hoja-6-der.png" class="hoja-6-der-hidden" alt="hojas_villa-carmen"> -->
    </div>
  </div>

  <footer>
    <div class="logo">
      <a href="index.html"><img src="images/logo.png" /></a>
    </div>
    <div class="direccion">
      <a href="https://www.google.com/maps?q=alqueria+villacarmen&um=1&ie=UTF-8&sa=X&ved=2ahUKEwjo772B45r-AhUHHuwKHcPzBGcQ_AUoAXoECAEQAw">
        <h3 class="direccion-large" target="_blank">C/ Sequía de Rascanya, 2 46470 Catarroja Valencia</h3>
        <h3 class="direccion-small">C/ Sequía de Rascanya, 2 <br> 46470 Catarroja Valencia</h3>
      </a>

    </div>
    <div class="tlf">
      <a href="https://wa.me/34638857294">
        <h3>638 85 72 94</h3>
      </a>
    </div>
    <div class="social-links">
      <a href="https://www.facebook.com/villacarmenalqueria/"><img src="images/facebook-logo.png" alt="facebook" /></a>
      <a href="https://www.instagram.com/alqueria_villacarmen/?hl=es"><img src="images/instagram-logo.png" alt="instagram" /></a>
    </div>
  </footer>
</body>

</html>