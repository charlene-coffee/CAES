<?php 
require 'DbConnect.php';


$sql = 'SELECT * FROM caes_profiles WHERE mission<>"" && vision<>""';
$result = $conn->query($sql);
$arrayData =array();
 // for data table 
if ($result->num_rows > 0){ 
    while ($row = $result->fetch_assoc()) {
       $arr =array(
       
                   'id'=>$row['id'],
                   'mission'=>$row['mission'],
                   'vision'=>$row['vision']
                  
       
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