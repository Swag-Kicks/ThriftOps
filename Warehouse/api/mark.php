<?php

include_once("../../include/mysql_connection.php"); 

$id = $_POST['id'];
$status =  $_POST['status'];






     $sql = "UPDATE `Order` SET Status='Picked',`Item_Status`= '$status' WHERE id =  $id";
              $result = mysqli_query($mysql, $sql);
   
     if (!$result) 
      {
          echo "<script>alert('Error Picking !.')</script>";
          
      } 
      else 
      {
           
          echo "<script>alert('Picked Successfully !.')</script>";
          
              
   	}
?>
