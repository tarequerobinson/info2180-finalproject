<?php 
include("../database/dbsetup.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';
$user_id = $_SESSION['user_id'] ;
print_r($id);

$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->execute([$id]);

// Check if the query was successful
if ($stmt) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the result is not empty
    if ($result) {
        // Output the result or use it as needed
        // print_r($result);
    } else {
        echo "No contact found with the provided ID.";
    }
} else {
    // Handle the error if the query fails
    echo "Error: " . $conn->errorInfo()[2];
}

$notesStmt = $conn->prepare("SELECT * FROM notes WHERE contact_id = ?");
$notesStmt->execute([$id]);

// Check if the query was successful
if ($notesStmt) {
    $notesResult = $notesStmt->fetchAll(PDO::FETCH_ASSOC);

    // Check if the result is not empty
    if ($notesResult) {
        // Output the result or use it as needed
        print_r($notesResult);
    } else {
        echo "No notes found with the provided ID.";
    }
} else {
    // Handle the error if the query fails
    echo "Error: " . $conn->errorInfo()[2];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
    <script src="js/contactDetails.js"></script>
</head>

<body>

    <div id="contactDetailsHead">
        <h1> <?= $result['firstname'] ?> <?= $result['lastname'] ?> </h1>
        <button>Assign To Me</button>
        <button>Switch To Sales Lead</button>
    </div>

<div id="contactDetailsBody">
    Email: <?= $result['email'] ?>
    Telephone: <?= $result['telephone'] ?>
    Company: <?= $result['company'] ?>
    <div id="assignedTo"></div>
</div>

<div id="NotesBody">
    <?php foreach ($notesResult as $row): ?>
        <h3>header for user working on function</h3>
        <p><strong><?= $row['comment'] ?> </strong></p>
        <p><?= $row['created_at'] ?></p>
    <?php endforeach; ?>
</div>

<form action="database/notesConnect.php" method="post">
    <input type="hidden" name="contact_id" id="contactId" value="<?= $id ?>">
    <input type="hidden" name="created_by" id="createdBy" value="<?= $user_id ?>">
    
    <h1>Add a note about <?= $result['firstname'] ?></h1>
    <textarea id="comment" name="comment">Enter details here</textarea>
    <br>
    <div id='savectrl'>
        <button type="submit" id="save">Save</button>
    </div>
</form>

</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        console.log('poopie')
        getUserbyID(<?= $id ?>);
        getNoteUserbyID (<?= $id ?>);
    });
</script>
