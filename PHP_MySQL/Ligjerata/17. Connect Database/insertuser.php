<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "libraria";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//sql create users
$sql = "INSERT INTO Perdoruesi (firstname, lastname, email)
VALUES ('Kebir', 'Cesko', 'kc@gmail.com')";


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
