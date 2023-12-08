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
    <!-- <script src="../js/dashboard.js"></script>
    <script src="js/index.js"></script>     -->
    <link rel="stylesheet" href="css/dashboard.css">
    
    <title>Dashboard</title>
</head>

<body>
    <div id="userHead">
        <h1>Dashboard</h1>  
        <button onclick="loadScreen('contact')"> <i class="fa-solid fa-plus"></i> Add Contact</button>     
    </div>       

    <div id='userbody'> 
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
                    <td><button type="submit" id="contactDetailsLink" onclick="loadContactDetails('contactDetails' , <?= $row['id'] ?>)" >View</button></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>
<script src="../js/dashboard.js"></script>
<script src="js/index.js"></script>

<script>
    document.getElementById('contactDetailsLink').addEventListener('click', function(event) {
        event.preventDefault();
        loadScreen('contactDetails.php?id=', <?= $row['id'] ?>);
    });
</script>
