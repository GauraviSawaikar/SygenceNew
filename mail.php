<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Require the PHPMailer library
require 'vendor/autoload.php';

if (isset($_POST['firstName'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $jobTitle = $_POST['jobTitle'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $countryRegion = $_POST['countryRegion'];
    $products = $_POST['products'];
    $message = $_POST['message'];

    $to = 'rama.shirodkar@bittint.com';  // PUT YOUR EMAIL ID
    $subject = 'Request a Call';
    $message_body = "First Name: $firstName<br>";
    $message_body .= "Last Name: $lastName<br>";
    $message_body .= "Job Title: $jobTitle<br>";
    $message_body .= "Email: $email<br>";
    $message_body .= "Phone: $phone<br>";
    $message_body .= "Country/Region: $countryRegion<br>";
    $message_body .= "Product of Interest: $products<br>";
    $message_body .= "Message: $message";

    $mail = new PHPMailer(true);

    try {
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->IsHTML(true);
        $mail->SMTPSecure = "ssl";
        $mail->Host = "smtp.zoho.in"; 
        $mail->Port = 465; 
        $mail->Username = 'rama.shirodkar@bittint.com'; 
        $mail->Password = 'Zrwk4ukdDux8'; 

        $mail->setFrom($to, $firstName); 
        $mail->addAddress($to);

        $mail->Subject = $subject;
        $mail->Body = $message_body;

        $mail->send();
        http_response_code(200); 
        echo "Email sent successfully.";
    } catch (Exception $e) {
        http_response_code(500);
        echo "Email sending failed. Error: {$mail->ErrorInfo}";
    }
} else {
    http_response_code(400); 
    echo "Invalid request.";
}
?>
