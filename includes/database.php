<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "jobs";

    //Connection to database
    $connection = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

    if (!$connection) {
        die("Database conncetion failed!");
    }
?>