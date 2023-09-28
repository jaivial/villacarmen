<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update'])) {
        if (empty($_POST['inputText'])) {
            
?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var mensajevacio = document.getElementById('mensajevacio');
                    mensajevacio.style.display = "flex";

                    setTimeout(function() {
                        mensajevacio.style.opacity = "0";
                        setTimeout(function() {
                            mensajevacio.style.display = "none";
                        }, 2000);
                    }, 2000);
                });
            </script>
        <?php
        } else {
            $texto = $_POST['inputText'];
            $formID = $_POST['formID'];
            mysqli_report(MYSQLI_REPORT_ERROR);
            require('conectaVILLACARMEN.php');

            $consulta = "UPDATE DIA SET DESCRIPCION = '{$texto}' WHERE NUM = '{$formID}';";
            if (!$resultado = $mysqli->query($consulta)) {
                echo "Lo sentimos. App falla<br>";
                echo "Error en $consulta <br>";
                echo "Num.error: " . $mysqli->errno . "<br>";
                echo "Error: " . $mysqli->error . "<br>";
                exit;
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['eliminaplato'])) {
        $formID = $_POST['formID'];
        echo '<br>';
        echo $formID;
        mysqli_report(MYSQLI_REPORT_ERROR);
        require('conectaVILLACARMEN.php');

        $consulta = "DELETE FROM DIA WHERE NUM = '{$formID}';";
        if (!$resultado = $mysqli->query($consulta)) {
            echo "Lo sentimos. App falla<br>";
            echo "Error en $consulta <br>";
            echo "Num.error: " . $mysqli->errno . "<br>";
            echo "Error: " . $mysqli->error . "<br>";
            exit;
        }
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['anyadeEntrante'])) {
        if (empty($_POST['inputText'])) {
            
        ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var mensajevacio = document.getElementById('mensajevacio');
                    mensajevacio.style.display = "flex";

                    setTimeout(function() {
                        mensajevacio.style.opacity = "0";
                        setTimeout(function() {
                            mensajevacio.style.display = "none";
                        }, 2000);
                    }, 2000);
                });
            </script>
        <?php
        } else {
            $texto = $_POST['inputText'];
            echo $texto;
            mysqli_report(MYSQLI_REPORT_ERROR);
            require('conectaVILLACARMEN.php');

            $consulta = "INSERT INTO DIA (DESCRIPCION, TIPO) VALUE ('{$texto}', 'ENTRANTE');";
            if (!$resultado = $mysqli->query($consulta)) {
                echo "Lo sentimos. App falla<br>";
                echo "Error en $consulta <br>";
                echo "Num.error: " . $mysqli->errno . "<br>";
                echo "Error: " . $mysqli->error . "<br>";
                exit;
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['anyadePrincipal'])) {
        if (empty($_POST['inputText'])) {
            
        ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var mensajevacio = document.getElementById('mensajevacio');
                    mensajevacio.style.display = "flex";

                    setTimeout(function() {
                        mensajevacio.style.opacity = "0";
                        setTimeout(function() {
                            mensajevacio.style.display = "none";
                        }, 3500);
                    }, 3500);
                });
            </script>
        <?php
        } else {
            $texto = $_POST['inputText'];
            echo $texto;
            mysqli_report(MYSQLI_REPORT_ERROR);
            require('conectaVILLACARMEN.php');

            $consulta = "INSERT INTO DIA (DESCRIPCION, TIPO) VALUE ('{$texto}', 'PRINCIPAL');";
            if (!$resultado = $mysqli->query($consulta)) {
                echo "Lo sentimos. App falla<br>";
                echo "Error en $consulta <br>";
                echo "Num.error: " . $mysqli->errno . "<br>";
                echo "Error: " . $mysqli->error . "<br>";
                exit;
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['anyadeArroz'])) {
        if (empty($_POST['inputText'])) {
        ?>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var mensajevacio = document.getElementById('mensajevacio');
                    mensajevacio.style.display = "flex";

                    setTimeout(function() {
                        mensajevacio.style.opacity = "0";
                        setTimeout(function() {
                            mensajevacio.style.display = "none";
                        }, 3500);
                    }, 3500);
                });
            </script>
