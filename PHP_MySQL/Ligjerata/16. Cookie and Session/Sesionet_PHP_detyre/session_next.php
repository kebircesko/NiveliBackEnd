<?php
session_start();
if (!isset($_SESSION["emri"])) {
    header("Location:session_start.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Mirësevini</title>
    <style>
        body {
            background: #e9ebee;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        h2 { color: #1877f2; }
        a {
            background: #1877f2;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
        }
        a:hover { background: #0d47a1; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Mirësevini, <?php echo htmlspecialchars($_SESSION["emri"]); ?> 👋</h2>
        <p>Keni hyrë me sukses në Mini Facebook!</p>
        <a href="session_destroy.php">Çkyçu</a>
    </div>
</body>
</html>
