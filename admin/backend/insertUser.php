<?php
require 'DBconnect.php';
// pang accept
$user_name = $_POST ['user_name'];
$password = $_POST ['password'];
$role = $_POST ['role'];

$sql = "INSERT INTO users_table (user_name, password, role)
VALUE ('$user_name', '$password', '$role')";

if ($conn->query($sql)===TRUE) {
    echo true;
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>