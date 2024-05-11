<?php
include '../database.php';
$id='';
if (isset($_POST['id'])) {
    $id = $_POST['id'];
}
$main = '../class_form.php?id='.$id;
$errorvalue = '';
$value = '';
if (empty($_POST['standard'])) {

    $errorvalue .= '&standardErr=Please enter the standard';
} else {
    $standard = $_POST['standard'];
    $value .= '&oldstandard=' . $standard . '';
}
if (empty($_POST['ClassRoom'])) {
    $errorvalue .= '&ClassRoomErr=Please enter the ClassRoom';
} else {
    $ClassRoom = $_POST['ClassRoom'];
    $value .= '&oldClassRoom=' . $ClassRoom . '';
}
if (empty($_POST['teacher'])) {
    $errorvalue .= '&teacherErr=Please enter the teacher';
} else {
    $teacher = $_POST['teacher'];
    $value .= '&oldteacher=' . $teacher . '';
}

$standard = $_POST['standard'];
$ClassRoom = $_POST['ClassRoom'];
$teacher = $_POST['teacher'];


if ($errorvalue != '') {

    header('location:' . $main . $errorvalue . '&' . $value . '');    
}
 else {

    if (isset($_POST['Save'])) {

        $sql = "INSERT INTO `class` (`standard`, `ClassRoom`, `teacher`) VALUES ('$standard','$ClassRoom', '$teacher')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../class.php');
        } else {
            echo 'record not suceess';
        }
    }

    if (isset($_POST['update'])) {

        $sql = "UPDATE `class` SET `standard` ='$standard', `ClassRoom` ='$ClassRoom', `teacher` ='$teacher'WHERE `id` = $id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../class.php');
        } else {
            echo 'record not suceess';
        }
    }
}
