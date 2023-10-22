
<?php

include_once("../../include/mysql_connection.php"); 

$oid = $_POST['oid'];
$status = $_POST['status'];


     $sql = "UPDATE `Order` SET `Status` = '$status',Item_Status` = '$status' WHERE `Order`.`id` = '$oid' ";
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


