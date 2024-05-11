<?php
 include '../database.php';
    $id=$_GET['id'];

   $sql= "DELETE FROM `fee_form` WHERE `id` =$id";
   
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
      header( 'location:../fee_list.php');      
?>