<?php
        } else {
            $texto = $_POST['inputText'];
            echo $texto;
            mysqli_report(MYSQLI_REPORT_ERROR);
            require('conectaVILLACARMEN.php');

            $consulta = "INSERT INTO DIA (DESCRIPCION, TIPO) VALUE ('{$texto}', 'ARROZ');";
            if (!$resultado = $mysqli->query($consulta)) {
                echo "Lo sentimos. App falla<br>";
                echo "Error en $consulta <br>";
                echo "Num.error: " . $mysqli->errno . "<br>";
                echo "Error: " . $mysqli->error . "<br>";
                exit;
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}


// ENTRANTES -------------------------
mysqli_report(MYSQLI_REPORT_ERROR);
require('conectaVILLACARMEN.php');
$consulta = "SELECT * FROM DIA WHERE TIPO = 'ENTRANTE';";

if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La aplicación ha fallado.<br>";
    echo "Error en la consulta: $consulta <br>";
    exit;
}

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $numEntrante[] = $fila["NUM"];
        $descripcionEntrante[] = $fila["DESCRIPCION"];
    }
} ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var containerentrantes = document.getElementById('containerentrantes');

        <?php
        foreach ($descripcionEntrante as $index => $descripcionplatos) { ?>
            var formPlatos = document.createElement('form');
            formPlatos.classList.add('formPlatos');
            formPlatos.id = 'formENTRANTES<?php echo $index; ?>';
            formPlatos.method = 'POST';
            containerentrantes.appendChild(formPlatos);

            var inputText = document.createElement('textarea');
            inputText.type = 'text';
            inputText.classList.add('inputText');
            inputText.value = '<?php echo $descripcionplatos; ?>';
            inputText.id = 'inputText';
            inputText.name = 'inputText';
            inputText.rows = '2';
            inputText.setAttribute('data-min-rows', '2');
            inputText.placeholder = 'Modifica la descripción del plato';


            formPlatos.appendChild(inputText);

            var containerbotones = document.createElement('div');
            containerbotones.classList.add('containerbotones');
            formPlatos.appendChild(containerbotones);

            var update = document.createElement('input');
            update.id = '<?php echo $index; ?>';
            update.type = 'submit';
            update.name = 'update';
            update.classList.add('update');
            containerbotones.appendChild(update);


            var eliminaplato = document.createElement('input');
            eliminaplato.id = '<?php echo $index; ?>';
            eliminaplato.type = 'submit';
            eliminaplato.name = 'eliminaplato';
            eliminaplato.classList.add('eliminaplato');
            containerbotones.appendChild(eliminaplato);

        <?php } ?>


        <?php
        foreach ($numEntrante as $index => $numero) { ?>

            var formPlatos = document.getElementById('formENTRANTES<?php echo $index; ?>');
            var formID = document.createElement('input');
            formID.type = 'hidden';
            formID.name = 'formID';
            formID.value = '<?php echo $numero; ?>';
            formPlatos.appendChild(formID);
        <?php
        } ?>
    });
</script>
<?php

// PRINCIPALES -------------------------
mysqli_report(MYSQLI_REPORT_ERROR);
require('conectaVILLACARMEN.php');
$consulta = "SELECT * FROM DIA WHERE TIPO = 'PRINCIPAL';";

if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La aplicación ha fallado.<br>";
    echo "Error en la consulta: $consulta <br>";
    exit;
}

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $numPrincipal[] = $fila["NUM"];
        $descripcionPrincipal[] = $fila["DESCRIPCION"];
    }
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {


            var containerprincipales = document.getElementById('containerprincipales');
            <?php
            foreach ($descripcionPrincipal as $index => $descripcionplatos) { ?>
                var formPlatos = document.createElement('form');
                formPlatos.classList.add('formPlatos');
                formPlatos.id = 'formPRINCIPALES<?php echo $index; ?>';
                formPlatos.method = 'POST';
                containerprincipales.appendChild(formPlatos);

                var inputText = document.createElement('textarea');
                inputText.type = 'text';
                inputText.classList.add('inputText');
                inputText.value = '<?php echo $descripcionplatos; ?>';
                inputText.id = 'inputText';
                inputText.name = 'inputText';
                inputText.rows = '2';
                inputText.setAttribute('data-min-rows', '2');
                inputText.placeholder = 'Modifica la descripción del plato';


                formPlatos.appendChild(inputText);

                var containerbotones = document.createElement('div');
                containerbotones.classList.add('containerbotones');
                formPlatos.appendChild(containerbotones);

                var update = document.createElement('input');
                update.id = '<?php echo $index; ?>';
                update.type = 'submit';
                update.name = 'update';
                update.classList.add('update');
                containerbotones.appendChild(update);


                var eliminaplato = document.createElement('input');
                eliminaplato.id = '<?php echo $index; ?>';
                eliminaplato.type = 'submit';
                eliminaplato.name = 'eliminaplato';
                eliminaplato.classList.add('eliminaplato');
                containerbotones.appendChild(eliminaplato);

            <?php } ?>
            <?php
            foreach ($numPrincipal as $index => $numero) { ?>

                var formPlatos = document.getElementById('formPRINCIPALES<?php echo $index; ?>');
                var formID = document.createElement('input');
                formID.type = 'hidden';
                formID.name = 'formID';
                formID.value = '<?php echo $numero; ?>';
                formPlatos.appendChild(formID);
            <?php
            } ?>
        });
    </script>
