<?php 
    include("../database/dbsetup.php");

   

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


<form id = "newContactForm" action = "database/contactConnect.php" method = "POST" >

    <div id = "formColumn1">


    <div class="formfield">
                <label for="title">Title</label>
                <select name="title" id="title">
                    <option value="member">Mr</option>
                    <option value="admin">Mrs</option>                    
                </select>
        </div>


        <div class="formfield">
            <div>
                <label for= "firstname"> First Name<label>
            </div>
            <div>
                <input id = "firstname" type="text" required placeholder="Jane" name="firstname">
            </div>
        </div>

        <div class="formfield">
            <div>
                <label for= "email">Email<label>
            </div>
            <div>

                <input id = "email" type="text" required placeholder="something@example.com" name="email">
            </div>
        </div>

        <div class="formfield">
            <div>
                <label for= "company">Company<label>
            </div>
            <div>
                <input id = "company" type="select" required name="company" >
            </div>
        </div>
    </div>


    <div id = "formColumn2">

        <div class="formfield">
            <div>
                <label for= "lastname">Lastname<label>
            </div>
            <div>
                <input id = "lastname" type="text" required name="lastname">
            </div>
        </div>

        <div class="formfield">
            <div>
                <label for= "telephone"> Telephone<label>
            </div>
            <div>
                <input id = "telephone" type="text" required placeholder="Doe" name="telephone">
            </div>
        </div>

        <div class="formfield">
            <div>
                <label for= "type"> Type<label>
            </div>
            <div>
                <input id = "type" type="text" required placeholder="Doe" name="type">
            </div>
        </div>



    </div>
<button  id="saveContactButton" type="submit">Save</button>

</form>

    
</body>

</html>






