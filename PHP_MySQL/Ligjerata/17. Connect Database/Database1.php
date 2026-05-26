<?php  
    $server = "localhost";  
    $user = "root";  //default user name is root  
    $pass = "";     //default password is blank  
    $connect = mysqli_connect($server, $user, $pass); // Create connection 
    if(!$connect)  
        die("Connection failed".mysqli_connect_error());  
    else      
        //echo "Successfully connected with database";  
    $query	= "CREATE DATABASE libraria"; // Create database
    if (mysqli_query($connect, $query)) {  /*Send a MySQL query*/
        echo "Database created successfully with the name libraria";  
    } else {  
        echo "Error creating database: " . mysqli_error($connect);  
    }  
    mysqli_close($connect);  
?>
<!--Shënim: Kur krijoni një bazë të dhënash të re, duhet të specifikoni vetëm tre argumentet e para për objektin mysqli (emri i serverit, emri i përdoruesit dhe fjalëkalimi).
Këshillë: Nëse duhet të përdorni një port specifik, shtoni një varg të zbrazët për argumentin e emrit të bazës së të dhënave, si kjo: mysqli i ri ("localhost", "username", "password", "", port)
--> 

<?php
/*
<?php
$server = "localhost";
$user = "root";
$pass = "";

try {
    // Lidhja pa specifiku databazën
    $conn = new PDO("mysql:host=$server", $user, $pass);

    // Error mode
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query për krijimin e databazës
    $sql = "CREATE DATABASE shkollaPz2025";

    // Ekzekutimi
    $conn->exec($sql);

    echo "Database created successfully with the name shkollaPz2025";

} catch (PDOException $e) {
    echo "Error creating database: " . $e->getMessage();
}

// Mbyllja
$conn = null;
?>
*/