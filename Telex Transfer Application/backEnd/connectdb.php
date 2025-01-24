<?php

function connectdb() {
    $dbhost="127.0.0.1"; 
$dbname="telextransfer"; 
$dbuser="root"; 
$dbpass=""; 
$db=null; 
try { 
    $db = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);        
} catch (PDOException $e) { 
    print "Error!: " . $e->getMessage() . "<br/>"; 
    die(); 
} 
return $db;
}

?>