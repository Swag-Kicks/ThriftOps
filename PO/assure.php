<?php
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
error_reporting(0);
if(isset($_POST["pr"]))
{
  $PR=$_POST["pr"];
  $req=date('Y-m-d');
  $User_ID=$_SESSION['id'];
  $ven=$_POST["ven"];
  $tax=$_POST["taxelement"];
  $Datetime=date('Y-m-d/h:i:a');
  
   $sql2 = "SELECT * from PO WHERE PR_ID='$PR'";
   $result2 = mysqli_query($mysql, $sql2);
   $row1 = mysqli_fetch_assoc($result2);
   $chck=$row1["PR_ID"];
   if($chck=="")
   {
       echo "1";
      
    }
    else
    {
        echo "2";
    }
   
   
   
    
} 