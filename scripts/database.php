<?php

    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "plantadb";

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

    if(!$conn)
    {
        die('Database connection failed!');
    }