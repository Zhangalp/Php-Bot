<?php
    
    $servername = "localhost";
    $dbUsername = "botadmin";
    $dbPassword = "123123";
    $dbName = "demo2";

    $conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

    if (!$conn){
        die("Connection Failed: " . mysqli_connect_error());
    }



?>