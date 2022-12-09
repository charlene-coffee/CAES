<?php
require 'DBconnect.php';
session_start();

$id = $_SESSION["id"];

$sql = "Update users_table set image=''  WHERE user_id='$id'";

if ($conn->query($sql)===TRUE) {
    $_SESSION["image"]='';
    echo true;
   
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

   
    
    

?>