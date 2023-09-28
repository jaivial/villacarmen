<?php


require('conectaVILLACARMEN.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($name, $date, $time, $partySize, $email, $phone, $commentary)
{
    $subject = "Rerserva confirmada en Alqueria Villa Carmen";
    // Encode the image to Base64
    $imageData = base64_encode(file_get_contents('images/logo_fondoblanco.jpg'));

    $name = $_POST['customer_name'];
    $email = $_POST['contact_email'];
    $date = $_POST['reservation_date'];
    $time = $_POST['reservation_time'];
    $partySize = $_POST['party_size'];
    $phone = $_POST['contact_phone'];
    $commentary = $_POST['commentary'];


    // HTML content for your email message with embedded image
    $message = '<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            body {
                display: flex;
                flex-direction: column;
                align-items: center;
                color: black;
            }
    
            .logocontaineremail {
                width: 200px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
    
            .logocontaineremail img {
                width: 100%;
            }

            .containerinforeserva p {
                color: black;
            }
    
            .containertituloemail {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
    
            
    
            .containerdespedidaemail {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin: 30px 0 0 0;
                padding: 0;
                line-height: 0;
            }

            .containerdespedidaemail {
                color: black;
            }
    
            .containerdespedidaemail a {
                margin: 15px 0;
                text-decoration: none;
                color: black;
                width: 100%;
                text-align: center;
            }
    
            .wrapperemail {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

            }
        </style>
    </head>
    
    <body>
        <div class="wrapperemail">
    
    
            <div class="logocontaineremail">
            <p><img src="data:image/jpeg;base64,' . $imageData . '"></p>

            </div>
            <div class="containertituloemail">
                <p>Esta es la informaci&oacute;n de tu reserva en Alqueria Villa Carmen:</p>
            </div>
    
            <div class="containerinforeserva">
            <p style="color: black;">Nombre: ' . $name . '</p>
            <p>Fecha: ' . $date . '</p>
            <p>Hora: ' . $time . '</p>
            <p>N&uacute;mero de personas: ' . $partySize . '</p>
            <p>Email: ' . $email . '</p>
            <p>Tel&eacute;fono: ' . $phone . '</p>
            <p>Comentarios: ' . $commentary . '</p>
        </div>
        
    
            <div class="containerdespedidaemail">
                <p>Te estamos esperando</p>
                <br>
                <a href="https://www.alqueriavillacarmen.com">www.alqueriavillacarmen.com</a>
    
                <p><a href="mailto:reservas@alqueriavillacarmen.com">reservas@alqueriavillacarmen.com</a></p>
    
                <p>Calle Sequia Rascanya, 2</p>
                <p>46470 Catarroja, Valencia</p> <br>
                
            </div>
        </div>
    
    </body>
    
    </html>';

    // Add the appropriate headers to make it an HTML email
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=utf-8\r\n";


    $headers = "From: reservas@alqueriavillacarmen.com\r\n";
    require 'vendor/autoload.php';

    // Create a new PHPMailer instance
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.titan.email';
    $mail->Port = 587; // Use the appropriate SMTP port
    $mail->SMTPAuth = true;
    $mail->Username = 'reservas@alqueriavillacarmen.com';
    $mail->Password = 'Jaivial_5171';
    $mail->setFrom('reservas@alqueriavillacarmen.com', 'Reservas Alqueria');
    $mail->addAddress($email); // Send to the customer
    $mail->addAddress('reservas@alqueriavillacarmen.com', 'Jaime');
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
    } else {
        echo "Error sending email: " . $mail->ErrorInfo;
    }
}

function displayErrorMessage($partySize, $availableChairs)
{
?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var mensajeError = document.getElementById('divnodisponibilidad');
            mensajeError.classList.add('divnodisponibilidad');
            mensajeError.style.display = "flex";
            mensajeError.style.flexDirection = "column";
            mensajeError.style.justifyContent = "center";
            mensajeError.style.alignItems = "center";
            var mensajeErrorTitulo = document.createElement('h2');
            mensajeErrorTitulo.textContent = 'NO HAY DISPONIBILIDAD';
            mensajeError.appendChild(mensajeErrorTitulo);
            var mensajeNumPersonas = document.createElement('p');
            mensajeNumPersonas.textContent = 'Lo sentimos, no quedan mesas libres para <?php echo $partySize; ?> personas en la fecha seleccionada.';
            mensajeError.appendChild(mensajeNumPersonas);

            if (<?php echo $availableChairs; ?> > 0) {
                var mensajeNumDisponible = document.createElement('p');
                mensajeNumDisponible.textContent = 'Para la fecha seleccionada solo quedan <?php echo $availableChairs; ?> plazas libres.';
                mensajeError.appendChild(mensajeNumDisponible);
            }

            var divMensajeCerrar = document.createElement('div');
            divMensajeCerrar.classList.add('divMensajeCerrar');
            divMensajeCerrar.id = 'divMensajeCerrar';
            mensajeError.appendChild(divMensajeCerrar);
            var mensajeCerrar = document.createElement('p');
            mensajeCerrar.textContent = 'CERRAR';
            divMensajeCerrar.appendChild(mensajeCerrar);


            // setTimeout(function() {
            //     mensajeError.style.opacity = "0";
            //     setTimeout(function() {
            //         mensajeError.style.display = "none";
            //     }, 10000);
            // }, 4000);

            var cerrarmensajeerror = document.getElementById('divMensajeCerrar');
            cerrarmensajeerror.addEventListener('click', function() {
                mensajeError.style.display = "none";
            });
        });
    </script>
    <?php
}

