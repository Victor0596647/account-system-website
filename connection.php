<?php
    $dbhost = getenv("MYSQL_ADDON_HOST");
    $dbuser = getenv("MYSQL_ADDON_USER");
    $dbpass = getenv("MYSQL_ADDON_PASSWORD");
    $dbname = getenv("MYSQL_ADDON_DB");
    $con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    
    if(!$con){
        die("Something went wrong trying to connect to the server/database.");
    }
?>