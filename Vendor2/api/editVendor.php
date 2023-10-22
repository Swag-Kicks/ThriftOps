

<?php

include_once("../../include/mysql_connection.php"); 

$V_Name = $_POST['vname'];
$V_WH_ID = $_POST['vwareid'];
$V_Type = $_POST['vtype'];
$V_Percent = $_POST['vpercent'];
$V_Fments = $_POST['vfments'];
$V_VType = $_POST['vvtype'];
$V_Sk_prefix = $_POST['vskpref'];

$U_Name = $_POST['uname'];
$U_Email = $_POST['uemail'];
$U_Contact = $_POST['ucontact'];
$U_Address = $_POST['uaddress'];
$B_Title = $_POST['btitle'];
$B_Name = $_POST['bname'];
$B_Acc = $_POST['bacc'];



$key = $_GET['id'];

     $sql = "Update Vendor INNER JOIN User ON Vendor.Name=User.Name INNER JOIN banks ON Vendor.Vendor_ID=banks.User_ID set 
     Vendor.Name = '$V_Name' ,
     Vendor.Warehouse_ID = '$V_WH_ID',
     Vendor.Type = '$V_Type',
     Vendor.Percentage = '$V_Percent',
     Vendor.Fments = '$V_Fments',
     Vendor.Vtype = '$V_VType',
     Vendor.SK_Prefix = '$V_Sk_prefix',
     User.Name = '$V_Name',
     User.Username = '$U_Name',
     User.Email = '$U_Email',
     User.Contact = '$U_Contact',
     User.Address = '$U_Address',
     banks.title = '$B_Title',
     banks.bank_name = '$B_Name',
     banks.account_no = '$B_Acc'
     
     where Vendor_ID  = $key ";
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


