<?php
require 'DBconnect.php';
session_start();



$sql = "Update caes_profiles set logo=''  WHERE caes_id='CAES01'";

if ($conn->query($sql)===TRUE) {
    $_SESSION["logo"]='';
    echo true;
   
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

   
    
    

?>