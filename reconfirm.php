<?php
require('conectaVILLACARMEN.php');

// Retrieve the token from the URL
$token = $_GET['token'];

// Check if a reservation with the token exists in the database
$checkQuery = "SELECT id FROM bookings WHERE re_confirmation_token = '$token'";
$result = $mysqli->query($checkQuery);

if ($result->num_rows > 0) {
    // Reservation found, update the 're-confirmation' column
    $row = $result->fetch_assoc();
    $reservationId = $row['id'];
    $updateQuery = "UPDATE bookings SET re_confirmation = true WHERE id = $reservationId";
    $mysqli->query($updateQuery);

    // Display confirmation message
    echo "Re-confirmation successful. See you soon!";
} else {
    // Invalid or expired token
    echo "Invalid or expired token.";
}

// Close the database connection
$mysqli->close();
?>
