<?php
    $dbhost = getenv("DB_HOST");
    $dbuser = getenv("DB_USER");
    $dbpass = getenv("DB_PASSWORD");
    $dbname = getenv("DB_NAME");
    $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    
    if(!$con){
        die("Something went wrong trying to connect to the server/database.");
    }
?>