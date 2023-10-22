<?php
include_once("../../include/mysql_connection.php"); 

    
    $title= $_POST['title'];
    $bank_name=$_POST['bank_name'];
     $account_no=$_POST['account_no'];
     $user_id=$_POST['user_id'];
      $user_type=$_POST['user_type'];
     
         

 
      $sql = "INSERT INTO banks (
          title,
          bank_name,
          account_no,
          user_id,
          user_type
        
        
     
          )
          VALUES (
              '$title',
              '$bank_name',
              '$account_no',
              '$user_id',
              '$user_type'
           
            
           
              )";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Adding Bank Detail !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('Bank Detail Added Successfully !.')</script>";
          
              
   	}
    
    
    










?>