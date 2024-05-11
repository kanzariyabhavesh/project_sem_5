<?php
include "../database.php";
$id = $_GET[ 'id' ];
$standard = $_GET[ 'standard' ];

$sql = "SELECT * FROM `student_form_value`  WHERE `id` =$id";
$updatefrom = '../student_fee.php?id='.$id.'&Standard='.$standard.'';
$result = mysqli_query( $conn, $sql );
echo '<br>';
while( $row = mysqli_fetch_assoc( $result ) ) {
    $fullname = $row[ 'fullname' ];
    $updatefrom .='&oldname='.$fullname.'';

    $parentname = $row[ 'parentname' ];
    $updatefrom .='&oldparent_name='.$parentname.'';

    $standard = $row[ 'standard' ];
    $updatefrom .='&oldstandard='.$standard.'';

    $classroom = $row[ 'classroom' ];
    $updatefrom .='&oldclass='.$classroom.'';

    $dob = $row[ 'dob' ];
    $updatefrom .='&olddob='.$dob.'';

    $email = $row[ 'email' ];
    $updatefrom .='&oldemail='.$email.'';

    $phonenumber = $row[ 'phonenumber' ];
    $updatefrom .='&oldphone_number='.$phonenumber.'';

    $gender = $row[ 'gender' ];
    $updatefrom .='&oldgender='.$gender.'';

    $address = $row[ 'address' ];
    $updatefrom .='&oldaddress='.$address.'';
       
}
$sql = "SELECT * FROM `fee_form`  WHERE `Standard` =$standard";
$result = mysqli_query( $conn, $sql );
echo '<br>';
while( $row = mysqli_fetch_assoc( $result ) ) {
    $fee= $row[ 'fee' ];
    $updatefrom .='&oldfee	='.$fee.'';
}
header( 'location:'.$updatefrom.'');



?>

