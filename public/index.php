<?php

    if(!isset($_SESSION)) {session_start();}

    if(isset($_SESSION['userId'])){
        include('user.php');
    }
    else{
    include(dirname(__DIR__)."\src\login.php");
    }
?>