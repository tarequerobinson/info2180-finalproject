<?php 
require_once("../database/dbsetup.php");
$sql = "SELECT * FROM contacts";
$results = $conn->query($sql); 

    if (!$results) {
        die("Error: " . $conn->error);
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <!-- <script src="js/home.js"></script> -->


    <title>Document</title>
</head>
<body>

<h1>Dashboard</h1>

    
</body>
</html>


<?php
// content/home.php


echo "This is the content for the new home screen.";
?>

<table id="contactstable">
    <thead>
    <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Type</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $row): ?>
        <tr>
            <td><strong><?= $row['firstname'] ?> <?= $row['lastname'] ?></strong></td>
            <td><?= $row['email'] ?></td>

            <td><?= $row['company'] ?></td>
            <td class="contacttype"><?= $row['type'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<script src="js/app.js"></script>
    <script src="js/home.js"></script>



