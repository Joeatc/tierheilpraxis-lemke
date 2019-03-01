<?php

header("Content-Type: application/json; charset=UTF-8");

//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);


//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

//select all divers
$sql = "SELECT id, firstname, lastname, address1, address2, address3, email, birthday, phone, license, dives, isGuide
FROM divers ORDER BY lastname;";
//$sql = "SELECT * FROM divers";

$result = $conn->query($sql);

$i = 0;
$array = [];

while ($rs = $result->fetch_object()) {
    $array[$i] = $rs;  // the = sign in this case pushes values into the array
    $i = $i + 1;
}

$outputObj["records"] = $array;

echo json_encode($outputObj);

$conn->close();