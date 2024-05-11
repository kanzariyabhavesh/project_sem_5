<?php
include '../database.php';
$id = $_POST['id'];
$main = '../fee_from.php?id='.$id.'';
$errorvalue = '';
$value = '';
if (empty($_POST['standard'])) {
    $errorvalue .= '&standardErr=Please enter the standard';
} else {
    $standard = $_POST['standard'];
    $value .= '&oldstandard=' . $standard . '';
}
if (empty($_POST['fee'])) {
    $errorvalue .= '&feeErr=Please enter the fee';
} else {
    $fee = $_POST['fee'];
    $value .= '&oldfee=' . $fee . '';
}

$standard = $_POST['standard'];
$fee = $_POST['fee'];

if ($errorvalue != '') {
    header('location:' . $main . $errorvalue . '&' . $value . '');    
}
 else {

    if (isset($_POST['Save'])) {

        $sql = "INSERT INTO `fee_form` (`Standard`, `fee`) VALUES ('$standard', '$fee');";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../index.php');
        } else {
            echo 'record not suceess';
        }
    }

    if (isset($_POST['update'])) {

        $sql = "UPDATE `fee_form` SET `Standard` ='$standard', `fee` ='$fee' WHERE `id` = $id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../index.php');
        } else {
            echo 'record not suceess';
        }
    }
}