function compruebaFecha($date, $timeToCheck)
{
    $currentDateTime = new DateTime();
    $selectedDateTime = new DateTime("$date $timeToCheck");

    $comprobante = 0;

    // Compare the selected date and time with the current date and time
    if ($selectedDateTime < $currentDateTime) {
        echo "The selected date is older than the current date.";
        $comprobante = 1;
    } else {
        $comprobante = 0;
    }

    return $comprobante;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['customer_name'];
    $email = $_POST['contact_email'];
    $date = $_POST['reservation_date'];
    $time = $_POST['reservation_time'];
    $partySize = $_POST['party_size'];
    $phone = $_POST['contact_phone'];
    $commentary = $_POST['commentary'];


    // Calculate day of the week using PHP
    $selectedDate = new DateTime($date);
    $dayOfWeek = $selectedDate->format('N');
    if ($dayOfWeek == 1 || $dayOfWeek == 2) { // Monday (1) or Tuesday (2)
    ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var mensajefechaanterior = document.getElementById('mensajefechaanterior');

                var textofechaanterior = document.createElement('p');
                textofechaanterior.textContent = "Estamos cerrados. Disculpen las molestias.";
                textofechaanterior.classList.add('textofechaanterior');
                mensajefechaanterior.appendChild(textofechaanterior);

                // Prevent form submission
                document.getElementById('myForm').addEventListener('submit', function(event) {
                    event.preventDefault();
                    // Optionally, you can display a message to the user indicating why the form cannot be submitted.
                    alert("No se puede enviar la reserva en lunes o martes.");
                    document.getElementById('myForm').reset();
                });
                setTimeout(function() {
                    window.location.href = "reservas.php";
                }, 3000);

            });
        </script>
        <?php
        //    usleep(4000000);
        //    header("Location: reservas.php");
        //    exit; 
    } else {

        if (compruebaFecha($date, $time) == 1) {
        ?>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var mensajefechaanterior = document.getElementById('mensajefechaanterior');

                    var textofechaanterior = document.createElement('p');
                    textofechaanterior.textContent = "No puedes seleccionar una fecha anterior a la actual.";
                    textofechaanterior.classList.add('textofechaanterior');
                    mensajefechaanterior.appendChild(textofechaanterior);

                    setTimeout(function() {
                        window.location.href = "reservas.php";
                    }, 3000);
                });
            </script>
            <?php
            // header("Location: reservas.php");
        } elseif ((compruebaFecha($date, $time) == 0)) {
            // Check if a reservation already exists with the same email, phone, and date
            $checkQuery = "SELECT * FROM bookings WHERE (contact_email = '$email' OR contact_phone = '$phone') AND reservation_date = '$date'";
            $result = $mysqli->query($checkQuery);
            $row = $result->fetch_assoc();
            $resultado = $result->num_rows;

            if ($resultado == 0) {
                if ($time == '13:30' || $time == '14:00' || $time == '14:30' || $time == '15:00') {
                    $checkQuery = "SELECT SUM(party_size) as total_party_size FROM bookings WHERE reservation_date = '$date' AND (reservation_time = '13:30' OR reservation_time = '14:00' OR reservation_time = '14:30' OR reservation_time = '15:00')";
                    $result = $mysqli->query($checkQuery);
                    $row = $result->fetch_assoc();
                    $totalPartySize = (int)$row['total_party_size'];

                    if ($totalPartySize + $partySize <= 25) {
                        // Reservation can be accepted
                        $insertQuery = "INSERT INTO bookings (customer_name, contact_email, reservation_date, reservation_time, party_size, contact_phone, commentary) VALUES ('$name', '$email', '$date', '$time', $partySize, '$phone', '$commentary')";

                        if ($mysqli->query($insertQuery)) {
                            // Reservation successful, send emails
                            sendEmail($name, $date, $time, $partySize, $email, $phone, $commentary);
                            $mysqli->close();
            ?>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var mensajeReservaAceptada = document.getElementById('divnodisponibilidad');
                                    mensajeReservaAceptada.classList.add('mensajereservaaceptada');
                                    mensajeReservaAceptada.style.display = "flex";
                                    mensajeReservaAceptada.style.flexDirection = "column";
                                    mensajeReservaAceptada.style.justifyContent = "center";
                                    mensajeReservaAceptada.style.alignItems = "center";
                                    var reservaAceptadaTitulo = document.createElement('h2');
                                    reservaAceptadaTitulo.textContent = '¡RESERVA CONFIRMADA!';
                                    mensajeReservaAceptada.appendChild(reservaAceptadaTitulo);

                                    // var reservaAceptadaTexto = document.createElement('p');
                                    // reservaAceptadaTexto.textContent = `Tu reserva para <?php echo $partySize; ?> personas el día <?php echo $date; ?>  a las <?php echo $time; ?> ha sido confirmada.`;
                                    // mensajeReservaAceptada.appendChild(reservaAceptadaTexto);

                                    var reservaAceptadaTextoDos = document.createElement('p');
                                    reservaAceptadaTextoDos.textContent = `En breves recibirás un e-mail con la información de tu reserva.`;
                                    mensajeReservaAceptada.appendChild(reservaAceptadaTextoDos);

                                    var reservaAceptadaTextoTres = document.createElement('p');
                                    reservaAceptadaTextoTres.textContent = `¡Nos vemos pronto!`;
                                    mensajeReservaAceptada.appendChild(reservaAceptadaTextoTres);

                                    var reservaAceptadaLogoContainer = document.createElement('div');
                                    reservaAceptadaLogoContainer.classList.add('reservaaceptadalogocontainer');
                                    mensajeReservaAceptada.appendChild(reservaAceptadaLogoContainer);

                                    var reservaAceptadaLogoImage = document.createElement('img');
                                    reservaAceptadaLogoImage.classList.add('reservaaceptadalogoimage');
                                    reservaAceptadaLogoImage.src = 'images/logo.png';
                                    reservaAceptadaLogoContainer.appendChild(reservaAceptadaLogoImage);

                                    var divMensajeCerrar = document.createElement('div');
                                    divMensajeCerrar.classList.add('divMensajeCerrar');
                                    divMensajeCerrar.id = 'divMensajeCerrar';
                                    mensajeReservaAceptada.appendChild(divMensajeCerrar);
                                    var mensajeCerrar = document.createElement('p');
                                    mensajeCerrar.textContent = 'CERRAR';
                                    divMensajeCerrar.appendChild(mensajeCerrar);


                                    divMensajeCerrar.addEventListener('click', function() {
                                        window.location.href = 'index.php';
                                    });


                                });
                            </script>
                        <?php
                        } else {
                            echo "Error inserting reservation: " . $mysqli->error;
                        }
                    } else {
                        // Reservation cannot be accepted, calculate available chairs
                        $availableChairs = 25 - $totalPartySize;
                        $checkQuery = "SELECT 'party_size' FROM bookings WHERE reservation_date = '$date' AND (reservation_time = '13:30' OR reservation_time = '14:00' OR reservation_time = '14:30' OR reservation_time = '15:00')";
                        $result = $mysqli->query($checkQuery);
                        $row = $result->fetch_assoc();
                        $totalPartySize = (int)$row['total_party_size'];

                        displayErrorMessage($partySize, $availableChairs);
                    }
                } elseif ($time == '20:30' || $time == '21:00' || $time == '21:30' || $time == '22:00') {
                    $checkQuery = "SELECT SUM(party_size) as total_party_size FROM bookings WHERE reservation_date = '$date' AND (reservation_time = '20:30' OR reservation_time = '21:00' OR reservation_time = '21:30' OR reservation_time = '22:00')";
                    $result = $mysqli->query($checkQuery);
                    $row = $result->fetch_assoc();
                    $totalPartySize = (int)$row['total_party_size'];

                    if ($totalPartySize + $partySize <= 25) {
                        // Reservation can be accepted
                        $insertQuery = "INSERT INTO bookings (customer_name, contact_email, reservation_date, reservation_time, party_size, contact_phone, commentary) VALUES ('$name', '$email', '$date', '$time', $partySize, '$phone', '$commentary')";
                        ?>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var mensajeReservaAceptada = document.getElementById('divnodisponibilidad');
                                mensajeReservaAceptada.classList.add('mensajereservaaceptada');
                                mensajeReservaAceptada.style.display = "flex";
                                mensajeReservaAceptada.style.flexDirection = "column";
                                mensajeReservaAceptada.style.justifyContent = "center";
                                mensajeReservaAceptada.style.alignItems = "center";
                                var reservaAceptadaTitulo = document.createElement('h2');
                                reservaAceptadaTitulo.textContent = '¡RESERVA CONFIRMADA!';
                                mensajeReservaAceptada.appendChild(reservaAceptadaTitulo);

                                // var reservaAceptadaTexto = document.createElement('p');
                                // reservaAceptadaTexto.textContent = `Tu reserva para <?php echo $partySize; ?> personas el día <?php echo $date; ?>  a las <?php echo $time; ?> ha sido confirmada.`;
                                // mensajeReservaAceptada.appendChild(reservaAceptadaTexto);

                                var reservaAceptadaTextoDos = document.createElement('p');
                                reservaAceptadaTextoDos.textContent = `En breves recibirás un e-mail con la información de tu reserva.`;
                                mensajeReservaAceptada.appendChild(reservaAceptadaTextoDos);

                                var reservaAceptadaTextoTres = document.createElement('p');
                                reservaAceptadaTextoTres.textContent = `¡Nos vemos pronto!`;
                                mensajeReservaAceptada.appendChild(reservaAceptadaTextoTres);

                                var reservaAceptadaLogoContainer = document.createElement('div');
                                reservaAceptadaLogoContainer.classList.add('reservaaceptadalogocontainer');
                                mensajeReservaAceptada.appendChild(reservaAceptadaLogoContainer);

                                var reservaAceptadaLogoImage = document.createElement('img');
                                reservaAceptadaLogoImage.classList.add('reservaaceptadalogoimage');
                                reservaAceptadaLogoImage.src = 'images/logo.png';
                                reservaAceptadaLogoContainer.appendChild(reservaAceptadaLogoImage);

                                var divMensajeCerrar = document.createElement('div');
                                divMensajeCerrar.classList.add('divMensajeCerrar');
                                divMensajeCerrar.id = 'divMensajeCerrar';
                                mensajeReservaAceptada.appendChild(divMensajeCerrar);
                                var mensajeCerrar = document.createElement('p');
                                mensajeCerrar.textContent = 'CERRAR';
                                divMensajeCerrar.appendChild(mensajeCerrar);


                                divMensajeCerrar.addEventListener('click', function() {
                                    window.location.href = 'index.php';
                                });

                            });
                        </script>
                <?php
                        if ($mysqli->query($insertQuery)) {
                            // Reservation successful, send emails
                            sendEmail($name, $date, $time, $partySize, $email, $phone, $commentary);
                            $mysqli->close();
                        } else {
                            echo "Error inserting reservation: " . $mysqli->error;
                        }
                    } else {
                        // Reservation cannot be accepted, calculate available chairs
                        $availableChairs = 25 - $totalPartySize;
                        displayErrorMessage($partySize, $availableChairs);
                    }
                }
            } elseif ($resultado > 0 && ($time == '20:30' || $time == '21:00' || $time == '21:30' || $time == '22:00')) {
                $checkQuery = "SELECT party_size FROM bookings WHERE reservation_date = '$date' AND (contact_email = '$email' OR contact_phone = '$phone') AND (reservation_time = '20:30' OR reservation_time = '21:00' OR reservation_time = '21:30' OR reservation_time = '22:00')";
                $result = $mysqli->query($checkQuery);
                $row = $result->fetch_assoc();
                $bookedPartySize = (int)$row['party_size'];

                ?>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var mensajeError = document.getElementById('divnodisponibilidad');
                        mensajeError.classList.add('reservayaexiste');
                        mensajeError.style.display = "flex";
                        mensajeError.style.flexDirection = "column";
                        mensajeError.style.justifyContent = "center";
                        mensajeError.style.alignItems = "center";
                        var reservaExisteTitulo = document.createElement('h2');
                        reservaExisteTitulo.textContent = 'TU RESERVA YA EXISTE';
                        mensajeError.appendChild(reservaExisteTitulo);

                        var reservaExisteTexto = document.createElement('p');
                        reservaExisteTexto.textContent = `Ya existe una reserva para <?php echo $bookedPartySize; ?> personas en la fecha <?php echo $date; ?>  a las <?php echo $time; ?> con el mismo correo electrónico o número de teléfono.`;
                        mensajeError.appendChild(reservaExisteTexto);

                        var reservaExistePreguntaEliminar = document.createElement('p');
                        reservaExistePreguntaEliminar.textContent = `¿Deseas cancelar tu reserva existente?`;
                        mensajeError.appendChild(reservaExistePreguntaEliminar);

                        var divContainerRespuestaCancelar = document.createElement('div');
                        divContainerRespuestaCancelar.classList.add('divcontainerrespuestacancelar');
                        divContainerRespuestaCancelar.id = 'divContainerRespuestaCancelar';
                        mensajeError.appendChild(divContainerRespuestaCancelar);

                        var divMensajeSiCancelar = document.createElement('div');
                        divMensajeSiCancelar.classList.add('divMensajeSiCancelar');
                        divMensajeSiCancelar.id = 'divMensajeSiCancelar';
                        divContainerRespuestaCancelar.appendChild(divMensajeSiCancelar);
                        var MensajeSiCancelar = document.createElement('p');
                        MensajeSiCancelar.textContent = 'SI';
                        divMensajeSiCancelar.appendChild(MensajeSiCancelar);

                        var divMensajeNoCancelar = document.createElement('div');
                        divMensajeNoCancelar.classList.add('divmensajenocancelar');
                        divMensajeNoCancelar.id = 'divMensajeNoCancelar';
                        divContainerRespuestaCancelar.appendChild(divMensajeNoCancelar);
                        var mensajeNoCancelar = document.createElement('p');
                        mensajeNoCancelar.textContent = 'NO';
                        divMensajeNoCancelar.appendChild(mensajeNoCancelar);


                        var cerrarmensajereservaexiste = document.getElementById('divMensajeNoCancelar');
                        cerrarmensajereservaexiste.addEventListener('click', function() {
                            mensajeError.style.display = "none";
                        });

                        var cancelarreserva = document.getElementById('divMensajeSiCancelar');
                        cancelarreserva.addEventListener('click', function() {
                            // Get the email and phone number from the form
                            var email = '<?php echo $email; ?>'; // Replace 'contact_email' with the actual ID of your email input field
                            var phone = <?php echo $phone; ?>; // Replace 'contact_phone' with the actual ID of your phone input field
                            var date = '<?php echo $date; ?>'; // Replace 'contact_phone' with the actual ID of your phone input field

                            // Create an object to store the data you want to send
                            var data = {
                                contact_email: email,
                                contact_phone: phone,
                                reservation_date: date

                            };

                            // Request to 'delete_reservation.php'
                            var xhr1 = new XMLHttpRequest();
                            xhr1.open('POST', 'delete_reservation.php', true);
                            xhr1.setRequestHeader('Content-Type', 'application/json');
                            xhr1.onreadystatechange = function() {
                                if (xhr1.readyState === 4 && xhr1.status === 200) {
                                    var response1 = xhr1.responseText;
                                    console.log('Response from delete_reservation.php:', response1);
                                    // You can perform additional actions here if needed
                                }
                            };
                            xhr1.send(JSON.stringify(data));

                            window.location.href = 'index.php';
                        });
                    });
                </script>

            <?php

            } elseif ($resultado > 0 && ($time == '13:30' || $time == '14:00' || $time == '14:30' || $time == '15:00')) {
                $checkQuery = "SELECT party_size FROM bookings WHERE reservation_date = '$date' AND (contact_email = '$email' OR contact_phone = '$phone') AND (reservation_time = '13:30' OR reservation_time = '14:00' OR reservation_time = '14:30' OR reservation_time = '15:00')";
                $result = $mysqli->query($checkQuery);
                $row = $result->fetch_assoc();
                $bookedPartySize = (int)$row['party_size'];

            ?>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var mensajeError = document.getElementById('divnodisponibilidad');
                        mensajeError.classList.add('reservayaexiste');
                        mensajeError.style.display = "flex";
                        mensajeError.style.flexDirection = "column";
                        mensajeError.style.justifyContent = "center";
                        mensajeError.style.alignItems = "center";
                        var reservaExisteTitulo = document.createElement('h2');
                        reservaExisteTitulo.textContent = 'TU RESERVA YA EXISTE';
                        mensajeError.appendChild(reservaExisteTitulo);

                        var reservaExisteTexto = document.createElement('p');
                        reservaExisteTexto.textContent = `Ya existe una reserva para <?php echo $bookedPartySize; ?> personas en la fecha <?php echo $date; ?>  a las <?php echo $time; ?> con el mismo correo electrónico o número de teléfono.`;
                        mensajeError.appendChild(reservaExisteTexto);

                        var reservaExistePreguntaEliminar = document.createElement('p');
                        reservaExistePreguntaEliminar.textContent = `¿Deseas cancelar tu reserva existente?`;
                        mensajeError.appendChild(reservaExistePreguntaEliminar);

                        var divContainerRespuestaCancelar = document.createElement('div');
                        divContainerRespuestaCancelar.classList.add('divcontainerrespuestacancelar');
                        divContainerRespuestaCancelar.id = 'divContainerRespuestaCancelar';
                        mensajeError.appendChild(divContainerRespuestaCancelar);

                        var divMensajeSiCancelar = document.createElement('div');
                        divMensajeSiCancelar.classList.add('divMensajeSiCancelar');
                        divMensajeSiCancelar.id = 'divMensajeSiCancelar';
                        divContainerRespuestaCancelar.appendChild(divMensajeSiCancelar);
                        var MensajeSiCancelar = document.createElement('p');
                        MensajeSiCancelar.textContent = 'SI';
                        divMensajeSiCancelar.appendChild(MensajeSiCancelar);

                        var divMensajeNoCancelar = document.createElement('div');
                        divMensajeNoCancelar.classList.add('divmensajenocancelar');
                        divMensajeNoCancelar.id = 'divMensajeNoCancelar';
                        divContainerRespuestaCancelar.appendChild(divMensajeNoCancelar);
                        var mensajeNoCancelar = document.createElement('p');
                        mensajeNoCancelar.textContent = 'NO';
                        divMensajeNoCancelar.appendChild(mensajeNoCancelar);


                        var cerrarmensajereservaexiste = document.getElementById('divMensajeNoCancelar');
                        cerrarmensajereservaexiste.addEventListener('click', function() {
                            mensajeError.style.display = "none";
                        });

                        var cancelarreserva = document.getElementById('divMensajeSiCancelar');
                        cancelarreserva.addEventListener('click', function() {
                            // Get the email and phone number from the form
                            var email = '<?php echo $email; ?>'; // Replace 'contact_email' with the actual ID of your email input field
                            var phone = <?php echo $phone; ?>; // Replace 'contact_phone' with the actual ID of your phone input field
                            var date = '<?php echo $date; ?>'; // Replace 'contact_phone' with the actual ID of your phone input field

                            // Create an object to store the data you want to send
                            var data = {
                                contact_email: email,
                                contact_phone: phone,
                                reservation_date: date

                            };

                            // Request to 'delete_reservation.php'
                            var xhr1 = new XMLHttpRequest();
                            xhr1.open('POST', 'delete_reservation.php', true);
                            xhr1.setRequestHeader('Content-Type', 'application/json');
                            xhr1.onreadystatechange = function() {
                                if (xhr1.readyState === 4 && xhr1.status === 200) {
                                    var response1 = xhr1.responseText;
                                    console.log('Response from delete_reservation.php:', response1);
                                    // You can perform additional actions here if needed
                                }
                            };
                            xhr1.send(JSON.stringify(data));

                            window.location.href = 'index.php';
                        });
                    });
                </script>

