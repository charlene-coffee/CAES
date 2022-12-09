<?php
require 'DBconnect.php';

$id = $_POST ['id'];
$name = $_POST ['name'];
$address = $_POST ['address'];
$mission = $_POST ['mission'];
$vission = $_POST ['vission'];
$landline = $_POST ['landline'];
$cell_no = $_POST ['cell_no'];
$sql = "Update caes_profiles set  name='$name', address='$address', mission='$mission', vission='$vission', landline='$landline', cellphone='$cell_no' WHERE id='$id'";

if ($conn->query($sql)===TRUE) {
    echo true;
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>