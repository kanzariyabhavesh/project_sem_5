<?php
include '../database.php';
$main = '../index.php?';
$errorvalue = '';
$value = '';

if (empty($_POST['email'])) {
    $errorvalue .= '&emailErr=Please enter the E-mail';
} else {
    $email = $_POST['email'];
    $value .= '&oldemail=' . $email . '';
}
if (empty($_POST['password'])) {
    $errorvalue .= '&passwordErr=Please enter the password';
} else {
    $password = $_POST['password'];
    $value .= '&oldpassword=' . $password . '';
}

$email = $_POST['email'];
$password = $_POST['password'];

if ($errorvalue != '') {

    header('location:' . $main . $errorvalue . '&' . $value . '');    
}
else {
    session_start();
    $query= "SELECT * FROM `registration` WHERE email='$email' AND password='" . md5($password) . "'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);
   
    if ($rows == 1) {
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        header("Location:../sizabar.php");
    } else {          
        header("Location:../index.php");
    }


}
