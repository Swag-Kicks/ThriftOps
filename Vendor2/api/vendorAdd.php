<?php
include_once("../../include/mysql_connection.php"); 

    
    $Name= $_POST['name'];
    $Type=$_POST['type'];
     $Percentage=$_POST['percentage'];
     $Address=$_POST['address'];
      $Contact=$_POST['contact'];
      $Email=$_POST['email'];
        $Vtype=$_POST['vtype'];
         $Warehouse_ID=$_POST['warehouse'];
            $Fments=$_POST['fments'];
         $Skup=$_POST['skup'];

 
      $sql = "INSERT INTO Vendor (
          Name,
          Type,
          Percentage,
          Warehouse_ID,
          Fments,
          SK_Prefix
        
     
          )
          VALUES (
              '$Name',
              '$Type',
              '$Percentage',
              '$Warehouse_ID',
              '$Fments',
              '$Skup'
            
           
              )";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Adding Vendor !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Vendor Added Successfully !.')</script>";
          
              
   	}
    
    
    










?>