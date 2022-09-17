<?php
if(!isset($_SESSION)) {session_start();}
// echo var_dump(isset($_SESSION['is_user_logged_in']));

if(isset($_SESSION['userId'])){

    include 'loggedinnavbar.php';
}
else{

    include 'loggedoutnavbar.php';
}

?>