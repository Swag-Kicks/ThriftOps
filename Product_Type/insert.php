<?php
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
   

if(isset($_POST["Pr_name"]))
{
   $name=$_POST["Pr_name"];
   $datetime=date('Y-m-d/h:i:a');
   $sql = "INSERT INTO Product_Type (Name,DateTime) VALUES ('$name', '$datetime')";
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
?>