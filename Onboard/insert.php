<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
   

if(isset($_POST["Add"]))
{
    $Name = $_POST['Name'];
    $Username =$_POST['Username'];
    $Password=$_POST['Password'];
    $hash = md5($Password);
    $Dept_ID=$_POST['Dept_id'];
    $Contact=$_POST['Cont'];
    $Address=$_POST['Add'];
    $email=$_POST['email'];
 
    $sql1 = "SELECT * from User WHERE Username='$Username' OR email='$email'";
    $result1 = mysqli_query($mysql, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $format=$row['Username'];
    
            
   if($format == "")
   {
        $sql = "INSERT INTO User (Name,Username,Password,Dept_ID,Email,Contact,Address,Active) VALUES ('$Name', '$Username', '$hash', '$Dept_ID', '$email', '$Contact', '$Address', '0')";
        $result = mysqli_query($mysql, $sql);
        
        if(isset($result))
        {
            echo "1";
        }
        else
        {
            echo "0";
        }
   }
   else
   {
       echo "2";
   }

   
   
 
   
}
?>