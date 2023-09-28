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

            $consulta = "UPDATE POSTRES SET DESCRIPCION = '{$texto}' WHERE NUM = '{$formID}';";
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

        $consulta = "DELETE FROM POSTRES WHERE NUM = '{$formID}';";
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
    if (isset($_POST['anyadePOSTRE'])) {
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

            $consulta = "INSERT INTO POSTRES (DESCRIPCION) VALUE ('{$texto}');";
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




// POSTRES -------------------------
mysqli_report(MYSQLI_REPORT_ERROR);
require('conectaVILLACARMEN.php');
$consulta = "SELECT * FROM POSTRES;";

if (!$resultado = $mysqli->query($consulta)) {
    echo "Lo sentimos. La aplicación ha fallado.<br>";
    echo "Error en la consulta: $consulta <br>";
    exit;
}

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $numPOSTRE[] = $fila["NUM"];
        $descripcionPOSTRE[] = $fila["DESCRIPCION"];
    }
} ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var containerpostres = document.getElementById('containerpostres');

        <?php
        foreach ($descripcionPOSTRE as $index => $descripcionplatos) { ?>
            var formPlatos = document.createElement('form');
            formPlatos.classList.add('formPlatos');
            formPlatos.id = 'formPOSTRES<?php echo $index; ?>';
            formPlatos.method = 'POST';
            containerpostres.appendChild(formPlatos);

            var inputText = document.createElement('textarea');
            inputText.type = 'text';
            inputText.classList.add('inputText');
            inputText.value = '<?php echo $descripcionplatos; ?>';
            inputText.id = 'inputText';
            inputText.name = 'inputText';
            inputText.rows = '2';
            inputText.setAttribute('data-min-rows', '2');
            inputText.placeholder = 'Modifica la descripción del postre';


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
        foreach ($numPOSTRE as $index => $numero) { ?>

            var formPlatos = document.getElementById('formPOSTRES<?php echo $index; ?>');
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

?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // POSTRES ----------------------------------------------------
        var anyadePlato = document.createElement('form');
        anyadePlato.method = 'POST';
        anyadePlato.classList.add('formPlatos');
        containerpostres.appendChild(anyadePlato);

        var cajaTexto = document.createElement('textarea');
        cajaTexto.classList.add('inputText');
        cajaTexto.type = 'text';
        cajaTexto.name = 'inputText';
        cajaTexto.id = 'inputText';
        cajaTexto.rows = '2';
        cajaTexto.placeholder = "Añade un postre";
        cajaTexto.setAttribute('data-min-rows', '2');
        anyadePlato.appendChild(cajaTexto);

        var anyade = document.createElement('input');
        anyade.type = 'submit';
        anyade.name = 'anyadePOSTRE';
        anyade.classList.add('anyade');
        anyadePlato.appendChild(anyade);



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
            // make sure the input event originated from a textarea and it's desired to be auto-expandable
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
        <h1>POSTRES</h1>
    </div>
    <div class="containerfinde" id="containerfinde">
        <div class="containersecciones" id="containerpostres">
        </div>
        <div class="mensajevacio" id="mensajevacio" style="display: none;">
            <p>El texto no puede estar vacío</p>
        </div>

    </div>






</body>

</html>