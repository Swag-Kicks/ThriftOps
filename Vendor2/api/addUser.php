<?php
include_once("../../include/mysql_connection.php"); 

    
    $name= $_POST['name'];
    $username=$_POST['username'];
     $password=$_POST['password'];
     $D_id=$_POST['D_id'];
      $email=$_POST['email'];
      $contact=$_POST['contact'];
        $address=$_POST['address'];
       

 
      $sql = "INSERT INTO User (
          Name,
          Username,
          Password,
          Dept_ID,
          Email,
          Contact,
          Address,
          Active
      
        
     
          )
          VALUES (
              '$name',
              '$username',
              '$password',
              '$D_id',
              '$email',
              '$contact',
              '$address',
              '0'
             
            
           
              )";
       $result = mysqli_query($mysql, $sql);
   
       
   
       if (!$result) 
       {
           echo "<script>alert('Error Adding User !.')</script>";
          
       } 
       else 
       {
           
           echo "<script>alert('User Added Successfully !.')</script>";
          
              
   	}
    
    
    










?>