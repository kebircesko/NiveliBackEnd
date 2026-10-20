
 <?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$a = $_POST['Username'];
		$b = $_POST['Password'];
		if(empty($a)&&empty($b))
		{
			echo 'Username and Password is empty';
		}
		else if($a === 'admin' && $b === 'admin123')
		{
			echo 'Correct! <br> You are welcome!';
		}
		else
		{
			echo 'Username and Password is incorrect!';
		}
	}
?>