<?php
mysqli_report(MYSQLI_REPORT_ERROR);
require('conectaVILLACARMEN.php');

$consulta = "SELECT * FROM FINDE WHERE TIPO = 'ENTRANTE';";
if (!$resultado = $mysqli->query($consulta)) {
  echo "Lo sentimos. App falla<br>";
  echo "Error en $consulta <br>";
  exit;
}
if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {
    $descripcionEntrante[] = $fila["DESCRIPCION"];
  }
?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var rowentrantes = document.getElementById('rowentrantes');

      <?php foreach ($descripcionEntrante as $entrante) { ?>
        var textoEntrante = document.createElement('p');
        textoEntrante.textContent = '* <?php echo $entrante; ?>';

        rowentrantes.appendChild(textoEntrante);
      <?php } ?>
    });
  </script>
<?php
}

mysqli_report(MYSQLI_REPORT_ERROR);
require('conectaVILLACARMEN.php');

$consulta = "SELECT * FROM FINDE WHERE TIPO = 'PRINCIPAL';";
if (!$resultado = $mysqli->query($consulta)) {
  echo "Lo sentimos. App falla<br>";
  echo "Error en $consulta <br>";
  exit;
}
if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {
    $descripcionPrincipal[] = $fila["DESCRIPCION"];
  }
?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var rowenprincipales = document.getElementById('rowprincipales');

      <?php foreach ($descripcionPrincipal as $principal) { ?>
        var textoPrincipal = document.createElement('p');
        textoPrincipal.textContent = '* <?php echo $principal; ?>';

        rowenprincipales.appendChild(textoPrincipal);
      <?php } ?>

      var arrozElegir = document.createElement('p');
      arrozElegir.textContent = '* Arroz a elegir, déjate seducir por nuestra variedad...';
      rowenprincipales.appendChild(arrozElegir);
    });
  </script>
<?php
}


mysqli_report(MYSQLI_REPORT_ERROR);
require('conectaVILLACARMEN.php');

$consulta = "SELECT * FROM FINDE WHERE TIPO = 'ARROZ';";
if (!$resultado = $mysqli->query($consulta)) {
  echo "Lo sentimos. App falla<br>";
  echo "Error en $consulta <br>";
  exit;
}
if ($resultado->num_rows > 0) {
  while ($fila = $resultado->fetch_assoc()) {
    $descripcionArroz[] = $fila["DESCRIPCION"];
  }
?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var rowarroces = document.getElementById('rowarroces');

      <?php foreach ($descripcionArroz as $arroz) { ?>
        var textoArroz = document.createElement('p');
        textoArroz.textContent = '* <?php echo $arroz; ?>';

        rowarroces.appendChild(textoArroz);
      <?php } ?>

      var arrozElegir = document.createElement('p');
      arrozElegir.textContent = '* Arroz a elegir, déjate seducir por nuestra variedad...';
      rowenprincipales.appendChild(arrozElegir);
    });
  </script>
<?php
}
$consulta = "SELECT * FROM FINDE WHERE TIPO = 'PRECIO';";
if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. App falla<br>";
    echo "Error en $consulta <br>";
    exit;
}
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $precio[] = $fila["DESCRIPCION"];
    }
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var rowprecio = document.getElementById('rowprecio');

            <?php foreach ($precio as $Precio) { ?>
                var h2precio = document.createElement('h2');
                h2precio.textContent = '<?php echo $Precio; ?>€';
                h2precio.classList.add('precio');

                rowprecio.appendChild(h2precio);
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
      <a href="#top"><img src="images/logo.png" class="logo" id="top" /></a>
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
      <img src="images/hojas/hoja-1-izq.png" class="hoja-1-izq" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-5-izq.png" class="hoja-5-izq-hidden" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-6-izq.png" class="hoja-6-izq-hidden" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-2-izq.png" class="hoja-2-izq" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-4-izq.png" class="hoja-4-izq-hidden" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-3-izq.png" class="hoja-3-izq" alt="hojas_villa-carmen">
    </div>

    <div class="container">
      <div class="column-findesemana">
        <div class="row-1">
          <p>Menu Fin De Semana</p>
          <p>(sábados y domingos)</p>
        </div>
        <div class="row-2" id="rowentrantes">
          <h3 class="entrante">ENTRANTE A ELEGIR:</h3>
        </div>
        <div class="row-3" id="rowprincipales">
          <h3 class="principal">PRINCIPAL A ELEGIR:</h3>
        </div>
        <div class="row-4" id="rowarroces">
          <h3 class="arroces">NUESTROS ARROCES</h3>
        </div>
        <div class="comentario_arroces">
          <p>*Arroces mínimo 2 personas.</p>
          <p>*En mesas de más de 8 personas hasta 2 arroces distintos.</p>
        </div>
        <div class="row-5" id="rowprecio">
          <h3 class="postrecafe">POSTRE O CAFÉ A ELEGIR</h3>
        </div>
        <div class="row-6">
          <p>Consumo mímio 1 menú porpersona</p>
          <p>
            Envases para llevar 1€ <br />
            (Cobro obligatorio por Ley de residuos 7/2022)
          </p>
          <p>Disponemos de carta de alérgenos, solicítela.</p>
        </div>
      </div>
    </div>
    <div class="rightdecoration">
      <img src="images/hojas/hoja-1-der.png" class="hoja-1-der" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-4-der.png" class="hoja-4-der-hidden" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-2-der.png" class="hoja-2-der" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-6-der.png" class="hoja-6-der-hidden" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-3-der.png" class="hoja-3-der" alt="hojas_villa-carmen">
      <img src="images/hojas/hoja-5-der.png" class="hoja-5-der-hidden" alt="hojas_villa-carmen">
    </div>
  </div>

  <footer>
    <div class="logo">
      <a href="#top"><img src="images/logo.png" /></a>
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