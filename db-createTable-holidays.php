<?php
//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

//create table holidays
$sql = "CREATE TABLE IF NOT EXISTS holidays (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
diver INT(6),
hotel INT(6),
room VARCHAR(10),
arrival DATE,
departure DATE,
health_certificate BOOLEAN";

if ($conn->query($sql) === TRUE) {
    echo "Table holidays created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();