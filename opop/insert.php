<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
   

if(isset($_POST["name"]))
{
   $name=$_POST["name"];
   $type=$_POST["type"];
   $address=$_POST["address"];
   $contact=$_POST["contact"];
   $percent=$_POST["percent"];
   
   
   
   if($percent == "" && $type == "A")
   {
        $sql = "INSERT INTO Vendor (Name,Type,Percentage,Address,Contact) VALUES ('$name', '$type', '100', '$address', '$contact')";
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
   else if($percent != "" && $type == "B")
   {
        $sql = "INSERT INTO Vendor (Name,Type,Percentage,Address,Contact) VALUES ('$name', '$type', '$percent', '$address', '$contact')";
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

   
      
   
   


 
   
}
?>