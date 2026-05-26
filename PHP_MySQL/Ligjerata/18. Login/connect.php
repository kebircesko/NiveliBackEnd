<?php
            
 $connect=mysqli_connect('localhost','root','','login1');//Open a connection to a MySQL Server, login-eshte emri i databazes
            mysqli_select_db($connect,'login1');//Select a MySQL database
            
            if(isset($_POST['login']))//isset->Përcaktoni nëse një ndryshore deklarohet dhe është e ndryshme nga null->//if form submitted
               {
                   $username=$_POST['username'];//e merr vleran e username nga forma (nga atributi name)
                   $password=$_POST['password'];//e merr vleran e password nga forma (nga atributi name)
                   
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
                        echo "<script>alert('Username ose Password jane te zbrazeta!')
                        window.open('login_onefile.php','_self')
                        </script>";
		              }
                   else
                   {
                       echo "<script>
                       alert('Username ose Password jane gabim ose useri nuk ekziston!')
                       window.open('login_onefile.php','_self')
                       </script>";
                   }
               } 
?>