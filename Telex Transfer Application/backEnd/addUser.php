<?php

$user = new stdClass();
$user->username = $_POST["username"];
$user->password = $_POST["password"];
$user->firstname = $_POST["first-name"];
$user->lastname =$_POST["last-name"];
$user->email = $_POST["email"];
$user->role =$_POST["role"];

include("connectdb.php");
$db = connectdb();


 $query="INSERT INTO users (`username`,`password`,`email`,`firstname`,`lastname`,`role`) 
 VALUES ('$user->username','$user->password','$user->email','$user->firstname','$user->lastname','$user->role')";
 $stmt=$db->query($query); 
 $rowCount = $stmt->rowCount(); 
 print($rowCount);
 header("location:../index.php");
?>