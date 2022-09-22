<?php
require 'DBconnect.php';

$user_name = $_POST ['user_name'];
$user_id = $_POST ['user_id'];
$password = $_POST ['password'];
$role = $_POST ['role'];

$sql = "Update users_table set user_name='$user_name', password='$password', role='$role' WHERE user_id='$user_id'";

if ($conn->query($sql)===TRUE) {
    echo true;
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>