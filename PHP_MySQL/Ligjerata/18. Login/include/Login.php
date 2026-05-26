<?php
    session_start();
    include('Login1.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css" media="all">
<style>

</style>
</head>

<body>

    <div class="login-box">
    <h2>Login</h2>

    <!-- ===== PHP ALERTS ===== -->
    <?php if(isset($_SESSION['error'])){ ?>
        <div class="alert alert-error">
            <i class="fa fa-circle-xmark"></i>
            <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
        </div>
    <?php } ?>

    <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success">
            <i class="fa fa-circle-check"></i>
            <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
        </div>
    <?php } ?>

    <form method="post" action="Login.php" onsubmit="showLoading()">

        <div class="input-group">
            <i class="fa fa-user input-icon"></i>
            <input type="text" name="username" placeholder="Username" required>
        </div>

      <div class="input-group">
        <i class="fa fa-lock input-icon"></i>
        <input type="password" id="password" name="password" placeholder="Password" required>
        <button type="button" class="toggle-password">
            <i class="fa fa-eye"></i>
        </button>
    </div>

        <button type="submit" name="login" class="login-btn">Log in</button>

        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>Logging in...</p>
        </div>

    </form>
    </div>

    <script src="script.js"></script>
</body>
</html>
