<?php
 include '../database.php';
    $id=$_GET['id'];

   $sql= "DELETE FROM `student_form_value` WHERE `id` =$id";
   
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
      header( 'location:../student_table.php');      
?>