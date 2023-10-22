<?php
include_once("../../include/mysql_connection.php"); 

date_default_timezone_set("Asia/Karachi");
error_reporting(0);
 $Datetime=date('Y-m-d/h:i:a');


    
    $location= $_POST['location'];
    $poc=$_POST['poc'];
      $allocation=$_POST['allocation'];
         $status=$_POST['status'];
          $vendor=$_POST['vendor'];
     $address=$_POST['address'];
   $racks = 'N/A';
   $capacity=$_POST['capacity'];
   
     
      
       

 
      $sql = "INSERT INTO Warehouse (
          Location,
          Poc,
          Allocation,
          Status,
          Vendor,
          Address,
          DateTime,
          Racks,
          Capacity
      
      
        
     
          )
          VALUES (
              '$location',
              '$poc',
              '$allocation',
              '$status',
              '$vendor',
              '$address',
              '$Datetime',
              '$racks',
              '$capacity'
            
             
            
           
              )";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Adding Warehouse !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Warehouse Added Successfully !.')</script>";
          
              
   	}
    
    
    










?>