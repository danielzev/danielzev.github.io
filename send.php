<?php

$name       = $_POST['name'];
$email      = $_POST['email'];
$subject    = $_POST['subject'];
$message    = $_POST['message'];

$to         = 'danielzev@gmail.com';
$subject    = 'Message from danielzev.com - ' . $subject;
$body       = 'Name: ' . $name . '<br />Email: ' . $email . '<br /><br />' . $message;

// To send HTML mail, the Content-type header must be set
$headers    = 'MIME-Version: 1.0' . "\r\n";
$headers   .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers   .= 'From: hello@danielzev.com' . "\r\n";


if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    mail($to, $subject, $body, $headers);
    $data['message'] = 'Woohoo! Your inquiry was sent.';
    $data['success'] = true;
} else {
    $data['message'] = 'Doh! Please provide a valid email address.';
    $data['success'] = false;
}

echo json_encode($data);

?>
