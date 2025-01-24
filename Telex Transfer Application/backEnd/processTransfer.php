<?php 
    include("connectdb.php");
    $db = connectdb();
    $id = $_POST["id"];
    $telex_id = $_POST["telex_id"];
    $telexCurrency = $_POST["telexCurrency"];
    $sequence = $_POST["sequence"];
    $cif = $_POST["cif"];
    $amount = $_POST["amount"];
    $status = $_POST["statusInput"];
    $date =date('Y-m-d H:i:s');
    
    if($status == "rejected") {
        $query = "UPDATE transfers SET status='$status', processed_by='$id', date_processed='$date'
     WHERE telex_id='$telex_id' AND sequence='$sequence'";
    } else {
        $query = "UPDATE transfers SET telex_currency = '$telexCurrency', cif='$cif', 
        amount='$amount', status='$status', processed_by='$id', date_processed='$date'
        WHERE telex_id='$telex_id' AND sequence='$sequence'";
    }

    $db->query($query);
    header("location:../pages/list.php");
    
    
    


?>