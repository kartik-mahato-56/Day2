<?php

    $hostname = "localhost";
    $username ="root";
    $password = "";
    $dbname = "day2";

    $db = mysqli_connect($hostname, $username, $password, $dbname);
    if(! $db){
        echo "<script>alert('Database connectivity failed')</scrpt>";
    }
?>