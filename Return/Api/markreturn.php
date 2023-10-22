<?php

include_once("../../include/mysql_connection.php"); 

$oid = $_POST['oid'];
$status = $_POST['status'];

     $sql = "Update  `banks` SET `refund_status` = '$status' where `User_ID` = '$status' ";
              $result = mysqli_query($mysql, $sql);
   
     if (!$result) 
      {
          echo "<script>alert('Order isnt Successfully')</script>";
          
      } 
      else 
      {
           
          echo "<script>alert('Order Updated Successfully')</script>";
          
              
   	}
?>
