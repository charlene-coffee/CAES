<?php 
require 'DbConnect.php';


$sql = 'SELECT * FROM caes_profiles';
$result = $conn->query($sql);
$arrayData =array();

if ($result->num_rows > 0){ 
    while ($row = $result->fetch_assoc()) {
       $arr =array(
                   'id'=>$row['id'],
                   'name'=>$row['name'],
                   'address'=>$row['address'],
                   'landline'=>$row['landline'],
                   'cellphone'=>$row['cellphone'],
                   'created_date'=>$row['created_date'],
                   'updated_date'=>$row['update_date']
       
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