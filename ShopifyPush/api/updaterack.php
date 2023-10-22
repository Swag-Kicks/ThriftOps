<?php
include_once("../../include/mysql_connection.php"); 

    
    $rnumber= $_POST['rnum'];
    $sku= $_POST['sku'];
    
         

 
      $sql = "UPDATE `racks` SET `SKU` = '$sku' WHERE `racks`.`name` = '$rnumber' ";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Adding Product to Rack !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Product added to rack successfully !.')</script>";
          
              
   	}
    
    
    










?>