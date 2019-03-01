<?php
//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

//create table hotels
$sql = "CREATE TABLE IF NOT EXITST hotels (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
hotel VARCHAR(30) NOT NULL)";

if ($conn->query($sql) === TRUE) {
    echo "Table hotels created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();