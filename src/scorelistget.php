<?php
include dirname(__FILE__) . "/../config/database/connection.php";
mysqli_select_db($con,'examinationConsole');
// SELECT registeredusers.userId, scorelist.score from registeredusers JOIN scorelist on registeredusers.usersl= scorelist.userId;
$scoreQuery = "SELECT registeredusers.userId, scorelist.score from registeredusers JOIN scorelist on registeredusers.usersl= scorelist.userId";
$result = mysqli_query($con,$scoreQuery);

$scoreListArray = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($scoreListArray);
?>