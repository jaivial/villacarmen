<?php
// Remove cookies
setcookie("usuario", "", time() - 1, "/");
setcookie("password", "", time() - 1, "/");

// Include the database connection script
require('conectaVILLACARMEN.php');

?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
  <link rel="stylesheet" href="style.css">

  <title>Alqueria Villacarmen</title>
</head>


<body>
  <header>
    <div id="top-inicio" class="navbar">
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
  <div class="contacto-wrapper">
    <h3 class="contacto">"En la vida, a menudo son los pequeños detalles los que terminan siendo los más importantes"</h3>
  </div>
  <div class="slider">
    <div>
      <img src="images/galeria/photo-2.png">
    </div>
    <div>
      <img src="images/galeria/photo-3.png">
    </div>
    <div>
      <img src="images/galeria/photo-4.png">
    </div>
    <div>
      <img src="images/galeria/photo-5.png">
    </div>
    <div>
      <img src="images/galeria/photo-6.png">
    </div>
    <div>
      <img src="images/galeria/photo-7.png">
    </div>
    <div>
      <img src="images/galeria/photo-8.png">
    </div>
    <div>
      <img src="images/galeria/photo-9.png">
    </div>
    <div>
      <img src="images/galeria/photo-10.png">
    </div>
    <div>
      <img src="images/galeria/photo-11.png">
    </div>
    <div>
      <img src="images/galeria/photo-12.png">
    </div>
    <div>
      <img src="images/galeria/photo-13.png">
    </div>
    <div>
      <img src="images/galeria/photo-14.png">
    </div>
    <div>
      <img src="images/galeria/photo-15.png">
    </div>
  </div>





  <div class="wrapper">
    <div class="leftdecoration">
      <img src="images/hojas/hoja-3-izq.png" class="hoja-1-izq-postres" alt="hojas_villa-carmen" />
      <img src="images/hojas/hoja-1-izq.png" class="hoja-2-izq-postres" alt="hojas_villa-carmen" />
      <img src="images/hojas/hoja-5-izq.png" class="hoja-3-izq-postres" alt="hojas_villa-carmen" />
      <!-- <img src="images/hojas/hoja-6-izq.png" class="hoja-6-izq-hidden" alt="hojas_villa-carmen"> -->
      <!-- <img src="images/hojas/hoja-2-izq.png" class="hoja-2-izq" alt="hojas_villa-carmen"> -->
      <!-- <img src="images/hojas/hoja-4-izq.png" class="hoja-4-izq-hidden" alt="hojas_villa-carmen"> -->
    </div>


    <div class="container-contacto">
      <div class="column-findesemana">
        <div class="direccion-contacto">
          <h2>DIRECCIÓN</h2>
          <h3 class="direccion-large">C/ Sequía de Rascanya, 2 46470 Catarroja Valencia</h3>
          <h3 class="direccion-small">C/ Sequía de Rascanya, 2 <br />46470 Catarroja Valencia</h3>
        </div>
        <div class="mapa-wrapper">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3082.9041110667404!2d-0.41829958463462646!3d39.4036753794957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd604fed36fb5283%3A0xebbb1fe4b41e6e15!2sRestaurante%20Alquer%C3%ADa%20Villa%20Carmen!5e0!3m2!1ses!2ses!4v1681057872724!5m2!1ses!2ses" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="mapa"></iframe>
        </div>
        <a class="rutalink" href="https://www.google.com/maps/dir//Alquer%C3%ADa+Villa+Carmen/data=!4m8!4m7!1m0!1m5!1m1!1s0xd604fed36fb5283:0xebbb1fe4b41e6e15!2m2!1d-0.41609809999999997!2d39.403670999999996">
          <div class="como-llegarbtn">
            CÓMO LLEGAR
          </div>
        </a>

        <div class="horario-reserva-wrapper">
          <div class="horario-contacto">
            <h2>HORARIO DE APERTURA</h2>
            <div class="horas-wrapper">
              <p>lun: Cerrado</p>
              <p>mar: Cerrado</p>
              <p>mié: 13:30-17:30</p>
              <p>jue: 13:30-17:30</p>
              <p>vie: 13:30-17:30 y 20:30 a 00:00 </p>
              <p>sáb: 13:30-18:00 y 20:30 a 00:00 </p>
              <p>dom: 13:30-18:00</p>
            </div>
          </div>
          <div class="reserva-contacto">
            <h2>CONTACTO</h2>
            <a href="https://wa.me/34638857294">
              <h3 class="reservatlf">638 85 72 94</h3>
            </a>
            <a href="https://wa.me/34638857294">
              <div class="reservarbtn"> RESERVA YA</div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="rightdecoration">
      <img src="images/hojas/hoja-3-der.png" class="hoja-1-der-postres" alt="hojas_villa-carmen" />
      <img src="images/hojas/hoja-1-der.png" class="hoja-2-der-postres" alt="hojas_villa-carmen" />
      <img src="images/hojas/hoja-4-der.png" class="hoja-3-der-postres" alt="hojas_villa-carmen" />
    </div>

  </div>

  <footer>
    <div class="logo">
      <a href="index.html"><img src="images/logo.png" /></a>
    </div>
    <div class="direccion">
      <a href="https://www.google.com/maps?q=alqueria+villacarmen&um=1&ie=UTF-8&sa=X&ved=2ahUKEwjo772B45r-AhUHHuwKHcPzBGcQ_AUoAXoECAEQAw">
        <h3 class="direccion-large" target="_blank">
          C/ Sequía de Rascanya, 2 46470 Catarroja Valencia
        </h3>
        <h3 class="direccion-small">
          C/ Sequía de Rascanya, 2 <br />
          46470 Catarroja Valencia
        </h3>
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
    <div class="configuracion">
      <a href="configuracion.php">
        <img src="images/configuracion.png" alt="" srcset="">
      </a>

    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script src="slider.js"></script>
</body>

</html>