<?php
$dbhost = getenv("MYSQL_ADDON_HOST");
$dbuser = getenv("MYSQL_ADDON_USER");
$dbpass = getenv("MYSQL_ADDON_PASSWORD");
$dbname = getenv("MYSQL_ADDON_DB");
$con = NULL;
try{
    $con = new PDO(
        "mysql:host=$dbhost; dbname=$dbname",
        "$dbuser",
        "$dbpass"
    );
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected!";
}catch(PDOException $e){
    die("something went wrong...");
}
?>