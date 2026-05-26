<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = trim($_POST["emri"]);
    if (!empty($emri)) {
        $_SESSION["emri"] = $emri;
        header("Location: session_next.php");
        exit();
    } else {
        $error = "Ju lutem shkruani emrin tuaj!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login - Mini Facebook</title>
    <style>
        body {
            background: linear-gradient(135deg, #1877f2, #42a5f5);
            font-family: Arial, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #fff;
        }
        .box {
            background: white;
            color: black;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            width: 300px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        input[type=text] {
            width: 80%;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
        }
        input[type=submit] {
            background: #1877f2;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background: #0d47a1;
        }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Mini Facebook Login</h2>
        <form method="POST">
            <?php if (!empty($error)) echo "<div class='error'>$error</div>"; ?>
            <input type="text" name="emri" placeholder="Shkruaj emrin tuaj"><br>
            <input type="submit" value="Kyçu">
        </form>
    </div>
</body>
</html>
