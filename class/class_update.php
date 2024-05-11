<?php
include "../database.php";
$id = $_GET[ 'id' ];
$sql = "SELECT * FROM `class`  WHERE `id` =$id";
$updatefrom = '../class_form.php?id='.$id.'';
$result = mysqli_query( $conn, $sql );
echo '<br>';
while( $row = mysqli_fetch_assoc( $result ) ) {
    $standard = $row[ 'standard' ];
    $updatefrom .='&oldstandard='.$standard.'';

    $ClassRoom = $row[ 'ClassRoom' ];
    $updatefrom .='&oldClassRoom='.$ClassRoom.'';

    $teacher = $row[ 'teacher' ];
    $updatefrom .='&oldteacher='.$teacher.'';

    header( 'location:'.$updatefrom.'');
}



?>

