<?php
session_start();

// Initialize variables
$email = "";
$errors = array();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "om3");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Include Composer autoload file
require 'vendor/autoload.php';

// Use PHPMailer namespaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Invalid email format");
    }

    $query = "SELECT * FROM emailcontacts WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['email'] === $email) {
            array_push($errors, "This email already exists");
        }
    }

    if (count($errors) == 0) {
        $regist = "INSERT INTO emailcontacts (email) VALUES ('$email')";

        if (mysqli_query($conn, $regist)) {
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'om3.company@gmail.com'; // Your Gmail address
                $mail->Password = 'nwew udja owzx dnfh'; // Your App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Enable debug output
                $mail->SMTPDebug = 2; // Enable verbose debug output

                //Recipients
                $mail->setFrom('om3.company@gmail.com', 'OM3-Company');
                $mail->addAddress($email);

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Email Confirmation from OM3-Company';
                $mail->Body    = '
                <html>
                <head>
                    <meta charset="UTF-8">
                </head>
                <body>
                    <p style="font-size: 18px; font-weight: bold; margin-top: 20px;">Shqip:</p>
                    <p style="font-size: 16px; margin-bottom: 10px;">Emaili juaj është konfirmuar! Ne do të përpiqemi të kontaktojmë me ju brenda 24 orëve. Nëse kjo nuk ndodh, na kontaktoni në numrin +49 176 80270786.</p>
                    
                    <p style="font-size: 18px; font-weight: bold; margin-top: 20px;">English:</p>
                    <p style="font-size: 16px; margin-bottom: 10px;">Your email has been confirmed! We will try to contact you again within 24 hours. If it doesn’t happen, text us at our number +49 176 80270786.</p>
                    
                    <p style="font-size: 18px; font-weight: bold; margin-top: 20px;">Deutsch:</p>
                    <p style="font-size: 16px; margin-bottom: 10px;">Ihre E-Mail wurde bestätigt! Wir werden versuchen, Sie innerhalb von 24 Stunden erneut zu kontaktieren. Falls dies nicht geschieht, schreiben Sie uns unter der Nummer +49 176 80270786.</p>
                </body>
                </html>
            ';

                $mail->send();
                echo "<script>alert('Your email has been confirmed');</script>";
                $_SESSION['email'] = $email;
                $_SESSION['success'] = "Your email has been sent successfully";
                header('Location: index.php');
                exit();
            } catch (Exception $e) {
                array_push($errors, "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
        } else {
            array_push($errors, "Error inserting email into database: " . mysqli_error($conn));
        }
    }
}

// Display errors if any
if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo "<div class='error'>$error</div>";
    }
}
?>
