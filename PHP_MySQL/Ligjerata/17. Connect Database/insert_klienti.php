<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "libraria";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "
INSERT INTO Klienti (Emri_Klientit, Libri, Addresa)
VALUES ('Eron', 'Kush e solli Doruntinen', 'Kosova');

INSERT INTO Klienti (Emri_Klientit, Libri, Addresa)
VALUES ('Bali', 'Princi i vogel', 'Kosova');

INSERT INTO Klienti (Emri_Klientit, Libri, Addresa)
VALUES ('Klodi', 'Shqiptaret dhe Garibaldi', 'Shqiperi');
";

if ($conn->multi_query($sql)) {
    echo "Te dhenat u inseruan me sukses";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
