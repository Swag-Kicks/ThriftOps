<?php
include_once("../../include/mysql_connection.php"); 

    
    $Name= $_POST['name'];
    $Code=$_POST['code'];


 
      $sql = "INSERT INTO Attributes (
          Name,
          Code
       
        
     
          )
          VALUES (
              '$Name',
              '$Code'
            
            
           
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