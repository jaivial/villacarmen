<?php
// Your WhatsApp Business API credentials and settings
$clientId = 'your_client_id';
$clientSecret = 'your_client_secret';
$phoneNumber = 'whatsapp:+1234567890'; // Recipient's WhatsApp number

// Message content
$message = 'Your reservation has been successfully booked. We look forward to serving you!';

// Create an HTTP POST request to send the message
$url = 'https://api.whatsapp.com/v1/messages';
$data = [
    'to' => $phoneNumber,
    'template' => 'your_approved_template_name',
    'parameters' => ['body' => $message],
];

$options = [
    'http' => [
        'method' => 'POST',
        'header' => "Authorization: Basic " . base64_encode("$clientId:$clientSecret") . "\r\n" .
                    "Content-Type: application/json\r\n",
        'content' => json_encode($data),
    ],
];

$context = stream_context_create($options);
$response = file_get_contents($url, false, $context);

if ($response) {
    echo "Reservation successful. WhatsApp notification sent!";
} else {
    echo "Failed to send WhatsApp notification.";
}
?>
