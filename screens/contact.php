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
    <link rel="stylesheet" href="css/contact.css">
    <title>New Contact</title>
</head>
<body>

<h1>New Contact</h1>


<form id = "newContactForm" action = ".php" method = "POST">

    <div id = "formColumn1">

        <div id="formfield">
            <div>
                <label for= "firstname"> First Name<label>
            </div>
            <div>
                <input id = "firstname" type="text" required placeholder="Jane">
            </div>
        </div>

        <div id="formfield">
            <div>
                <label for= "email">Email<label>
            <div>
            <div>

                <input id = "email" type="text" required placeholder="something@example.com">
            </div>
        </div>

        <div id="formfield">
            <div>
                <label for= "company">Company<label>
            </div>
            <div>
                <input id = "company" type="select" required >
            </div>
        </div>
    </div>


    <div id = "formColumn2">

        <div id="formfield">
            <div>
                <label for= "lastname">Lastname<label>
            </div>
            <div>
                <input id = "lastname" type="text" required>
            </div>
        </div>

        <div id="formfield">
            <div>
                <label for= "telephone"> Telephone<label>
            </div>
            <div>
                <input id = "telephone" type="text" required placeholder="Doe">
            </div>
        </div>

        <div id="formfield">
            <div>
                <label for= "type"> Type<label>
            </div>
            <div>
                <input id = "type" type="text" required placeholder="Doe">
            </div>
        </div>



    </div>
<button id="saveContactButton" type="submit">Save</button>
</form>

    
</body>
</html>


<?php
// content/home.php


// echo "This is the content for the New Contact screen.";
?>


