<?php 
include("dbsetup.php");

date_default_timezone_set('America/Jamaica');
$date = new DateTime();
('d/m/Y');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $assigned_to = isset($_POST['assigned']) ? htmlspecialchars($_POST['assigned']) : '';

        $title = isset($_POST['title']) ? htmlspecialchars($_POST['title']) : '';
        $hrfix = intval($date->format("H")) - 1;
        $createdat = $date->format("Y-m-d") . " " . $date->format($hrfix . ":i:s");


        $firstname = isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : '';
        $lastname = isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : '';
        $type = isset($_POST['type']) ? htmlspecialchars($_POST['type']) : '';
        $company = isset($_POST['company']) ? htmlspecialchars($_POST['company']) : '';
        $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
        $telephone = isset($_POST['telephone']) ? htmlspecialchars($_POST['telephone']) : '';



    
        $stmt = $conn->prepare("INSERT INTO contacts (firstname, lastname, email, type , telephone , company , created_on , title , assigned_to) VALUES (? , ? , ?, ?, ?, ? , ? ,? , ?)");
    // Bind parameters to the prepared statement
    $stmt->bindParam(1, $firstname);
    $stmt->bindParam(2, $lastname);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $type);
    $stmt->bindParam(5, $telephone);
    $stmt->bindParam(6, $company);
    $stmt->bindParam(7, $createdat);
    $stmt->bindParam(8, $title);
    $stmt->bindParam(9, $assigned_to);


    



    // Execute the statement
    $stmt->execute();
    // $stmt->close();
    }

    ?>