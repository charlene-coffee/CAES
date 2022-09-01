<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "enrollment_caes";
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$middlename=$_POST["middlename"];
$address=$_POST["address"];
$email=$_POST["email"];
$contact=$_POST["contactnumber"];
$city=$_POST["city"];
$province=$_POST["province"];
$zip=$_POST["zip"];




try {
  //pangconnect sa database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "INSERT INTO student_applicants (firstname, lastname, middlename, email_address, address, contact_number, city, province, zip)
  VALUES ('$firstname', '$lastname', '$middlename', '$email', '$address','$contact', '$city', '$province', '$zip'  )";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>
