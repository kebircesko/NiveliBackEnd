<?php  
    //lidhja me localhost 
    $server = "localhost"; //emri i serverit 
    $username = "root";  //Default per username eshte root  
    $password = "";     //Default per password eshte e zbrazet  
    $connect = mysqli_connect($server, $username, $password); // Create connection
    if(!$connect)// Check connection
    {
        die("Connection failed ".mysqli_connect_error()); 
        //echo "Connection failed".mysqli_connect_error();   
    }
    else 
    {
         echo "Successfully connected with database";  
    }     
    mysqli_close($connect); //mbyllja e lidhjes
?>