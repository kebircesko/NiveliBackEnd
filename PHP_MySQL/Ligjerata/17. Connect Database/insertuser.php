<?php
$servername = "localhost";
$username = "kebir";
$password = "Kebir123!";
$dbname = "ShkollaPz2026";
// Krijimi i lidhjes me databazën
$conn = new mysqli($servername, $username, $password, $dbname);
// Kontrollo lidhjen
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// INSERT - shtojmë 3 përdorues në databazë
$sql = "INSERT INTO Perdoruesi (firstname, lastname, email)
VALUES
('Kebir', 'Cesko', 'kc@gmail.com'),
('Enes', 'Ramani', 'enes@gmail.com'),
('Ledri', 'Bilurdagu', 'ledri@gmail.com')";
// Ekzekuto SQL
if ($conn->query($sql) === TRUE) {
    echo "3 records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// Mbyll lidhjen
$conn->close();
?>