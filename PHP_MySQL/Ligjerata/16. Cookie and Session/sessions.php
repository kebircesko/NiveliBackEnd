<!--Sesioni PHP përdoret për të ruajtur dhe kaluar informacione nga një faqe në tjetrën përkohësisht (derisa përdoruesi të mbyllë faqen e internetit).
Ndryshe nga një cookie, informacioni nuk ruhet në kompjuterin e përdoruesve.
Sesioni PHP krijon ID unike të përdoruesit për secilin shfletues për të njohur përdoruesin dhe për të shmangur konfliktin midis shfletuesve të shumtë.-->
<?php
// Duhet gjithmonë në fillim të file
session_start();

// Ruajmë të dhëna në sesion
$_SESSION['emri'] = "Kebir";
$_SESSION['mbiemri'] = "Çesko";
// Numërojmë sa herë është rifreskuar faqja
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 1;
} else {
    $_SESSION['count']++;
}
?>
<html>
<head>
    <title>Shembull me Session në PHP</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 60px; }
        a { color: white; background: #007bff; padding: 10px 20px; border-radius: 8px; text-decoration: none; }
        a:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h2>Mirësevini, <?php echo $_SESSION['emri'] . " " . $_SESSION['mbiemri']; ?>!</h2>
    <p>Kjo është hera e <?php echo $_SESSION['count']; ?> që rifreskoni faqen.</p>
    <p>Informacioni ruhet në sesionin e serverit, jo në kompjuterin tuaj.</p>
    <a href="sessions1.php">Kalo në faqen tjetër</a>
</body>
</html>
