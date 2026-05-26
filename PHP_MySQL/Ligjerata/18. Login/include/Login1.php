<?php

$connect = mysqli_connect('localhost','root','','login1');

if (!$connect) {
    die("Database connection failed");
}

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Kontroll për inpute të zbrazëta
    if (empty($username) || empty($password)) {

        $_SESSION['error'] = "Username ose Password janë të zbrazëta!";
        header("Location: Login.php");
        exit();
    }

    // Query (versioni yt, pa ndryshuar logjikën)
    $login = "SELECT * FROM admin_login 
              WHERE username='$username' AND password='$password'";

    $con = mysqli_query($connect, $login);

    if (mysqli_num_rows($con) > 0) {

        $_SESSION['username'] = $username;
        $_SESSION['success'] = "Login u krye me sukses!";

        header("Location: admin.php");
        exit();

    } else {

        $_SESSION['error'] = "Username ose Password janë gabim ose nuk ekzistojnë!";
        header("Location: Login.php");
        exit();
    }
}
?>
