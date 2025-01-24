<?php
session_start();
if (!isset($_SESSION["username"]) || !isset($_SESSION["role"]) || !isset($_SESSION["id"])){
    header("location:../index.php");
}

include("../backEnd/connectdb.php");
$db = connectdb();
?>

<!<!DOCTYPE html>
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
            <a ><div id="selected-page" class="nav-item">New</div></a>
            <a href="list.php"><div  class="nav-item">List</div></a>
           <a href="settings.php"> <div class="nav-item">Settings</div></a>
            </div>
            <div class="logout-wrapper">
            <div class="welcome-message"><p class="bold-text">Role</p><p class="bold-text-2"><?php echo $_SESSION["role"] ?></p></div>
            <a href="../backEnd/logout.php"><button class="logout">Log Out</button></a>
            </div>
        
         
        </header> 
        <div class="form-wrapper">
        <div class="login-wrapper">
<form method="POST" action="../backEnd/addDocument.php" enctype="multipart/form-data" id="doc-form">
                <p class="label">Currency</p>
                <select name="currency" id="currency" class="select-field">
                    <option class="options" value="KWD">Kuwaiti Dinar</option>
                    <option class="options" value="FC">Foreign Currency</option>
                </select>
                <br>
                
                <input type="number" name="nbpayments" id="nbpayments" class="input-field" placeholder="Number of Payments"><?php
                
                $stmt = $db->query("SELECT max(sequence) FROM transfers"); 
                $arr = $stmt->fetchAll();
                echo "<p class='label-2'>Last sequence: ". $arr[0][0]."</p>";
                ?>
                <br><br>
                
          <input type="file" name="doc"
                 class="choose-file" id="file-upload" accept=".pdf"
                 title="Upload PDF"/>
                 <br><br>
                 <p id="file-upload-text" class="label-2">Choose a File</p>
                
            <input type="hidden" name="id" id="id" value="<?php  echo $_SESSION["id"] ?>">

          <input class="submit-button" type="submit" name="submit" value="Submit" onclick="upload()">
          

          
          </form>
          </div>
          <br>

   <?php 
    // $query = "SELECT * FROM transfers";
    // $stmt = $db->query($query);
    // $arr = array();
    // while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
    // $arr[] = $obj;
    // }
    
    // echo "<h1>Transfers</h1>
    //     <table><tr><th>Telex ID</th><th>Sequence</th><th>Added by</th> <th>Currency</th> <th>Status</th> <th>Date Submitted</th></tr>";
    // for($i = 0; $i < sizeof($arr); $i++) {
    //     $added_by = $arr[$i]->added_by;
    //     $user = $db->query("SELECT * FROM users WHERE id='$added_by'");
    //     $user = $user->fetch(PDO::FETCH_OBJ);
    //     $name = $user->firstname. " " . $user->lastname;
    //     echo "<tr><td>" . $arr[$i]->telex_id . "</td><td>" . $arr[$i]->sequence . "</td><td>" . $name . "</td> 
    //     <td>" . $arr[$i]->currency . "</td> <td>" . $arr[$i]->status . "</td> <td>" . $arr[$i]->date_submitted . "</td>
    //      </tr>";
    // }
    // echo "</table>";
     

    
    $query = "SELECT * FROM documents WHERE uploader_id =".$_SESSION["id"];
    $stmt = $db->query($query);
    $arr = array();
    while ($obj = $stmt->fetch(PDO::FETCH_OBJ)) {
    $arr[] = $obj;
    }
    
    // echo "<h1>My documents</h1>
    //     <table><tr><th>Document ID</th><th>Document Name</th><th>Uploaded Date</th></tr>";
    // for($i = 0; $i < sizeof($arr); $i++) {
    //     echo "<tr><td>" . $arr[$i]->doc_id . "</td><td>" . $arr[$i]->doc_name . "</td><td>" . $arr[$i]->date . "</td></tr>";
    // }
    // echo "</table>";
    echo '<embed src="../'.end($arr)->doc_path.'" width="800px" height="1000px" />';

   ?>

</form>
</div>
        
        <script>
            function upload() {
                form = document.getElementById("doc-form");
                form.submit();
            }
            document.getElementById('file-upload').addEventListener('change', function() {

            var fileName = this.files.length > 0 ? this.files[0].name : 'Choose a file';
        
            document.getElementById('file-upload-text').textContent = fileName;
        });
        </script>
    </body>
</html>