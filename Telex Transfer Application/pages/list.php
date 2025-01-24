<?php
session_start();
if (!isset($_SESSION["username"]) || !isset($_SESSION["role"]) || !isset($_SESSION["id"]) ){
    header("location:../index.php");
}
// if($_SESSION["role"] != "operations") {
//     echo "<script>alert('Access denied');
//     window.location.replace('new.php');
//     </script>";

// }

include("../backEnd/connectdb.php");
$db = connectdb();

?>

<!<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Branch page</title>
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
            <a href="new.php"><div class="nav-item">New</div></a>
            <a><div id="selected-page" class="nav-item">List</div></a>
           <a href="settings.php"> <div class="nav-item">Settings</div></a>
            </div>
            <div class="logout-wrapper">
            <div class="welcome-message"><p class="bold-text">Role</p><p class="bold-text-2"><?php echo $_SESSION["role"] ?></p></div>
            <a href="../backEnd/logout.php"><button class="logout">Log Out</button></a>
            </div>
        
         
        </header>
        


          

   <?php 
    $query = "SELECT * FROM transfers";
    $stmt = $db->query($query);
    $arr = array();
    while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
    $arr[] = $obj;
    }
    
    echo "
        <div class='transfer-list-wrapper'><table class='transfer-list'>
        <tr><th>Telex ID</th><th>Sequence</th> <th>Currency</th> <th>Amount</th>  <th>Telex Currency</th> <th>Status</th>
        <th>Submitted by</th> <th>Date Submitted</th> <th>Processed by</th> <th>Date Processed</th> <th>CIF</th> <th>Edit/View</th></tr>";
    for($i = 0; $i < sizeof($arr); $i++) {
        $added_by = $arr[$i]->added_by;
        $processed_by = $arr[$i]->processed_by;
        $user = $db->query("SELECT * FROM users WHERE id='$added_by'");
        $user = $user->fetch(PDO::FETCH_OBJ);
        $submitter_name = $user->firstname. " " . $user->lastname;
        $user = $db->query("SELECT * FROM users WHERE id='$processed_by'");
        if($user->rowCount() > 0) {
            $user = $user->fetch(PDO::FETCH_OBJ);
            $processor_name = $user->firstname. " " . $user->lastname;
        } else {
            $processor_name = "";
        }
        
        $viewOrEdit = "View";
        if($arr[$i]->status == "pending" && $_SESSION['role'] == "operations") {
            $viewOrEdit = "Edit";
        }
        echo "<tr><td>" . $arr[$i]->telex_id . "</td><td>" . $arr[$i]->sequence . "</td>
        <td>" . $arr[$i]->currency . "</td> <td>" . $arr[$i]->amount . "</td> <td>" . $arr[$i]->telex_currency . "</td>
         <td class='".$arr[$i]->status."'>" . $arr[$i]->status . "</td> <td>" . $submitter_name . "</td>  <td>" . $arr[$i]->date_submitted . "</td>
        <td>" . $processor_name . "</td><td>" . $arr[$i]->date_processed . "</td>  <td>" . $arr[$i]->cif . "</td>
        <td><a href='transfer".$viewOrEdit.".php?sequence=".$arr[$i]->sequence."&telex_id=".$arr[$i]->telex_id."'><button class='list-$viewOrEdit-button'>$viewOrEdit</button></a></td>
        </tr>";
    }
    echo "</table></div>";
     

    
    // echo '<embed src="../'.end($arr)->doc_path.'" width="800px" height="1000px" />';

   ?>

</form>
        
        
        <script>
            function upload() {
                form = document.getElementById("doc-form");
                form.submit();
            }

        </script>
    </body>
</html>