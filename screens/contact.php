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

    <title>New Contact</title>    
    <link rel="stylesheet" type= "text/css" href="css/contact.css">
</head>

<body>
    <div id="userHead">
        <h1>New Contact</h1>  
    </div>
       

</body>

</html>


<?php
    echo "This is the content for the New Contact screen.";
?>


