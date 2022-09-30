<?php
require 'DBconnect.php';

$id = $_POST ['id'];
$filename = $_POST ['filename'];

$sql = "DELETE FROM announcement   WHERE id='$id'";

if ($conn->query($sql)===TRUE) {
    if (unlink('../announcement-img/'.$filename)){
        echo true;
    }else{
        echo false;
    }

   
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>