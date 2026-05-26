<?php

session_start();
require_once 'database.php';

if(isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: admin.php');
    exit();
}

$error = '';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();
    
    if($user && password_verify($password, $user['password'])) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $user['username'];
        header('Location: admin.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - EA Steakhouse</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="navpc">
    <img src="./images/logo.png" id="logopc" alt=""/>
    <ul>
        <a href="index.php"><li>Home</li></a>
        <a href="menu.php"><li>Menu</li></a>
        <a href="about.html"><li>About</li></a>
        <a href="contact.php"><li id="last">Contact</li></a>
        <a href="book.html"><button class="primary">Book a table</button></a>
    </ul>
</div>

<div class="hero" style="height: 100vh;">
    <h1 data-aos="fade-down">ADMIN LOGIN</h1>
    <div class="contactform">
        <?php if($error): ?>
            <p style="color: black; background: white; padding: 10px; border-radius: 5px;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="primary">Login</button>
        </form>
    </div>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>