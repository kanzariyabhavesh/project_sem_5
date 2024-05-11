<?php
include "../database.php";
$id = $_GET[ 'id' ];
$sql = "SELECT * FROM `create_exam`  WHERE `id` =$id";
$updatefrom = '../Exam_create.php?id='.$id.'';
$result = mysqli_query( $conn, $sql );
echo '<br>';
while( $row = mysqli_fetch_assoc( $result ) ) {
    $examName = $row[ 'examName' ];
    $updatefrom .='&oldexamName='.$examName.'';

    $stander = $row[ 'stander' ];
    $updatefrom .='&oldstander='.$stander.'';

    $classRoom = $row[ 'classRoom' ];
    $updatefrom .='&oldclassRoom='.$classRoom.'';

    $totalMarks = $row[ 'totalMarks' ];
    $updatefrom .='&oldtotalMarks='.$totalMarks.'';

    $passingMarks = $row[ 'passingMarks' ];
    $updatefrom .='&oldpassingMarks='.$passingMarks.'';

    $startDate = $row[ 'startDate' ];
    $updatefrom .='&oldstartDate='.$startDate.'';

    $endDate = $row[ 'endDate' ];
    $updatefrom .='&oldendDate='.$endDate.'';
       
    header( 'location:'.$updatefrom.'');
}



?>

