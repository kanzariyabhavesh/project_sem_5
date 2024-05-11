<?php
include '../database.php';
$marksArray = array(); 

foreach ($_GET as $subject => $marks) {
    $subjectMarks = "$subject:$marks";
    $marksArray[] = $subjectMarks;
}

$totalMarks=$_GET["totalMarks"];
$stander=$_GET["standard"];
$class=$_GET["class"];
$fullname=$_GET["fullname"];
$parentname=$_GET["parentname"];
$id=$_GET["id"];
$marksString = implode(',', $marksArray);

        $sql = "INSERT INTO `marks` (`subjectmarks`,`stander`,`classroom`,`fullname`,`parentname`,`totlemarks`) VALUES ('$marksString','$stander','$class','$fullname','$parentname','$totalMarks')";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 'record success';
            $sql = 'SELECT * FROM `create_exam` where id = ' . $id;
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $examName=$row['examName'];
                $totalMarks=$row['totalMarks'];
                $passingMarks=$row['passingMarks'];
                $passingMarks=$row['passingMarks'];
                $startDate=$row['startDate'];
                $endDate=$row['endDate'];
            }


            header('location:../result.php?stander='.$stander.'&class='.$class.'&examname='.$examName.'&totalMarks='.$totalMarks.'&passingMarks='.$passingMarks.'&passingMarks='.$passingMarks.'&startDate='.$startDate.'&endDate='.$endDate.'&id='.$id.'&fullname='.$fullname.'&parentname='.$parentname);
        } else {
            echo 'record not suceess';
        }
    
