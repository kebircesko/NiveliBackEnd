<html>
	<head>
		<title>Login &amp; Registration</title>
		

	</head>

    <body>
        <form method="post" action="Login.php">
            FirstName: <input type="text" name="firstName"><br><br>
            Password: <input type="password" name="Password"><br><br>
            <input type="submit" name="login" value="Log in">
            <input type="reset" name="cancel" value="Cancel">
        </form>
        <a href='Registration1.php'><button>Registration</button></a>
            
        <?php
            $connect=mysqli_connect('localhost','kebir','Kebir123!','login');
            mysqli_select_db($connect,'login');
            
            if(isset($_POST['login']))
               {
                   $firstName=$_POST['firstName'];
                   $password=$_POST['Password'];
                   
                   $login = "SELECT * FROM registration WHERE firstName='$firstName' AND password='$password'";
                   
                   $con=mysqli_query($connect, $login);
                   
                   if(mysqli_num_rows($con)>0)
                   {
                       $_SESSION['firstName']=$firstName;
                       
                       echo "<script>
                       window.open('admin.php','_self')
                       </script>";
                   }
                    elseif(empty($firstName)&&empty($password))
		              {
                        echo "<script>alert('Username ose Password jane te zbrazeta!')</script>";
		              }
                   else
                   {
                       echo "<script>
                       alert('Username ose Password jane gabim!')
                       </script>";
                   }
               } 
               
        ?>
    </body>
</html>