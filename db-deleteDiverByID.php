<?php

//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

$id = $_POST['diverID'];

//create table divers
$sql = "DELETE FROM divers WHERE id = " . $id;

// we would like to return some json, that the angularJS application can read.


if ($conn->query($sql) === TRUE) {
    $response['status'] = array(
        'type' => 'Diver successfully deleted',
        'value' => ("some value you might need " . $id)
    );
} else {
    $response['status'] = array(
        'type' => "Error deleting diver: " . $sql . "<br>" . $conn->error,
        'value' => "SQL: " . $sql
    );
}
$conn->close();

$encoded = json_encode($response);
exit($encoded);