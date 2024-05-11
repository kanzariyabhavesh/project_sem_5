<?php
include '../database.php';
$id = $_POST['id1'];

$name = $_POST['name'];
$parent_name = $_POST['parent_name'];
$standard = $_POST['standard'];
$class = $_POST['class'];
$dob = $_POST['dob'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$Cerdit_fee = $_POST['Cerdit_fee'];

    if (isset($_POST['Save'])) {

        $sql = "INSERT INTO `student_fee_value` (`fullname`, `parentname`, `standard`, `classroom`, `dob`, `email`, `phonenumber`,`gender`,`address`,`cerditfee`) VALUES ('$name', '$parent_name', '$standard', '$class', '$dob', '$email',$phone_number,'$gender','$address','$Cerdit_fee');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../index.php');
        } else {
            echo 'record not suceess';
        }
    }

    if (isset($_POST['update'])) {

        $sql = "UPDATE `student_fee_value` SET `fullname` ='$name', `parentname` ='$parent_name', `standard` ='$standard', `classroom` ='$class', `dob` ='$dob', `email` ='$email', `phonenumber` = '$phone_number',`gender`='$gender',`address`='$address',`cerditfee`='$Cerdit_fee' WHERE `id` = $id";
      
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../fee_value_table.php?standard='.$standard.'');
        } else {
            echo 'record not suceess';
        }
    }
