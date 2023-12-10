<?php
$host = 'localhost';
$port = '3306'; // Replace with your actual port number
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphincrm';

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>


