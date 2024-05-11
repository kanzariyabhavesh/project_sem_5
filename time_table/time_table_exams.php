<?php
include "../database.php";

$standard_id = $_POST['standard_id'];

$sql = "SELECT * FROM `create_exam` where `stander`='$standard_id'";
$result = mysqli_query($conn, $sql);

$options = '';
echo "<option value=''>Please select Exam</option>";

while ($row = mysqli_fetch_assoc($result)) {
    $options .= '<option value="'.$row['examName'].'">'.$row['examName'].'</option>';
    
}

echo $options;
?>
