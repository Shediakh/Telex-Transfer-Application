<?php
$user = new stdClass();
$user->password = $_POST["password"];
$user->username = $_POST["username"];

include("connectdb.php");
$db = connectdb();
$query = "SELECT id, username,password, firstname, lastname, role FROM users";
$stmt = $db->query($query);
$arr = array();
while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
    $arr[] = $obj;
    
}
$flag = false; 
for ($i = 0; $i < sizeof($arr); $i++) {
    print($user->username);
    print($user->password);
    print($arr[$i]->username);
    print($arr[$i]->password);
    if($user->username===$arr[$i]->username && $arr[$i]->password===$user->password) {
        $flag = true;
        $role = $arr[$i]->role;
        $first = $arr[$i]->firstname;
        $last = $arr[$i]->lastname;
        $usrid = $arr[$i]->id;
        break;
    }
}

if($flag) {
    if($role === "branch") {
        session_start();
        $_SESSION["username"] = $user->username;
        $_SESSION["role"] = $role;
        $_SESSION["firstname"] = $first;
        $_SESSION["lastname"] = $last;
        $_SESSION["id"] = $usrid;
        header("location:../pages/new.php");
    } else if($role === "operations") {
        session_start();
        $_SESSION["username"] = $user->username;
        $_SESSION["role"] = $role;
        $_SESSION["firstname"] = $first;
        $_SESSION["lastname"] = $last;
        $_SESSION["id"] = $usrid;
        header("location:../pages/list.php");
    }
} else {
    header("location:../index.php");
}
?>
