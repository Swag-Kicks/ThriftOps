

<?php
include_once("../include/mysql_connection.php"); 

    
    $Title= $_POST['title'];
    $Status=$_POST['status'];
     $SKU=$_POST['sku'];
     $Quantity=$_POST['quantity'];
      $Price=$_POST['price'];
      
      $Pid=$_GET['pid'];
      
         

 
      $sql = "UPDATE addition Title SET Title = '$Title' , Status = '$Status' , SKU = '$SKU' , Quantity = '$Quantity' ,Price = '$Price' WHERE Shopify_ID = $Pid";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Updating Product !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Product Added Successfully !.')</script>";
          
              
   	}
    
    
    










?>