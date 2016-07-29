<?php
    $servername = "localhost";
    $username = "root";
    $password = "620347";
    $database = "vietanime";
    $dbport = 3306;
//
//    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

//    $db = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    echo 'success connect db';
?>