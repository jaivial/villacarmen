<?php
// Database connection settings
$host = "localhost";
$username = "root";
$password = "";
$database = "VILLACARMEN";


// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['specificdate'])) {
        $dateSelected = $_POST['specificdate'];
        $consulta = "SELECT customer_name, contact_email, reservation_date, reservation_time, party_size, contact_phone, commentary FROM bookings WHERE reservation_date = '$dateSelected'";

        if (!$resultado = $conn->query($consulta)) {
            echo "Lo sentimos. App falla<br>";
            echo "Error en $consulta <br>";
            echo "Num.error: " . $mysqli->errno . "<br>";
            echo "Error: " . $mysqli->error . "<br>";
            exit;
        }

        if ($resultado->num_rows > 0) {
            $fechas = [];
            $nombre = [];
            $personas = [];
            $horas = [];
            $telefonos = [];
            $comentario = [];


            while ($fila = $resultado->fetch_assoc()) {
                $fechas[] = $fila['reservation_date'];
                $nombres[] = $fila['customer_name'];
                $personas[] = $fila['party_size'];
                $horas[] = $fila['reservation_time'];
                $telefonos[] = $fila['contact_phone'];
                $comentario[] = $fila['commentary'];
            }
        }
    }

?>



    <script>
        window.onload = function() {
            var tablareservas = document.getElementById('tablareservas');
            <?php
            foreach ($fechas as $index => $fechareserva) {
            ?>
                var tr = document.createElement('tr');
                tr.id = 'trreservas<?php echo $index; ?>';
                tablareservas.appendChild(tr);

                var tdfecha = document.createElement('td');
                tdfecha.id = 'tdfecha<?php echo $index; ?>';
                tr.appendChild(tdfecha);

                var fecha = document.createElement('p');
                fecha.id = 'fecha<?php echo $index; ?>';
                fecha.textContent = '<?php echo $fechareserva; ?>';
                tdfecha.appendChild(fecha);
            <?php
            }
            ?>



            <?php
            foreach ($nombres as $index => $nombretexto) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdnombre = document.createElement('td');
                tdnombre.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdnombre);

                var nombre = document.createElement('p');
                nombre.id = 'nombre<?php echo $index; ?>';
                nombre.textContent = '<?php echo $nombretexto; ?>';
                tdnombre.appendChild(nombre);

            <?php
            }
            ?>

            <?php
            foreach ($personas as $index => $nombretexto) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdnombre = document.createElement('td');
                tdnombre.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdnombre);

                var nombre = document.createElement('p');
                nombre.id = 'nombre<?php echo $index; ?>';
                nombre.textContent = '<?php echo $nombretexto; ?>';
                tdnombre.appendChild(nombre);

            <?php
            }
            ?>

            <?php
            foreach ($horas as $index => $nombretexto) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdnombre = document.createElement('td');
                tdnombre.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdnombre);

                var nombre = document.createElement('p');
                nombre.id = 'nombre<?php echo $index; ?>';
                nombre.textContent = '<?php echo $nombretexto; ?>';
                tdnombre.appendChild(nombre);

            <?php
            }
            ?>

            <?php
            foreach ($telefonos as $index => $nombretexto) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdnombre = document.createElement('td');
                tdnombre.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdnombre);

                var nombre = document.createElement('p');
                nombre.id = 'nombre<?php echo $index; ?>';
                nombre.textContent = '<?php echo $nombretexto; ?>';
                tdnombre.appendChild(nombre);
            <?php
            }
            ?>

            <?php
            foreach ($comentario as $index => $comentarioarroz) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdcomentario = document.createElement('td');
                tdcomentario.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdcomentario);

                var comentariotexto = document.createElement('p');
                comentariotexto.id = 'comentario<?php echo $index; ?>';
                comentariotexto.textContent = '<?php echo $comentarioarroz; ?>';
                tdcomentario.appendChild(comentariotexto);
            <?php
            }
            ?>

        }
    </script>

