<?php 
require 'DbConnect.php';
session_start();

// $uploaded_by = $_SESSION["user_name"];
$uploaded_by="cha";
// Include the database configuration file
$statusMsg = '';

// File upload path
$targetDir = "./faculty/";
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
            $sql = "UPDATE caes_profiles set faculty = '$fileName' WHERE caes_id='CAES01'";

            if ($conn->query($sql)===TRUE) {
                $_SESSION['faculty']=$fileName;
                $res = [
                    'status' => 200,
                    'msg' => 'Profile Uploaded!',
                ];
                echo json_encode($res);
                return;
            }else{ 
                echo"Error: " . $sql . "<br>" . $conn->error;
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