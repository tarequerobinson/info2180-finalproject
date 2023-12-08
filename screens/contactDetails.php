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

</div>
    
</body>
</html>
