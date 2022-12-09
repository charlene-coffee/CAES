<?php 
session_start();

if(empty($_SESSION['user_name'])){
    header('Location: ../admin/login.php');
    exit();
}

// $user_name = $_POST ['user_name'];
// $password = $_POST ['password'];

// $sql = "SELECT * FROM users_table WHERE user_name='$user_name' AND password= '$password'";
// $result = $conn->query($sql);
// $arrayData =array();

// if ($result->num_rows > 0){ 
//     while($row =$result->fetch_assoc()) {
//         $_SESSION["user_name"]=$user_name;
//     }
//     echo true;
   
// } else{
//    echo false;
// }
// $conn->close();
// 
?>