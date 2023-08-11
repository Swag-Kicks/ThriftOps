<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['id'];


if(isset($_POST["id"]) && isset($_POST["stats"]) && isset($_POST["sku"]))
{
    $stat=$_POST["stats"];
    $id=$_POST["id"];
    $sku=$_POST["sku"];
    $C_Date = date('Y-m-d/h:i:a'); 
    if($stat=='marked')
    {
        $sql2 = "UPDATE `Order` SET Shipping_Status = 'RReceived',Inventory_Status='Pending' WHERE Order_ID='$id' AND SKU='$sku'";
        $result2 = mysqli_query($mysql, $sql2);
        
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id','$sku', 'RReceived', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
        
        
        if($result1)
        {
            echo "1";
    
        }
        else 
        {
            echo "0";
        }
    }
    else
    {
        $sql2 = "UPDATE `Order` SET Shipping_Status = 'WReceived' WHERE Order_ID='$id' AND SKU='$sku'";
        $result2 = mysqli_query($mysql, $sql2);
        
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Reference,Status,DateTime) VALUES ('$cr','Order','$id','$sku', 'WReceived', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
        
        
        if($result1)
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