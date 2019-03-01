<?php
//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

//alter table divers
// THIS WAS DONE ALREADY

//THIS FILE MAY BE USED AS A TEMPLATE 


$sql = "ALTER TABLE divers 
ADD address2 VARCHAR(40),
ADD address3 VARCHAR(40),
ADD email VARCHAR(40),
ADD birthday DATE,
ADD phone VARCHAR(20),
ADD licence VARCHAR(40),
ADD dives INT(6),
ADD isGuide BOOLEAN";

if ($conn->query($sql) === TRUE) {
    echo "Table divers created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();