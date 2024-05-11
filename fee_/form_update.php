<?php
include "../database.php";
$id = $_GET[ 'id' ];
$sql = "SELECT * FROM `fee_form`  WHERE `id` =$id";
$updatefrom = '../fee_from.php?id='.$id.'';
$result = mysqli_query( $conn, $sql );
echo '<br>';
while( $row = mysqli_fetch_assoc( $result ) ) {
    
    $standard = $row[ 'Standard' ];
    $updatefrom .='&oldstandard='.$standard.'';

    $fee = $row[ 'fee' ];
    $updatefrom .='&oldfee='.$fee.'';

       
    header( 'location:'.$updatefrom.'');
}



?>

