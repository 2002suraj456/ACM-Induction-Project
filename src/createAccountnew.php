<?php include_once dirname(__FILE__).'/../config/database/connection.php' ?>

<?php

$userName = mysqli_real_escape_string($con,$_POST['userId']);
$userPassword = mysqli_real_escape_string($con,$_POST['userPassword']);

mysqli_select_db($con,'examinationConsole');

$query = "INSERT INTO registeredusers (userId,userPassword) VALUES('".$userName."','".$userPassword."')";
mysqli_query($con,$query);
// echo $query;
header("Location: ../public/index.php");  
?>