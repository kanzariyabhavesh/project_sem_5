<?php 

include '../database.php';


$date=$_POST['exam_date'];
$date = implode(',', $date);
$time=$_POST['exam_time'];
$time = implode(',', $time);
$subject=$_POST['subject_id'];
$subject = implode(',', $subject);
$stander=$_GET['stander'];
$examname=$_GET['examname'];

        $sql = "INSERT INTO `time_table` (`date`, `subject`,`stander`,`examname`,`time`) VALUES ('$date', '$subject','$stander','$examname','$time');";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            header('location:../Exam.php');
        } else {
            echo 'record not suceess';
        }
