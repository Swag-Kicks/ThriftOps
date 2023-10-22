<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");

if(isset($_POST["id"]))
{
   
    $stat=1;
    $id=$_POST["id"];
     
    
    $sql2 = "UPDATE User SET Active = '".$stat."' WHERE User_ID='".$id."'";
    $result1 = mysqli_query($mysql, $sql2);
    
    
    if($result1)
    {
        echo "1";

    }
    else 
    {
        echo "0";
    }
     
     

}







?>