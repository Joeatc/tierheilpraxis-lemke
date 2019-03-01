<?php
$fields="";
$values="";

foreach($_POST as $key => $value){
    $fields .= ", " . $key;
    $fields = ltrim($fields, ", ");
    $values .= ",'" . $value . "'";
    $values = ltrim($values, ',');
}
$sql = "INSERT INTO anamnesehundkatze ($fields) VALUES ($values);";

//load login data
include 'db-settings.php';

//create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

if ($conn->query($sql) === TRUE) {
    $response = "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"utf-8\">
    <meta name=\"format-detection\" content=\"telephone=no\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link rel=\"stylesheet\" href=\"styles/w3.css\">
</head>
<body>
    <div class=\"w3-container w3-teal w3-border-top w3-border-bottom\">
        <h2 onClick=\"window.location='Anamnese_HundKatze.php';\">Daten gespeichert</h2>
    </div>
</body>
</html>";
} else {
    echo "Hallo Fehler!!! <br>";
    $response = "Error entering data into table anamnese: " . $sql . "<br>" . $conn->error;
}
$conn->close();

exit($response);
