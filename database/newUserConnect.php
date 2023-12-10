<?php 
include("dbsetup.php");
date_default_timezone_set('America/Jamaica');
$date = new DateTime();
('d/m/Y');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $role = isset($_POST['role']) ? htmlspecialchars($_POST['role']) : '';
    $password = isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
    $hrfix = intval($date->format("H")) - 1;
    $createdat = $date->format("Y-m-d") . " " . $date->format($hrfix . ":i:s");
    $password = password_hash ($password, PASSWORD_DEFAULT);

    
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password , role, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    // Bind parameters to the prepared statement
    $stmt->bindParam(1, $firstname);
    $stmt->bindParam(2, $lastname);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $password);
    $stmt->bindParam(5, $role);
    $stmt->bindParam(6, $createdat);


    // Execute the statement
    $stmt->execute();
    // $stmt->close();
    }
?>