<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "libraria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);//new update
//$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// sql to create table
$sql = "CREATE TABLE Perdoruesi (
id INT(6) AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  echo "Table Perdoruesi created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
$conn->close();
?>	

<?php
/*
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shkollaPz2025";

try {
    // Krijo lidhjen me PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    
    // Error mode (shumë e rëndësishme)
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL për krijimin e tabelës
    $sql = "CREATE TABLE Perdoruesi (
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    // Ekzekutimi
    $conn->exec($sql);

    echo "Table Perdoruesi created successfully";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Mbyll lidhjen
$conn = null;
?>
*/