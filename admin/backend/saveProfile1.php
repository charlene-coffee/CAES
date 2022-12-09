<?php
require 'DBconnect.php';
// pang accept
$name = $_POST ['name'];
$address = $_POST ['address'];
$landline = $_POST ['landline'];
$cell_no = $_POST ['cell_no'];

$sql = "INSERT INTO caes_profiles (caes_id,name, address, landline, cellphone)
VALUE ('CAES01','$name', '$address','$landline', '$cell_no')";

if ($conn->query($sql)===TRUE) {
    echo "success";
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>