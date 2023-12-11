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
    <div id="dashHead">
        <h1>Dashboard</h1>  
        <button onclick="loadScreen('contact')"> <i class="fa-solid fa-plus"></i> Add Contact</button>     
    </div>       

    <div id='dashBody'> 
        <div id='dashFilter'>
            <h2><i class="fa-solid fa-filter"></i> Filters: </h2>
            <div class="radio-toolbar">
                <input type="radio" id="All" name="cntsFilter" value="All" checked>
                <label for="All">All</label>

                <input type="radio" id="Sales Leads" name="cntsFilter" value="Sales Leads">
                <label for="Sales Leads">Sales Leads</label>

                <input type="radio" id="Support" name="cntsFilter" value="Support">
                <label for="Support">Support</label> 
                
                <input type="radio" id="Assigned" name="cntsFilter" value="Assigned">
                <label for="Assigned">Assigned To Me</label> 
            </div>
        </div>


        <table id="contactstable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company</th>
                    <th>Type</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><strong><?= $row['title'] ?> <?= $row['firstname'] ?> <?= $row['lastname'] ?></strong></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['company'] ?></td>                    
                                       
                    <td class="contacttype">
                        <?php if($row['type'] === "Support") : ?>                            
                            <div id=support><?=$row['type']?></div> 
                        <?php else : ?>    
                            <div id=saleslead><?=$row['type']?></div> 
                        <?php endif; ?>
                    </td>
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
