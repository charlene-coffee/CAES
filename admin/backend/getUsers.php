<?php 
require 'DbConnect.php';


$sql = 'SELECT * FROM users_table';
$result = $conn->query($sql);
$arrayData =array();
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()) {
       $arr =array('userId'=>$row['user_id'],
                   'username'=>$row['user_name'],
                   'password'=>$row['password'],
                   'role'=>$row['role']
       
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