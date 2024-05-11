<?php
include "../database.php";

$standard_id = $_POST['standard_id'];

$sql = "SELECT * FROM `class_timetable` where `standard`='$standard_id'";
$result = mysqli_query($conn, $sql);

$options = '';
echo "<option value=''>Please select Class Room</option>";

while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="'.$row['classroom'].'">'.$row['classroom'].'</option>';
    
}

echo $options;
?>
