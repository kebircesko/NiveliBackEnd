<?php  
    $server = "localhost";  
    $username = "kebir";  //Default per username eshte root  
    $password = "Kebir123!";     //Default per password eshte e zbrazet  
    $connect = mysqli_connect($server, $username, $password);  
    if(!$connect)  
        die("Connection failed".mysqli_connect_error());  
    else      
        echo "Successfully connected with database";   
    mysqli_close($connect); 
?>