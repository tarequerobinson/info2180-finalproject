<?php 
    include("../database/dbsetup.php");
    ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Login Dolphin CRM</title>
	<link rel="stylesheet" href="css/login.css"/>
</head>

<body>
    <div id="loginbody" class = "center">
        <h2>Login to Your Account</h2>      

        <form action="" method="post">
            <div class = "textField">
                <input placeholder="Email address" type = "text" name ="email" required> 
            </div>	
            <div class = "textField">		
                <input placeholder="Password" type = "password" name ="password" required>
            </div>
            <div class = "loginbutton">
                <button type = "submit" value ="Login"> Login </button>
            </div>

            <p>Copyright © 2023 Dolphin CRM</p>        
        </form>       
    </div>        
        
</body>

</html>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //used the $_POST superglobalto fetch the values of the email and password parameters passed in the url 
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate user credentials
    //basic authentication we are checkking what is enetered inside the input fields exist in the users table 
    $sql = "SELECT * FROM users WHERE email=:email AND password=:password";
    $stmt = $conn->prepare($sql);
    //wherever ':email' is in the sql statement replace it with the value of the $email variable
    $stmt->bindParam(':email', $email);

    //wherever ':password' is in the sql statement replace it with the value of the $password variable
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    //this prevents users from directly injecting any sql queries using the input fields provided on the front end 

    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        // Login successful
        echo json_encode(["status" => "success"]);
        exit();
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid username or password"]);
        exit();
    }

}

?>



