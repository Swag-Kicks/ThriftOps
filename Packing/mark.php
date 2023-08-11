<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];




if(isset($_POST["id"]))
{
    $order=$_POST["id"];
     
    $C_Date = date('Y-m-d/h:i:a');


    
    $que3="UPDATE `Order` SET Status='Packed' where  Order_ID='".$order."'";
    $result3 = mysqli_query($mysql, $que3);

    
    $sql3 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', '', 'Packed', '$C_Date')";
    $result3 = mysqli_query($mysql, $sql3);
     
     
    echo '1';
   
}



?>