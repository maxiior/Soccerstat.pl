<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pilka";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Clubs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
code VARCHAR(3) NOT NULL,
country VARCHAR(30)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Clubs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>