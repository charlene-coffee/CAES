<?php
require 'backend/DbConnect.php';
session_start();

$description = $_POST ['description'];
$status =  "active";
$uploaded_by = $_SESSION["user_name"];

// Include the database configuration file
$statusMsg = '';

// File upload path
$targetDir = "announcement-img/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(!empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = "INSERT INTO announcement (description, filename, status, uploaded_by)
                    VALUE ('$description', '$fileName', '$status', '$uploaded_by')";

                    if ($conn->query($sql)===TRUE) {
                        echo "success";
                    }else{ 
                       echo "failed";
                    }
                    $conn->close();
        }else{
            echo "failed3";
        }
    }else{
        echo "failed2";
    }
}else{
    echo "failed1";
}

?>
