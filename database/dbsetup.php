<?php
$host = 'localhost';
$port = '3307'; // Change this to the desired port
$username = 'root';
$password = 'root';
$dbname = 'dolphincrm';

$conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
?>
