<?php
//load login data
include 'db-settings.php';


$link = mysqli_connect($servername, $username, $password, $dbname);

if (!$link) {
    echo "Fehler: konnte nicht mit MySQL verbinden." . PHP_EOL;
    echo "Debug-Fehlernummer: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debug-Fehlermeldung: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Erfolg: es wurde ordnungsgemäß mit MySQL verbunden! Die Datenbank \"$dbname\" ist toll." . PHP_EOL;
echo "Host-Informationen: " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
