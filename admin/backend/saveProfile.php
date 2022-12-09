<?php
require 'DbConnect.php';
session_start();


$name = $_POST ['name'];
$address = $_POST ['address'];
// $mission = $_POST ['mission'];
// $vission = $_POST ['vission'];
$landline = $_POST ['landline'];
$cell_no = $_POST ['cell_no'];

// File upload path
$targetDir = "logo-img/";
$fileName = basename($_FILES["logo"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(!empty($_FILES["logo"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["logo"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $sql = "INSERT INTO caes_profiles (name, logo, address, landline, cellphone)
                    VALUE ('$name', '$fileName', '$address','$landline', '$cell_no')";

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
