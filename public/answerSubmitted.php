<?php
$submittedAnswers = $_POST;
if(!isset($_SESSION)) {session_start();}

include dirname(__FILE__) . "/../config/database/connection.php";
mysqli_select_db($con,'examinationConsole');

$query = "SELECT qno,correctOption from questionData";
$result = mysqli_query($con,$query);

$answerArray = mysqli_fetch_all($result,MYSQLI_NUM);

// for($index = 0 ;$index<4;$index++){
//     echo $answerArray[$index][0] . "-> " .$answerArray[$index][1] ."<br>";
// }

// var_dump($submittedAnswers);
echo "<br>";
// var_dump($answerArray);

// Calculate the score for a particular submission

$score = 0;
for($index=0;$index<4;$index++){
    $questionIndex = "optionForQuestion" . $index;
    // echo $submittedAnswers[$questionIndex] . ",";
    // echo $answerArray[$index][0] . "," .$answerArray[$index][1] ."<br>";
    if(array_key_exists($questionIndex,$submittedAnswers))
        if($submittedAnswers[$questionIndex] == $answerArray[$index][1])
        $score++;

}

$scoreQuery = "INSERT INTO scorelist(userId,score) VALUES (" . $_SESSION["userSlNo"] . "," . $score . ")";
mysqli_query($con,$scoreQuery);

header('Location: successfulSubmission.php');
// echo $score;

?>