<?php
//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

//create table dives
$sql = "CREATE TABLE IF NOT EXISTS dives (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
diver INT(6),
holiday INT(6),
datetime DATETIME,
place INT(6),
duration INT(4),
suit BOOLEAN,
jacket BOOLEAN,
mask BOOLEAN,
regulator BOOLEAN,
computer BOOLEAN,
remarks VARCHAR(100)";

if ($conn->query($sql) === TRUE) {
    echo "Table dives created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();