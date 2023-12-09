<?php 
include("dbsetup.php");
date_default_timezone_set('America/Jamaica');
$date = new DateTime();
('d/m/Y');


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $contactId = isset($_POST['contact_id']) ? $_POST['contact_id'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $createdBy = isset($_POST['created_by']) ? $_POST['created_by'] : '';
    $hrfix = intval($date->format("H")) - 1;
    $createdat = $date->format("Y-m-d") . " " . $date->format($hrfix . ":i:s");


    // Assuming 'notes' is the correct table name
    $stmt = $conn->prepare("INSERT INTO notes (contact_id, comment, created_by, created_at) VALUES (?, ?, ?, ?)");

    // Bind parameters to the prepared statement
    $stmt->bindParam(1, $contactId);
    $stmt->bindParam(2, $comment);
    $stmt->bindParam(3, $createdBy);
    $stmt->bindParam(4, $createdat);


    // Execute the statement
    $stmt->execute();
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT firstname, lastname FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result){
        echo "{$result['firstname']} {$result['lastname']} </p>";
    }else{
        echo "Assigned to no one";
    }
}

?>