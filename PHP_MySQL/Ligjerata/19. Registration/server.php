<?php
    session_start();//Sesioni PHP përdoret për të ruajtur dhe kaluar informacione nga një faqe në tjetrën përkohësisht (derisa përdoruesi të mbyllë faqen e internetit).
    //Inicializimi i variablave
    $firstName = "";
    $lastName = "";
    $email    = "";
    $password ="";
    $confirmPassword ="";
    $gender ="";
    $birthday ="";
    $errors = array(); //for any errors in input array
    
    $conn=mysqli_connect("localhost","kebir","Kebir123!","login");//Open a connection to a MySQL Server, login-eshte emri i databazes
        mysqli_select_db($conn,'login');//Select a MySQL database
        
    if(isset($_POST['login']))//if form submitted, name="login"->lidhet me inputin ne form
    {
        $firstName=mysqli_real_escape_string($conn,$_POST['firstName']);//mysql_real_escape_string(eshte funksion gatshem i PHP) — Escapes special characters in a string for use in an SQL statement
        $lastName = mysqli_real_escape_string($conn,$_POST['lastName']);//mysql_real_escape_string — Escapes special characters in a string for use in an SQL statement
        $email = mysqli_real_escape_string($conn,$_POST['email']);//mysql_real_escape_string — Escapes special characters in a string for use in an SQL statement
        $password = mysqli_real_escape_string($conn,$_POST['password']);//mysql_real_escape_string — Escapes special characters in a string for use in an SQL statement
        $confirmPassword = mysqli_real_escape_string($conn,$_POST['confirmPassword']);//mysql_real_escape_string — Escapes special characters in a string for use in an SQL statement
        $gender = mysqli_real_escape_string($conn,$_POST['gender']);//mysql_real_escape_string — Escapes special characters in a string for use in an SQL statement
        $birthday = mysqli_real_escape_string($conn,$_POST['birthday']);//mysql_real_escape_string — Escapes special characters in a string for use in an SQL statement
              
        if (empty($firstName)) {array_push($errors, "Fistname is required"); }//array_push->Push one or more elements onto the end of array
        
        if (empty($lastName)) {array_push($errors, "Lastname is required"); }
        
        if (empty($email)) { array_push($errors, "Email is required"); }
        
        if (empty($password)) { array_push($errors, "Password is required"); }


        
        if ($password != $confirmPassword) //Jo të barabartë
        {
            array_push($errors, "The two passwords do not match");
        }
            $check_query = "SELECT * FROM registration WHERE firstName='$firstName' OR lastName='$lastName'OR email='$email' LIMIT 1";
            $result = mysqli_query($conn, $check_query);
            $user = mysqli_fetch_assoc($result);// Associative array->Fetch a result row as an associative array->Merr një rresht rezultati si një grup shoqërues
  
        if ($user) 
        { // if user exists
            if ($user['firstName'] === $firstName) 
            {
                array_push($errors, "Firstname already exists");//Push one or more elements onto the end of array
            }
            if ($user['lastName'] === $lastName) 
            {
                array_push($errors, "Lastname already exists");//Push one or more elements onto the end of array
            }
            if ($user['email'] === $email) 
            {
                array_push($errors, "Email already exists");//Push one or more elements onto the end of array
            }
        }
        if (count($errors) == 0) 
        {                                                                                                                                           
  	     $password = md5($password);/*encrypt i passwordit para se ta ruajme ne database,Llogaritni hashin md5 të një vargu,eshte mire me bo max 255 karaktere,sepse hash ka me shume karaktere(Length/Values)
         linki per me dekriptu hash kode->https://www.md5online.org/md5-decrypt.html*/
            //Kujdes te veqant tek insertimi i te dhenave!!!
           
                $regist ="INSERT INTO registration (firstName,lastName,email,password,gender,birthday)
                VALUES ('$firstName','$lastName','$email','$password','$gender','$birthday')";
                
                $rows = "select * from registration where firstName='$firstName' AND lastName='$lastName'";
	
	           $run = mysqli_query($conn, $rows);
	
	           if(mysqli_num_rows($run)<7){//limiti i userit(kufizimi i databazes)
                   
                    mysqli_query($conn,$regist);
            
                    echo "<script>alert('Registration Successfully!');</script>";
    
                /*    $_SESSION['username'] = $username;
  	             $_SESSION['success'] = "You are now logged in";
                header('location: index.php'); */
               }
        }
    }
?>
