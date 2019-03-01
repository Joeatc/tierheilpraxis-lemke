<?php

//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

//delete empty rows
$sql = "DELETE FROM divers WHERE firstname = '' AND lastname = '' ";

// we would like to return some json, that the angularJS application can read.


if ($conn->query($sql) === TRUE) {
    $response['status'] = array(
        'type' => 'Empty rows deleted successfully.',
        'value' => ("some value you might need ")
    );
} else {
    $response['status'] = array(
        'type' => "Error deleting empty rows: " . $sql . "<br>" . $conn->error,
        'value' => "some value indicated an error."
    );
}
$conn->close();

$encoded = json_encode($response);
exit($encoded);
?>