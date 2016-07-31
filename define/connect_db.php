<?php
    $servername = "localhost";
    $username = "root";
    $password = "620347";
    $database = "vietanime";
    $dbport = 3306;
//
//    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    $db->query("SET NAMES 'utf8'");
//    $db = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
        exit();
    }
//    echo 'success connect db';
?>