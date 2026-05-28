<!DOCTYPE html>
<html>
	<head>
		<title>Include and Require</title>

		<link rel="stylesheet" type="text/css" href="style.css">
	</head>

	<body>

			<?php	
				// Require prodhon gabim fatal dhe ndalon ekzekutimin
				// require ('include/form1.php');

				// Include prodhon vetëm warning dhe vazhdon ekzekutimin
				// include ('include/form1.php');

				include ('include/form.php');
			?>

		<div class="container">

			<h2>Login Form</h2>

			<?php echo $message; ?>

			<form method="POST" id="loginForm">

				<label>Username</label>
				<input type="text" name="Username" id="username">
				<span class="empty"><?php echo $empUsername; ?></span>

				<label>Password</label>
				<input type="password" name="Password" id="password">
				<span class="empty"><?php echo $empPassword; ?></span>

				<div class="buttons">
					<input type="submit" value="Log in">
					<input type="reset" value="Cancel">
				</div>

			</form>

		</div>

		<script src="main.js"></script>

	</body>
</html>