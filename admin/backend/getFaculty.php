<?php 
require 'DbConnect.php';


$sql = 'SELECT faculty FROM caes_profiles ';
$result = $conn->query($sql);
$arrayData =array();
 // for data table 
if ($result->num_rows > 0){ 
    while ($row = $result->fetch_assoc()) {
        if($row['faculty']!=""){
            $arr =array(
       
                   
                'faculty'=>$row['faculty']
               
               
    
              ); 
              array_push($arrayData,$arr);
        }
       
            
    }
    $arrayData =array('data'=>$arrayData);
    echo json_encode($arrayData);
} else{
    $arrayData =array('data'=>$arrayData);
    echo json_encode($arrayData);
}
$conn->close();
?>