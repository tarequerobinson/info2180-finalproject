<?php
include("dbsetup.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactId = $_POST['contactId'];
    // $newType = $_POST['newType'];

    // Check if the contact with the given ID exists
    $checkContactStmt = $conn->prepare("SELECT id , type FROM contacts WHERE id = ?");
    $checkContactStmt->execute([$contactId]);
    $foundContact = $checkContactStmt->fetch(PDO::FETCH_ASSOC);


    if ($checkContactStmt->rowCount() > 0) {
        if ($foundContact['type'] === 'Sales Lead') {

        // Update the contact type
        $updateTypeStmt = $conn->prepare("UPDATE contacts SET type = 'Support' WHERE id = ?");
        $updateTypeStmt->execute([ $contactId]);





            // Action for Sales type
            $response = ['success' => true, 'action' => 'Sales Lead action'];
        } elseif ($foundContact['type'] === 'Support') {


            // Update the contact type
            $updateTypeStmt = $conn->prepare("UPDATE contacts SET type = 'Sales Lead' WHERE id = ?");
            $updateTypeStmt->execute([ $contactId]);

            // Action for Support type
            $response = ['success' => true, 'action' => 'Support action'];
        } 
    } 
    
    else {
        $response = ['success' => false, 'message' => 'Contact not found.'];
    }

    // Send JSON response back to the client
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
