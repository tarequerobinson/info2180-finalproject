<?php 
include("../database/dbsetup.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';
// $id = 4081;

$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->execute([$id]);

// Check if the query was successful
if ($stmt) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the result is not empty
    if ($result) {
        // Output the result or use it as needed
        print_r($result);
    } else {
        echo "No contact found with the provided ID.";
    }
} else {
    // Handle the error if the query fails
    echo "Error: " . $conn->errorInfo()[2];
}

$notesStmt = $conn->prepare("SELECT * FROM notes WHERE id = ?");
$notesStmt->execute([$id]);

// Check if the query was successful
if ($notesStmt) {
    $notesResult = $stmt->fetch(PDO::FETCH_ASSOC);

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
</head>
<body>

<div id="contactDetailsHead">
    <h1> <?= $result['firstname'] ?> <?= $result['lastname'] ?> </h1>
    <button>Assign TO</button>
    <button>Assign TO</button>

</div>

    <div id="contactDetailsBody">
        Email: <?= $result['email'] ?>
        Telephone: <?= $result['telephone'] ?>
        Company: <?= $result['company'] ?>
    </div>

    <div id="NotesBody">
        <?php foreach ($notesResult as $row): ?>
        <h2>header for user working on function</h2>
        <p><?= $row['comment'] ?> </p>
        <p> <?= $row['created_at'] ?> </p>   <!-- this is the date I leave this part to you honestly kye -->
        
        <?php endforeach;?>
    </div>
<form action="notesConnect.php" method="post">

    <h1></h1>
    <textarea id="comment" name="comment" rows="4" cols="50"></textarea>

    <br>

    <div id='savebutton'> 
                <button type="submit" id="save">Save</button>
     </div>
</form>

</div>
    
</body>
</html>
