<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['Username'];




if(isset($_POST["id"]) && isset($_POST["status"]) && isset($_POST["war"]) && isset($_POST["sku"]) )
{
 
     $id=$_POST["id"];
     $war=$_POST["war"];
     $sku=$_POST["sku"];
     $status=$_POST["status"];
     $C_Date = date('Y-m-d/h:i:a');

   
    $query = "UPDATE `Order` SET Inventory_Status='$status' where Order_ID='".$id."' AND SKU='".$sku."' AND Status='Cancel'";
    $result=mysqli_query($mysql, $query);
        
    $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID, Reference,Status,DateTime) VALUES ('$cr','Induction','$id', '$sku', '$status', '$C_Date')";
    $result1 = mysqli_query($mysql, $sql1);
    
    
    echo '1';

}