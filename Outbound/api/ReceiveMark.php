
<?php

include_once("../../include/mysql_connection.php"); 

$oid = $_POST['oid'];


     $sql = "UPDATE `Order` SET `Status` = 'Received',Item_Status` = 'Received' WHERE `Order`.`id` = '$oid' ";
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


