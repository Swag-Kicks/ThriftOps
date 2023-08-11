<?php
include_once("../includes/db.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
 $Datetime=date('Y-m-d/h:i:a');

    
    $uid= $_POST['uid'];
    $type =$_POST['type'];
    $status =$_POST['status'];
     $typeid =$_POST['typeid'];
    

 
      $sql = "INSERT INTO Logs (
          User_ID,
          Type,
          Status,
          Type_ID,
          DateTime
       
        
     
          )
          VALUES (
              '$uid',
              '$type',
            '$status',
            '$typeid',
            '$Datetime'
            
           
              )";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Adding Log !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Log Added Successfully !.')</script>";
          
              
   	}
    
    
    










?>