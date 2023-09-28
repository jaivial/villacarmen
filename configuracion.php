<?php

if (!isset($_COOKIE['usuario']) && !isset($_COOKIE['password'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $usuario = $_POST['usuario'];
        $contra = $_POST['contrasenya'];
        if ($usuario == '1' && $contra == '1') {
            setcookie('usuario', $usuario, time() + (86400 * 30), '/');
            setcookie('password', $contra, time() + (86400 * 30), '/');
?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var iniciosesion = document.getElementById('configuracioniniciosesion');
                    iniciosesion.style.display = "none";

                    var selecionadormenu = document.getElementById('seleccionadormenu');
                    seleccionadormenu.style.display = "flex";
                    selecionadormenu.style.flexDirection = "column";
                    selecionadormenu.style.justifyContent = "center";
                    selecionadormenu.style.alignItems = "center";
                    selecionadormenu.style.width = "100%";
                });
            </script>
        <?php
        } else {

        ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var mensajeError = document.getElementById('divmensajeerror');
                    mensajeError.style.display = "flex";
                    mensajeError.style.flexDirection = "column";
                    mensajeError.style.justifyContent = "center";
                    mensajeError.style.alignItems = "center";




                    setTimeout(function() {
                        mensajeError.style.opacity = "0";
                        setTimeout(function() {
                            mensajeError.style.display = "none";
                        }, 2000);
                    }, 2000);

                    var cerrarmensajeerror = document.getElementById('cerrarmensajeerror');
                    cerrarmensajeerror.addEventListener('click', function() {
                        mensajeError.style.display = "none";
                    });

                });
            </script>

        <?php
        }
    }
} elseif (isset($_COOKIE['usuario']) && isset($_COOKIE['password'])) {
    $usuario = $_COOKIE['usuario'];
    $contra = $_COOKIE['password'];
    if ($usuario == '1' && $contra == '1') {
        ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var iniciosesion = document.getElementById('configuracioniniciosesion');
                iniciosesion.style.display = "none";

                var selecionadormenu = document.getElementById('seleccionadormenu');
                seleccionadormenu.style.display = "flex";
                selecionadormenu.style.flexDirection = "column";
                selecionadormenu.style.justifyContent = "center";
                selecionadormenu.style.alignItems = "center";
                selecionadormenu.style.width = "100%";
            });
        </script>
    <?php
    } else {

    ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var mensajeError = document.getElementById('divmensajeerror');
                mensajeError.style.display = "flex";
                mensajeError.style.flexDirection = "column";
                mensajeError.style.justifyContent = "center";
                mensajeError.style.alignItems = "center";




                setTimeout(function() {
                    mensajeError.style.opacity = "0";
                    setTimeout(function() {
                        mensajeError.style.display = "none";
                    }, 2000);
                }, 2000);

                var cerrarmensajeerror = document.getElementById('cerrarmensajeerror');
                cerrarmensajeerror.addEventListener('click', function() {
                    mensajeError.style.display = "none";
                });

            });
        </script>

<?php
    }
}
?>




<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Configuracion</title>
</head>

<body>



    <div class="containerconfiguracion">
        <div class="configuracioniniciosesion" id="configuracioniniciosesion" style="display: flex;">
            <form action="" method="post">
                <div class="divcredenciales">
                    <label for="usuario">USUARIO</label>
                    <input type="text" id="usuario" name="usuario" placeholder="USUARIO" autocomplete="off">
                </div>
                <div class="divcredenciales">
                    <label for="contrasenya">CONTRASEÑA</label>
                    <input type="password" id="contrasenya" name="contrasenya" placeholder="*******" autocomplete="off">
                </div>
                <div class="divcredenciales">
                    <label class="submit" for="submit" id="enviar">ENVIAR<input style="display: none;" type="submit" id="submit" name="submit"></label>
                </div>
            </form>
        </div>
        <div class="divmensajeerror" id="divmensajeerror" style="display: none;">
            <h2>ACCESO DENEGADO CREDENCIALES INCORRECTAS
            </h2>
            <p id="cerrarmensajeerror">CERRAR</p>
        </div>
        <div id="seleccionadormenu" style="display: none;">
            <div class="configuracionpregunta">
                <h1>¿Qué menú deseas modificar?</h1>
            </div>
            <div class="configuracionmenus">
                <a href="confmenufindesemana.php" id="menufindesemana">MENU FIN DE SEMANA</a>
                <a href="confmenudeldia.php" id="menudeldia">MENU DEL DÍA</a>
                <a href="confpostres.php" id="postres">POSTRES</a>
                <a href="confreservas.php" id="reservas">RESERVAS</a>
            </div>
        </div>
        <div class="configuracionvolveratras" id="configuracionvolveratras">
            <a href="index.php">
                <img src="images/home.png" alt="">
                <p>Volver Atrás</p>
            </a>
        </div>
    </div>





</body>

</html>