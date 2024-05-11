<?php
 include '../database.php';
    $id=$_GET['id'];

   $sql= "DELETE FROM `create_exam` WHERE `id` =$id";
   
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
      header( 'location:../Exam.php');      
?>