<?php
    $connect=mysqli_connect('localhost','root','','om3');
        mysqli_select_db($connect,'om3');
            
        if(isset($_POST['login']))
        {
            $username=$_POST['username'];
            $password=$_POSt['password'];
                   
            $login = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
                   
            $con=mysqli_query($connect, $login);
                   
                if(mysqli_num_rows($con)>0)
                {
                    $_SESSION['username']=$username;
                       
                    echo "<script>
                       window.open('adminsite.php','_self');
                       </script>";
                }
                elseif(empty($username)||empty($password))
                {
                    echo "<script>alert('Username ose Password jane te zbrazeta!');</script>";
                }
                else
                {
                    echo "<script>
                       alert('Username ose Password jane gabim!');
                       </script>";
                }
        } 
               
?>