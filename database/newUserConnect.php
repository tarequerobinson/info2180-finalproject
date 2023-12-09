<?php 
include("dbsetup.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $date = date("Y-m-d") . " " . date("H:i:s");

    
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password , role, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    // Bind parameters to the prepared statement
    $stmt->bindParam(1, $firstname);
    $stmt->bindParam(2, $lastname);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $password);
    $stmt->bindParam(5, $role);
    $stmt->bindParam(6, $date);


    // Execute the statement
    $stmt->execute();
    // $stmt->close();
    }

    ?>