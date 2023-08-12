<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];
//echo $cr;



if(isset($_POST["id"]) && isset($_POST["order"]) && isset($_POST["stats"]))
{
     $id=$_POST["id"];
     $order=$_POST["order"];
     $stats=$_POST["stats"];
     $message=$_POST["message"];
     $date=date('Y-m-d/h:i:a');
     
     $C_Date = date('Y-m-d/h:i:a');
     
     if($message!='')
     {
        $que="UPDATE `Order` SET Status='$stats',Shipping_Status='$stats',Shipping_Reason='$message' where Order_ID='".$order."'";
        $result1 = mysqli_query($mysql, $que);
        
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', $message, '$stats', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
        echo '1';
     }
     else
     {
        $que="UPDATE `Order` SET Status='$stats',Shipping_Status='$stats' where Order_ID='".$order."'";
        $result1 = mysqli_query($mysql, $que);
        
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', '', '$stats', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
        echo '1';
     }

        
       

}







?>