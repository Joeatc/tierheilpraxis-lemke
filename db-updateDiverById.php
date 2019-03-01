<?php
//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$field = $_POST['fieldname'];
$newValue = $_POST['value'];

//updating table divers
$sql = "UPDATE divers SET " . $field . " = '" . $newValue . "' WHERE id = " . $id;

// we would like to return some json, that the angularJS application can read.

if ($conn->query($sql) === TRUE) {
    $response['status'] = array(
        'type' => 'Diver updated successfully.',
        'value' => ("some value you might need " . $field . " " . $newValue)
    );
} else {
    $response['status'] = array(
        'type' => "Error updating diver: " . $sql . "<br>" . $conn->error,
        'value' => "some value indicated an error."
    );
}
$conn->close();

$encoded = json_encode($response);
exit($encoded);