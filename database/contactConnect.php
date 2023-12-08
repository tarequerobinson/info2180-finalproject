<?php 
include("dbsetup.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
        $company = isset($_POST['company']) ? $_POST['company'] : '';


    
        $stmt = $conn->prepare("INSERT INTO contacts (firstname, lastname, email, type , telephone , company) VALUES (?, ?, ?, ?, ? , ?)");
    // Bind parameters to the prepared statement
    $stmt->bindParam(1, $firstname);
    $stmt->bindParam(2, $lastname);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $type);
    $stmt->bindParam(5, $telephone);
    $stmt->bindParam(6, $company);


    // Execute the statement
    $stmt->execute();
    // $stmt->close();
    }

    ?>