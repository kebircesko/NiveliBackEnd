<?php
// Importon klasën që krijon dhe dërgon emailin.
use PHPMailer\PHPMailer\PHPMailer;
// Importon klasën për gabimet e PHPMailer.
use PHPMailer\PHPMailer\Exception;
// Ngarkon skedarin e klasës së gabimeve.
require 'PHPMailer/src/Exception.php';
// Ngarkon bibliotekën kryesore për email.
require 'PHPMailer/src/PHPMailer.php';
// Ngarkon klasën për komunikimin me serverin SMTP.
require 'PHPMailer/src/SMTP.php';
// Krijon objektin që do të dërgojë emailin.
$mail = new PHPMailer;
// Kontrollon nëse është shtypur butoni i dërgimit.
if (isset($_POST['submit'])) {
    // Merr emailin e pranuesit nga forma.
    $email = $_POST['email'];
    // Merr titullin e emailit nga forma.
    $subject = $_POST['subject'];
    // Merr mesazhin nga forma.
    $message = $_POST['message'];
}
    // Cakton emailin e dërguesit për hyrje në Gmail.
    $smtpUsername = 'kebircesko@gmail.com';
    // Cakton fjalëkalimin e aplikacionit Gmail për hyrje.
    $smtpPassword = 'kugg wlrw uvkw jeeh';
    // Kontrollon nëse mungojnë të dhënat për lidhjen SMTP.
    if (!$smtpUsername || !$smtpPassword) {
        // Kthen statusin HTTP 500 për gabim në server.
        http_response_code(500);
        // Ndalon kodin dhe tregon se mungon konfigurimi.
        exit('SMTP credentials are not configured on the server.');
    }
	// Çaktivizon shfaqjen e detajeve të komunikimit SMTP.
	$mail->SMTPDebug = 0;
	// Përdor SMTP për dërgimin e emailit.
	$mail->isSMTP();
	// Cakton serverin SMTP të Gmail.
	$mail->Host = 'smtp.gmail.com';
    // Aktivizon hyrjen me email dhe fjalëkalim.
    $mail->SMTPAuth = true;
    // Cakton emailin për hyrje në SMTP.
    $mail->Username = $smtpUsername;
    // Cakton fjalëkalimin për hyrje në SMTP.
    $mail->Password = $smtpPassword;
    // Përdor TLS për ta enkriptuar lidhjen.
    $mail->SMTPSecure = 'tls';
    // Cakton portën SMTP për lidhjen me TLS.
    $mail->Port = 587;
    // Cakton emailin dhe emrin e dërguesit.
    $mail->setFrom($smtpUsername, 'Gmail');
    // Cakton pranuesin e emailit.
    $mail->addAddress($email);
    // Cakton adresën ku shkojnë përgjigjet.
    $mail->addReplyTo($smtpUsername);
    // Lejon përmbajtje HTML brenda mesazhit.
    $mail->isHTML(true);
    // Cakton titullin e emailit.
    $mail->Subject = $subject ;
	// Ruan tekstin e mesazhit në një variabël.
	$mailContent = $message;
    // Cakton përmbajtjen e emailit.
    $mail->Body    = $mailContent;
// Provon dërgimin dhe kontrollon nëse dështon.
if(!$mail->send()){
    // Shfaq njoftimin se emaili nuk u dërgua.
    echo 'Message could not be sent.';
    // Regjistron detajet e gabimit në logun e serverit.
    error_log('PHPMailer error: ' . $mail->ErrorInfo);
// Ekzekutohet kur emaili dërgohet me sukses.
}else{
	// Shfaq njoftimin për dërgim të suksesshëm.
	echo 'Message has been sent';
}
?>