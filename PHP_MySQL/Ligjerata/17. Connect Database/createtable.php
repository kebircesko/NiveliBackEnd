<?php
$servername = "localhost";
$username = "kebir";
$password = "Kebir123!";
$dbname = "ShkollaPz2026";
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