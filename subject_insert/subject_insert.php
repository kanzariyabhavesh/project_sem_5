<?php
include '../database.php';
$main = '../subject.php?';
$errorvalue = '';
if (empty($_POST['standard'])) {
    $errorvalue .= '&standardErr=Please enter the standard';
} 
$standard = $_POST['standard'];
    $subject = '';
    $subjects = array_values($_POST);
    $subject = implode(',', $subjects);
if ($errorvalue != '') {
    header('location:' . $main . '' . $errorvalue . '');
}
 else {

        $sql = "INSERT INTO `subject` (`standard`, `subject`) VALUES ('$standard', '$subject');";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../index.php');
        } else {
            echo 'record not suceess';
        }
    }
