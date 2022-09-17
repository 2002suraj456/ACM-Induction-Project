<?php
    // include 'config\database\connection.php';
    include dirname(__FILE__). "/../config/database/connection.php";
    mysqli_select_db($con,'examinationConsole');

    $query = "SELECT qno,questionData,option1,option2,option3,option4 from questionData";
    $result = mysqli_query($con,$query);

    $questionArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
    // echo "<pre>";
    // print_r($questionArray);
    // echo "</pre>";
    echo json_encode($questionArray);    
    // $questionArray = array();
    // for($questionNo = 0; $questionNo < mysqli_num_rows($result); $questionNo++){
    //     $questionArray = mysqli_fetch_row($result);
    //     echo $questionArray['questionData']; 
    // }
    
    // $questionArray = array();
    // echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));
    // echo json_encode(mysqli_fetch_row($result));

    // while($questionNo = mysqli_fetch_assoc($result)) {
    //     $questionArray[] = $questionNo;
    //  }

    // echo json_encode($questionArray);
?>
