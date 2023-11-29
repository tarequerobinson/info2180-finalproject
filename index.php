<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic PHP App</title>
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e1f0748c4a.js" ></script>
    <script src="js/app.js"></script>
    <script src="js/home.js"></script>

    <link rel="stylesheet" href="css/styles.css">


</head>

<body>
    <header>
        Dolphin CRM
    </header>

    <div id="loginPage">

    </div>



    <div  id="app">
        <nav>
            <ul>
                <li onclick="loadScreen('home')"> <i class="fa-solid fa-house"></i> Home </li>
                <li onclick="loadScreen('contact')"><i class="fa-regular fa-circle-user"></i>New Contact</li>
                <li onclick="loadScreen('users')"><i class="fa-solid fa-user-group"></i> Users </li>
                <li onclick="loadLoginPage()"><i class="fa-solid fa-user-group"></i> Logout </li>
            </ul>
        </nav>
        <div id="body">
        
        <div id="home" class="hidden">
            <!-- Home screen content goes here  -->
       </div>

        <div id="contact" class="hidden">
            <!-- About screen content goes here -->
        </div>

        <div id="users" class="hidden">
            <!-- Services screen content goes here -->
        </div>

        
        </div>
    </div>


</body>
</html>

<script>

</script>

