<?php

session_start();

include("dbsetup.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactId = $_POST['contactId'];
    $userId = $_POST['userId'];


    // Check if the contact with the given ID exists
    $checkContactStmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
    $checkContactStmt->execute([$contactId]);

    if ($checkContactStmt->rowCount() > 0) {
        // Update the contact assigned to
        $updateTypeStmt = $conn->prepare("UPDATE contacts SET assigned_to = ? WHERE id = ?");
        
        // Assuming $_SESSION['id'] is a valid value you want to set
        $updateTypeStmt->execute([$userId, $contactId]);

        // Response indicating success and action taken
        $response = ['success' => true, 'action' => "Assigned to $userId "];
    } else {
        // Response indicating failure
        $response = ['success' => false, 'message' => 'Contact not found.'];
    }

    // Send JSON response back to the client
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
