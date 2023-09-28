<?php
require('conectaVILLACARMEN.php');

// Get the JSON data from the POST request
$data = json_decode(file_get_contents("php://input"));

if (!empty($data->contact_email) || !empty($data->contact_phone)) {
    // Prepare and execute the SQL query to delete the reservation
    $email = $data->contact_email;
    $phone = $data->contact_phone;
    $date = $data->reservation_date;

    global $mysqli; // Use the global $mysqli variable

    $eliminaQuery = "DELETE FROM bookings WHERE (contact_email = '$email' OR contact_phone = '$phone') AND reservation_date = '$date'";
    if ($mysqli->query($eliminaQuery)) {
        // Reservation successful, send emails
        echo "Reservation DELTED.";
        $mysqli->close();
        header("Location: reservas.php");
       
    } else {
        echo "Error inserting reservation: " . $mysqli->error;
    }

  
} else {
    // Handle the case where both email and phone are empty or not provided
    echo "Email or phone number not provided.";
}

?>