<?php
}

// ARROCES -------------------------
mysqli_report(MYSQLI_REPORT_ERROR);
require('conectaVILLACARMEN.php');
$consulta = "SELECT * FROM DIA WHERE TIPO = 'ARROZ';";

if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La aplicación ha fallado.<br>";
    echo "Error en la consulta: $consulta <br>";
    exit;
}

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $numArroz[] = $fila["NUM"];
        $descripcionArroz[] = $fila["DESCRIPCION"];
    }
?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var containerarroces = document.getElementById('containerarroces');
            <?php
            foreach ($descripcionArroz as $index => $descripcionplatos) { ?>
                var formPlatos = document.createElement('form');
                formPlatos.classList.add('formPlatos');
                formPlatos.id = 'formARROCES<?php echo $index; ?>';
                formPlatos.method = 'POST';
                containerarroces.appendChild(formPlatos);

                var inputText = document.createElement('textarea');
                inputText.type = 'text';
                inputText.classList.add('inputText');
                inputText.value = '<?php echo $descripcionplatos; ?>';
                inputText.id = 'inputText';
                inputText.name = 'inputText';
                inputText.rows = '2';
                inputText.setAttribute('data-min-rows', '2');
                inputText.placeholder = 'Modifica la descripción del plato';


                formPlatos.appendChild(inputText);

                var containerbotones = document.createElement('div');
                containerbotones.classList.add('containerbotones');
                formPlatos.appendChild(containerbotones);

                var update = document.createElement('input');
                update.id = '<?php echo $index; ?>';
                update.type = 'submit';
                update.name = 'update';
                update.classList.add('update');
                containerbotones.appendChild(update);


                var eliminaplato = document.createElement('input');
                eliminaplato.id = '<?php echo $index; ?>';
                eliminaplato.type = 'submit';
                eliminaplato.name = 'eliminaplato';
                eliminaplato.classList.add('eliminaplato');
                containerbotones.appendChild(eliminaplato);

            <?php } ?>
            <?php
            foreach ($numArroz as $index => $numero) { ?>

                var formPlatos = document.getElementById('formARROCES<?php echo $index; ?>');
                var formID = document.createElement('input');
                formID.type = 'hidden';
                formID.name = 'formID';
                formID.value = '<?php echo $numero; ?>';
                formPlatos.appendChild(formID);
            <?php
            } ?>
        });
    </script>
<?php
}

// PRECIO -------------------------
mysqli_report(MYSQLI_REPORT_ERROR);
require('conectaVILLACARMEN.php');
$consulta = "SELECT * FROM DIA WHERE TIPO = 'PRECIO';";

if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La aplicación ha fallado. <br>";
    echo "Error en la consulta: $consulta <br>";
    exit;
}

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $precio[] = $fila["DESCRIPCION"];
        $numPrecio[] = $fila["NUM"];
    }
}

