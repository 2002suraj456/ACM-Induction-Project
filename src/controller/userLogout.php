<?php
    session_start();
    echo "logout the user";
    session_unset(); 
    session_destroy();
?>