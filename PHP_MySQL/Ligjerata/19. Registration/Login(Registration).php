<html>
	<head>
		<title>Login</title>
		
        <link rel="stylesheet" href="style.css" media="all">
	</head>

    <body>
        <form method="post" action="Login(Registration).php">
            Email: <input type="text" name="Email"><br><br>
            Password: <input type="password" name="Password"><br><br>
            <input type="submit" name="login" value="Log in">
            <input type="reset" name="cancel" value="Cancel">
        </form>
        <?php
            $connect=mysqli_connect('localhost','kebir','Kebir123!','login');// Create connection
            mysqli_select_db($connect,'login');//select db
            
            if(isset($_POST['login']))//if form submitted
               {
                $email = mysqli_real_escape_string($connect,$_POST['Email']);//Escapes a string for use in a mysql_query
                $password = mysqli_real_escape_string($connect,$_POST['Password']);//Escapes a string for use in a mysql_query
                
                if(empty($email)&&empty($password))
		              {
                        echo "<script>alert('Email ose Password jane te zbrazeta!')</script>";
		              }
                if($email!='' || $password!='')// ||-or
                 {
                //Kujdes!!! Kur e ruani passwordin ne SQL me gjatesi me te gjate.
                   $password=md5($password);//The md5() function calculates the MD5 hash of a string.The md5() function uses the RSA Data Security, Inc. MD5 Message-Digest Algorithm.(ata qe nuk e kan pasin hash nuk logohen)
                   // echo $password.'<br>';
                    
                   $login = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
                   
                   $con=mysqli_query($connect, $login);//Send a MySQL query
                   
                   if(mysqli_num_rows($con)>0)// Get number of rows in result
                   {
                       $_SESSION['email']=$email;
                       
                       echo "<script>
                       window.open('admin.php','_self')
                       </script>";
                   }
                   else
                   {
                       echo "<script>
                       alert('Email ose Password jane gabim!')
                       </script>";
                   }
                }
           }
               
        ?>
    </body>
</html>