
<?php

include_once("../../include/mysql_connection.php"); 

$oid = $_POST['oid'];
$newoid = '#'.$oid;


     $sql = "UPDATE `Order` SET `Status` = 'Packed' , `Item_Status` = 'Packed' WHERE `Order`.`Order_Number` ='$newoid' ";
              $result = mysqli_query($mysql, $sql);
   
     if (!$result) 
      {
          echo "<script>alert('Order PACK ERROR')</script>";
          
      } 
      else 
      {
           
          echo "<script>alert('Order Updated Successfully')</script>";
          
              
   	}
?>


