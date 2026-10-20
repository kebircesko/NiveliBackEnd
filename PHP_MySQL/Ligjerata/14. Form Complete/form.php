<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$a = $_POST['Email'];
		if(empty($a))
		{
			echo 'Email is empty';
		}
		else 
		{
			echo $a;
		}
	}
?>