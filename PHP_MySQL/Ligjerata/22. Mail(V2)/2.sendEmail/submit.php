<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
// SMTP ->Simple Mail Transfer Protocol
/*Google Account → Security → Signing in to Google → 2-Step Verification → ON*/
//Pasi ta aktivizon 2FA Shko prap te Security Kliko App passwords Zgjedh:App: Mail Device: Other Kliko Generate
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Passing `true` enables exceptions
$mail = new PHPMailer;                              
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
}

    //Server settings
	$mail->SMTPDebug = 4;// Enable verbose debug output    
    // Set mailer to use SMTP
	$mail->isSMTP();                 
    // Specify main and backup SMTP servers
	$mail->Host = 'smtp.gmail.com';  
    // Enable SMTP authentication
    $mail->SMTPAuth = true;                               
    // SMTP username
    $mail->Username = 'kebircesko@gmail.com';                 
    // SMTP password
    $mail->Password = 'qpzkjfsbqgjrwclh';          
    // Enable TLS encryption, `ssl` also accepted
    // $mail->SMTPSecure = 'tls'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                          
    // TCP port to connect to 
    $mail->Port = 587;        
    //Recipients
    $mail->setFrom('kebircesko@gmail.com', 'Gmail');
    // Set email format to HTML
    $mail->addAddress($email); 
    $mail->addReplyTo('kebircesko@gmail.com');
    //Content
    $mail->isHTML(true);                                  
    $mail->Subject = $subject ;
	$mailContent = $message;
    $mail->Body    = $mailContent;

if(!$mail->send()){
    echo 'Message could not be sent.';
    echo 'Error: '. $mail->ErrorInfo;
}else{
	echo 'Message has been sent';
}	

?>