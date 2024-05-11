<?php
include '../database.php';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
$main = '../student_form.php?id='.$id;
$errorvalue = '';
$value = '';
if (empty($_POST['name'])) {

    $errorvalue .= '&nameErr=Please enter the full name';
} else {
    $name = $_POST['name'];
    $value .= '&oldname=' . $name . '';
}
if (empty($_POST['parent_name'])) {
    $errorvalue .= '&parent_nameErr=Please enter the parent name';
} else {
    $parent_name = $_POST['parent_name'];
    $value .= '&oldparent_name=' . $parent_name . '';
}
if (empty($_POST['standard'])) {
    $errorvalue .= '&standardErr=Please enter the standard';
} else {
    $standard = $_POST['standard'];
    $value .= '&oldstandard=' . $standard . '';
}
if (empty($_POST['class'])) {
    $errorvalue .= '&classErr=Please enter the class';
} else {
    $class = $_POST['class'];
    $value .= '&oldclass=' . $class . '';
}
if (empty($_POST['dob'])) {
    $errorvalue .= '&dobErr=Please enter the dob';
} else {
    $dob = $_POST['dob'];
    $value .= '&olddob=' . $dob . '';
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
$parent_name = $_POST['parent_name'];
$standard = $_POST['standard'];
$class = $_POST['class'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];

$gender = $_POST['gender'];
$address = $_POST['address'];

if ($errorvalue != '') {

    header('location:' . $main . $errorvalue . '&' . $value . '');    
}
 else {

    if (isset($_POST['Save'])) {

        $sql = "INSERT INTO `student_form_value` (`fullname`, `parentname`, `standard`, `classroom`, `dob`, `email`, `phonenumber`,`gender`,`address`) VALUES ('$name', '$parent_name', '$standard', '$class', '$dob', '$email',$phone_number,'$gender','$address')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../index.php');
        } else {
            echo 'record not suceess';
        }
    }

    if (isset($_POST['update'])) {

        $sql = "UPDATE `student_form_value` SET `fullname` ='$name', `parentname` ='$parent_name', `standard` ='$standard', `classroom` ='$class', `dob` ='$dob', `email` ='$email', `phonenumber` = '$phone_number',`gender`='$gender',`address`='$address' WHERE `id` = $id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../index.php');
        } else {
            echo 'record not suceess';
        }
    }
}
