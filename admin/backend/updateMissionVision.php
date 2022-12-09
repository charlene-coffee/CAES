<?php
require 'DBconnect.php';
session_start();


$mission = $_POST ['mission'];
$vision = $_POST ['vision'];

$sql = "Update caes_profiles set  mission='$mission', vision='$vision' WHERE caes_id='CAES01'";

if ($conn->query($sql)===TRUE) {
    echo "success";
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>