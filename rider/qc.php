<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];
//echo $cr;



if(isset($_POST["id"]))
{
     $id=$_POST["id"];
     $order=$_POST["order"];
     $date=date('Y-m-d/h:i:a');
     
     $C_Date = date('Y-m-d/h:i:a');

        
        $que="UPDATE `Order` SET Status='Delivered',Shipping_Status='Delivered' where Order_ID='".$order."'";
        $result1 = mysqli_query($mysql, $que);
        
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', '', 'Delivered', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
        echo '1';

}







?>