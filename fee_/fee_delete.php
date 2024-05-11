<?php
 include '../database.php';
    $id=$_GET['id'];
    $standard=$_GET['standard'];

   $sql= "DELETE FROM `student_fee_value` WHERE `id` =$id";
   
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
      header( 'location:../fee_value_table.php?standard='.$standard.'');      
?>