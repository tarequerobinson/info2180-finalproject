<?php 
    include("database/dbsetup.php");

    ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="ISO-8859-1">
	<title>Login Dolphin CRM</title>
	<link rel="stylesheet" href="css/login.css"/>
    <script src="https://kit.fontawesome.com/e1f0748c4a.js" ></script>
</head>

<body>
    <div id="loginbody" class = "center">
        <h2>Login to Your Account</h2>      

        <form  method="post">
            <div class = "textField">
                <input placeholder="Email address" type = "text" name ="email" required> 
            </div>	
            <div class = "textField">		
                <input placeholder="Password" type = "password" name ="password" required>
            </div>
            <div id = "errormsg"></div>
            <div class = "loginbutton">
                <button type = "submit" value ="Login" onclick="clearError()"> Login </button>
            </div>

            <p>Copyright © 2023 Dolphin CRM</p>        
        </form>       
    </div>        
        
</body>

</html>

<script type="text/javascript">
    var errordiv = document.getElementById("errormsg")

    document.addEventListener('DOMContentLoaded', () => {   
        console.log(errordiv);
    });

    function showError() {
        errordiv.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i>" + " Invalid Username or Password.";
    }

    function clearError() {
        errordiv.innerHTML = "";
    }
</script>


<?php




session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //used the $_POST superglobalto fetch the values of the email and password parameters passed in the url 
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate user credentials
    //basic authentication we are checkking what is enetered inside the input fields exist in the users table 
    $sql = "SELECT * FROM users WHERE email=:email";
    $stmt = $conn->prepare($sql);
    //wherever ':email' is in the sql statement replace it with the value of the $email variable
    $stmt->bindParam(':email', $email);

    //wherever ':password' is in the sql statement replace it with the value of the $password variable
  
    $stmt->execute();

    //this prevents users from directly injecting any sql queries using the input fields provided on the front end 
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $rowCount = $stmt->rowCount();


 // Start the session

// Assume you have checked the username and password
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['email'] = $email;
    $_SESSION['user_id'] = $user['id']; // Set the session variable
    $_SESSION['firstname'] = $user['firstname'];
    header("Location: index.php");
    exit();
} else {
    $_SESSION['email'] = ""; // Set the session variable
    echo '<script type="text/javascript"> showError(); </script>';
    //echo json_encode(["status" => "error", "message" => "Invalid username or password"]);
}

}

?>



