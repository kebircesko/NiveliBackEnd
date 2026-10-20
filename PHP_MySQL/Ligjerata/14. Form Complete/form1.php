<?php
			$empUsername = "";	
			$empPassword = "";
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$username =secure($_POST['Username']);
			$password =secure($_POST['Password']);
			if(empty($username)&&empty($password))
			{
				$empUsername ="Username is required";
				$empPassword ="Password is required";
			}
			else if($username === 'arianit' && $password === 'tershnjaku')
			{
				echo 'Correct! <br> You are welcome!';
			}
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