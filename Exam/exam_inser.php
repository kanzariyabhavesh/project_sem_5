<?php
include '../database.php';
$id = $_POST['id'];
$main = '../Exam_create.php?id=' . $id . '';
$errorvalue = '';
$value = '';
if (empty($_POST['examName'])) {

    $errorvalue .= '&examNameErr=Please enter the exam Name';
} else {
    $exam = $_POST['examName'];
    $value .= '&oldexamName=' . $exam . '';
}
if (empty($_POST['stander'])) {
    $errorvalue .= '&standerErr=Please enter the stander';
} else {
    $stander = $_POST['stander'];
    $value .= '&oldstander=' . $stander . '';
}
if (empty($_POST['totalMarks'])) {
    $errorvalue .= '&totalMarksErr=Please enter the total Marks';
} else {
    $totalMarks = $_POST['totalMarks'];
    $value .= '&oldtotalMarks=' . $totalMarks . '';
}
if (empty($_POST['passingMarks'])) {
    $errorvalue .= '&passingMarksErr=please enter the passing Marks';
} else {
    $passingMarks = $_POST['passingMarks'];
    $value .= '&oldpassingMarks=' . $passingMarks . '';
}
if (empty($_POST['startDate'])) {
    $errorvalue .= '&startDateErr=Please enter the start Date';
} else {
    $startDate = $_POST['startDate'];
    $value .= '&oldstartDate=' . $startDate . '';
}
if (empty($_POST['endDate'])) {
    $errorvalue .= '&endDateErr=Please enter the end Date';
} else {
    $endDate = $_POST['endDate'];
    $value .= '&oldendDate=' . $endDate . '';
}

$examName = $_POST['examName'];
$stander = $_POST['stander'];
$totalMarks = $_POST['totalMarks'];
$passingMarks = $_POST['passingMarks'];
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];

if ($errorvalue != '') {
    header('location:' . $main . '' . $errorvalue . '&' . $value . '');
} else {

    if (isset($_POST['submit'])) {

        $sql = "INSERT INTO `create_exam` (`examName`, `stander`, `totalMarks`, `passingMarks`, `startDate`, `endDate`) VALUES ('$examName', '$stander', '$totalMarks', '$passingMarks', '$startDate','$endDate');";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../Exam.php');
        } else {
            echo 'record not suceess';
        }
    }

    if (isset($_POST['update'])) {

        $sql = "UPDATE `create_exam` SET `examName` ='$examName', `stander` ='$stander', `totalMarks` ='$totalMarks', `passingMarks` ='$passingMarks', `startDate` ='$startDate', `endDate` = '$endDate' WHERE `id` = $id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../Exam.php');
        } else {
            echo 'record not suceess';
        }
    }
}
