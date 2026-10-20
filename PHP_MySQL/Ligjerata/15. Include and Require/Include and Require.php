<html>
	<head>
		<style>
			.empty {color: red;}
		</style>
	</head>
	<body>
		<?php	
            //Require prodhon një gabim fatal (E_COMPILE_ERROR) dhe ndalon skenarin.
				//require ('include/form1.php')
        
            //Include prodhon vetëm një paralajmërim (E_WARNING) dhe skenari vazhdon ekzekutimin.
				include ('include/form.php');
				
				//echo 'forma e pare';
		?>
		<form method="post" action="Include and Require.php">
			Username: <input type="text" name="Username">
			<span class="empty">*<?php echo $empUsername;?></span><br><br>
			Password: <input type="password" name="Password">
			<span class="empty">*<?php echo $empPassword;?></span><br><br>
			<input type="submit" value="Log in">
			<input type="reset" value="Cancel">
		</form>
		
		
		
	</body>
</html>