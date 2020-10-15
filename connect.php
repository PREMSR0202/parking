<?php

$host = 'php.cfl0scaepvgz.us-east-2.rds.amazonaws.com';
$user = 'admin';
$pass = 'adminadmin'
$db = 'test'

$conn = new mysqli($host, $user, $pass, $db);
if($conn->connect_error){
    die('Connect Error: ');
}

?>