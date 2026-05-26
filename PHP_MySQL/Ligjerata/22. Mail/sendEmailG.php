<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie=edge">
        <title>Send File with Gmail</title>
        <link rel='stylesheet' href='style.css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="header">
            <h2>Send File with Gmail</h2>
        </div>
        <form method="post" action="sendEmailG.php" enctype="multipart/form-data">
            <div class="input-group">
                <label>Send to:</label>
                <input type="text" name="sendTo" >
            </div>
            <div class="input-group">
                <label>Subject:</label>
                <input type="text" name="subject" >
            </div>
            <div class="input-group">
                <label>Message:</label>
                <textarea name="message"></textarea>
            </div>
            <div class="input-group">
                <label>File Upload:</label>
                <input type="file" name="fileUpload">
            </div>
            <div class="input-group">
                <input type="submit" value="Send" class="btn" name="send">
            </div>
        </form>
        <script>
            function topnav() 
            {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") 
                {
                    x.className += " responsive";
                } else 
                {
                    x.className = "topnav";
                }
            }
        </script>
    </body>
</html>
<?php
    if (isset($_POST['send']))
    {
        require "php-mailer-master/PHPMailerAutoload.php";
        
        $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                       
$sender = 'arianit.shd@outlook.com';

$mail->isSMTP(); // Set mailer to use SMTP
        
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = $sender;                 // SMTP username
$mail->Password = '044494134ira';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('$sender', 'Mailer');
     // Add a recipient
$mail->addAddress($_POST['sendTo']);               // Name is optional
$fileName = $_FILES['fileUpload'] ['name'];
move_uploaded_file($_FILES['fileUpload'] ['tmp_name'], "file/$fileName");

$mail->addAttachment($fileName);         // Add attachments
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_POST['subject'];
$mail->Body    = $_POST['message'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
    }
?>