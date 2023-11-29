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
    <title>Document</title>
</head>
<body>

<h1>New Contact</h1>

    
</body>
</html>


<?php
// content/home.php


echo "This is the content for the New Contact screen.";
?>


