<?php

include_once("../../include/mysql_connection.php"); 

$ids = $_POST['ids'];
$status = $_POST['status'];






     $sql = "UPDATE Warehouse SET Status='$status' WHERE Warehouse_ID IN ($ids)";
              $result = mysqli_query($mysql, $sql);
   
     if (!$result) 
      {
          echo "<script>alert('Error Adding User !.')</script>";
          
      } 
      else 
      {
           
          echo "<script>alert('User Added Successfully !.')</script>";
          
              
   	}
?>