?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ENTRANTES ----------------------------------------------------
        var anyadePlato = document.createElement('form');
        anyadePlato.method = 'POST';
        anyadePlato.classList.add('formPlatos');
        containerentrantes.appendChild(anyadePlato);

        var cajaTexto = document.createElement('textarea');
        cajaTexto.classList.add('inputText');
        cajaTexto.type = 'text';
        cajaTexto.name = 'inputText';
        cajaTexto.id = 'inputText';
        cajaTexto.rows = '2';
        cajaTexto.placeholder = "Añade un entrante";
        cajaTexto.setAttribute('data-min-rows', '2');
        anyadePlato.appendChild(cajaTexto);

        var anyade = document.createElement('input');
        anyade.type = 'submit';
        anyade.name = 'anyadeEntrante';
        anyade.classList.add('anyade');
        anyadePlato.appendChild(anyade);

        // PRINCIPALES ------------------------------------------------------
        var containerprincipales = document.getElementById('containerprincipales');
        var anyadePrincipal = document.createElement('form');
        anyadePrincipal.method = 'POST';
        anyadePrincipal.classList.add('formPlatos');
        containerprincipales.appendChild(anyadePrincipal);

        var cajaTexto = document.createElement('textarea');
        cajaTexto.classList.add('inputText');
        cajaTexto.type = 'text';
        cajaTexto.name = 'inputText';
        cajaTexto.id = 'inputText';
        cajaTexto.rows = '2';
        cajaTexto.placeholder = "Añade un plato principal";
        cajaTexto.setAttribute('data-min-rows', '2');
        anyadePrincipal.appendChild(cajaTexto);


        var anyade = document.createElement('input');
        anyade.type = 'submit';
        anyade.name = 'anyadePrincipal';
        anyade.classList.add('anyade');
        anyadePrincipal.appendChild(anyade);

        // ARROCES ------------------------------------------------------
        var containerarroces = document.getElementById('containerarroces');
        var anyadeArroz = document.createElement('form');
        anyadeArroz.method = 'POST';
        anyadeArroz.classList.add('formPlatos');
        containerarroces.appendChild(anyadeArroz);

        var cajaTexto = document.createElement('textarea');
        cajaTexto.classList.add('inputText');
        cajaTexto.type = 'text';
        cajaTexto.name = 'inputText';
        cajaTexto.id = 'inputText';
        cajaTexto.rows = '2';
        cajaTexto.placeholder = "Añade un arroz";
        cajaTexto.setAttribute('data-min-rows', '2');
        anyadeArroz.appendChild(cajaTexto);


        var anyade = document.createElement('input');
        anyade.type = 'submit';
        anyade.name = 'anyadeArroz';
        anyade.classList.add('anyade');
        anyadeArroz.appendChild(anyade);

        // PRECIO -----------------------------------
        <?php
        foreach ($precio as $preciomenu) { ?>
            var modificaprecio = document.createElement('form');
            modificaprecio.method = "POST";
            modificaprecio.classList.add('formPlatos');
            modificaprecio.id = 'modificaprecio';
            containerfinde.appendChild(modificaprecio);

            var tituloPrecio = document.createElement('p');
            tituloPrecio.classList.add('tituloPrecio');
            tituloPrecio.textContent = 'MODIFICA EL PRECIO:';
            modificaprecio.appendChild(tituloPrecio);

            var precioTexto = document.createElement('textarea');
            precioTexto.classList.add('inputText');
            precioTexto.type = 'text';
            precioTexto.name = 'inputText';
            precioTexto.id = 'inputText';
            precioTexto.rows = '1';
            precioTexto.setAttribute('data-min-rows', '1');
            precioTexto.value = '<?php echo $preciomenu; ?>';
            modificaprecio.appendChild(precioTexto);


        <?php } ?>

        <?php
        foreach ($numPrecio as $num) { ?>
            var formprecio = document.getElementById('modificaprecio');
            var update = document.createElement('input');
            update.type = 'submit';
            update.name = 'update';
            update.value = '<?php echo $num; ?>'
            update.classList.add('update');
            modificaprecio.appendChild(update);

            
            var formID = document.createElement('input');
            formID.type = 'hidden';
            formID.name = 'formID';
            formID.value = '<?php echo $num; ?>';
            formprecio.appendChild(formID);
        <?php }
        ?>


    });
    document.addEventListener('DOMContentLoaded', function() {
        function getScrollHeight(elm) {
            var savedValue = elm.value
            elm.value = ''
            elm._baseScrollHeight = elm.scrollHeight
            elm.value = savedValue
        }

        function onExpandableTextareaInput({
            target: elm
        }) {
            // make sure  event originated from a textarea and it's desired to be auto-expandable
            if (!elm.classList.contains('inputText') || !elm.nodeName == 'TEXTAREA') return

            var minRows = elm.getAttribute('data-min-rows') | 0,
                rows;
            !elm._baseScrollHeight && getScrollHeight(elm)

            elm.rows = minRows
            rows = Math.ceil((elm.scrollHeight - elm._baseScrollHeight) / 16)
            elm.rows = minRows + rows
        }


        // global delegated event listener
        document.addEventListener('input', onExpandableTextareaInput)


    });
</script>

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
    <div class="headerconf">
        <div class="containerbotonesreturn">
            <a href="configuracion.php" class="volveratras">
                <img src="images/flecha.png" alt="">
            </a>
            <a href="index.php" class="volverindex">
                <img src="images/home.png" alt="">
                <p>Ir a la web</p>
            </a>
        </div>
    </div>
    <div class="containertitulo">
        <h1>MENÚ DEL DÍA</h1>
    </div>
    <div class="containerfinde" id="containerfinde">
        <div class="containersecciones" id="containerentrantes">
            <h1>ENTRANTES</h1>
        </div>
        <div class="containersecciones" id="containerprincipales">
            <h1>PRINCIPALES</h1>
        </div>
        <div class="containersecciones" id="containerarroces">
            <h1>ARROCES</h1>
        </div>
        <div class="mensajevacio" id="mensajevacio" style="display: none;">
            <p>El texto no puede estar vacío</p>
        </div>

    </div>




</body>

</html>