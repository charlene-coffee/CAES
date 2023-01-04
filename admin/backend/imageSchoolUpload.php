<?php
require 'DbConnect.php';
session_start();

$image_desc = $_POST ['image_desc'];
$status =  "active";
$uploaded_by = $_SESSION["user_name"];

// Include the database configuration file
$statusMsg = '';

// File upload path
$targetDir = "./img-school/";
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
            $sql = "INSERT INTO image_table (image_desc, image_filename, uploaded_by)
                    VALUE ('$image_desc', '$fileName', '$uploaded_by')";

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
