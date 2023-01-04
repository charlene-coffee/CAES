<?php
require 'DBconnect.php';

$id = $_POST ['id'];
$image_filename = $_POST ['image_filename'];

$sql = "DELETE FROM image_table   WHERE id='$id'";

if ($conn->query($sql)===TRUE) {
    if (unlink('../img-school/'.$image_filename)){
        echo true;
    }else{
        echo false;
    }

   
}else{ 
    echo"Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?>