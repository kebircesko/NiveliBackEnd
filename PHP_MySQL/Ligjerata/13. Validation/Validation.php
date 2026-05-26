<!DOCTYPE HTML> 
<html>
	<head>
	</head>
	<body>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			Username: <input type="text" name="Username"><br><br>
			Password: <input type="password" name="Password"><br><br>
			<input type="submit" value="Log in">
			<input type="reset" value="Cancel">
		</form>
		<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$username =secure($_POST['Username']);
			$password =secure($_POST['Password']);
			if(empty($username)&&empty($password))
			{
				echo 'Username and Password is empty';
			}
		
			else if($username === 'admin' && $password === 'admin123')
			{
				echo 'Correct! <br> You are welcome!';
			}
			// else if(!preg_match("/^[a-zA-ZëË ]*$/", $username) || !preg_match("/^[a-zA-ZëË ]*$/", $password)) 
			// {
    		// 	echo 'Correct! <br> You are welcome!';
			// }
			else
			{
				echo 'Username and Password is incorrect!';
			}
		}
		function secure($x) {
			$x = htmlspecialchars($x); //Ky funksion mundeson qe karakteret speciale te i konverton ne karaktere te HTML
			$x = trim($x);	//Ky funksion largon karakteret e panevojshme si (extra space, tab, newline etj), nga te dhenat hyrse te perdoruesit.
			$x = stripslashes($x);	//Ky funksion largon karakterin "\"(backslash).
			return $x;
		}
		?>
	</body>
</html>