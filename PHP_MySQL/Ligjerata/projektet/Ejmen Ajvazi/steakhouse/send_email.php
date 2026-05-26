<?php
session_start();
require_once 'PHPMailer-master/src/Exception.php';
require_once 'PHPMailer-master/src/PHPMailer.php';
require_once 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    $mail = new PHPMailer(true);
    
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'ejmenajvazi@gmail.com';
        $mail->Password   = 'jyss enrs jvvk yxiy';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;
        
        $mail->setFrom('ejmenajvazi@gmail.com', 'EA Steakhouse Website');
        $mail->addAddress('ejmenajvazi@gmail.com', 'Admin');
        $mail->addReplyTo($email, $name);
        
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { padding: 20px; background: #f4f4f4; }
                    .header { background: #ffc527; padding: 10px; color: #060614; }
                    .content { background: white; padding: 20px; margin-top: 10px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>New Contact Message from EA Steakhouse</h2>
                    </div>
                    <div class='content'>
                        <p><strong>Name:</strong> $name</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>Subject:</strong> $subject</p>
                        <p><strong>Message:</strong></p>
                        <p>" . nl2br(htmlspecialchars($message)) . "</p>
                    </div>
                </div>
            </body>
            </html>
        ";
        $mail->AltBody = "Name: $name\nEmail: $email\nSubject: $subject\nMessage: $message";
        
        $mail->send();
        $_SESSION['email_status'] = 'success';
        $_SESSION['email_message'] = 'Thank you for contacting us! We will reply within 24 hours.';
        
    } catch(Exception $e) {
        $_SESSION['email_status'] = 'error';
        $_SESSION['email_message'] = "Message could not be sent. Error: " . $mail->ErrorInfo;
    }
    
    header('Location: contact.php');
    exit();
} else {
    header('Location: contact.php');
    exit();
}
?>