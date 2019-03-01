<?php
//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

//create table places
$sql = "CREATE TABLE IF NOT EXISTS places (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
place VARCHAR(30) NOT NULL,
depth INT(6))";

if ($conn->query($sql) === TRUE) {
    echo "Table places created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();