<?php
require 'DBconnect.php';

$id = $_POST ['id'];

$sql = "DELETE FROM caes_profiles   WHERE id='$id'";

if ($conn->query($sql)===TRUE) {
    echo true;
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>