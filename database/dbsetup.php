<?php

header("Access-Control-Allow-Origin: *");

$host = 'localhost';
$port = '3307'; 
$username = 'lab5_user';
$password = 'password123';
$dbname = 'dolphincrm';

$conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password );

?>