<?php
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['daterangestart']) && isset($_POST['daterangeend'])) {
        $dateStart = $_POST['daterangestart'];
        $dateEnd = $_POST['daterangeend'];
        $consulta = "SELECT customer_name, contact_email, reservation_date, reservation_time, party_size, contact_phone 
        FROM bookings 
        WHERE reservation_date BETWEEN '$dateStart' AND '$dateEnd'";

        if (!$resultado = $conn->query($consulta)) {
            echo "Lo sentimos. App falla<br>";
            echo "Error en $consulta <br>";
            echo "Num.error: " . $mysqli->errno . "<br>";
            echo "Error: " . $mysqli->error . "<br>";
            exit;
        }

        if ($resultado->num_rows > 0) {
            $fechas = [];
            $nombre = [];
            $personas = [];
            $horas = [];
            $telefonos = [];
            $commentario = [];


            while ($fila = $resultado->fetch_assoc()) {
                $fechas[] = $fila['reservation_date'];
                $nombres[] = $fila['customer_name'];
                $personas[] = $fila['party_size'];
                $horas[] = $fila['reservation_time'];
                $telefonos[] = $fila['contact_phone'];
                $commentario[] = $fila['commentary'];
            }
        }
    }

?>



    <script>
        window.onload = function() {
            var tablareservas = document.getElementById('tablareservas');
            <?php
            foreach ($fechas as $index => $fechareserva) {
            ?>
                var tr = document.createElement('tr');
                tr.id = 'trreservas<?php echo $index; ?>';
                tablareservas.appendChild(tr);

                var tdfecha = document.createElement('td');
                tdfecha.id = 'tdfecha<?php echo $index; ?>';
                tr.appendChild(tdfecha);

                var fecha = document.createElement('p');
                fecha.id = 'fecha<?php echo $index; ?>';
                fecha.textContent = '<?php echo $fechareserva; ?>';
                tdfecha.appendChild(fecha);
            <?php
            }
            ?>



            <?php
            foreach ($nombres as $index => $nombretexto) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdnombre = document.createElement('td');
                tdnombre.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdnombre);

                var nombre = document.createElement('p');
                nombre.id = 'nombre<?php echo $index; ?>';
                nombre.textContent = '<?php echo $nombretexto; ?>';
                tdnombre.appendChild(nombre);

            <?php
            }
            ?>

            <?php
            foreach ($personas as $index => $nombretexto) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdnombre = document.createElement('td');
                tdnombre.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdnombre);

                var nombre = document.createElement('p');
                nombre.id = 'nombre<?php echo $index; ?>';
                nombre.textContent = '<?php echo $nombretexto; ?>';
                tdnombre.appendChild(nombre);

            <?php
            }
            ?>

            <?php
            foreach ($horas as $index => $nombretexto) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdnombre = document.createElement('td');
                tdnombre.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdnombre);

                var nombre = document.createElement('p');
                nombre.id = 'nombre<?php echo $index; ?>';
                nombre.textContent = '<?php echo $nombretexto; ?>';
                tdnombre.appendChild(nombre);

            <?php
            }
            ?>

            <?php
            foreach ($telefonos as $index => $nombretexto) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdnombre = document.createElement('td');
                tdnombre.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdnombre);

                var nombre = document.createElement('p');
                nombre.id = 'nombre<?php echo $index; ?>';
                nombre.textContent = '<?php echo $nombretexto; ?>';
                tdnombre.appendChild(nombre);
            <?php
            }
            ?>

            <?php
            foreach ($comentario as $index => $comentarioarroz) {
            ?>
                var tr = document.getElementById('trreservas<?php echo $index; ?>');

                var tdcomentario = document.createElement('td');
                tdcomentario.id = 'tdnombre<?php echo $index; ?>';
                tr.appendChild(tdcomentario);

                var comentariotexto = document.createElement('p');
                comentariotexto.id = 'comentario<?php echo $index; ?>';
                comentariotexto.textContent = '<?php echo $comentarioarroz; ?>';
                tdcomentario.appendChild(comentariotexto);
            <?php
            }
            ?>

        }
    </script>

<?php
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Reservation Data Viewer</title>
    <link rel="stylesheet" href="stylereservas.css">
</head>

<body>
    <h1>Reservation Data Viewer</h1>
    <form class="specificdate" method="post">
        <label for="specificdate">Selecciona una fecha</label>
        <input type="date" name="specificdate" id="specificdate">

        <input type="submit" value="Consultar">
    </form>

    <form class="daterange" method="post">
        <label for="daterangestart">Selecciona una fecha inicial</label>
        <input type="date" name="daterangestart" id="daterangestart">
        <label for="daterangeend">Selecciona una fecha final</label>
        <input type="date" name="daterangeend" id="daterangeend">

        <input type="submit" value="Consultar">
    </form>

    <div class="tablareservas" id="tablareservas">
        <table class="tablatablareservas" id="tablareservas">
            <tr>
                <th>Fecha</th>
                <th>Nombre</th>
                <th>Personas</th>
                <th>Hora</th>
                <th>Teléfono</th>
                <th>Comentarios</th>
            </tr>
        </table>
    </div>
</body>

</html>