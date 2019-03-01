<?php
//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

//create table planning
$sql = "CREATE TABLE IF NOT EXISTS planning (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
datetime DATETIME,
place INT(6),
diver INT(6),
cancelled BOOLEAN,
finished BOOLEAN,
remarks VARCHAR(100)";

if ($conn->query($sql) === TRUE) {
    echo "Table planning created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();