<?php 
include("dbsetup.php");

date_default_timezone_set('America/Jamaica');
$date = new DateTime();
('d/m/Y');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $firstname =  isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $type = isset($_POST['type']) ? $_POST['type'] : '';
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
        $company = isset($_POST['company']) ? $_POST['company'] : '';
        $hrfix = intval($date->format("H")) - 1;
        $createdat = $date->format("Y-m-d") . " " . $date->format($hrfix . ":i:s");
    


    
        $stmt = $conn->prepare("INSERT INTO contacts (firstname, lastname, email, type , telephone , company , created_on , title) VALUES (? , ? , ?, ?, ?, ? , ? ,?)");
    // Bind parameters to the prepared statement
    $stmt->bindParam(1, $firstname);
    $stmt->bindParam(2, $lastname);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $type);
    $stmt->bindParam(5, $telephone);
    $stmt->bindParam(6, $company);
    $stmt->bindParam(7, $createdat);
    $stmt->bindParam(8, $title);

    



    // Execute the statement
    $stmt->execute();
    // $stmt->close();
    }

    ?>