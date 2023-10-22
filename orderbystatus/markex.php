<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];

if(isset($_POST['order']) && isset($_POST['ref']))
{
    $order=$_POST['order'];
    $ref=$_POST['ref'];
    
     $update=mysqli_query($mysql,"Update `Order` SET Notes='$ref',Status='Hold' WHERE Order_ID='$order'"); 
     $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$order', '$ref', 'Hold', '$C_Date')";
     $result1 = mysqli_query($mysql, $sql1);
     echo "1";
}
else
{
    echo "0";
}