<?php
require 'DBconnect.php';

$user_id = $_POST ['user_id'];

$sql = "DELETE FROM users_table   WHERE user_id='$user_id'";

if ($conn->query($sql)===TRUE) {
    echo true;
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

?>