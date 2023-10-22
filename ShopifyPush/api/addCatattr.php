<?php
include_once("../../include/mysql_connection.php"); 

    
    $Name= $_POST['name'];
    $Attribute=$_POST['attribute'];
     $CAT_ID= $_POST['catID'];


      $sql = "INSERT INTO `Sub_Category` ( `Name` , `attribute`,`Category_ID`)
          VALUES (
              '$Name',
              '$Attribute',
              '$CAT_ID'
              )";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Adding Attribute !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Attribute Added Successfully !.')</script>";
          
              
   	}
    
    
    










?>