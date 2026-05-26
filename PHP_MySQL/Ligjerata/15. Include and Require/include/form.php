<?php
			$empUsername = "";
			$empPassword = "";
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$username =secure($_POST['Username']);
			$password =secure($_POST['Password']);
			if(empty($username) && empty($password)){
                $empUsername ="Username is empty";
                $empPassword ="Password is empty";
            }
            else if(empty($username)){
                $empUsername ="Username is empty";
            }
            else if(empty($password)){
               
                $empPassword ="Password is empty";
            }
			else if($username === 'admin' && $password === 'admin123')
			{
				echo 'Correct! <br> You are welcome!';
			}
			else
			{
				echo 'Username and Password is incorrect!';
			}
		}
		function secure($x) {
			$x = htmlspecialchars($x); 
			$x = trim($x);	
			$x = stripslashes($x);	
			return $x;
		}
?>