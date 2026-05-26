<?php
session_start();
session_unset(); // Fshin të gjitha variablat
session_destroy(); // Shkatërron sesionin
?>
<html>
<head>
    <title>Dalja nga sesioni</title>
    <style>
        body { font-family: Arial; text-align: center; margin-top: 60px; }
        a { color: white; background: #007bff; padding: 10px 20px; border-radius: 8px; text-decoration: none; }
    </style>
</head>
<body>
    <h2>U larguat me sukses nga sesioni.</h2>
    <a href="sessions.php">Kthehu në faqen e parë</a>
</body>
</html>
