<html>
	<head>
		<style>
			.empty {color: red;}
		</style>
	</head>
	<body>
		<?php
			$empUsername = "";			
			$empEmail ="";
		
		function secure($x) {
			$x = htmlspecialchars($x); 
			$x = trim($x);	
			$x = stripslashes($x);
			return $x;
		}
		?>
		<p><span class="empty">* Required</span></p>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			Username: <input type="text" name="username">
			<span class="empty">*<?php echo $empUsername;?></span><br><br>
			Email: <input type="email" name="email">
			<span class="empty">*<?php echo $empEmail;?></span><br><br>
			<input type="submit" value="Log in">
			<input type="reset" value="Cancel">
		</form>
		
		<?php
			echo $username;
			echo "<br>";
			echo $email;
		?>
		
		
	</body>
</html>