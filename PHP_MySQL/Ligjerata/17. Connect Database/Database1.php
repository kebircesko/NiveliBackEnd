<?php  
    $server = "localhost";  
    $user = "kebir";  //default user name is root  
    $pass = "Kebir123!";     //default password is blank  
    $connect = mysqli_connect($server, $user, $pass); // Create connection 
    if(!$connect)  
        die("Connection failed".mysqli_connect_error());  
    else      
        //echo "Successfully connected with database";  
    $query	= "CREATE DATABASE ShkollaPz2026"; // Create database
    if (mysqli_query($connect, $query)) {  /*Send a MySQL query*/
        echo "Database created successfully with the name ShkollaPz2026";  
    } else {  
        echo "Error creating database: " . mysqli_error($connect);  
    }  
    mysqli_close($connect);  
?>
<!--Shënim: Kur krijoni një bazë të dhënash të re, duhet të specifikoni vetëm tre argumentet e para për objektin mysqli (emri i serverit, emri i përdoruesit dhe fjalëkalimi).
Këshillë: Nëse duhet të përdorni një port specifik, shtoni një varg të zbrazët për argumentin e emrit të bazës së të dhënave, si kjo: mysqli i ri ("localhost", "username", "password", "", port)
--> 