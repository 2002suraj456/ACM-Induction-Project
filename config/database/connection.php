<?php

// session_start();
define("host","localhost");
define("user","root");
define("dbpassword","");
define("dbname","examinationConsole");


$con = mysqli_connect(host,user,dbpassword);
if($con){
    // echo '<script tyep="text/javascipt"> alert("connection is successful");</script>';
}
else{
    echo '<script tyep="text/javascipt"> alert("connection is not successful");</script>';
    exit();
}

mysqli_select_db($con,dbname);
