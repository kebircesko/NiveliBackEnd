<?php  
    $server = "localhost";  
    $username = "root";  //Default per username eshte root  
    $password = "";     //Default per password eshte e zbrazet  
    $connect = mysqli_connect($server, $username, $password);  
    if(!$connect)  
        die("Connection failed".mysqli_connect_error());  
    else      
        echo "Successfully connected with database";   
    mysqli_close($connect); 
?>
<?php
/*
<?php
$server = "localhost";
$username = "root";
$password = "";

try {
    // Lidhja me PDO (pa specifiku databazën)
    $conn = new PDO("mysql:host=$server", $username, $password);

    // Aktivizon error reporting
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Successfully connected with database";

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Mbyllja e lidhjes
$conn = null;
?> 
 */