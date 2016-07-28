<?php
    $hostname = "https://vietanime.com";

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "113113";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
?>