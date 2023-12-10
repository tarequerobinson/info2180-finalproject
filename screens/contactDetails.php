<?php 
include("../database/dbsetup.php");

$id = isset($_GET['id']) ? $_GET['id'] : '';
/*$user_id = $_SESSION['user_id']; 
print_r($id);*/



$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
$stmt->execute([$id]);

// Check if the query was successful
if ($stmt) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the result is not empty
    if ($result) {
        // Output the result or use it as needed
        /*print_r($result);*/
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
        // print_r($notesResult);
    } else {
        $notesResult = "No notes found with the provided ID.";
    }
} else {
    // Handle the error if the query fails
    echo "Error: " . $conn->errorInfo()[2];
}

    // Fetch user details based on created_by value
    $userStmt = $conn->prepare("SELECT firstname, lastname FROM users WHERE id = ?");
    $userStmt->execute([$result['assigned_to']]);
    $userResult = $userStmt->fetch(PDO::FETCH_ASSOC);
    // print_r($userResult);
              
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>

    <script src="js/contactDetails.js"></script>
    <link rel="stylesheet" type= "text/css" href="css/contactDetails.css">
</head>

<body>   
    <div id="contactDetailsHead">
        
        <div id="divA">
            <h1><i class="fa-solid fa-id-card-clip"></i> <?= $result['firstname'] ?> <?= $result['lastname'] ?> </h1>

            <div id="contactExtraInfo">
                <p> <strong> Created On: </strong> <?= $result['created_on'] ?>  </p>
                <p> <strong> Updated At: </strong> <?= $result['updated_at'] ?> </p>   
            </div>    
        </div>
        
        <div id="contactHeadButtons">
            <button id = "Assign" class = "assign" >Assign to Me</button>
            <?php
            // Conditionally display buttons based on the user type
            if ($result['type'] === "Sales Lead") {
                echo '<button id = "SupportButton" class = "switch" >Switch to Support</button>';
            } elseif ($result['type'] === "Support") {
                echo '<button id = "SalesButton" class = "switch" >Switch To Sales Lead</button>';
            }        
            ?>
        </div>
    </div>

    <div id="contactDetailsBody">        

        <div id="div1">
            <div class="detailsrow">
                <h4>Email:</h4>
                <?= $result['email'] ?>
            </div>
            <div class="detailsrow">
                <h4>Company:</h4>
                <?= $result['company'] ?>
            </div>
        </div>
        <div id="div2">
            <div class="detailsrow">
                <h4>Telephone:</h4>
                <?= $result['telephone'] ?>
            </div>
            <div class="detailsrow">
                <h4>Assigned To:</h4>
                <div id="assignedTo">
                    <?php if($userResult) : ?>
                        <?= $userResult['firstname'] . ' ' . $userResult['lastname'] ?>
                    <?php else : ?>    
                        <?= "None" ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div id="NotesBody">    
        <h1 id="NotesHead"><i class="fa-solid fa-pen-to-square"></i> Notes</h1>         
            <?php if ($notesResult === "No notes found with the provided ID.") { ?>
                <p id="noNotes"><?= $result['firstname'] ?> has no notes yet.</p>              
            
            <?php } else { ?>          
                <?php foreach ($notesResult as $row): ?>
                    <div class="NotesComment">
                    <?php
                        // Fetch user details based on created_by value
                        $userStmt1 = $conn->prepare("SELECT firstname, lastname FROM users WHERE id = ?");
                        $userStmt1->execute([$row['created_by']]);
                        $userResult1 = $userStmt1->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <!-- Fetch user details based on created_by value -->
                        <i class="fa-solid fa-user"></i>
                        <div id="userfullname">
                            <?php if($userResult1) : ?>
                                <?= $userResult1['firstname'] . ' ' . $userResult1['lastname'] ?>
                            <?php else : ?>    
                                <?= "None" ?>
                            <?php endif; ?>
                        </div>
                        <p><?= $row['comment'] ?></p>
                        <p id="commentdate">
                            <?php 
                            $noteCreatedDate = new DateTime($row['created_at']);
                            echo $noteCreatedDate->format('l, F j, Y g:i A');
                            ?>
                        </p>  
                    </div> 
                <?php endforeach; ?> 
            <?php } ?>                  
    </div>
    
    <div id="NotesEntry">
        <form action="database/notesConnect.php" method="post">
            <input type="hidden" name="contact_id" id="contactId" value="<?= $id ?>">
            <input type="hidden" name="created_by" id="createdBy" value="<?= $user_id ?>">
            <input type="hidden" name="created_at" id="created_at" value="">

            
            <h1>Add a note about <?= $result['firstname'] ?>: </h1>
            <textarea id="comment" name="comment" required placeholder="Enter note here..."></textarea>
            
            <div id='savectrl'>
                <button type="submit" id="save">Post Note</button>
            </div>
        </form>
    </div>

</body>
</html>

<script src="js/contactDetails.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(event) {
        alert('I AM RUNNING');
        console.log('Is the contentloading');
        
        currentDateInput = document.getElementById("created_at")
        const today = new Date();

        // Format date
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');

        // Format time
        const hours = String(today.getHours()).padStart(2, '0');
        const minutes = String(today.getMinutes()).padStart(2, '0');
        const seconds = String(today.getSeconds()).padStart(2, '0');

        // Combine date and time

        
        const formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        console.log(formattedDateTime)
        currentDateInput.value = formattedDateTime;
    });

   


</script>
