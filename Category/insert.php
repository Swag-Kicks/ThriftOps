<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);

   

if(isset($_POST["name"]))
{
   $name=$_POST["name"];
   $username=$_POST["USER"];
   $fas=$_POST["format"];
   $pr=$_POST["pr"];
   $datetime=date('Y-m-d/h:i:a');
   
   $sql1 = "SELECT * from Category WHERE SKU_Format='$fas' AND Name='$name'";
   $result1 = mysqli_query($mysql, $sql1);
   $row = mysqli_fetch_assoc($result1);
   $format=$row['SKU_Format'];
    
            
   if($format == "")
   {
        //vendor insertion
        $sql = "INSERT INTO Category (Product_ID,Name,SKU_Format,User_ID,DateTime) VALUES ('$pr', '$name', '$fas', '$username', '$datetime')";
        $result = mysqli_query($mysql, $sql);
        
         if(isset($result))
        {
            echo "1";
        }
   }
   else
   {
       echo "0";
   }
   

}
?>