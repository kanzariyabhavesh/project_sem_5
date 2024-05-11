<?php
include '../database.php';

$standard = $_POST['Standard'];
$classroom = $_POST['Class'];

$start_time = $_POST['start_time'];
$start_time = implode(',', $start_time);

$end_time = $_POST['end_time'];
$end_time = implode(',', $end_time);

$mon_subject = $_POST['mon']['subject_id'];
$mon_subject = implode(',', $mon_subject);
$mon_teacher = $_POST['mon']['teacher_id'];
$mon_teacher = implode(',', $mon_teacher);

$tue_subject = $_POST['tue']['subject_id'];
$tue_subject = implode(',', $tue_subject);
$tue_teacher = $_POST['tue']['teacher_id'];
$tue_teacher = implode(',', $tue_teacher);

$wed_subject = $_POST['wed']['subject_id'];
$wed_subject = implode(',', $wed_subject);
$wed_teacher = $_POST['wed']['teacher_id'];
$wed_teacher = implode(',', $wed_teacher);

$thu_subject = $_POST['thu']['subject_id'];
$thu_subject = implode(',', $thu_subject);
$thu_teacher = $_POST['thu']['teacher_id'];
$thu_teacher = implode(',', $thu_teacher);

$fri_subject = $_POST['fri']['subject_id'];
$fri_subject = implode(',', $fri_subject);
$fri_teacher = $_POST['fri']['teacher_id'];
$fri_teacher = implode(',', $fri_teacher);

$sat_subject = $_POST['sat']['subject_id'];
$sat_subject = implode(',', $sat_subject);
$sat_teacher = $_POST['sat']['teacher_id'];
$sat_teacher = implode(',', $sat_teacher);

$sql = "INSERT INTO `class_timetable` (`starttime`, `endtime`, `monsubject`, `monteacher`, `tuesubject`, `tueteacher`, `wedsubject`, `wedteacher`, `thusubject`, `thuteacher`, `frisubject`, `friteacher`, `satsubject`, `satteacher`,`standard`,`classroom`) VALUES ('$start_time', '$end_time','$mon_subject','$mon_teacher','$tue_subject','$tue_teacher', '$wed_subject','$wed_teacher','$thu_subject','$thu_teacher', '$fri_subject','$fri_teacher','$sat_subject','$sat_teacher','$standard','$classroom');";

$result = mysqli_query($conn, $sql);
if ($result) {
    echo 'record success';
    header('location:../class.php');
} else {
    echo 'record not suceess';
}
