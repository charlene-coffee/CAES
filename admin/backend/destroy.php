<?php
session_start();

 $_SESSION["user_name"]="";
 $_SESSION["image"]="";
 $_SESSION["id"]="";
header('Location: ../login.php');
    exit();



?>