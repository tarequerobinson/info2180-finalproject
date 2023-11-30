<?php 
require_once("../database/dbsetup.php");
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Dolphin CRM </title>
<link rel="stylesheet" href="/css/loginstyle.css"/>
<style>



body {




	
	margin:0;
	padding: 0;
	font-family: montserrat;
	color:rgb(19, 40, 66);
    /* background-color:  */

	background: white;
	height: 100vh;
	overflow: hidden;
	
	 background-image: url('loginbg.jpg');
  
  background-size: 100% 100%;
}

.center {
	align-items:center;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
	width: 400px;
  /* background: linear-gradient(#48a70b, #75a728); */
	border-radius: 30px;
}
.center h1 {
	
	text-align: center ;
	padding: 0 0 10px 0;
	/* border-bottom: 1px solid silver; */
}
.center .body {
	text-align: center ;
	padding: 0 0 10px 0;
}


.center form {
	
	padding: 0 40px;
	box-sizing: border-box;
}

.textField input{
	
	color:black;
	font-family: montserrat;
	
	width: 100%;
	/* padding:0 5px; */
    margin-bottom: 20px;
	height: 40px;
	border:  2px solid whitesmoke;
	/* background: none;
	outline: none; */
   
    border-radius:10px;
}

.textField label{
	
	position: absolute;
	top: 50%;
	left: 5px;
	color:white;
	transform: translateY(-50%);
	font-size: 16px;
	pointer-events: none;
	transition: .8s;
}


header{

background-color: rgb(19, 40, 66);
height: 60px;

/* text-align: center; */
/* justify-content: left; */
color: white;
}

.loginbutton{
	
		padding-bottom:20px;
	
}
input[type="submit"]{
	width: 100%;
	height : 50px;
	border: 1px solid;
    background-color: rgb(77, 48, 236);
	border-radius: 10px;
	font-size:18px;
	color: white;
	font-weight:700;
	cursor: pointer;
	outline: none;
}


.forgotPassword{
	
	
	display: flex;
  justify-content: center;
  align-items: center;
}

.forgotPassword a{
	text-align: center ;
	
	position: absolute;
	margin-top: 30px ;
	color:white;
	
}

.textField input:focus ~ label,
.textField input:valid ~ label
{
top: -5px;
color: white ;

}




</style>


</head>
<body>

<div id="loginbody" class = "center">
<h1> Login</h1>
	


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	<div class = "textField">
		<input placeholder="Email address" type = "text" name ="email" required> 
		<!-- <label>Em</label> -->
	</div>	
	<div class = "textField">		
		<input placeholder="Password"type = "password" name ="password" required> 
		<!-- <label>Password</label> -->
	</div>
	<div class = "loginbutton">
		<input type = "submit" value ="Login">
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

// $conn->close();
?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
$(document).ready(function() {
    $("form").submit(function(e) {
        e.preventDefault();

        // AJAX request
        $.ajax({
            url: "login.php",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.status === "success") {
                    // Redirect to index.php or update content dynamically
                    // window.location.href = "index.php";
                    // alert(response.message);

                    // document.getElementById("loginbody").innerHTML = "";

                } else {
                    // Display error message
                    alert(response.message);
                }
            },
            error: function() {
                // Handle AJAX error
                alert("An error occurred.");
            }
        });
    });
});
</script>

