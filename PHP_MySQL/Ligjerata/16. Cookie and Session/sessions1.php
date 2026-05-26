<?php
session_start();
?>
<html>
<head>
    <title>Faqja tjetër</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 60px; }
        a { color: white; background: #28a745; padding: 10px 20px; border-radius: 8px; text-decoration: none; }
        a:hover { background: #1e7e34; }
    </style>
</head>
<body>
    <?php
    if (isset($_SESSION['emri'])) {
        echo "<h2>Përshëndetje përsëri, ".$_SESSION['emri']." ".$_SESSION['mbiemri']."!</h2>";
        echo "<p>Të dhënat tuaja u ruajtën në sesion dhe kaluan me sukses në këtë faqe.</p>";
    } else {
        echo "<h2>Nuk ka sesion aktiv. Kthehu në faqen e parë për ta krijuar.</h2>";
    }
    ?>
    <br>
    <a href="logout.php">Dil nga sesioni</a>
</body>
</html>
