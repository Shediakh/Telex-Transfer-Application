<?php 
    include("connectdb.php");
    $db = connectdb();
    $dir = "../documents/";
    $id = $_POST["id"];
    $nbpayments = $_POST["nbpayments"];
    $currency = $_POST["currency"];
    $nbpayments = $_POST["nbpayments"];
    $name = basename($_FILES["doc"]["name"]);
    $target_file = $dir . $name;
    
    
    if (move_uploaded_file($_FILES["doc"]["tmp_name"], $target_file)) {
        $target_file = "documents/" . basename($_FILES["doc"]["name"]);
        $query = "INSERT INTO documents (doc_path, uploader_id, doc_name) VALUES ('$target_file', '$id', '$name')";
        $db->query($query);
        $docId = $db->lastInsertId();
        $status = "pending";
        for($i = 0; $i < $nbpayments; $i++) {
            $date = date('Y-m-d H:i:s');
            $query = "INSERT INTO transfers (telex_id, added_by, currency, status, date_submitted) VALUES ('$docId', '$id', '$currency', '$status', '$date')";
            $db->query($query);
        }
        header("location:../pages/new.php");
        
    } else {
        echo "Error uploading file";
    }
    
    

?>