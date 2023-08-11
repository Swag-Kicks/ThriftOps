<?php
 
session_start();
include_once("../include/mysql_connection.php"); 
date_default_timezone_set("Asia/Karachi");
$cr=$_SESSION['Username'];




if(isset($_POST["id"]) && isset($_POST["status"]) && isset($_POST["war"]) )
{
 
     $id=$_POST["id"];
     $war=$_POST["war"];
     
     $status=$_POST["status"];
     $C_Date = date('Y-m-d/h:i:a');

        
    foreach($_POST["id"] as $id)
    {
        $query = "UPDATE racks SET Inventory_Status='$status' where Warehouse_ID='$war' AND SKU='".$id."'";
        $result=mysqli_query($mysql, $query);
        
        $sql1 = "INSERT INTO Logs (User_ID,Type,Type_ID,Status,DateTime) VALUES ('$cr','Induction','$id', '$status', '$C_Date')";
        $result1 = mysqli_query($mysql, $sql1);
    }
    
    echo '1';

}