<?php
/**
 * Created by PhpStorm.
 * User: Joe
 * Date: 15.12.2015
 * Time: 22:18
 */

//load login data
include 'db-settings.php';

//create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


//check connection
if (!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
}
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$birth = $_POST['birthday'];

//select all divers
$sql = "SELECT * FROM divers WHERE firstname = '" . $fname . "' AND lastname = '" . $lname . "' AND birthday = '" . $birth . "'";
/*
 * the combination of these three parameters should be unique
 * therefor the result should contain one record only
 */
$result = mysqli_query($conn, $sql);
$conn->close();
//echo("SQL: " . $sql . " Result: " . json_encode($result) . "Number of rows:" . mysqli_num_rows($result));
exit(json_encode(mysqli_num_rows($result)));

