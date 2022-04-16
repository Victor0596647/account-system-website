<?php
$dbhost = '127.0.0.1';
$dbuser = 'root';
$dbpass = '';
$dbname = 'php_dev';
$con = new mysqli($dbhost,$dbuser,$dbpass,$dbname);

if(!$con){
    die('Failed to connect!');
}

?>