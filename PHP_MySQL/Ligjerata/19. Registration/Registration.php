<html>
	<head>
		<style>
			.empty {color: red;}
		</style>
	</head>
	<body>
		<?php
            $connect=mysqli_connect("localhost","root","","login");
                mysqli_select_db($connect,"login");
			$empFirstName = "";//Inicializimi i variablave
			$empLastName = "";
			$empEmail = "";
			$empPassword = "";
			$empConfirmPassword = "";
			$empGender ="";
			$empBirthday ="";
		
		?>
		<p><span class="empty">* Required</span></p>
		<form method="post" action="Registration.php">
			First Name: <input type="text" name="firstName">
			<span class="empty">*<?php echo $empFirstName;?></span><br><br>
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
			<input type="submit" name='login'value="Log in">
			<input type="reset" value="Cancel">
		</form>
    <?php
        if(isset($_POST['login']))//if form submitted
		{
			$firstName =secure($_POST['firstName']);
				if(empty($firstName))
				{
					$empFirstName ="FirstName is required";
				}
				else if (!preg_match("/^[a-zA-ZëË ]*$/",$firstName))//The preg_match() function returns whether a match was found in a string.
				{
					$empFirstName = "Only letters and white space allowed";
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
				else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) //The filter_var() function filters a variable with the specified filter.
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
                //Kujdes te veqant tek insertimi i te dhenave!!!
            $registration ="INSERT INTO registration(firstName,lastName,email,password,confirmPassword,gender,birthday)
                VALUES ('$firstName','$lastName','$email','$password','$confirmPassword','$gender','$birthday')";
           
            if(mysqli_query($connect,$registration))
            {
                echo "<script>alert ('Registration Successfully!')</script>";
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





