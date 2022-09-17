<?php include_once dirname(__FILE__).'/../../config/database/connection.php' ?>

<?php 

session_start();

// store session variables
$_SESSION['userId'] = mysqli_real_escape_string($con,$_POST['userId']);
$_SESSION['userPassword'] = mysqli_real_escape_string($con,$_POST['userPassword']);
$_SESSION['is_user_logged_in'] = false;
$_SESSION['userSlNo'];

// if(is_user_present_in_database()){
//     echo '<script tyep="text/javascipt"> alert("user does exist");</script>';
//     $_SESSION['is_user_logged_in'] = true;
//     header("Location:./../test/test.php");
    
// }
// else{
//     header("Location:./../../public");
//     echo '<script tyep="text/javascipt"> alert("user does not exist");</script>';
//     // exit();
//     // prompt and redirect the user to registration page.
// }

if(is_user_present_in_database()){
    echo '<script tyep="text/javascipt"> alert("user does exist");</script>';
    $_SESSION['is_user_logged_in'] = true;
    header("Location: ./../../public/user.php");
}

function is_user_present_in_database()
{
    global $con;
    // echo $_SESSION['userId'];
    $q = "select * from registeredUsers where userId ='" . $_SESSION['userId'] ."' && userPassword ='". $_SESSION['userPassword'] . "'";
    // $q = "select * from `registeredUsers` where userId = `suraj` and userPassword = `ss` ";
    // echo $q;
    $result = mysqli_query($con,$q);
    $rows = mysqli_num_rows($result);

    if($rows == 0){
        return false;
    }
    else{
        $row = mysqli_fetch_assoc($result);
        $_SESSION['userSlNo'] = $row["usersl"];
        return true;
    }
        
}

// function is_user_present_in_database(){
//     global $con;
//     $q = "select * from registeredUsers where userId = suraj && userPassword = ss";

// }

?>
