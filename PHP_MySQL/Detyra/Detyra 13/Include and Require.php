<html>
	<head>
		<style>
			.empty {color: red;}
		</style>
	</head>
	<body>
		<?php	
           
				require ('form.php')
        
           
				//include ('form.php');
				
		?>
		<form method="post" action="Include and Require.php">
			Username: <input type="text" name="username">
			<span class="empty">*<?php echo $empUsername;?></span><br><br>
			Password: <input type="password" name="password">
			<span class="empty">*<?php echo $empPassword;?></span><br><br>
			<input type="submit" value="Log in">
			<input type="reset" value="Cancel">
		</form>
		
		
		
	</body>
</html>