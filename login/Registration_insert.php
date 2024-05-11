<?php
include '../database.php';
$id = $_POST['id'];
$main = '../Registration.php?';
$errorvalue = '';
$value = '';
if (empty($_POST['name'])) {

    $errorvalue .= '&nameErr=Please enter the name';
} else {
    $name = $_POST['name'];
    $value .= '&oldname=' . $name . '';
}

if (empty($_POST['email'])) {
    $errorvalue .= '&emailErr=Please enter the E-mail';
} else {
    $email = $_POST['email'];
    $value .= '&oldemail=' . $email . '';
}
if (empty($_POST['Mobil'])) {
    $errorvalue .= '&MobilErr=please enter the mobil number';
} else {
    $Mobil = $_POST['Mobil'];
    $value .= '&oldMobil=' . $Mobil . '';
}
if (empty($_POST['password'])) {
    $errorvalue .= '&passwordErr=Please enter the password';
} else {
    $password = $_POST['password'];
    $value .= '&oldpassword=' . $password . '';
}

$name = $_POST['name'];
$email = $_POST['email'];
$Mobil_number = $_POST['Mobil'];
$password = $_POST['password'];

if ($errorvalue != '') {

    header('location:' . $main . $errorvalue . '&' . $value . '');    
}

 else {

        $sql = "INSERT INTO `registration` (`name`, `email`, `mobilnumber`, `password`) VALUES ('$name', '$email', '$Mobil_number',md5($password))";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../index.php');
        } else {
            echo 'record not suceess';
        }

}
