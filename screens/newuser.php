<?php 
    include("../database/dbsetup.php");
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <script src="https://kit.fontawesome.com/e1f0748c4a.js" ></script>
    <script src="js/newuser.js"></script>
    <link rel="stylesheet" type= "text/css" href="css/newuser.css">
</head>

<body>
    <div id="nuserHead">
        <h1>New User</h1>   
    </div>

    <!-- <?php 
        echo "This is the content for the New User screen.";
    ?>-->

    <div id='nuserBody'> 
        <form action="database/newUserConnect.php" method="POST">
            <div id='div1'>
                <div id='userfname'> 
                    <label for="fname">First Name</label>
                    <input id="fname" type="text" name="firstname" placeholder="e.g. Jane" required/>			
                </div>

                <div id='userlname'> 
                    <label for="lname">Last Name</label>
                    <input id="lname" type="text" name="lastname" placeholder="e.g. Smith" required/>
                </div>
            </div>

            <div id='div2'>
                <div id='useremail'> 
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" placeholder="e.g. janesmith@example.com" required/>
                </div>

                <div id='userpass'> 
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" required/>
                </div>
            </div>

            <div id='userrole'> 
                <label for="role">Role</label>
                <select name="role" id="role">
                    <option value="member">Member</option>
                    <option value="admin">Admin</option>                    
                </select>
            </div>

            <div id='savectrl'> 
                <button type="submit" id="save">Save</button>
            </div>
        </form>

        
    </div>

</body>

</html>
