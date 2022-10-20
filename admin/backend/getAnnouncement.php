<?php 
require 'DbConnect.php';


$sql = 'SELECT * FROM announcement';
$result = $conn->query($sql);
$arrayData =array();
 // for data table 
if ($result->num_rows > 0){ 
    while ($row = $result->fetch_assoc()) {
       $arr =array(
       
                   'id'=>$row['id'],
                   'description'=>$row['description'],
                   'filename'=>$row['filename'],
                   'status'=>$row['status'],
                   'uploaded_by'=>$row['uploaded_by']
       
                 ); 
            array_push($arrayData,$arr);
    }
    $arrayData =array('data'=>$arrayData);
    echo json_encode($arrayData);
} else{
    $arrayData =array('data'=>$arrayData);
    echo json_encode($arrayData);
}
$conn->close();
?>