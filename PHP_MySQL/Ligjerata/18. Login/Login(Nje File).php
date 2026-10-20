<html>
	<head>
		<title>Login</title>
        <link rel="stylesheet" href=" " media="all">
	</head>
    <body>
        <form method="post" action="Login(Nje File).php">
            Username: <input type="text" name="Username"><br><br>
            Password: <input type="password" name="Password"><br><br>
            <input type="submit" name="login" value="Log in">
            <input type="reset" name="cancel" value="Cancel">
        </form>
        <?php
            $connect=mysqli_connect('localhost','kebir','Kebir123!','login');//Open a connection to a MySQL Server, login-eshte emri i databazes
            mysqli_select_db($connect,'login');//Select a MySQL database
            
            if(isset($_POST['login']))//isset->Përcaktoni nëse një ndryshore deklarohet dhe është e ndryshme nga null->//if form submitted
               {
                   $username=$_POST['Username'];
                   $password=$_POST['Password'];
                   
                   $login = "SELECT * FROM admin_login WHERE username='$username' AND password='$password'";
                   
                   $con=mysqli_query($connect, $login);//Send a MySQL query
                   
                   if(mysqli_num_rows($con)>0) //Get number of rows in result
                   {
                       $_SESSION['username']=$username;//Sesioni PHP përdoret për të ruajtur dhe kaluar informacione nga një faqe në tjetrën përkohësisht (derisa përdoruesi të mbyllë faqen e internetit).
                       
                       echo "<script>
                       window.open('admin.php','_self')
                       </script>";
                   }
                    elseif(empty($username)&&empty($password))
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
<!---
    empty() - Determine whether a variable is empty(Përcaktoni nëse një variabël është bosh)
    __isset()
    unset() - Unset a given variable(Vendos një ndryshore të caktuar)
    defined() - Checks whether a given named constant exists(Kontrollon nëse ekziston një konstante e caktuar me emër)
    the type comparison tables
    array_key_exists() - Checks if the given key or index exists in the array(Kontrollon nëse çelësi ose indeksi i dhënë ekziston në grup)
    is_null() - Finds whether a variable is null(Gjen nëse një ndryshore është null)
    the error control @ operator
->