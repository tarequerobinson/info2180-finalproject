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
    <div id="ncontactHead">
        <h1>New Contact</h1>
    </div>      

    <div id="ncontactBody">
        <form id = "newContactForm" action = "database/contactConnect.php" method = "POST" >
 
            <div class="formselect" id="divtitle">
                <label for="title">Title</label>
                <select name="title" id="title">
                    <option value="mr">Mr</option>
                    <option value="mrs">Mrs</option>     
                    <option value="ms">Miss</option>                
                </select>
            </div>

            <div id = "div1">
                <div id = "formRow1">            
                    <div id="cnctfname">
                        <div>
                            <label for= "firstname"> First Name<label>
                        </div>
                        <div>
                            <input id = "firstname" type="text" required placeholder="eg. Jane" name="firstname">
                        </div>
                    </div>

                    <div id="cnctlname">
                        <div>
                            <label for= "lastname">Lastname<label>
                        </div>
                        <div>
                            <input id = "lastname" type="text" placeholder="eg. Doe" required name="lastname">
                        </div>
                    </div>
                </div>

                <div id = "formRow2">
                    <div id="cnctemail">
                        <div>
                            <label for= "email">Email<label>
                        </div>
                        <div>
                            <input id = "email" type="text" required placeholder="eg. something@example.com" name="email">
                        </div>
                    </div> 

                    <div id="cnctphone">
                        <div>
                            <label for= "telephone"> Telephone<label>
                        </div>
                        <div>
                            <input id = "telephone" type="text" required placeholder="eg. 876-123-4567" name="telephone">
                        </div>
                    </div>
                </div>

                <div id = "formRow3">
                    <div id="cnctcompany">
                        <div>
                            <label for= "company">Company<label>
                        </div>
                        <div>
                            <input id = "company" type="text" required name="company" >
                        </div>
                    </div>
                    <div id="cncttype">
                        <label for="type">Type</label>
                        <select name="type" id="type">
                            <option value="Support">Support</option>
                            <option value="Sales Lead">Sales Lead</option>                
                        </select>
                    </div>
                </div>
            </div>

            <div class="formselect" id="divassign">
                <label for="title">Assigned To</label>
                <select name="assigned" id="assigned">
                    <option value="user">Fname Lname</option>      
                </select>
            </div>

            <div id='savectrl'> 
                <button id="saveContactButton" type="submit">Save</button>                
            </div>
        </form>
    
    </div>    
    
</body>

</html>






