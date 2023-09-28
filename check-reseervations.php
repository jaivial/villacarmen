<?php
require('conectaVILLACARMEN.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Query the database for reservations within 24 hours of the current date
$currentDateTime = date('Y-m-d H:i:s');
$query = "SELECT * FROM bookings WHERE CONCAT(reservation_date, ' ', reservation_time) >= NOW() AND CONCAT(reservation_date, ' ', reservation_time) <= DATE_ADD(NOW(), INTERVAL 24 HOUR);";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    // Include necessary libraries and setup email configuration here

    while ($row = $result->fetch_assoc()) {
        $token = uniqid();

        // Store the token in the database
        $reservationId = $row['id']; // Assuming 'id' is the unique identifier for reservations
        $updateQuery = "UPDATE bookings SET re_confirmation_token = '$token' WHERE id = $reservationId";
        $mysqli->query($updateQuery);

        // Extract reservation details from the row
        $name = $row['customer_name'];
        $email = $row['contact_email'];
        $date = $row['reservation_date'];
        $time = $row['reservation_time'];
        $partySize = $row['party_size'];
        $phone = $row['contact_phone'];

        $reConfirmationLink = "http://localhost/villacarmen/reconfirm.php?token=$token";

        $message = '<html>

        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <style>
                body {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                }
        
                .logocontaineremail {
                    width: 200px;
                    background-color: green;
                }
        
                .logocontaineremail img {
                    width: 100%;
                }
        
                .containertituloemail {
                    background-color: red;
                }
        
                .containerinforeserva {
                    background-color: yellow;
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
        
                .containerdespedidaemail a {
                    margin: 15px 0;
                    text-decoration: none;
                    color: black;
                }
        
                .wrapperemail {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    width: 100%;
                    background-image: url("data:image/jpeg;base64,' . $backgroundImageData . '");
                    background-repeat: no-repeat;
                    background-position: top;
                    background-size: cover;
                }
            </style>
        </head>
        
        <body>
            <div class="wrapperemail">
        
        
                <div class="logocontaineremail">
                <p><img src="data:image/jpeg;base64,' . $imageData . '" alt="Logo"></p>
                </div>
                <div class="containertituloemail">
                    <p>Esto es una reconfirmaci&oacute de su reserva en Alqueria Villa Carmen</p>
                </div>
        
                <div class="containerinforeserva">
                    <p>Nombre: ' . $name . '</p>
                    <p>Fecha: ' . $date . '</p>
                    <p>Hora: ' . $time . '</p>
                    <p>N&uacute;mero de personas: ' . $partySize . '</p>
                    <p>Email: ' . $email . '</p>
                    <p>Tel&eacute;fono: ' . $phone . '</p>
                </div>
        
                <div class="containerdespedidaemail">
                    <p>Por favor reconfirme su reserva accediendo al siguiente enlace:' . $reConfirmationLink . '</p>
                    <br>

                    <p>¡GRACIAS POR ELEGIR ALQUERIA VILLA CARMEN!</p>
                    
                    <a href="https://www.alqueriavillacarmen.com">www.alqueriavillacarmen.com</a>
        
                    <p><a href="mailto:reservas@alqueriavillacarmen">reservas@alqueriavillacarmen</a></p>
        
                    <p>Calle Sequía Rascanya, 2</p>
                    <p>46470 Catarroja, Valencia</p><br>
                   
                    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var cancelarButton = document.getElementById("cancelarbutton");
        cancelarButton.addEventListener("click", function() {
            // Get the email and phone number from the form
            var email = "<?php echo $email; ?>"; // Replace "contact_email" with the actual ID of your email input field
            var phone = <?php echo $phone; ?>; // Replace "contact_phone" with the actual ID of your phone input field
            var date = "<?php echo $date; ?>"; // Replace "contact_phone" with the actual ID of your phone input field

            // Create an object to store the data you want to send
            var data = {
                contact_email: email,
                contact_phone: phone,
                reservation_date: date
            };

            // Request to "delete_reservation.php"
            var xhr1 = new XMLHttpRequest();
            xhr1.open("POST", "delete_reservation.php", true);
            xhr1.setRequestHeader("Content-Type", "application/json");
            xhr1.onreadystatechange = function() {
                if (xhr1.readyState === 4 && xhr1.status === 200) {
                    var response1 = xhr1.responseText;
                    console.log("Response from delete_reservation.php:", response1);
                    // You can perform additional actions here if needed
                }
            };
            xhr1.send(JSON.stringify(data));

        });
    });
</script>

                </div>
            </div>
        
        </body>
        
        </html>';



        require 'vendor/autoload.php';

        //* * * * * /usr/local/bin/php /Applications/XAMPP/xamppfiles/htdocs/villacarmen/check-reseervations.php


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
            echo "Email sent successfully to both recipients.";
        } else {
            echo "Error sending email: " . $mail->ErrorInfo;
        }
    }
} else {
    echo "No reservations found for re-confirmation.\n";
}

// Close the database connection
$mysqli->close();


$reConfirmationLink = "http://localhost/villacarmen/reconfirm.php?token=$token";
$message .= "Please confirm your attendance by clicking on the following link: $reConfirmationLink\n\n";
$message .= "Thank you for choosing Alqueria Villa Carmen!";
