<?php
session_start();
if (!isset($_SESSION["username"]) || !isset($_SESSION["role"]) || !isset($_SESSION["id"]) || $_SESSION["role"] != "operations"){
    header("location:../index.php");
}
$sequence = $_GET["sequence"];
$telex_id = $_GET["telex_id"];
include("../backEnd/connectdb.php");
$db = connectdb();
$stmt = $db->query("SELECT * FROM transfers WHERE sequence = '$sequence' AND telex_id = '$telex_id'");
$arr = array();
$arr = $stmt->fetch();
$submitted_id = $arr["added_by"];
$st = $db->query("SELECT firstname, lastname FROM users WHERE id='$submitted_id'");
$arr2 = $st->fetch();
$submitted_by = $arr2[0] ." ".$arr2[1];

$processor = $arr["processed_by"];
$st = $db->query("SELECT firstname, lastname FROM users WHERE id='$processor'");
$arr2 = $st->fetch();
$processed_by = $arr2[0] ." ".$arr2[1];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Operations</title>
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
       <a href="list.php"> <div class="back-arrow-wrapper">
            <img src="../images/back-arrow.png" style="height:150px;width:150px;">
        </div></a>
        <div class="form-wrapper">
        <div class="edit-wrapper">
            
        
<form method="POST" action="../backEnd/updateTelex.php" enctype="multipart/form-data" id="op-form">
                <p class="label"><span style="font-weight:700">Status: </span><span class="<?php echo $arr['status'] ?>"><?php echo $arr['status'] ?></span></p>
                <p class="label"><span style="font-weight:700">Processed By: </span><?php echo $processed_by ?></p>
                <p class="label" style="margin-right: 20px;"><span style="font-weight:700">Date Processed: </span><?php echo $arr["date_submitted"]; ?></p>
                <p class="label"><span style="font-weight:700">Submitted By: </span><?php echo $submitted_by ?></p>
                <p class="label" style="margin-right: 20px;"><span style="font-weight:700">Date Submitted: </span><?php echo $arr["date_submitted"]; ?></p>
                <p class="label"><span style="font-weight:700">Currency: </span><?php echo $arr["currency"]; ?></p>
                <p class="label"><span style="font-weight:700">Telex Currency: </span><?php echo $arr["telex_currency"]; ?></p>
                <p class="label"><span style="font-weight:700">Telex ID: </span><?php echo $arr["telex_id"]; ?></p>
                <p class="label"><span style="font-weight:700">Sequence: </span><?php echo $arr["sequence"]; ?></p>
                <p class="label"><span style="font-weight:700">CIF: </span><?php echo $arr["cif"]; ?></p>
                <p class="label"><span style="font-weight:700">Amount: </span><?php echo $arr["amount"]; ?></p>
                <br><br>
            <input type="hidden" name="id" id="id" value="<?php  echo $_SESSION["id"] ?>">
            <input type="hidden" name="statusInput" id="statusInput" value="">
            <input type="hidden" name="telex_id" id="telex_id" value="<?php echo $telex_id ?>">
            <input type="hidden" name="sequence" id="sequence" value="<?php echo $sequence ?>">
            <?php 
             $docId = $arr["telex_id"];
             $stmt = $db->query("SELECT doc_path FROM documents WHERE doc_id = '$docId'");
             $docPath = $stmt->fetch();
          echo '</div><br><embed src="../'.$docPath[0].'" width="800px" height="1000px" /></div>'; ?>

          

    

</form>
        
        
        <script>
            function register() {
                document.getElementById("statusInput").value = "registered";
                form = document.getElementById("op-form");
                form.submit();
            }
            
            function reject() {
                document.getElementById("statusInput").value = "rejected";
                form = document.getElementById("op-form");
                form.submit();
            }

        </script>
    </body>
</html>