<?php
$host = 'localhost';
<<<<<<< HEAD
=======
$port = '3307'; // Replace with your actual port number
>>>>>>> fff410875423ea2217293f1b077cbc5e6b1188b4
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphincrm';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
