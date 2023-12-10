<?php

include ("dbsetup.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $contactId = $_POST['contactId'];
    $newType = $_POST['newType'];

    // Update the contact type in the database
    $updateTypeStmt = $conn->prepare("UPDATE contacts SET type = ? WHERE id = ?");
    $updateTypeStmt->execute([$newType, $contactId]);

    if ($updateTypeStmt->rowCount() > 0) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false];
    }

    // Send JSON response back to the client
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}

?>
