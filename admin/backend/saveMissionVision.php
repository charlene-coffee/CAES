<?php
require 'DBconnect.php';
// pang accept
$mission = $_POST ['mission'];
$vision = $_POST ['vision'];


$sql = "INSERT INTO caes_profiles (mission, vision)
VALUE ('$mission', '$vision')";

if ($conn->query($sql)===TRUE) {
    echo "success";
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>