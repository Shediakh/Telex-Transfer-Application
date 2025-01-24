<?php

$user = new stdClass();
$user->username = $_POST["username"];
$user->firstname = $_POST["first-name"];
$user->lastname =$_POST["last-name"];
$user->role =$_POST["role"];
$user->id =$_POST["id"];
include("connectdb.php");
$db = connectdb();


 $query="UPDATE users SET `username` = '$user->username',`firstname` = '$user->firstname', 
 `lastname` = '$user->lastname', `role` = '$user->role' WHERE id='$user->id'";
 $stmt=$db->query($query); 
 $rowCount = $stmt->rowCount(); 
 print($rowCount);
 header("location:../index.php");
?>