<?php

include_once("../../include/mysql_connection.php"); 

$id = $_POST['id'];
$racks =  $_POST['racks'];






     $sql = "UPDATE Warehouse SET Filled= '$racks' WHERE Warehouse_ID =  $id";
              $result = mysqli_query($mysql, $sql);
   
     if (!$result) 
      {
          echo "<script>alert('Error Updating Racks !.')</script>";
          
      } 
      else 
      {
           
          echo "<script>alert('Racks Updating Successfully !.')</script>";
          
              
   	}
?>


