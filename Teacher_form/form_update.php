<?php
include "../database.php";
$id = $_GET[ 'id' ];
$sql = "SELECT * FROM `teacher_form`  WHERE `id` =$id";
$updatefrom = '../Teacher_form.php?id='.$id.'';
$result = mysqli_query( $conn, $sql );
echo '<br>';
while( $row = mysqli_fetch_assoc( $result ) ) {
    $fullname = $row[ 'name' ];
    $updatefrom .='&oldname='.$fullname.'';
    
    $email = $row[ 'email' ];
    $updatefrom .='&oldemail='.$email.'';

    $phonenumber = $row[ 'phonenumber' ];
    $updatefrom .='&oldphone_number='.$phonenumber.'';
    
    $gender = $row[ 'gender' ];
    $updatefrom .='&oldgender='.$gender.'';

    $salary = $row[ 'salary' ];
    $updatefrom .='&oldSalary='.$salary.'';

    $joiningdata = $row[ 'joiningdata' ];
    $updatefrom .='&oldJoining='.$joiningdata.'';

    $address = $row[ 'address' ];
    $updatefrom .='&oldaddress='.$address.'';
       
    header( 'location:'.$updatefrom.'');
}



?>

