<?php
include '../database.php';

$id = ""; // Initialize $id variable
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}

$main = '../Teacher_form.php?id='.$id;
$errorvalue = '';
$value = '';
if (empty($_POST['name'])) {
    $errorvalue .= '&nameErr=Please enter the full name';
} else {
    $name = $_POST['name'];
    $value .= '&oldname=' . $name . '';
}
if (empty($_POST['Salary'])) {
    $errorvalue .= '&SalaryErr=Please enter the Salary';
} else {
    $Salary = $_POST['Salary'];
    $value .= '&oldSalary=' . $Salary . '';
}
if (empty($_POST['Joining'])) {
    $errorvalue .= '&JoiningErr=Please enter the Joining data';
} else {
    $Joining = $_POST['Joining'];
    $value .= '&oldJoining=' . $Joining . '';
}
if (empty($_POST['email'])) {
    $errorvalue .= '&emailErr=Please enter the E-mail';
} else {
    $email = $_POST['email'];
    $value .= '&oldemail=' . $email . '';
}
if (empty($_POST['phone_number'])) {
    $errorvalue .= '&phone_numberErr=please enter the phone number';
} else {
    $phone_number = $_POST['phone_number'];
    $value .= '&oldphone_number=' . $phone_number . '';
}
if (empty($_POST['gender'])) {
    $errorvalue .= '&genderErr=Please enter the gender';
} else {
    $gender = $_POST['gender'];
    $value .= '&oldgender=' . $gender . '';
}
if (empty($_POST['address'])) {
    $errorvalue .= '&addressErr=Please enter the address';
} else {
    $address = $_POST['address'];
    $value .= '&oldaddress=' . $address . '';
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$gender = $_POST['gender'];
$Salary = $_POST['Salary'];
$Joining = $_POST['Joining'];
$address = $_POST['address'];

if ($errorvalue != '') {
    header('location:' . $main . $errorvalue . '&' . $value . '');    
}
 else {
    $Standard=$_POST['Standard'];
    $Standards = implode(',', $Standard);
    $subject=$_POST['subject'];
    $subjects = implode(',', $subject);
    if (isset($_POST['Save'])) {
        $sql = "INSERT INTO `teacher_form` (`name`, `email`, `phonenumber`, `gender`, `salary`, `joiningdata`, `address`,`standard`,`subject`) VALUES ('$name', '$email', '$phone_number', '$gender', '$Salary', '$Joining', '$address','$Standards','$subjects')";
       
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../index.php');
        } else {
            echo 'record not suceess';
        }
    }

    if (isset($_POST['update'])) {
        $sql = "UPDATE `teacher_form` SET `name` ='$name', `email` ='$email', `phonenumber` ='$phone_number', `gender` ='$gender', `salary` ='$Salary', `joiningdata` ='$Joining', `address` = '$address',`standard`='$Standards',`subject`='$subjects' WHERE `id` = $id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../index.php');
        } else {
            echo 'record not suceess';
        }
    }
}
?>
