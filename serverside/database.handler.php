<?php
    $host = "localhost";
    $name = "root";
    $password = "";
    $dbName = "user_info";

    $conn = mysqli_connect($host, $name, $password, $dbName);

    // Check if database has errors

    if(mysqli_connect_error()){
        die("ERROR: ".mysqli_connect_error());
    }