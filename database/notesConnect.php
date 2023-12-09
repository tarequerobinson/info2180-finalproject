<?php 
include("dbsetup.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $contactId = isset($_POST['contact_id']) ? $_POST['contact_id'] : '';
    $comment = isset($_POST['comment']) ? $_POST['comment'] : '';
    $createdBy = isset($_POST['created_by']) ? $_POST['created_by'] : '';

    // Assuming 'notes' is the correct table name
    $stmt = $conn->prepare("INSERT INTO notes (contact_id, comment, created_by) VALUES (?, ?, ?)");

    // Bind parameters to the prepared statement
    $stmt->bindParam(1, $contactId);
    $stmt->bindParam(2, $comment);
    $stmt->bindParam(3, $createdBy);

    // Execute the statement
    $stmt->execute();
}
?>