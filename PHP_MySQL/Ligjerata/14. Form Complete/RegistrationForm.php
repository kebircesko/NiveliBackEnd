<html>
	<head>
		<style>
			.empty {color: red;}
		</style>
	</head>
	<body>
		<?php
			$empName = "";
			$empLastName = "";
			$empEmail = "";
			$empPassword = "";
			$empConfirmPassword = "";
			$empGender ="";
			$empBirthday ="";
        
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$name =secure($_POST['name']);
				if(empty($name))
				{
					$empName ="Name is required";
				}
				else if (!preg_match("/^[a-zA-ZëË ]*$/",$name)) //Funksioni preg_match na mundeson qe ta shenojme nje input ne forme te rregullt, apo te na paralajmroje kur kemi perdorur ndonje karakter jovalid.
				{
					$empName = "Only letters and white space allowed";
				}
		
			$lastName =secure($_POST['lastName']);
				if(empty($lastName))
				{
					$empLastName ="LastName is required";
				}
				else if (!preg_match("/^[a-zA-ZëË ]*$/",$lastName)) 
				{
					$empLastName = "Only letters and white space allowed";
				}
			$email =secure($_POST['email']);
				if(empty($email))
				{
					$empEmail ="Email is required";
				}
				else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //Filter_var->e ben filtrimin e variables psh ketu per filtrimin e email
				{
					$empEmail = "Invalid email format";
				}
			$password =secure($_POST['password']);
				if(empty($password))
				{
					$empPassword ="Password is required";
				}
			$confirmPassword =secure($_POST['confirmPassword']);
				if(empty($confirmPassword))
				{
					$empConfirmPassword ="ConfirmPassword is required";
				}
			
			$gender =secure($_POST['gender']);
				if(empty($gender))
				{
					$empGender ="Gender is required";
				}
			$birthday =secure($_POST['birthday']);
				if(empty($birthday))
				{
					$empBirthday ="Birthday is required";
				}
				
		}
		function secure($x) {
			$x = htmlspecialchars($x); //Ky funksion mundeson qe karakteret speciale te i konverton ne karaktere te HTML
			$x = trim($x);	//Ky funksion largon karakteret e panevojshme si (extra space, tab, newline etj), nga te dhenat hyrse te perdoruesit.
			$x = stripslashes($x);	//Ky funksion largon karakterin "\"(backslash).
			return $x;
		}
		?>
		<p><span class="empty">* Required</span></p>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			Name: <input type="text" name="name">
			<span class="empty">*<?php echo $empName;?></span><br><br>
			Last Name: <input type="text" name="lastName">
			<span class="empty">*<?php echo $empLastName;?></span><br><br>
			Email: <input type="text" name="email">
			<span class="empty">*<?php echo $empEmail;?></span><br><br>
			Password: <input type="password" name="password">
			<span class="empty">*<?php echo $empPassword;?></span><br><br>
			Confirm Password: <input type="password" name="confirmPassword">
			<span class="empty">*<?php echo $empConfirmPassword;?></span><br><br>
			Gender:<input type="radio" name="gender" <?php if (isset($gender) && $gender=="Femer") echo "checked";?> value="Femer">F
				   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="Mashkull") echo "checked";?> value="Mashkull">M
			<span class="empty">*<?php echo $empGender;?></span><br><br>
			Birthday: <input type="date" name="birthday">
			<span class="empty">*<?php echo $empBirthday;?></span><br><br>
			<input type="submit" value="Log in">
			<input type="reset" value="Cancel">
		</form>
		
		<?php echo $name.'<br>';?>
		<?php echo $lastName.'<br>';?>
		<?php echo $email.'<br>';?>
		<?php echo $password.'<br>';?>
		<?php echo $confirmPassword.'<br>';?>
		<?php echo $gender.'<br>';?>
		<?php echo $birthday.'<br>';?>
		
		
	</body>
</html>