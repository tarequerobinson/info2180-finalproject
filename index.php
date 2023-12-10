<?php

session_start(); // Start the session

if(!isset($_SESSION['user_id'])) {
    $_SESSION = array();
    header("Location: login.php");
    exit();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dolphin CRM <?=$_SESSION['firstname']?></title>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e1f0748c4a.js" ></script>
    
    <link rel="stylesheet" href="css/index.css">
    <script src="js/index.js"></script>    
</head>

<body>
    <header>
        <img id=icon src="images/dolphin-logo.png" alt="A picture of a cartoon dolphin logo.">
        <h1>Dolphin CRM </h1> 
        <p> Welcome <?= $_SESSION['firstname'] ?> ! </p>

    </header>

    <div id="loginPage"> </div>

    <div id="app">
        <nav>
            <ul>
                <li onclick="loadScreen('dashboard')"> <i class="fa-solid fa-house"></i> Home </li>
                <li onclick="loadScreen('contact')"><i class="fa-regular fa-circle-user"></i> New Contact</li>
                <li onclick="loadScreen('users')"><i class="fa-solid fa-user-group"></i> Users </li>
                <li><a href="logout.php"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout </a></li>
            </ul>
        </nav>

        <div id="body">        
            <div id="dashboard" class="hidden">
                <!-- Home screen content goes here  -->
            </div>

            <div id="contact" class="hidden">
                <!-- About screen content goes here -->
            </div>

            <div id="users" class="hidden">
                <!-- Services screen content goes here -->
            </div>

            <div id="newuser" class="hidden">
                <!-- Services screen content goes here -->
            </div>

            <div id="contactDetails" class="hidden">
                <!-- Services screen content goes here -->
            </div>

        </div>
    </div>

</body>

</html>



