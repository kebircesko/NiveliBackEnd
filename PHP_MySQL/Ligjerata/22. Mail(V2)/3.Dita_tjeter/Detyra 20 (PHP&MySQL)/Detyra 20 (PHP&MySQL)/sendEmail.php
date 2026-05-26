<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['submit'])) {

    $name    = htmlspecialchars($_POST['name']);
    $email   = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'kebircesko@gmail.com';
        $mail->Password   = 'qpzkjfsbqgjrwclh'; // vendos app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('kebircesko@gmail.com', 'Contact Form');
        $mail->addAddress('kebircesko@gmail.com'); // ku don me ardh emaili
        $mail->addReplyTo($email, $name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "
            <h3>New Contact Message</h3>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong><br>$message</p>
        ";

        $mail->send();

        echo "<h3 style='color:green;text-align:center;margin-top:50px;'>Message has been sent successfully!</h3>";

    } catch (Exception $e) {

        echo "<h3 style='color:red;text-align:center;margin-top:50px;'>Message could not be sent.</h3>";
        echo "Error: {$mail->ErrorInfo}";
    }

} else {
    header("Location: index.php");
    exit();
}