<?php
            }
        }
    }
}
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
    <script>
        // Function to format the date in ish
        function formatishDate() {
            const inputDate = document.getElementById("reservation_date").value;
            if (inputDate) {
                const date = new Date(inputDate);
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                };
                const formattedDate = date.toLocaleDateString('es-ES', options);
                document.getElementById("formatted_date").textContent = formattedDate;
            }
        }
    </script>
    <title>Reservas</title>
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

    <div class="wrapper">
        <div class="leftdecoration">
            <img src="images/hojas/hoja-3-izq.png" class="hoja-1-izq-postres" alt="hojas_villa-carmen" />
            <img src="images/hojas/hoja-1-izq.png" class="hoja-2-izq-postres" alt="hojas_villa-carmen" />
            <img src="images/hojas/hoja-5-izq.png" class="hoja-3-izq-postres" alt="hojas_villa-carmen" />
            <!-- <img src="images/hojas/hoja-6-izq.png" class="hoja-6-izq-hidden" alt="hojas_villa-carmen"> -->
            <!-- <img src="images/hojas/hoja-2-izq.png" class="hoja-2-izq" alt="hojas_villa-carmen"> -->
            <!-- <img src="images/hojas/hoja-4-izq.png" class="hoja-4-izq-hidden" alt="hojas_villa-carmen"> -->
        </div>


        <div class="container-reservas">
            <div class="tituloReservas">
                <h2>HAZ TU RESERVA</h2>
            </div>


            <div id="divnodisponibilidad">

            </div>
            <div class="mensajefechaanterior" id="mensajefechaanterior">

            </div>
            <div class="formReservas">

                <form method="POST" id="myForm" action="">
                    <label for="reservation_date">Fecha</label>
                    <input type="date" id="reservation_date" name="reservation_date" class="fecha_reserva"><br>



                    <label for="customer_name">Nombre y apellidos</label>
                    <input type="text" name="customer_name" required><br>

                    <label for="contact_email">Email</label>
                    <input type="email" name="contact_email" id="contact_email" required><br>

                    <label for="contact_phone">Teléfono</label>
                    <input type="tel" name="contact_phone" pattern="[0-9]{9}" id="contact_phone" required><br>

                    <label for="reservation_time">Hora</label>
                    <select name="reservation_time" required>

                    </select>

                    <script>
                        const reservationDateInput = document.getElementById("reservation_date");
                        const timeSection = document.getElementById("timeSection");

                        reservationDateInput.addEventListener("change", function() {
                            const selectedDate = new Date(this.value);
                            const dayOfWeek = selectedDate.getDay();

                            if (dayOfWeek === 1 || dayOfWeek === 2) { // Monday (1) or Tuesday (2)
                                timeSection.innerHTML = '<label for="reservation_time">Hora</label><input type="text" name="reservation_time" value="Cerrado" readonly>';
                            } else {
                                timeSection.innerHTML = '<label for="reservation_time">Hora</label><select name="reservation_time" required><option value="13:30">13:30</option><option value="14:00">14:00</option><option value="14:30">14:30</option><option value="15:00">15:00</option></select>';
                            }
                        });
                    </script>
                    <script>
                        // Function to update the time options based on the selected date
                        document.getElementById("reservation_date").addEventListener("change", function() {
                            const selectedDate = new Date(this.value);
                            const dayOfWeek = selectedDate.getDay(); // 0 for Sunday, 1 for Monday, etc.

                            // Get the time select element
                            const timeSelect = document.getElementsByName("reservation_time")[0];

                            // Clear existing options
                            timeSelect.innerHTML = "";

                            if (dayOfWeek === 1 || dayOfWeek === 2) {
                                const optionElement = document.createElement("option");
                                optionElement.value = "Closed";
                                optionElement.textContent = "Closed";
                                timeSelect.appendChild(optionElement);


                            } else {
                                const defaultOptions = ["13:30", "14:00", "14:30", "15:00"];
                                for (const option of defaultOptions) {
                                    const optionElement = document.createElement("option");
                                    optionElement.value = option;
                                    optionElement.textContent = option;
                                    timeSelect.appendChild(optionElement);
                                }
                            }


                            // Add additional options for Friday (5) and Saturday (6)
                            if (dayOfWeek === 5 || dayOfWeek === 6) { // Friday or Saturday
                                const additionalOptions = ["20:30", "21:00", "21:30", "22:00"];
                                for (const option of additionalOptions) {
                                    const optionElement = document.createElement("option");
                                    optionElement.value = option;
                                    optionElement.textContent = option;
                                    timeSelect.appendChild(optionElement);
                                }
                            }
                        });
                    </script>


                    <br><label for="party_size">Personas</label>
                    <select name="party_size" id="party_size" required>
                        <option value="1">1 persona</option>
                        <option value="2">2 personas</option>
                        <option value="3">3 personas</option>
                        <option value="4">4 personas</option>
                        <option value="5">5 personas</option>
                        <option value="6">6 personas</option>
                        <option value="7">7 personas</option>
                        <option value="8">8 personas</option>
                        <option value="9">9 personas</option>
                        <option value="10">10 personas</option>
                        <option value="11">11 personas</option>
                        <option value="12">12 personas</option>
                        <option value="13">13 personas</option>
                        <option value="14">14 personas</option>
                        <option value="15">15 personas</option>
                    </select><br>

                    <label for="commentary" class="comentarioInputTextReservas">Si desea algún arroz, por favor escriba el tipo de arroz y el número de raciones:</label>
                    <textarea name="commentary" class="inputTextReservas" rows="2" data-min-rows="1"></textarea>

                    <button type="submit" id="reservar_button">RESERVAR</button>
                </form>
            </div>
        </div>

        <!-- <script>
            function checkCommentary() {
                var commentary = document.getElementsByName("commentary")[0];
                if (commentary.value.trim() === "") {
                    commentary.value = "-";
                }
            }
        </script> -->

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