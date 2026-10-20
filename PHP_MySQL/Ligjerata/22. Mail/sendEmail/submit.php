<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
$mail = new PHPMailer;                              // Passing `true` enables exceptions

if (isset($_POST['submit'])) {
    $emailinp = $_POST['email'];
    $subjectinp = $_POST['subject'];
    $messageinp = $_POST['message'];
}

    //Server settings
	$mail->SMTPDebug = 4; 
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'arianittershnjaku@gmail.com';                 // SMTP username
    $mail->Password = 'tershnjakuira123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('arianittershnjaku@gmail.com', 'gmail');
    $mail->addAddress($emailinp); 
    $mail->addReplyTo('arianittershnjaku@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subjectinp ;

	$mailContent = '
<h2>Eri</h2>
<p>Eri</p>
<p>Eri</p>';

    $mail->Body    = $mailContent ;

if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Error: '. $mail->ErrorInfo;
}else{
	echo 'Message has been sent';
}	

?>