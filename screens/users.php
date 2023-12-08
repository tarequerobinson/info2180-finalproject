<?php 
    require_once("../database/dbsetup.php");
    $sql = "SELECT * FROM users";
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
    
    <link rel="stylesheet" type = text/css href="css/users.css">
    <script src="js/index.js"></script>
    <title>Users</title>
</head>

<body>
    <div id="userHead">
        <h1>Users</h1>
        <button onclick="loadScreen('newuser')"><i class="fa-solid fa-plus"></i> Add User</button>
    </div>   
    
    <div id='userbody'>   
        <table>
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><strong><?= $row['firstname'] ?> <?= $row['lastname'] ?></strong></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['role'] ?></td>
                    <td><?= $row['created_at'] ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div> 
       
</body>

</html>