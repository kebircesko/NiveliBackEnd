 <?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$a = $_POST['Username'];
		
		$b = $_POST['Password'];

		if(empty($a) and empty($b))
		{
			echo '<script>alert("Username or Password is empty")</script>';
		}
		else if($a === 'admin' and $b === 'admin123')//or,and
		{
			echo "<script>window.open('login1.php','_self')</script>";//window.open->hap një dritare të re të shfletuesit, ose një skedë të re, në varësi të cilësimeve të shfletuesit tuaj dhe vlerave të parametrave qe i ke shenuar.
		}
		else
		{
			echo '<script>alert("Username or Password is incorrect!")</script>';
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<form method="post" action="login.php">
			Username: <input type="text" name="Username" ><br><br>
			Password: <input type="password" name="Password"><br><br>
			<input type="submit" value="Log in">
			<input type="reset" value="Cancel">
		</form>
	</body>
</html>

