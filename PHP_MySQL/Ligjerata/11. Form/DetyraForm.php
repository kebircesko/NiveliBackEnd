
 <?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$a = $_POST['Username'];
		$b = $_POST['Email'];
		if(empty($a)&&empty($b))
		{
			echo 'Username and Email is empty';
		}
		else if($a === 'admin' && $b === 'kebircesko@gmail.com')
		{
			echo 'Correct! <br> You are welcome!';
		}
		else
		{
			echo 'Username and Email is incorrect!';
		}
	}
?>