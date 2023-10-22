<?php
include_once("../includes/db.php"); 

    
    $Name= $_POST['name'];
    $Type=$_POST['type'];
     $Percentage=$_POST['percentage'];
     $Address=$_POST['address'];
      $Contact=$_POST['contact'];
      $Email=$_POST['email'];
        $Vtype=$_POST['vtype'];
         $Warehouse_ID=$_POST['warehouse'];
            $Fments=$_POST['fments'];
         
    //         $Name= 'name';
    //  $Type='type';
    //   $Percentage='percentage';
    //   $Address='address';
    //   $Contact='contact';
    //   $Email='email';
    //      $Vtype='vtype';
    //       $Warehoue_ID='warehouse';
    //         $Fments='fments';

 
      $sql = "INSERT INTO Vendor (
          Name,
          Type,
          Percentage,
          Address,
          Contact,
          Email,
          Vtype,
          Warehouse_ID,
          Fments
        
     
          )
          VALUES (
              '$Name',
              '$Type',
              '$Percentage',
              '$Address',
              '$Contact',
              '$Email',
              '$Vtype',
              '$Warehouse_ID',
              '$Fments'
            
           
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