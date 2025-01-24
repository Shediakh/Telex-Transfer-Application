<?php
session_start();
if (!isset($_SESSION["username"]) || !isset($_SESSION["role"]) || !isset($_SESSION["id"])){
    header("location:../index.php");
}

include("../backEnd/connectdb.php");
$db = connectdb();

?>

<p!<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>New Transfer</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
    <header>
        <div class="nav-img-wrapper">
            <img src="../images/logo-2.png"></div>
            <div class="welcome-message"><p class="bold-text">Welcome back</p><p class="bold-text-2"><?php echo $_SESSION["firstname"] ?></p></div>
            <div class="nav-wrapper">
            <a href="new.php" ><div  class="nav-item">New</div></a>
            <a href="list.php"><div  class="nav-item">List</div></a>
           <a> <div id="selected-page" class="nav-item">Settings</div></a>
            </div>
            <div class="logout-wrapper">
            <div class="welcome-message"><p class="bold-text">Role</p><p class="bold-text-2"><?php echo $_SESSION["role"] ?></p></div>
            <a href="../backEnd/logout.php"><button class="logout">Log Out</button></a>
            </div>
        
         
        </header> 
        <div class="form-wrapper">
        <div class="login-wrapper">
            
            <form action="../backEnd/updateUser.php" method="POST" id="update-form">
                <p class="label-2">Username</p>
                <input type="text" name="username" id="username" class="input-field" value="<?php echo $_SESSION['username']; ?>">
                <br>
                <p class="label-2">Role</p>
                <select name="role" id="role" class="select-field" style="width:88%">
                    <option class="options" value="branch">Branch</option>
                    <option class="options" value="operations">Operations</option>
                </select><br>
                <p class="label-2">First Name</p>
                <input type="text" name="first-name" id="first-name" class="input-field" placeholder="First Name" value="<?php echo $_SESSION['firstname']; ?>">
                
                <br>
                <p class="label-2">Last Name</p>
                <input type="text" name="last-name" id="last-name" class="input-field" placeholder="Last Name" value="<?php echo $_SESSION['lastname']; ?>">
                <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id'];?>">
                <br>
                <br><br><button class="submit-button" type="submit">Update</button>


</form>
</div>
        
    </body>
</html>
