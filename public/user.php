<?php 
    if(!isset($_SESSION)) {session_start();}

    if(isset($_SESSION['userId'])){
        include dirname(__FILE__). "/../src/inc/header.php";
        include dirname(__FILE__). "/../src/inc/navbar.php";
        // include dirname(__FILE__). 
        // echo "hello user ". $_SESSION['userId'];

        include dirname(__FILE__)."/../src/landingpage.php";
        include dirname(__FILE__)."/../src/inc/footer.php";
    }
    else
    {
        header('Location: index.php');
    }
  
?>