
<?php
    // SMTP ->Simple Mail Transfer Protocol
    require 'phpmailer/PHPMailerAutoload.php';//eshte sikurse include,window.open,a href etj...
    $mail = new PHPMailer;
    $mail ->isSMTP();
    
    $mail ->Host = 'smtp.gmail.com'; //hosti default
    $mail ->Port=587; //porti standart te siguris tls
    $mail ->SMTPAuth = true;//lejim per dergim
    $mail ->SMTPSecure = 'tls';//lloji i siguris(tls->Transport Layer Security ->Protocol),SSL (Secure Sockets Layer) 
    //e.g."tls://smtp1.example.com:587;ssl://smtp2.example.com:465").
    
    $mail ->Username = 'kebircesko@gmail.com';// prej nga do te dergoj
    $mail ->Password ='kugg wlrw uvkw jeeh';//fjalekalimi i aplikacionit te gmail
    $mail ->setFrom('kebircesko@gmail.com','KebirCesko'); // hosti si dhe nje titull
    $mail ->addAddress('semitaraa.1@gmail.com'); //kush do te pranoje emailin
    $mail ->addReplyTo('kebircesko@gmail.com'); //lejim per replyTo
    
    $mail ->isHTML(true); // nese ka pjese te HTML
    $mail ->Subject = 'PHP Mailer Subject';
    $mail ->Body = '<h1> Pershendetje!, Kebir Cesko</h1>';
    
    if(!$mail->send()){
        echo "Messages Could not be send!";
        echo 'Error: '. $mail->ErrorInfo;
    }
    else{
    
        echo "Message has been send!";
}

?>