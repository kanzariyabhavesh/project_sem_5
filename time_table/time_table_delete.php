<?php
include '../database.php';

$standard = $_POST['standard'];
$exam = $_POST['exam'];

$sql = "DELETE FROM `time_table` WHERE `stander` = '$standard' AND `examname` = '$exam'";

if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}
?>
